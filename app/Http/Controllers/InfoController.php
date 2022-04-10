<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function getInfo()
    {
        if(Auth::check()){
            $email = Auth::user()->email;
        }
        $users = DB::table('nguoi_dung')->select('*')->where('email','=',$email)->first();
        return view('admin.profile.profile', compact('users'));
    }
    public function postInfo(Request  $request, $id){
//        |after:tomorrow
        $this->validate($request,
            [
                'hoten'      => 'bail|required|min:5|max:50',
                'diachi'    => 'bail|required|min:5|max:255',
                'sodth'     => 'bail|required|min:10|max:10',
                'ngaysinh'  => 'bail|required|date_format:Y-m-d',
                'ngay_vao_lam' => 'bail|required|date_format:Y-m-d',
                'info'      => 'bail|min:5|max:500'
            ],
            [
                'hoten.required'         => 'Bạn chưa nhập Tên tài khoản',
                'hoten.min'              => 'Tên tài khoản phải có độ dài từ 5 đến 50 ký tự',
                'hoten.max'              => 'Tên tài khoản phải có độ dài từ 5 đến 50 ký tự',
                'diachi.required'       => 'Bạn chưa nhập Địa chỉ tài khoản',
                'diachi.min'            => 'Địa chỉ tài khoản phải có độ dài từ 5 đến 255 ký tự',
                'diachi.max'            => 'Địa chỉ tài khoản phải có độ dài từ 5 đến 255 ký tự',
                'sodth.required'        => 'Bạn chưa nhập Số điện thoại ',
                'sodth.min'             => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth.max'             => 'Số điện thoại phải có độ dài 10 ký tự',
                'ngaysinh.required'     => 'Bạn chưa nhập Ngày sinh',
                'ngaysinh.date_format'  => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
                'ngay_vao_lam.required'     => 'Bạn chưa nhập Ngày sinh',
                'ngay_vao_lam.date_format'  => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
//                'ngay_vao_lam.after'        => 'Ngày vào làm không hợp lệ',
                'info.min'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
                'info.max'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
            ]);
        DB::table('nguoi_dung')->select('*')->where('id','=',$id)
            ->update([
                 'hoten'        =>$request->hoten,
                 'ngaysinh'     =>$request->ngaysinh,
                 'diachi'       =>$request->diachi,
                 'sodth'        =>$request->sodth,
                 'ngay_vao_lam' =>$request->ngay_vao_lam,
                 'thong_tin_user'=>$request->info]);

        return redirect('admin/information')->with('thongbao','Sửa thành công');
    }
}
