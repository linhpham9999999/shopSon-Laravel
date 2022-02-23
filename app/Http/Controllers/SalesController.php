<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use DB;

class SalesController extends Controller
{
    public function getSales(){
        $sum = DB::table('hoa_don')->sum('tongtien');
        $sanphamdaban = DB::table('hoa_don')->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->select('Ma_HD','email_nguoimua','tongtien','hinhanh','mau')
            ->get();
        return view('amdin.statistics.sales',compact('sum','sanphamdaban'));
    }
}
