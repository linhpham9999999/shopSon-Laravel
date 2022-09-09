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
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')->paginate(5);
        return view('admin\duyetHD\danhsach',compact('hoadon'));
    }
    function postDanhSach(Request $request){
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
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
            ->where('hoa_don.id_TT','=',3)->paginate(5);

        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',3)->get()->toArray();
//        dd($isOrder);
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    function getDSDaDuyet(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',2)->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',2)->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    function getDSDaMua(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',1)->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->where('hoa_don.id_TT','=',1)->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
}
