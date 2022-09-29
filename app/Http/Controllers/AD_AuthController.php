<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
class AD_AuthController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function loginBanHang(){
        return view('admin.login-ban-hang');
    }
    public function loginNhapKho(){
        return view('admin.login-nhap-kho');
    }
    public function check(Request $request){
        //SESSION
        $user =  $request->email ;
        if(Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password, 'chuc_vu_id' => 1])){
            $request->session()->put('nameAD', $user);
            return redirect()->route('homeAd');
        }
        $request->session()->flash('thongbao', 'Đăng nhập không thành công');
        return redirect()->route('login');
    }

    public function checkBanHang(Request $request){
        $user =  $request->email ;
        if(Auth::guard('nhan_vien_ban_hang')->attempt(['email' => $request->email,'password' => $request->password, 'chuc_vu_id' => 3])){
            $request->session()->put('nameBH', $user);
            return redirect()->route('homeBanHang');
        }

        $request->session()->flash('thongbao', 'Đăng nhập không thành công');
        return redirect()->route('login-ban-hang');
    }

    public function checkNhapKho(Request $request){
        $user =  $request->email ;
        if(Auth::guard('nhan_vien_nhap_kho')->attempt(['email' => $request->email,'password' => $request->password, 'chuc_vu_id' => 2])){
            $request->session()->put('nameNK', $user);
            return redirect()->route('homeNK');
        }
        $request->session()->flash('thongbao', 'Đăng nhập không thành công');
        return redirect()->route('login-nhap-kho');
    }



    public function logout(Request $request){
//        Auth::logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
        $request->session()->forget('nameAD');
        return redirect()->route('login');
    }

    public function logoutBanHang(Request $request){
        $request->session()->forget('nameBH');
        return redirect()->route('login-ban-hang');
    }

    public function logoutNhapKho(Request $request){
        $request->session()->forget('nameNK');
        return redirect()->route('login-nhap-kho');
    }

}
