<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderHistoryController extends Controller
{
    public function getData($id){
        $email = '' ;
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $output = DB::table('hoa_don')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->select('hoa_don.id','hoa_don.email_nguoidung','hoa_don.Ma_HD','ngaygiao','ngaydat'
                ,'hoa_don.tongtien','trang_thai.trangthai', 'trang_thai.id as idTT')
            ->orderBy('hoa_don.id','desc')
            ->where([['hoa_don.email_nguoidung'=>$email],['hoa_don.id_TT'=>$id]])
            ->get();
        $output['id'] = $output->id;

        echo json_encode($output);
    }
}
