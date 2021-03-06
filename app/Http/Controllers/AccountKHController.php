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
        $users = DB::table('nguoi_dung')
            ->where('email','=',$email)->select('*')->first();
//        dd($users->id);
        $diachi = DB::table('dia_chi_giao_hang')->select('*')->where('id_NGUOIDUNG_mua','=',$users->id)->get();
//        dd($diachi);
        return view('khach_hang.account.sua-tai-khoan', compact('users','diachi'));
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
    public function postAddress(Request $request){
        $this->validate($request,
            [
                'diachinew'      => 'bail|required|min:5|max:500',
            ],
            [
                'diachinew.required'         => 'Bạn chưa nhập địa chỉ',
                'diachinew.min'              => 'Địa phải có độ dài từ 5 đến 500 ký tự',
                'diachinew.max'              => 'Địa chỉ phải có độ dài từ 5 đến 500 ký tự'
            ]);

        DB::table('dia_chi_giao_hang')
            ->insert([
                         'Ma_DCGH'=>'DCGH'.rand(10,1000),
                         'id_NGUOIDUNG_mua'=>$request->iduser,
                         'dia_chi_giao_hang'=>$request->diachinew]);

        return back()->with('alert2','Thêm thành công');
    }
    public function postDelete($id){
        DB::table('dia_chi_giao_hang')->where('id','=',$id)->delete();
        return back()->with('alert3','Xoá thành công');
    }
}
