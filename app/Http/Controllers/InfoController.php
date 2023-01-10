<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function getInfo()
    {
        if( Auth::guard('web')->check()) {
            $email = Auth::guard('web')->user()->email;
        }
        $users = DB::table('quan_tri')->select('*')->where('email','=',$email)->first();
        return view('admin.profile.profile', compact('users'));
    }
    public function postInfo(Request  $request, $id){
//        |after:tomorrow
        $this->validate($request,
            [
                'hoten'      => 'bail|required|min:5|max:50',
                'diachi'    => 'bail|required|min:5|max:255',
                'sodth'     => 'bail|required|min:10|max:10',
                'ngaysinh'  => 'bail|required|before:today',
                'ngay_vao_lam' => 'bail|required|after:ngaysinh',
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
                'ngaysinh.before'       => 'Ngày sinh không hợp lệ',
                'ngay_vao_lam.required'     => 'Bạn chưa nhập Ngày sinh',
                'ngay_vao_lam.after'  => 'Ngày vào làm không hợp lệ',
                'info.min'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
                'info.max'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
            ]);
        DB::table('quan_tri')->select('*')->where('id','=',$id)
            ->update([
                 'hoten'        =>$request->hoten,
                 'ngaysinh'     =>$request->ngaysinh,
                 'diachi'       =>$request->diachi,
                 'sodth'        =>$request->sodth,
                 'ngay_vao_lam' =>$request->ngay_vao_lam,
                'cccd' => $request->cccd
                 ]);

        return redirect('admin/information')->with('thongbao','Sửa thành công');
    }

    // NHÂN VIÊN BÁN HÀNG
    public function getInfoBanHang()
    {
        if( Auth::guard('nhan_vien_ban_hang')->check()) {
            $email = Auth::guard('nhan_vien_ban_hang')->user()->email;
        }
        $users = DB::table('nhan_vien_ban_hang')->select('*')->where('email','=',$email)->first();
        return view('admin.profile-ban-hang.profile', compact('users'));
    }
    public function postInfoBanHang(Request  $request, $id){
//        |after:tomorrow
        $this->validate($request,
                        [
                            'hoten'      => 'bail|required|min:5|max:50',
                            'diachi'    => 'bail|required|min:5|max:255',
                            'sodth'     => 'bail|required|min:10|max:10',
                            'ngaysinh'  => 'bail|required|before:today',
                            'ngay_vao_lam' => 'bail|required|after:ngaysinh',
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
                            'ngaysinh.before'       => 'Ngày sinh không hợp lệ',
                            'ngay_vao_lam.required'     => 'Bạn chưa nhập Ngày sinh',
                            'ngay_vao_lam.after'  => 'Ngày vào làm không hợp lệ',
                            'info.min'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
                            'info.max'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
                        ]);
        $email = DB::table('nhan_vien_ban_hang')->select('email')->where('id','=',$id)->first();
        DB::table('quan_tri')->select('*')->where('email','=',$email->email)
            ->update([
                         'hoten'        =>$request->hoten,
                         'ngaysinh'     =>$request->ngaysinh,
                         'diachi'       =>$request->diachi,
                         'sodth'        =>$request->sodth,
                         'ngay_vao_lam' =>$request->ngay_vao_lam,
                         'cccd' => $request->cccd
                     ]);
        DB::table('nhan_vien_ban_hang')->select('*')->where('id','=',$id)
            ->update([
                         'hoten'        =>$request->hoten,
                         'ngaysinh'     =>$request->ngaysinh,
                         'diachi'       =>$request->diachi,
                         'sodth'        =>$request->sodth,
                         'ngay_vao_lam' =>$request->ngay_vao_lam,
                         'cccd' => $request->cccd
                     ]);
        return redirect('admin/information-ban-hang')->with('thongbao','Sửa thành công');
    }

    // NHÂN VIÊN NHẬP KHO
    public function getInfoNhapKho()
    {
        if( Auth::guard('nhan_vien_nhap_kho')->check()) {
            $email = Auth::guard('nhan_vien_nhap_kho')->user()->email;
        }
        $users = DB::table('nhan_vien_nhap_kho')->select('*')->where('email','=',$email)->first();
        return view('admin.profile-nhap-kho.profile', compact('users'));
    }
    public function postInfoNhapKho(Request  $request, $id){
        $this->validate($request,
                        [
                            'hoten'      => 'bail|required|min:5|max:50',
                            'diachi'    => 'bail|required|min:5|max:255',
                            'sodth'     => 'bail|required|min:10|max:10',
                            'ngaysinh'  => 'bail|required|before:today',
                            'ngay_vao_lam' => 'bail|required|after:ngaysinh',
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
                            'ngaysinh.before'       => 'Ngày sinh không hợp lệ',
                            'ngay_vao_lam.required'     => 'Bạn chưa nhập Ngày sinh',
                            'ngay_vao_lam.after'  => 'Ngày vào làm không hợp lệ',
                            'info.min'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
                            'info.max'                  => 'Thông tin cá nhân phải có độ dài từ 5 đến 500 ký tự',
                        ]);
        $email = DB::table('nhan_vien_nhap_kho')->select('email')->where('id','=',$id)->first();
        DB::table('quan_tri')->select('*')->where('email','=',$email->email)
            ->update([
                         'hoten'        =>$request->hoten,
                         'ngaysinh'     =>$request->ngaysinh,
                         'diachi'       =>$request->diachi,
                         'sodth'        =>$request->sodth,
                         'ngay_vao_lam' =>$request->ngay_vao_lam,
                         'cccd' => $request->cccd
                     ]);
        DB::table('nhan_vien_nhap_kho')->select('*')->where('id','=',$id)
            ->update([
                         'hoten'        =>$request->hoten,
                         'ngaysinh'     =>$request->ngaysinh,
                         'diachi'       =>$request->diachi,
                         'sodth'        =>$request->sodth,
                         'ngay_vao_lam' =>$request->ngay_vao_lam,
                         'cccd' => $request->cccd
                     ]);
        return redirect('admin/information-nhap-kho')->with('thongbao','Sửa thành công');
    }
}
