<?php

namespace App\Http\Controllers;

use App\Models\hoa_don;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function getSales(){
        $range = Carbon::now()->subDays(365);
        $loinhuan = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->join('hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->where('hoa_don.ngaydat','>=',$range)
            ->whereIn('hoa_don.id_TT',[1,5])
            ->select(DB::raw('MONTH(ngaydat) month'), DB::raw('SUM(soluong*gia_nhap_vao) von'),
                     DB::raw('SUM(thanh_tien) doanhthu_thang'),
                     DB::raw('SUM(thanh_tien - soluong*gia_nhap_vao) tienloi_thang'))
            ->groupBy(DB::raw('MONTH(ngaydat)'))->get()->toArray();
        $data= DB::table('hoa_don')
            ->where('hoa_don.ngaydat','>=',$range)
            ->whereIn('hoa_don.id_TT',[1,5])
            ->select('id','hoa_don.ngaydat')->get()->groupBy(function($data){
                return Carbon::parse($data->ngaydat)->format('M');
            });
        $months = [];
        $monthCount = [];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }
        $san_pham = DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
            ->join('hoa_don','chi_tiet_hoa_don.id_HD','=','hoa_don.id')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->select('mau_san_pham.mau','san_pham.ten_SP',DB::raw('sum(soluong) as soluongcay'))
            ->where('hoa_don.ngaydat','>=',$range)
            ->whereIn('hoa_don.id_TT',[1,5])
            ->groupBy('mau_san_pham.mau','san_pham.ten_SP')
            ->orderBy('soluongcay','desc')->take(3)
            ->get()->toArray();
        return view('admin.statistics.sales',
                    compact('data','months','monthCount','loinhuan','san_pham'));
    }
}
