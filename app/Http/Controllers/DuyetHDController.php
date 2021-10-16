<?php

namespace App\Http\Controllers;

use DB;

class DuyetHDController extends Controller
{
    function getDanhSach(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoimua','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')->get();

        return view('admin\duyetHD\danhsach',compact('hoadon'));
    }
    function getChiTiet($id){
        $user = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoimua','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id','=',$id)
            ->select('ngaydat','tongtien','hoten','diachi','sodth','email','trangthai')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
//        dd($products);
        return view('admin\duyetHD\chitietHD',compact('user','products'));
    }
}
