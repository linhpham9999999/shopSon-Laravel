<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{

    /*public function execPostRequest($url, $data)
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
    }*/

    /**
     * @return View
     **/
    public function showView(): View
    {
        // lấy thông tin product
        $products = $this->getProductsFromCart();
        $subPrice = $this->subPrice($products);
        $shipping = $this->shipPrice($products);
        $current = Carbon::now()->toDateString();
        // lấy danh sách các khuyến mãi có giá yêu cầu <= tổng tiền hóa đơn, ngày hợp lệ
        $promotion = DB::table('khuyen_mai')->select('*')
            ->where([['ngay_bat_dau','<=',$current],['ngay_ket_thuc','>=',$current],['gia_yeu_cau','<=',$subPrice]])
            ->get()->toArray();
        return view('khach_hang.cart.viewCart',['products'     => $products,
                                                  'subPrice'      => $subPrice,
                                                  'shipping'      => $shipping,
                                                  'promotion'=>$promotion
                                              ]
        );
    }

    public function applyPromo(Request $request){
        $current = Carbon::now()->toDateString();
        if($request->maKM == null){
//            return back()->with('error','Chưa nhập mã khuyến mãi');
            return response()->json(['error'=>'Chưa nhập mã khuyến mãi']);
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

    public function getProductsFromCart()
    {
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $productnew = [];
        if(Cookie::has('cart')) {
            $cart = Cookie::get('cart');
            $products = json_decode($cart, true);
            foreach ($products as $product) {
                // lấy thông tin màu sản phẩm trong cart , kiểm tra còn đúng soluong thì hiện thị
                $mausp = DB::table('mau_san_pham')->select('id','soluongton')
                    ->where('id','=', $product['id'])->get()->toArray();
                foreach ($mausp as $msp){
                    if( $msp->id == $product['id'] && $msp->soluongton < $product['quantity']){
                        unset($products[$msp->id]);
                    }
                }
//                dd($email, $product['email']);
                // kiểm tra email người thêm giỏ hàng
                if ($email === $product['email']) {
                    $productnew[] = array(
                        'id' => $product['id'],
                        'image'=>$product['image'],
                        'name' =>$product['name'],
                        'color' =>$product['color'],
                        'promotion' =>$product['promotion'],
                        'unit_price' =>$product['unit_price'],
                        'email'=>$product['email'],
                        'id_KM'=>$product['id_KM'],
                        'quantity'=>$product['quantity']
                    );
                }
            }
        }
//        dd($productnew);
        return $productnew;
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

    /*function momoPayment(Request $request)
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

        return redirect()->to($jsonResult['payUrl'])->with('alert','Thanh toán MOMO thành công');
    }*/
    public function VNPayment(Request $request){
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8999/shopSon/public/khach_hang/buy-products/billing-details";
        $vnp_TmnCode = "OG41S5YF";//Mã website tại VNPAY
        $vnp_HashSecret = "HQGPBAYFYWLEEHMPYAEDVXXNZDTVHZWT"; //Chuỗi bí mật

        $vnp_TxnRef = Str::random(6);
        $vnp_OrderInfo = 'Thanh toán đơn hàng test';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->total_momo * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];


        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
//            header('Location: ' . $vnp_Url);
            return redirect()->to($vnp_Url)->with('alert','Thanh toán MOMO thành công');
        } else {
            echo json_encode($returnData);
        }
    }
}
