<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            ->select('ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        return view('nguoi-giao-hang\hoadon\chitietHD',compact('user','products','shipper'));
    }

    function xacNhan(Request $request){
        $idHD = $request->idHD;
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 2
                ]
            );
        return back()->with('thongbao', 'Nhận đơn thành công');
    }

    function tuChoi(Request $request){
        $idHD = $request->idHD;
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 3,
                    'nguoi_giao_hang_id' => NULL
                ]
            );
        return back()->with('thongbao', 'Đã từ chối nhận đơn');
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
            ->select('ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        return view('nguoi-giao-hang\hoadon\chitietHD-dang-giao',compact('user','products','shipper'));
    }

    public function daGiaoThanhCong(Request $request){
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
        DB::table('hoa_don')->where('id','=',$request->idHD)
                                ->update([
                                    'hinh_anh_giao_hang'=>$name,
                                    'id_TT'=>5
                                ]);
        return back()->with('thongbao', 'Đơn hàng giao thành công');
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
            ->select('ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai', 'hinh_anh_giao_hang',
                     'hoa_don.id_TT','hoa_don.id','hinh_thuc_thanh_toan.ten_HTTT')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
        $shipper = DB::table('nguoi_giao_hang')->select('hoten','id')->get();
        return view('nguoi-giao-hang\hoadon\chitietHD-da-giao',compact('user','products','shipper'));
    }

}
