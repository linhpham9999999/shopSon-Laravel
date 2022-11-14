<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use function Sodium\add;

class ShipperController extends Controller
{
    public function login(){
        return view('nguoi-giao-hang.login');
    }

    public function check(Request $request){
        //SESSION
        $user =  $request->email ;
        if(Auth::guard('nguoi_giao_hang')->attempt(['email' => $request->email,'password' => $request->password])){
            $request->session()->put('nameSP', $user);
            return redirect()->route('statusShipper');
        }
        $request->session()->flash('thongbao', 'Đăng nhập không thành công');
        return redirect()->route('loginShipper');
    }

    public function logout(Request $request){
        $request->session()->forget('nameSP');
        return redirect()->route('loginShipper');
    }

    public function status(){
        if( Auth::guard('nguoi_giao_hang')->check()) {
            $email = Auth::guard('nguoi_giao_hang')->user()->email;
        }
        $data = DB::table('nguoi_giao_hang')->where('email','=',$email)->first();
//        dd($data);
        return view('nguoi-giao-hang.profile.profile', compact('data'));
    }

    // trang thai =1 : trống đơn, 0 là bận
    public function chuyenBanGiaoHang(Request $request){
        DB::table('nguoi_giao_hang')
            ->where('id','=',$request->id)
            ->update(['trang_thai'=>0]);
        return redirect('nguoi-giao-hang/status')->with('thongbao','Cập nhật trạng thái thành công');
    }

    public function chuyenTrongDonHang(Request $request){
        DB::table('nguoi_giao_hang')
            ->where('id','=',$request->id)
            ->update(['trang_thai'=>1]);
        return redirect('nguoi-giao-hang/status')->with('thongbao','Cập nhật trạng thái thành công');
    }

    public function danhSachDonCanGiao(){
        if( Auth::guard('nguoi_giao_hang')->check()) {
            $email = Auth::guard('nguoi_giao_hang')->user()->email;
        }
        $data = DB::table('nguoi_giao_hang')->select('id')
            ->where('email','=',$email)->first();
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where([['hoa_don.nguoi_giao_hang_id','=',$data->id],['hoa_don.id_TT','=',3]])
            ->orderBy('hoa_don.id','desc')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.nguoi_giao_hang_id','=',$data->id],['hoa_don.id_TT','=',3]])
            ->get()->toArray();
        return view('nguoi-giao-hang\hoadon\don-can-giao',compact('hoadon','isOrder'));
    }

    function chiTietDonCanGiao($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('hinh_thuc_thanh_toan','hoa_don.id_HTTT','=','hinh_thuc_thanh_toan.id')
            ->where('hoa_don.id','=',$id)
            ->select('ghichu','ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id)->first();
        return view('nguoi-giao-hang\hoadon\chitietHD',compact('user','products','shipper','order_code'));
    }

    function xacNhan(Request $request){
        $idHD = $request->idHD;
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 2
                ]
            );
        // GỬI MAIL ĐƠN HANG ĐÃ ĐƯỢC XÁC NHẬN VÀ ĐANG GIAO
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $data_order = DB::table('hoa_don')->where('id', '=', $idHD)->first();
        $title_mail = "ĐƠN HÀNG #"."$data_order->Ma_HD"." ĐÃ ĐƯỢC XÁC NHẬN ngày".' '.$now;
        // lay hinh thuc thanh toan
        $payment_method = DB::table('hinh_thuc_thanh_toan')->select('ten_HTTT')
            ->where('id','=',$data_order->id_HTTT)->first();
        // lay thong tin khach hàng
        $customer_data = DB::table('nguoi_dung')
            ->where('email','=',$data_order->email_nguoidung)->first();
        $data['email'][] = $customer_data->email;
        $shipping_array = array(
            'customer_name' => $customer_data->hoten,
            'customer_email' => $data_order->email_nguoidung,
            'customer_phone' => $data_order->sodth_giao_hang,
            'customer_address' => $data_order->dia_chi_giao_hang
        );
        // Lay ma hoa don
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$idHD)->first();
        // lay hinh thuc thanh toan
        $payment_method = DB::table('hinh_thuc_thanh_toan')->select('ten_HTTT')->where('id','=',$data_order->id_HTTT)->first();
        // lay ma giam gia
        $promotion_id = $data_order->id_KM;
        if($promotion_id != NULL){
            $promotion = DB::table('khuyen_mai')->where('id','=',$promotion_id)->first();
            $promotion_code = $promotion->Ma_KM;
            $promotion_percent = $promotion->phan_tram;
        }
        else{
            $promotion_code = 'Không có mã giảm giá';
            $promotion_percent = 0;
        }
        $order_detail = DB::table('chi_tiet_hoa_don')->select('*')
            ->where('id_HD','=',$idHD)->get()->toArray();
        foreach ($order_detail as $value){
            $product_color_name = DB::table('mau_san_pham')->select('mau','id_SP')
                ->where('id','=',$value->id_MSP)->first();
            $product_name = DB::table('san_pham')->select('ten_SP')
                ->where('id','=',$product_color_name->id_SP)->first();
            $cart_array[] = array(
                'product_name' => $product_name->ten_SP,
                'product_color' => $product_color_name->mau,
                'product_quantity' => $value->soluong,
                'product_price' => $value->don_gia * (1 - $promotion_percent*0.01),
                'product_price_total' => $value->don_gia  * $value->soluong * (1 - $promotion_percent*0.01)
            );
        }
        $total = $data_order->tongtien;
        Mail::send('khach_hang.mail.mail-accept',
                   ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array,'promotion_code'=>$promotion_code,
                       'order_code'=>$order_code,'total'=>$total,'payment_method'=>$payment_method],
            function ($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            }
        );
        return redirect()->route('don-hang-dang-giao')->with('thongbao', 'Nhận đơn thành công');
    }

    function tuChoi(Request $request){
        $idHD = $request->idHD;
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 6,
                    'nguoi_giao_hang_id' => NULL
                ]
            );
        return redirect()->route('don-hang-da-huy')->with('thongbao', 'Đã từ chối nhận đơn');
    }

    public function danhSachDonDangGiao(){
        if( Auth::guard('nguoi_giao_hang')->check()) {
            $email = Auth::guard('nguoi_giao_hang')->user()->email;
        }
        $data = DB::table('nguoi_giao_hang')->select('id')
            ->where('email','=',$email)->first();
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where([['hoa_don.nguoi_giao_hang_id','=',$data->id],['hoa_don.id_TT','=',2]])
            ->orderBy('hoa_don.id','desc')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where([['hoa_don.nguoi_giao_hang_id','=',$data->id],['hoa_don.id_TT','=',2]])
            ->get()->toArray();
        return view('nguoi-giao-hang\hoadon\don-dang-giao',compact('hoadon','isOrder'));
    }

    public function chiTietDonDangGiao($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('hinh_thuc_thanh_toan','hoa_don.id_HTTT','=','hinh_thuc_thanh_toan.id')
            ->where('hoa_don.id','=',$id)
            ->select('ghichu','ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id)->first();
        return view('nguoi-giao-hang\hoadon\chitietHD-dang-giao',compact('user','products','shipper','order_code'));
    }

    public function daGiaoThanhCong(Request $request){
        $idHD = $request->idHD;
        $this->validate(
            $request,
            [
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'hinh_anh.required'=> 'Bạn chưa chọn Hình ảnh',
                'hinh_anh.mimes'   => 'File chọn phải là file hình ảnh (*.jpg, *png)'
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/hinh-anh-giao-hang', $name);
        }
        DB::table('hoa_don')->where('id','=',$idHD)
                                ->update([
                                    'hinh_anh_giao_hang'=>$name,
                                    'id_TT'=>5,
                                    'ngaygiao'=>Carbon :: now ()
                                ]);
        // GỬI MAIL ĐƠN HANG ĐÃ GIAO THÀNH CÔNG
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $data_order = DB::table('hoa_don')->where('id', '=', $idHD)->first();
        $order_id = $data_order->id;
        $title_mail = "ĐƠN HÀNG #"."$data_order->Ma_HD"." ĐÃ GIAO THÀNH CÔNG ngày".' '.$now;
        // lay hinh thuc thanh toan
        $payment_method = DB::table('hinh_thuc_thanh_toan')->select('ten_HTTT')
            ->where('id','=',$data_order->id_HTTT)->first();
        // lay thong tin khach hàng
        $customer_data = DB::table('nguoi_dung')
            ->where('email','=',$data_order->email_nguoidung)->first();
        $data['email'][] = $customer_data->email;
        $shipping_array = array(
            'customer_name' => $customer_data->hoten,
            'customer_email' => $data_order->email_nguoidung,
            'customer_phone' => $data_order->sodth_giao_hang,
            'customer_address' => $data_order->dia_chi_giao_hang
        );
        // Lay ma hoa don
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$idHD)->first();
        // lay hinh thuc thanh toan
        $payment_method = DB::table('hinh_thuc_thanh_toan')->select('ten_HTTT')->where('id','=',$data_order->id_HTTT)->first();
        // lay ma giam gia
        $promotion_id = $data_order->id_KM;
        if($promotion_id != NULL){
            $promotion = DB::table('khuyen_mai')->where('id','=',$promotion_id)->first();
            $promotion_code = $promotion->Ma_KM;
            $promotion_percent = $promotion->phan_tram;
        }
        else{
            $promotion_code = 'Không có mã giảm giá';
            $promotion_percent = 0;
        }
        $order_detail = DB::table('chi_tiet_hoa_don')->select('*')
            ->where('id_HD','=',$idHD)->get()->toArray();
        foreach ($order_detail as $value){
            $product_color_name = DB::table('mau_san_pham')->select('mau','id_SP')
                ->where('id','=',$value->id_MSP)->first();
            $product_name = DB::table('san_pham')->select('ten_SP')
                ->where('id','=',$product_color_name->id_SP)->first();
            $cart_array[] = array(
                'product_name' => $product_name->ten_SP,
                'product_color' => $product_color_name->mau,
                'product_quantity' => $value->soluong,
                'product_price' => $value->don_gia * (1 - $promotion_percent*0.01),
                'product_price_total' => $value->don_gia  * $value->soluong * (1 - $promotion_percent*0.01)
            );
        }
        $total = $data_order->tongtien;
        Mail::send('khach_hang.mail.mail-success-delivery',
                   ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array,'promotion_code'=>$promotion_code,
                       'order_code'=>$order_code,'total'=>$total,'payment_method'=>$payment_method,'order_id'=>$order_id],
            function ($message) use ($title_mail, $data){
                $message->to($data['email'])->subject($title_mail);
                $message->from($data['email'],$title_mail);
            }
        );
        return redirect()->route('don-hang-da-giao')->with('thongbao', 'Đơn hàng giao thành công');
    }
    public function danhSachDonDaGiao(){
        if( Auth::guard('nguoi_giao_hang')->check()) {
            $email = Auth::guard('nguoi_giao_hang')->user()->email;
        }
        $data = DB::table('nguoi_giao_hang')->select('id')
            ->where('email','=',$email)->first();
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.nguoi_giao_hang_id','=',$data->id)
            ->whereIn('hoa_don.id_TT', [1, 5])
            ->orderBy('hoa_don.id','desc')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.nguoi_giao_hang_id','=',$data->id)
            ->whereIn('hoa_don.id_TT', [1, 5])
            ->get()->toArray();
        return view('nguoi-giao-hang\hoadon\don-da-giao',compact('hoadon','isOrder'));
    }

    public function chiTietDonDaGiao($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('hinh_thuc_thanh_toan','hoa_don.id_HTTT','=','hinh_thuc_thanh_toan.id')
            ->where('hoa_don.id','=',$id)
            ->select('ghichu','ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai', 'hinh_anh_giao_hang',
                     'hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id)->first();
        return view('nguoi-giao-hang\hoadon\chitietHD-da-giao',compact('user','products','shipper','order_code'));
    }

    public function danhSachTuChoi(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',6)
            ->orderBy('hoa_don.id','desc')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',6)
            ->get()->toArray();
        return view('nguoi-giao-hang\hoadon\don-da-huy',compact('hoadon','isOrder'));
    }

    public function chiTietDonTuChoi($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('hinh_thuc_thanh_toan','hoa_don.id_HTTT','=','hinh_thuc_thanh_toan.id')
            ->where('hoa_don.id','=',$id)
            ->select('ghichu','ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai',
                     'hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        $order_code = DB::table('hoa_don')->select('Ma_HD')->where('id','=',$id)->first();
        return view('nguoi-giao-hang\hoadon\chitietHD-tu-choi',compact('user','products','shipper','order_code'));
    }

}
