<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PHPUnit\Framework\Constraint\IsEmpty;

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
        [$product, $isHasProductsCart]  = $this->getProductsFromCart();
        $subPrice                       = $this->subPrice($product);
        $shipping                       = $this->shipPrice($product);
//        dd($isHasProductsCart);
        return view('khach_hang/cart/checkout',['products'     => $product,
                                                    'isHasProduct'  => $isHasProductsCart,
                                                    'subPrice'      => $subPrice,
                                                    'shipping'      => $shipping,
                                                    ]
        );
    }

    public function applyPromo(Request $request){
        $current = Carbon::now()->toDateString();
        $data = DB::table('khuyen_mai')->select('*')
            ->where([['ngay_bat_dau','<=',$current],['ngay_ket_thuc','>=',$current],['Ma_KM','=',$request->maKM]])->get()->toArray();

        $data2 = DB::table('khuyen_mai')->select('*')
            ->where([['ngay_bat_dau','<=',$current],['ngay_ket_thuc','>=',$current],['Ma_KM','=',$request->maKM]])->first();

        if(!empty($data2)){
            if(Cookie::has('cart')){
                $cart = Cookie::get('cart');
                $products = json_decode($cart, true);
                $subPrice2 = $this->subPrice($products);

                if($subPrice2 >= $data2->gia_yeu_cau){
                    $subPrice = $this->subPrice($products) * (1 - $data2->phan_tram * 0.01);
                }else{
                    $subPrice = $subPrice2;
                }

                foreach ($products as $product){
                    $product['promotion'] = $product['promotion'] + $data2->phan_tram;
//                    dd($data2->gia_yeu_cau, $this->subPrice($products), $subPrice >= $data2->gia_yeu_cau, $product['promotion']);
                    $id = $product['id'];
                    $products[$id] = $product;
                }

            }
            $json = json_encode($products);
            Cookie::queue('cart',$json,300000);
            $shipping = $this->shipPrice($products);
        } else {
            [$products, $isHasProductsCart]  = $this->getProductsFromCart();
            $shipping                       = $this->shipPrice($products);
            $subPrice = $this->subPrice($products);
        }
//        dd($subPrice2, $subPrice, $products);
        $isHasProductsCart = true;
        return view('khach_hang/cart/checkout',['products'   => $products,
                      'isHasProduct'  => $isHasProductsCart,
                      'subPrice'      => $subPrice,
                      'shipping'      => $shipping,
                      'data'          => $data
                      ]
        );
    }

    /**
     * @return array<string, string>
     */

    public function getProductsFromCart(): array
    {
        // khởi tạo biến
        $isHasProductsCart = false;
        // kiểm có giỏ hàng chưa
        if(Cookie::has('cart')){
            //Lấy giỏ hàng
            $cart = Cookie::get('cart');
            // decode giỏ hàng string -> array để lấy info
            $products = json_decode($cart, true);
            $isHasProductsCart = true;
        }
        else {
            $products = [];
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

    //tính ship
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
//        dd($quantity);
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);

//        foreach ($products as $value){
//            $quantity = $value['quantity'];
//        }

//        $soluongton = DB::table('mau_san_pham')->select('soluongton')->where('id','=', $id)->first();
//        $quantitycurent = $soluongton->soluongton;

//        DB::table('mau_san_pham')->select('soluongton')
//            ->where('id','=',$id)
//            ->update(['soluongton' => $quantitycurent + $quantity]);

        if (array_key_exists($id, $products)) {
            unset($products[$id]);
        }

        $json = json_encode($products);
        Cookie::queue('cart', $json, 60);
        return back()->with('message','Đã xóa khỏi giỏ!');
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
