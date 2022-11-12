<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function rating(Request $request){
        $email = null;
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        if($email != null){
            DB::table('binh_luan')->insert([
                                               'so_sao'=> $request->index,
                                               'id_MSP'=> $request->product_color_id,
                                               'create_at' =>Carbon::now(),
                                               'emailnguoidung' => $email]);
            return response()->json(['status'=>'Đánh sao thành công']);
        }
        return response()->json(['error'=>'Bạn chưa đăng nhập']);
    }
    public function comment(Request $request){
//        dd($request->comment);
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        DB::table('binh_luan')->insert([
            'noi_dung'=>$request->comment,
            'id_MSP'=> $request->idMSP,
            'create_at' => Carbon::now(),
            'hien_thi'  => 0,
            'emailnguoidung' => $email
        ]);
        return redirect()->route('danh-gia-san-pham',['id'=>$request->idMSP])
            ->with('alert','Bình luận đang chờ admin duyệt');
    }
    //admin quản lý bình luận
    public function getDanhSachCanDuyet(){
        $data = DB::table('binh_luan')
            ->join('mau_san_pham','binh_luan.id_MSP','=','mau_san_pham.id')
            ->select('binh_luan.id as idCMT','noi_dung','id_MSP','hinhanh','Ma_MSP','binh_luan.create_at','mau','emailnguoidung','hien_thi')
            ->where([['noi_dung','!=',null],['hien_thi','=',0]])
            ->get()->toArray();
        return view('admin.binh-luan.danhsach',compact('data'));
    }
    public function getDanhSachDaDuyet(){
        $data = DB::table('binh_luan')
            ->join('mau_san_pham','binh_luan.id_MSP','=','mau_san_pham.id')
            ->select('binh_luan.id as idCMT','noi_dung','id_MSP','hinhanh','Ma_MSP','binh_luan.create_at','mau','emailnguoidung','hien_thi')
            ->where([['noi_dung','!=',null],['hien_thi','=',1]])
            ->get()->toArray();
        return view('admin.binh-luan.danhsachdaduyet',compact('data'));
    }
    public function duyetBinhLuan(Request $request){
        DB::table('binh_luan')->where('id','=',$request->idCMT)
            ->update([
                'hien_thi'=>1
                     ]);
        return redirect()->route('quan-ly-cmt')->with('thongbao','Duyệt thành công');
//        return response()->json(['status'=>'Duyệt thành công']);
    }
}
