<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DuyetHDController extends Controller
{
    function getDanhSach(){
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoimua','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')->paginate(5);
        return view('admin\duyetHD\danhsach',compact('hoadon'));
    }
    function postDanhSach(Request $request){
        if(Auth::check()){
            $email_nguoiban = Auth::user()->email;
        }
        $idHD = $request->idHD;
//        dd($idHD);
        DB::table('hoa_don')->select('*')->where('id', '=', $idHD)
            ->update(
                [
                    'id_TT' => 2,
                    'email_nguoiban' => $email_nguoiban,
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
            ->join('nguoi_dung','hoa_don.email_nguoimua','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->where('hoa_don.id','=',$id)
            ->select('ngaydat','tongtien','hoten','dia_chi_giao_hang','sodth','email','trangthai','hoa_don.id_TT','hoa_don.id')->get();
        $products = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->where('chi_tiet_hoa_don.id_HD','=',$id)
            ->select('hinhanh','Ma_MSP','soluong','thanh_tien')->get();
//        dd($products);
        return view('admin\duyetHD\chitietHD',compact('user','products'));
    }
}
