<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ADChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.account.changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
                               'current_password' => ['required', new MatchOldPassword],
                               'new_password' => ['required'],
                               'new_confirm_password' => ['same:new_password'],
                           ],
                           [
                               'current_password.required' => 'Bạn chưa nhập mới khẩu hiện tại',
                               'new_password.required' =>'Bạn chưa nhập mật khẩu mới',
                               'new_confirm_password.same'=>'Mật khẩu không khớp'
                           ]
        );

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('alert','Đã thay đổi');
    }

    // NHÂN VIEN BÁN HÀNG
    public function indexBanHang()
    {
        return view('admin.account-ban-hang.changePassword');
    }
    public function storeBanHang(Request $request)
    {
        $request->validate([
                               'current_password' => ['required', new MatchOldPassword],
                               'new_password' => ['required'],
                               'new_confirm_password' => ['same:new_password'],
                           ],
                           [
                               'current_password.required' => 'Bạn chưa nhập mới khẩu hiện tại',
                               'new_password.required' =>'Bạn chưa nhập mật khẩu mới',
                               'new_confirm_password.same'=>'Mật khẩu không khớp'
                           ]
        );

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('alert','Đã thay đổi');
    }

    // NHÂN VIEN NHẬP KHO
    public function indexNhapKho()
    {
        return view('admin.account-nhap-kho.changePassword');
    }
    public function storeNhapKho(Request $request)
    {
        $request->validate([
               'current_password' => ['required', new MatchOldPassword],
               'new_password' => ['required'],
               'new_confirm_password' => ['same:new_password'],
           ],
           [
               'current_password.required' => 'Bạn chưa nhập mới khẩu hiện tại',
               'new_password.required' =>'Bạn chưa nhập mật khẩu mới',
               'new_confirm_password.same'=>'Mật khẩu không khớp'
           ]
        );

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('alert','Đã thay đổi');
    }
}
