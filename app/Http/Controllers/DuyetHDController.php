<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuyetHDController extends Controller
{
    function getDanhSach(){
        $hoadon = DB::table('hoa_don')
                ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
                ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
                ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
                ->orderBy('hoa_don.id','desc')
                ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    function postDanhSach(Request $request){
        if( Auth::guard('web')->check()) {
            $email = Auth::guard('web')->user()->email;
        }
        $idHD = $request->idHD;
//        dd($idHD);
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 2,
                    'email_nguoiban' => $email,
//                    'ngaygiao'        => Carbon::now()->addDay(3)
                ]
            );
//        $hoadon = DB::table('hoa_don')
//            ->join('nguoi_dung','hoa_don.email_nguoimua','=','nguoi_dung.email')
//            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
//            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')->paginate(5);
        return back()->with('thongbao', '');
    }
    function getChiTiet($id){
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
//        dd($products);
        return view('admin\duyetHD\chitietHD',compact('user','products'));
    }
    function confirm(Request $request){
//        dd($request->idHD);
        DB::table('hoa_don')->select('*')->where('id', '=',$request->idHD)
            ->update(
                [
                    'id_TT' => 1,
                ]
            );
        return back()->with('thongbao', '');
    }

    function getDSChuaDuyet(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',3)->orderBy('hoa_don.id','desc')
            ->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',3)->get()->toArray();
//        dd($isOrder);
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    function getDSDaDuyet(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',2)->orderBy('hoa_don.id','desc')
            ->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',2)->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    function getDSDaMua(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',1)->orderBy('hoa_don.id','desc')->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',1)->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }

    // NHÂN VIÊN BÁN HÀNG
    function getDanhSachBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->orderBy('hoa_don.id','desc')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    function postDanhSachBanHang(Request $request){
        if( Auth::guard('web')->check()) {
            $email = Auth::guard('web')->user()->email;
        }
        $idHD = $request->idHD;

        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 2,
                    'email_nguoiban' => $email,
                ]
            );

        return back()->with('thongbao', '');
    }
    function getChiTietBanHang($id){
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
//        dd($products);
        return view('admin\duyetHD-ban-hang\chitietHD',compact('user','products'));
    }

    function getDSChuaDuyetBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',3)->orderBy('hoa_don.id','desc')
            ->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',3)->get()->toArray();
//        dd($isOrder);
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    function getDSDaDuyetBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',2)->orderBy('hoa_don.id','desc')
            ->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',2)->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
    function getDSDaMuaBanHang(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',1)->orderBy('hoa_don.id','desc')->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id_TT','=',1)->get()->toArray();
        return view('admin\duyetHD-ban-hang\danhsach',compact('hoadon','isOrder'));
    }
}
