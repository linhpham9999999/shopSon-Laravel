<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\contact;

class KhachHangController extends Controller
{
    public function index(){
        $sanpham  = DB::table('san_pham')->select('*')->where('noibat','=','1')->get();
        return view('khach_hang.trangchu', compact('sanpham'));
    }
    public function listSP(){
        $allSP = DB::table('san_pham')->simplePaginate(6);
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get();

        return view('khach_hang.shop.all-product',compact('allSP','loaisp','sanpham'));
    }
    public function loaiSP($id){
        $allSP = DB::table('san_pham')->simplePaginate(6);
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get(); // Hiện menu
        $listSP = DB::table('loai_san_pham')->join('san_pham','loai_san_pham.id','=','san_pham.id_LSP')
            ->select('san_pham.*')->where('loai_san_pham.id','=',$id)->get();

        return view('khach_hang.shop.loai-san-pham',compact('sanpham','allSP','loaisp','listSP'));
    }

    public function listColorProduct($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get();
        $listColorProduct = DB::table('mau_san_pham')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','giagoc','giamgia','ten_SP','san_pham.hinhanhgoc')
            ->where('san_pham.id','=',$id)->get();

        return view('khach_hang.shop.list-color-product',compact('listColorProduct','loaisp','sanpham'));
    }

    /*public function accountUser(){
        if(Auth::check()){
            $email = Auth::user()->email;
        }

        $users = DB::table('nguoi_dung')
            ->join('dia_chi_giao_hang','nguoi_dung.id','=','dia_chi_giao_hang.id_NGUOIDUNG_mua')
            ->where('email','=',$email)
            ->select('hoten','diachi','dia_chi_giao_hang','email','sodth','sodth_giao_hang')->first();

        return view('khach_hang.account.account',compact('users'));
    }*/

    /*public function wishList(){

    }*/

    public function contact()
    {
        $email  = '';
        $name   = '';
        $idUser = '';
        if( Auth::check() )
        {
            $email  = Auth::user()->email;
            $name   = Auth::user()->hoten;
            $idUser = Auth::user()->id;
        }
        return view('khach_hang.contact.view-contact', compact('email','name','idUser'));
    }

    public function handleContact(ContactRequest $request)
    {
        if(Auth::check()){
            DB::table('contact')->insert([
                'nameUser' => $request->name ,
                'emailUser' => $request->email,
                'subject' => $request->con_content,
                'message' => $request->message,
                'id_NGUOIDUNG_mua' => $request->idUser
            ]);
        }
        else{
            DB::table('contact')->insert([
                'nameUser' => $request->name,
                'emailUser' => $request->email,
                'subject' => $request->con_content,
                'message' => $request->message,
                'id_NGUOIDUNG_mua' => null
            ]);
        }
        return redirect()->route('contact')->with('alert','Gửi thành công');
    }

    public function aboutUs(){
        return view('khach_hang/about_shop/about_shop');
    }
}
