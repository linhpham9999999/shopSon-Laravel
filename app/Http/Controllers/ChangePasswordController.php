<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('loginKH');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('khach_hang.account.changePassword');
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

        return redirect('khach_hang/account/change-password')->with('alert','Lưu thành công');
    }
}
