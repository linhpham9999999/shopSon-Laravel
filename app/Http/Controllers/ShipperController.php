<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShipperController extends Controller
{
    public function login(){
        return view('shipper.login');
    }

    public function check(Request $request){
        //SESSION
        $user =  $request->email ;
        if(Auth::guard('nguoi_giao_hang')->attempt(['email' => $request->email,'password' => $request->password])){
            $request->session()->put('nameSP', $user);
            return redirect()->route('statusShipper');
        }
        $request->session()->flash('thongbao', 'Đăng nhập không thành công');
        return redirect()->route('loginShipper');
    }

    public function logout(Request $request){
        $request->session()->forget('nameSP');
        return redirect()->route('loginShipper');
    }

    public function status(){
        if( Auth::guard('nguoi_giao_hang')->check()) {
            $email = Auth::guard('nguoi_giao_hang')->user()->email;
        }
        $data = DB::table('nguoi_giao_hang')->where('email','=',$email)->first();
//        dd($data);
        return view('shipper.profile.profile', compact('data'));
    }

    // trang thai =1 : trống đơn, 0 là bận
    public function chuyenBanGiaoHang(Request $request){
        DB::table('nguoi_giao_hang')
            ->where('id','=',$request->id)
            ->update(['trang_thai'=>0]);
        return redirect('nguoi-giao-hang/status')->with('thongbao','Cập nhật trạng thái thành công');
    }

    public function chuyenTrongDonHang(Request $request){
        DB::table('nguoi_giao_hang')
            ->where('id','=',$request->id)
            ->update(['trang_thai'=>1]);
        return redirect('nguoi-giao-hang/status')->with('thongbao','Cập nhật trạng thái thành công');
    }
}
