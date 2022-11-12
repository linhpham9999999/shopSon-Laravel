<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPasswordNK;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NK_ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkNhapKho');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // NHÂN VIEN NHẬP KHO
    public function indexNhapKho()
    {
        return view('admin.account-nhap-kho.changePassword');
    }
    public function storeNhapKho(Request $request)
    {
        $request->validate([
                               'current_password' => ['required', new MatchOldPasswordNK],
                               'new_password' => ['required'],
                               'new_confirm_password' => ['same:new_password'],
                           ],
                           [
                               'current_password.required' => 'Bạn chưa nhập mới khẩu hiện tại',
                               'new_password.required' =>'Bạn chưa nhập mật khẩu mới',
                               'new_confirm_password.same'=>'Mật khẩu không khớp'
                           ]
        );

        if( Auth::guard('nhan_vien_nhap_kho')->check()) {
            $email = Auth::guard('nhan_vien_nhap_kho')->user()->email;
        }
        DB::table('nhan_vien_nhap_kho')
            ->where('email','=',$email)
            ->update(['password'=> Hash::make($request->new_password)]);

        DB::table('quan_tri')
            ->where('email','=',$email)
            ->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('alert','Đã thay đổi');
    }
}
