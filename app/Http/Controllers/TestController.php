<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
class TestController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function check(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'quyen' => '1'
        ];

        $user =  $request->email ;
        $nhanvien = DB::table('nguoi_dung')->select('hoten')->where('email','=',$user)->get();

        if (Auth::attempt($data)) {
            $gt=cookie('user',$request->email,3600);
            return view('admin.trangchu',compact('user','nhanvien'))->withCookie($gt);
        } else {
            return redirect('admin/')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function logout(){
        $user = Auth::user();
        cookie('user',$user,-3600);
        Auth::logout();
        return redirect('admin/');
    }
}
