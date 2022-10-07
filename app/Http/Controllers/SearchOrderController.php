<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchOrderController extends Controller
{
    public function search(Request $request){
        $order_code = $request->order_code_input;
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->orderBy('hoa_don.id','desc')
            ->where('Ma_HD','like','%'.$order_code.'%')->get();
        $isOrder = DB::table('hoa_don')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
}
