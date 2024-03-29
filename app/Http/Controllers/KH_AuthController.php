<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

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
        $authenticated = Auth::guard('nguoi_dung')->attempt(['email' => $request->email, 'password' => $request->password, 'trang_thai'=>1]);
        if ($authenticated) {
            $request->session()->put('nameKH', $tenKH);
            return redirect()->route('trangchuKH');
        }
        $request->session()->flash('error', 'Đăng nhập không thành công');
        return redirect()->route('loginKH');
    }

    public function logoutKH(Request $request){
        $request->session()->forget('nameKH');
        $request->session()->forget('user_login');
        $request->session()->forget('user_id');
        $request->session()->forget('email_user_login');
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
            'chuc_vu_id' => $request->chuc_vu_id,
            'trang_thai' => 1,
            'created_at'=> Carbon::now()
        ]);
        //Tự động thêm địa chỉ mặc định vào đc giao hàng
//        $id_nguoidung = DB::getPdo()->lastInsertId();
//        DB::table('dia_chi_giao_hang')->insert([
//            'emailnguoidung'  =>$request->email,
//            'Ma_DCGH'           =>'DCGH'.rand(10,1000),
//            'dia_chi_giao_hang' =>$request->diachi
//                                               ]);
        return redirect()->route('loginKH')->with('alert','Đăng ký thành công');
    }
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateUser($users,'google');
        $account_name = DB::table('nguoi_dung')->where('id','=',$authUser->user)->first();
        Session::put('user_login',$account_name->hoten);
        Session::put('email_user_login',$account_name->email);
        Session::put('user_id',$account_name->id);
//        dd(session('email_user_login'));
        return redirect()->route('trangchuKH')->with('message', 'Đăng nhập thành công');
    }

    public function findOrCreateUser($users,$provider){
        $authUser = DB::table('social')->where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }
        $orang = DB::table('nguoi_dung')->where('email','=',$users->email)->first();

        if(!$orang){
            $orang = DB::table('nguoi_dung')->insert([
                                       'hoten' => $users->name,
                                       'email' => $users->email,
                                       'password' => '',
                                       'diachi' => '',
                                       'hinhanh_user'=>'',
                                       'chuc_vu_id'=> 4,
                                       'sodth' => '',
                                       'trang_thai' => 1
                                   ]);
        }
        $id_nguoidung = DB::getPdo()->lastInsertId();
        DB::table('social')->insert([
                                                'user' => $id_nguoidung,
                                                'provider_user_id' => $users->id,
                                                'provider' => strtoupper($provider)
                                            ]);
        $account_name = DB::table('nguoi_dung')->where('id','=',$authUser->user)->first();
        Session::put('user_login',$account_name->hoten);
        Session::put('user_id',$account_name->id);
//        dd(session('email_user_login'));
        return redirect()->route('trangchuKH')->with('message', 'Đăng nhập thành công');

    }
}
