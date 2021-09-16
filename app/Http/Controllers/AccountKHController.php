<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;

class AccountKHController extends Controller
{
    public function viewAccount(){
        if(Auth::check()){
            $email = Auth::user()->email;
        }
        $users = DB::table('nguoi_dung')->where('email','=',$email)->select('*')->get();
        return view('khach_hang.account.account', compact('users'));
    }
}
