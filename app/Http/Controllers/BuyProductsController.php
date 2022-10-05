<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class BuyProductsController extends Controller
{
    public function proceedCheckout()
    {
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);
        $email = '';
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $users = DB::table('nguoi_dung')
            ->select('diachi', 'hoten', 'email', 'sodth','id')
            ->where('email','=',$email)->first();
         // Tính tổng tiền, phí ship
        $total = 0;
        $total_test = 0;
        $ship = 0;
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'];
            $total += $sumPrice * (1 - $product['promotion']*0.01);
        }
        // Phí ship tính theo lúc chưa apply Promotion
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'];
            $total_test += $sumPrice;
            if($total_test < 500000)
            {
                $ship = 50000;
            } else {
                $ship = 0;
            }
        }

//        dd($products);
        $payments = DB::table('hinh_thuc_thanh_toan')->select('*')->get();
        $delivery = DB::table('hinh_thuc_giao_hang')->select('*')->get();
        $diachi = DB::table('dia_chi_giao_hang')->select('*')->where('emailnguoidung','=',$email)->get();
        return view('khach_hang.cart.proceed-to-checkout',
                    compact('users','products','ship','total','payments','delivery','diachi'));
    }

    public function orderSuccess(Request $request){
        $email = '' ;
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);

        //Thêm dữ liệu vào bảng Hóa đơn
        DB::table('hoa_don')
            ->insert(['Ma_HD'               => Str::random(6),
                     'id_TT'                => $request->trangthai,
                     'id_HTTT'              => $request->payment,
                     'id_HTGH'              => $request->delivery,
                     'email_nguoidung'      => $email,
                     'dia_chi_giao_hang'    => $request->diachi,
                     'ngaydat'              => Carbon :: now (),
                     'ngaygiao'             => Carbon :: now ()->addDay(4),
                     'tongtien'             => $request->total,
                     'ghichu'               => $request->note,
                     'sodth_giao_hang'      => $request->sodth
                     ]);
        $id_HD = DB::getPdo()->lastInsertId();

        //Thêm dữ liệu vào bảng Chi tiết hóa đơn
        foreach ( $products as $product)
        {
            $soluongton = DB::table('mau_san_pham')->select('soluongton')->where('id','=', $product['id'])->first();
            $sluong = $soluongton->soluongton;

            DB::table('mau_san_pham')->select('soluongton')
                ->where('id','=', $product['id'])
                ->update(['soluongton' => $sluong - $product['quantity']]);

            DB::table('chi_tiet_hoa_don')
                ->insert(['id_HD'       => $id_HD,
                        'id_MSP'        => $product['id'],
                        'soluong'       => $product['quantity'],
                        'don_gia'       => $product['unit_price'],
                        'thanh_tien'    => $product['unit_price']*$product['quantity'],
                        'trang_thai'    => 1
                         ]);
            DB::table('hoa_don')->where('id','=',$id_HD)
                ->update(['id_KM'=>$product['id_KM']]);
//            DB::table('mau_san_pham')
//                ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
//                ->select('san_pham.soluongton')->where('mau_san_pham.id','=',$product['id'])
//                ->update(['san_pham.soluongton' =>  - 1]);
        }

        // SEND MAIL XAC NHAN DA DAT HANG
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn hàng xác nhận ngày".' '.$now;

        $customer = DB::table('nguoi_dung')->where('email','=',$email)->first();
        $data['email'][] = $customer->email;

        $promotion_id='';
        $total = 0;
        if(Cookie::has('cart')){
            $cart_mail = Cookie::get('cart');
            $products_mail = json_decode($cart_mail, true);
            foreach ($products_mail as $value){
                $cart_array[] = array(
                    'product_name' => $value['name'],
                    'product_color' => $value['color'],
                    'product_quantity' => $value['quantity'],
                    'product_price' => $value['unit_price'] * (1 - $value['promotion']*0.01),
                    'product_price_total' => $value['unit_price']  * $value['quantity'] * (1 - $value['promotion']*0.01)
                );
                $promotion_id = $value['id_KM'];
                $sumPrice = $value['unit_price'] * $value['quantity'];
                $total += $sumPrice * (1 - $value['promotion']*0.01);
            }
        }
        $data_order = DB::table('hoa_don')->select('*')->where('id','=',$id_HD)->first();
        // lay thong tin khach hang
        $shipping_array = array(
            'customer_name' => $customer->hoten,
            'customer_email' => $customer->email,
            'customer_phone' => $data_order->sodth_giao_hang,
            'customer_address' => $data_order->dia_chi_giao_hang
        );
        // lay hinh thuc thanh toan
        $payment_method = DB::table('hinh_thuc_thanh_toan')->select('ten_HTTT')->where('id','=',$data_order->id_HTTT)->first();
        // lay ma giam gia
        if($promotion_id != NULL){
            $promotion = DB::table('khuyen_mai')->where('id','=',$promotion_id)->first();
            $promotion_code = $promotion->Ma_KM;
        }
        else{
            $promotion_code = 'Không có mã giảm giá';
        }
        // Lay ma hoa don
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id_HD)->first();

        Mail::send('khach_hang.mail.mail-order',
            ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array,'promotion_code'=>$promotion_code,
                'order_code'=>$order_code,'total'=>$total,'payment_method'=>$payment_method],
            function ($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            }
        );
        // Xóa sản phẩm trong giỏ sau khi mua
        session_unset();
        Cookie::queue(
            Cookie::forget('cart')
        );

        // Chuyển đến xem trạng thái mua hàng
        $hoadon = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->orderBy('hoa_don.id','desc')
            ->where('hoa_don.email_nguoidung','=',$email)
            ->whereIn('hoa_don.id_TT', [1, 2, 3, 5])
            ->get()->toArray();


        return view('khach_hang.cart.get-status-order', compact('hoadon'));
    }
    // Trạng thái đơn hàng đã đặt
    public function orderStatus(){
        $email = '' ;
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $hoadon = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                       ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->orderBy('hoa_don.id','desc')
            ->where('hoa_don.email_nguoidung','=',$email)
            ->whereIn('hoa_don.id_TT', [1, 2, 3, 5])
            ->get()->toArray();
        return view('khach_hang.cart.get-status-order', compact('hoadon'));
    }
    public function billDetailView(Request $request,$id){
        $cthd = DB::table('hoa_don')
            ->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->select('hoa_don.id as idHD','mau_san_pham.hinhanh','mau_san_pham.mau','mau_san_pham.thongTinMau',
                     'chi_tiet_hoa_don.don_gia','chi_tiet_hoa_don.soluong',
                     'hoa_don.tongtien','trang_thai.trangthai','trang_thai.id as idTT',
                     'ngaygiao','ngaydat')
            ->where('hoa_don.id','=',$id)->get();
//        dd($cthd);
        return view('khach_hang.cart.bill-details', compact('cthd'));
    }

    public function increaseQuantity($id){
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);
        foreach ( $products as $product){
            if($product['id'] == $id){
                $product['quantity'] += 1;
            }
        }
        $json = json_encode($products);
        Cookie::queue('cart', $json, 60);
        return back()->with('message','update thành công!');
    }

    public function decreaseQuantity($id){
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);
        foreach ( $products as $product){
            if($product['id'] == $id){
                $product['quantity'] -= 1;
            }
        }
        $json = json_encode($products);
        Cookie::queue('cart', $json, 60);
        return back()->with('message','update thành công!');
    }
}
