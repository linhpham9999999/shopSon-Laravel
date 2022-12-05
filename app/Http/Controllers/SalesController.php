<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function getSales(){
        $range = Carbon::now()->subDays(365);

        // tien von
        $tienvon = DB::table('hoa_don')
            ->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->where('hoa_don.ngaydat','>=',$range)
            ->whereIn('hoa_don.id_TT',[1,5])
            ->select(DB::raw('MONTH(hoa_don.ngaydat) month'), DB::raw('SUM(chi_tiet_hoa_don.soluong*gia_nhap_vao) von'))
                ->groupBy(DB::raw('MONTH(ngaydat)'))->get()->toArray();
        // doanh thu
        $doanhthu = DB::table('hoa_don')
            ->where('ngaydat','>=',$range)
            ->whereIn('id_TT',[1,5])
            ->select(DB::raw('MONTH(ngaydat) month'), DB::raw('SUM(tongtien) doanhthu'))
            ->groupBy(DB::raw('MONTH(ngaydat)'))->get()->toArray();
        foreach ($tienvon as $tv){
            foreach ($doanhthu as $dt){
                if($tv->month == $dt->month){
                    $loinhuan[] = array(
                        'month'=> $dt->month,
                        'von'=>$tv->von,
                        'doanhthu'=>$dt->doanhthu,
                        'tienloi'=>$dt->doanhthu-$tv->von);
                }
            }
        }
//        dd($loinhuan);
//        $loinhuan = DB::table('hoa_don')
//            ->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
//            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
//            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
//            ->where('hoa_don.ngaydat','>=',$range)
//            ->whereIn('hoa_don.id_TT',[1,5])
//            ->select(DB::raw('MONTH(hoa_don.ngaydat) month'), DB::raw('SUM(chi_tiet_hoa_don.soluong*gia_nhap_vao) von'),
//                     DB::raw('SUM(hoa_don.tongtien) doanhthu_thang'),
//                     DB::raw('SUM(hoa_don.tongtien - chi_tiet_hoa_don.soluong*gia_nhap_vao) tienloi_thang'))
//            ->groupBy(DB::raw('MONTH(ngaydat)'))->get()->toArray();

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
            ->orderBy('soluongcay','desc')->take(4)
            ->get()->toArray();
        // soluongton kho cua moi san pham
        $soluongton_sp = DB::table('mau_san_pham')->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->select('san_pham.ten_SP',DB::raw('sum(mau_san_pham.soluongton) as soluongtonkho'))
            ->where([['san_pham.trang_thai','=',1],['mau_san_pham.trang_thai','=',1]])
            ->groupBy('san_pham.ten_SP')->get()->toArray();
        // so luong da ban cua moi sp
        $soluongdaban_sp =  DB::table('chi_tiet_hoa_don')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->where('chi_tiet_hoa_don.trang_thai','=',1)
            ->select('san_pham.ten_SP',DB::raw('sum(chi_tiet_hoa_don.soluong) as soluongdaban'))
            ->groupBy('san_pham.ten_SP')->get()->toArray();
        return view('admin.statistics.sales',
                    compact('data','months','monthCount','loinhuan',
                            'san_pham','tienvon','doanhthu','soluongton_sp','soluongdaban_sp'));
    }

    public function postMonthSales(Request $request){
        $this->validate(
            $request,
            [
                'startdate'    => 'bail|required|before:yesterday',
                'enddate'    => 'bail|required|after:startdate'
            ],
            [
                'startdate.required'         =>'Bạn chưa nhập ngày bắt đầu',
                'before.after'              =>'Ngày bắt đầu phải trước ngày hiện tại',
                'enddate.required'         =>'Bạn chưa nhập ngày kết thúc',
                'enddate.after'            =>'Ngày kết thúc lớn hơn ngày hiện tại',
            ]
        );
        // tien von
        $tienvon = DB::table('hoa_don')
            ->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->join('mau_san_pham','mau_san_pham.id','=','chi_tiet_hoa_don.id_MSP')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->where([['hoa_don.ngaydat','>=',$request->startdate],['ngaydat','<=',$request->enddate]])
            ->whereIn('hoa_don.id_TT',[1,5])
            ->select(DB::raw('MONTH(hoa_don.ngaydat) month'), DB::raw('SUM(chi_tiet_hoa_don.soluong*gia_nhap_vao) von'))
            ->groupBy(DB::raw('MONTH(ngaydat)'))->get()->toArray();
        // doanh thu
        $doanhthu = DB::table('hoa_don')
            ->where([['hoa_don.ngaydat','>=',$request->startdate],['ngaydat','<=',$request->enddate]])
            ->whereIn('id_TT',[1,5])
            ->select(DB::raw('MONTH(ngaydat) month'), DB::raw('SUM(tongtien) doanhthu'))
            ->groupBy(DB::raw('MONTH(ngaydat)'))->get()->toArray();
        foreach ($tienvon as $tv){
            foreach ($doanhthu as $dt){
                if($tv->month == $dt->month){
                    $loinhuan[] = array(
                        'month'=> $dt->month,
                        'von'=>$tv->von,
                        'doanhthu'=>$dt->doanhthu,
                        'tienloi'=>$dt->doanhthu-$tv->von);
                }
            }
        }
        $data= DB::table('hoa_don')
            ->where([['hoa_don.ngaydat','>=',$request->startdate],['ngaydat','<=',$request->enddate]])
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
            ->where([['hoa_don.ngaydat','>=',$request->startdate],['ngaydat','<=',$request->enddate]])
            ->whereIn('hoa_don.id_TT',[1,5])
            ->groupBy('mau_san_pham.mau','san_pham.ten_SP')
            ->orderBy('soluongcay','desc')->take(4)
            ->get()->toArray();
        return   view('admin.statistics.sales',
                    compact('data','months','monthCount','loinhuan','san_pham'));
    }
}
