<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class SearchOrderController extends Controller
{
    // tìm kiếm theo mã HĐ, tên KH mua
    public function search(Request $request){
        $order_code = $request->order_code_input;
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->orderBy('hoa_don.id','desc')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->orWhere('nguoi_dung.hoten','like','%'.$order_code.'%')
            ->paginate(5);
        $isOrder = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->where('Ma_HD','like','%'.$order_code.'%')
            ->orWhere('nguoi_dung.hoten','like','%'.$order_code.'%')
            ->get()->toArray();
        return view('admin\duyetHD\danhsach',compact('hoadon','isOrder'));
    }
    // tìm kiếm theo ngày
    public function searchDate(Request $request){
        $order_first_date = Carbon::createFromFormat(config('app.date_format'), $request->first_date)->format('Y-m-d');
        $order_end_date = Carbon::createFromFormat(config('app.date_format'), $request->end_date)->format('Y-m-d');
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoidung','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('Ma_HD','ngaydat','tongtien','hoten','trangthai','hoa_don.id','hoa_don.id_TT')
            ->orderBy('hoa_don.id','desc')
            ->whereBetween('hoa_don.ngaydat',[$order_first_date, $order_end_date])
            ->get();
        $isOrder = DB::table('hoa_don')
            ->whereBetween('hoa_don.ngaydat',[$order_first_date, $order_end_date])
            ->get()->toArray();
        return view('admin\duyetHD\search-order',compact('hoadon','isOrder'));
    }
}
