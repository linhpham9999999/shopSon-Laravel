<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use DB;

class SalesController extends Controller
{
    public function getSales(){
        $sum2 = DB::table('hoa_don')->sum('tongtien');
        $sum = number_format($sum2);
        $sanphamdaban = DB::table('hoa_don')
            ->select('Ma_HD','email_nguoimua','tongtien','hoa_don.id','ngaygiao','sodth_giao_hang')
            ->get();
        return view('admin.statistics.sales',compact('sum','sanphamdaban'));
    }
}
