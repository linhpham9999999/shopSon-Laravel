<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderHistoryController extends Controller
{
    public function getData(){
        $email = '' ;
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $cho_xac_nhan = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->where([['hoa_don.email_nguoidung','=',$email],['hoa_don.id_TT','=',3]])
            ->orderBy('hoa_don.id','desc')
            ->get()->toArray();

        $dang_giao_hang = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->where([['hoa_don.email_nguoidung','=',$email],['hoa_don.id_TT','=',2]])
            ->orderBy('hoa_don.id','desc')
            ->get()->toArray();

        $da_mua = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->where('hoa_don.email_nguoidung','=',$email)
            ->whereIn('hoa_don.id_TT', [1, 5])->orderBy('hoa_don.id','desc')
            ->get()->toArray();

        $da_huy = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->where([['hoa_don.email_nguoidung','=',$email],['hoa_don.id_TT','=',2]])->orderBy('hoa_don.id','desc')
            ->get()->toArray();

        $users = DB::table('nguoi_dung')
            ->where('email','=',$email)->select('*')->first();
        $diachi = DB::table('dia_chi_giao_hang')->select('*')
            ->where('emailnguoidung','=',$email)->get()->toArray();
//        dd($diachi);
        return view('khach_hang.don-hang.lich-su-mua-hang',
                    compact('cho_xac_nhan','dang_giao_hang','da_mua','da_huy','users','diachi'));
    }
}
