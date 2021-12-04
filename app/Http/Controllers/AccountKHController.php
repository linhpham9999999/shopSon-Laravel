<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AccountKHController extends Controller
{
    public function viewAccount(){
        if(Auth::check()){
            $email = Auth::user()->email;
        }
        $users = DB::table('nguoi_dung')->select('*')->where('email','=',$email)->first();
//        dd($users->id);
        return view('khach_hang.account.sua-tai-khoan', compact('users'));
    }
    public function postAccount(Request $request, $id){
        $this->validate($request,
        [
            'name'      => 'bail|required|min:5|max:50',
            'diachi'    => 'bail|required|min:5|max:255',
            'sodth'     => 'bail|required|min:10|max:10',
            'ngaysinh'  => 'bail|required|date_format:Y-m-d'
        ],
        [
            'name.required'         => 'Bạn chưa nhập Tên tài khoản',
            'name.min'              => 'Tên tài khoản phải có độ dài từ 5 đến 50 ký tự',
            'name.max'              => 'Tên tài khoản phải có độ dài từ 5 đến 50 ký tự',
            'diachi.required'       => 'Bạn chưa nhập Địa chỉ tài khoản',
            'diachi.min'            => 'Địa chỉ tài khoản phải có độ dài từ 5 đến 255 ký tự',
            'diachi.max'            => 'Địa chỉ tài khoản phải có độ dài từ 5 đến 255 ký tự',
            'sodth.required'        => 'Bạn chưa nhập Số điện thoại ',
            'sodth.min'             => 'Số điện thoại phải có độ dài 10 ký tự',
            'sodth.max'             => 'Số điện thoại phải có độ dài 10 ký tự',
            'ngaysinh.required'     => 'Bạn chưa nhập Ngày sinh',
            'ngaysinh.date_format'  => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
        ]);

        DB::table('nguoi_dung')->select('*')->where('id','=',$id)
            ->update([
            'hoten'=>$request->name,
            'gioitinh'=>$request->gtinh,
            'ngaysinh'=>$request->ngaysinh,
            'diachi'=>$request->diachi,
            'sodth'=>$request->sodth ]);

        return redirect('khach_hang/account/view-account')->with('alert','Sửa thành công');
    }

}
