<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Content-Type: application/json',
                           'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    /**
    * @return View
    **/
    public function showView(): View
    {
        // lấy thông tin product
        [$products, $isHasProductsCart]  = $this->getProductsFromCart();
        $subPrice = $this->subPrice($products);
        $shipping = $this->shipPrice($products);
//        dd(empty($products) , $isHasProductsCart);
        $current = Carbon::now()->toDateString();
        $promotion = DB::table('khuyen_mai')->select('*')
            ->where([['ngay_bat_dau','<=',$current],['ngay_ket_thuc','>=',$current]])->get()->toArray();
        return view('khach_hang/cart/viewCart',['products'     => $products,
                                                    'isHasProduct'  => $isHasProductsCart,
                                                    'subPrice'      => $subPrice,
                                                    'shipping'      => $shipping,
                                                    'promotion'=>$promotion
                                                    ]
        );
    }

    public function applyPromo(Request $request){
        $current = Carbon::now()->toDateString();
        if($request->maKM == null){
            return back()->with('message','Chưa nhập mã khuyến mãi');
        }
        $data2 = DB::table('khuyen_mai')->select('*')
            ->where([['ngay_bat_dau','<=',$current],['ngay_ket_thuc','>=',$current],['Ma_KM','=',$request->maKM]])->first();
        if(!empty($data2) && Cookie::has('cart')){
            $cart = Cookie::get('cart');
            $products = json_decode($cart, true);
            foreach ($products as $product) {
                if ($product['promotion'] == 0) {
                    $product['promotion'] = $product['promotion'] + $data2->phan_tram;
                    $product['id_KM'] = $data2->id;
                }
                $id = $product['id'];
                $products[$id] = $product;
            }
            $json = json_encode($products);
            Cookie::queue('cart',$json,300000);
        } else {
//            return back()->with('message','Mã khuyến mãi không hợp lệ');
            return response()->json(['error'=>'Mã khuyến mãi không hợp lệ']);
        }
        return response()->json(['status'=>'Áp dụng khuyến mãi thành công']);
//        return back()->with('message','Áp dụng khuyến mãi thành công');
    }

    public function deletePromo(Request $request){
        if(Cookie::has('cart')){
            $cart = Cookie::get('cart');
            $products = json_decode($cart, true);
            foreach ($products as $product) {
                if ($product['promotion'] != 0) {
                    $product['promotion'] = null;
                    $product['id_KM'] = null;
                }else {
                    return response()->json(['error'=>'Chưa áp dụng khuyến mãi']);
                }
                $id = $product['id'];
                $products[$id] = $product;
            }
            $json = json_encode($products);
            Cookie::queue('cart',$json,300000);
        }
        return response()->json(['status'=>'Xóa mã khuyến mãi thành công']);
    }

    /**
     * @return array<string, string>
     */

    public function getProductsFromCart(): array
    {
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $isHasProductsCart = false;
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);
        foreach ($products as $product) {
            if ($product['email'] == $email) {
                $isHasProductsCart = true;
            }else {
                $products = [];
                $isHasProductsCart = false;
            }
        }
        return [$products, $isHasProductsCart];
    }
    /**
     * @param array $products
     */
    // Tính tổng tiền
    public function subPrice(array $products)
    {
        $sub = 0;
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'];
            $sub += $sumPrice;
        }
        return $sub;
    }

    //tính ship: gia ship tinh luc chua ap dung KM
    public function shipPrice(array $products)
    {
        $total = 0;
        $shipping = 0;
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'];
            $total += $sumPrice;

            if($total < 500000)
            {
                $shipping = 50000;
            } else {
                $shipping = 0;
            }
        }
        return $shipping;
    }

    public function deleteCart($id){
//        $id = $request->product_color_id;
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);
        if (array_key_exists($id, $products)) {
            unset($products[$id]);
        }
        $json = json_encode($products);
        Cookie::queue('cart', $json, 60);
        return response()->json(['status'=>'Xóa sản phẩm thành công']);
//        return back()->with('message','Đã xóa khỏi giỏ!');
    }

    function momoPayment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua ATM MoMo";
        $amount = $request->total_momo;
        $orderId = time() ."";
        $redirectUrl = "http://localhost:8999/shopSon/public/khach_hang/buy-products/billing-details";
        $ipnUrl = "http://localhost:8999/shopSon/public/khach_hang/buy-products/billing-details";
        $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
//            $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
//            dd($result);
            $jsonResult = json_decode($result, true);  // decode json

             return redirect()->to($jsonResult['payUrl']);
    }

}
