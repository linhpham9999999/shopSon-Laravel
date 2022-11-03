<?php

namespace App\Http\Controllers;

use App\Models\hoa_don;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function getSales(){
        $range = Carbon::now()->subDays(365);
//        $loi_nhuan = DB::table('hoa_don')
////            ->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
////            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
////            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
//            ->where([['hoa_don.id_TT','=',1],['hoa_don.ngaydat','>=',$range]])
//            ->select('ngaydat',DB::raw('count(ngaydat) as sodonhang'),DB::raw('sum(tongtien) as doanhthu'))
//            ->groupBy('ngaydat')
//            ->get()->toArray();
//        $data2 = DB::table('hoa_don')
//            ->select('Ma_HD',DB::raw('count(Ma_HD) as sodon'))
//            ->groupBy('Ma_HD')->get()->toArray();
//        dd($data2);die();


        $data= DB::table('hoa_don')
            ->where([['hoa_don.id_TT','=',1],['hoa_don.ngaydat','>=',$range]])
            ->orwhere([['hoa_don.id_TT','=',5],['hoa_don.ngaydat','>=',$range]])
            ->select('id','hoa_don.ngaydat')->get()->groupBy(function($data){
                return Carbon::parse($data->ngaydat)->format('M');
            });
        $months = [];
        $monthCount = [];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }



        return view('admin.statistics.sales',compact('data','months','monthCount'));
    }
}
