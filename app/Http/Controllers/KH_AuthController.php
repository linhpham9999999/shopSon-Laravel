<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class KH_AuthController extends Controller
{
    public function login(){
        return view('khach_hang.login');
    }
    public function check(Request $request){
        $this->validate($request,
            [
                'email' => 'bail|required|min:10|max:40',
                'password' => 'bail|required|min:8|max:255'
            ],
            [
                'email.required' => 'Bạn chưa Email',
                'email.min' => 'Email phải có độ dài từ 10 đến 40 ký tự',
                'email.max' => 'Email phải có độ dài từ 10 đến 40 ký tự',
                'password.required' => 'Bạn chưa nhập Password',
                'password.min' => 'Password phải có độ dài từ 8 đến 255 ký tự',
                'password.max' => 'Password phải có độ dài từ 8 đến 255 ký tự'
            ]);
        $tenKH = DB::table('nguoi_dung')->select('hoten')->where('email','=',$request->email)->first();
        $authenticated = Auth::guard('nguoi_dung')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($authenticated) {
            $request->session()->put('name', $tenKH);
            return redirect()->route('trangchuKH');
        }
        $request->session()->flash('error', 'Đăng nhập không thành công');
        return redirect()->route('loginKH');
    }

    public function logoutKH(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginKH');
    }

    public function create_account(){
        return view('khach_hang.account.tao-tai-khoan');
    }
    public function testDK(Request $request){
        $this->validate($request,
            [
                'ten' => 'bail|required|min:5|max:50',
                'diachi' => 'bail|required|min:5|max:255',
                'sodth' => 'bail|required|min:10|max:10',
                'nsinh' => 'bail|required|date_format:Y-m-d',
                'email' => 'bail|required|unique:nguoi_dung,email|min:5|max:50',
                'pass' => 'bail|required|min:5|max:255',
                'password_confirmation'=>'bail|required|same:pass'
            ],
            [
                'ten.required' => 'Bạn chưa nhập Tên tài khoản',
                'ten.min' => 'Tên tài khoản phải có độ dài từ 5 đến 50 ký tự',
                'ten.max' => 'Tên tài khoản phải có độ dài từ 5 đến 50 ký tự',
                'diachi.required' => 'Bạn chưa nhập Địa chỉ tài khoản',
                'diachi.min' => 'Địa chỉ tài khoản phải có độ dài từ 5 đến 255 ký tự',
                'diachi.max' => 'Địa chỉ tài khoản phải có độ dài từ 5 đến 255 ký tự',
                'sodth.required' => 'Bạn chưa nhập Số điện thoại ',
                'sodth.min' => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth.max' => 'Số điện thoại phải có độ dài 10 ký tự',
                'nsinh.required' => 'Bạn chưa nhập Ngày sinh',
                'nsinh.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
                'email.required' => 'Bạn chưa nhập Email ',
                'email.unique' => 'Emai đã tồn tại',
                'email.min' => 'Email phải có độ dài từ 5 đến 40 ký tự',
                'email.max' => 'Email phải có độ dài từ 5 đến 40 ký tự',
                'pass.required' => 'Bạn chưa nhập password',
                'pass.min' => 'Password phải có độ dài từ 5 đến 255 ký tự',
                'pass.max' => 'Password phải có độ dài từ 5 đến 255 ký tự',
                'password_confirmation.required' => 'Bạn chưa nhập lại password',
                'password_confirmation.same' => 'Password không trùng',
            ]);
        DB::table('nguoi_dung')->insert([
            'password' => Hash::make($request->pass),
            'hoten' => $request->ten,
            'diachi' => $request->diachi,
            'sodth' => $request->sodth,
            'gioitinh' => $request->gtinh,
            'ngaysinh' => $request->nsinh,
            'email' => $request->email,
            'quyen' => $request->quyen
        ]);
        //Tự động thêm địa chỉ mặc định vào đc giao hàng
        $id_nguoidung = DB::getPdo()->lastInsertId();
        DB::table('dia_chi_giao_hang')->insert([
            'id_NGUOIDUNG_mua'  =>$id_nguoidung,
            'Ma_DCGH'           =>'DCGH'.rand(10,1000),
            'dia_chi_giao_hang' =>$request->diachi
                                               ]);
        return redirect()->route('loginKH')->with('alert','Đăng ký thành công');
    }
}
