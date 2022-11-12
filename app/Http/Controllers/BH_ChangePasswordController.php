<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPasswordBH;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BH_ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('checkBanHang');
    }

    // NHÂN VIEN BÁN HÀNG
    public function indexBanHang()
    {
        return view('admin.account-ban-hang.changePassword');
    }
    public function storeBanHang(Request $request)
    {
//        dd(Auth::guard('nhan_vien_ban_hang')->user()->email);
        $request->validate([
                               'current_password' => ['required', new MatchOldPasswordBH],
                               'new_password' => ['required'],
                               'new_confirm_password' => ['same:new_password'],
                           ],
                           [
                               'current_password.required' => 'Bạn chưa nhập mới khẩu hiện tại',
                               'new_password.required' =>'Bạn chưa nhập mật khẩu mới',
                               'new_confirm_password.same'=>'Mật khẩu không khớp'
                           ]
        );

        if( Auth::guard('nhan_vien_ban_hang')->check()) {
            $email = Auth::guard('nhan_vien_ban_hang')->user()->email;
        }
        DB::table('nhan_vien_ban_hang')
            ->where('email','=',$email)
            ->update(['password'=> Hash::make($request->new_password)]);

        DB::table('quan_tri')
            ->where('email','=',$email)
            ->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('alert','Đã thay đổi');
    }
}
