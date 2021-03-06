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
    // Thông tin tất cả sản phẩm trong bảng SAN_PHAM
    public function listSP(){
        $allSP = DB::table('san_pham')->simplePaginate(6);
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get();

        return view('khach_hang.shop.all-product',compact('allSP','loaisp','sanpham'));
    }
    // Xem sản phẩm theo loại sản phẩm
    public function loaiSP($id){
        $allSP = DB::table('san_pham')->simplePaginate(6);
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get(); // Hiện menu
        $listSP = DB::table('loai_san_pham')->join('san_pham','loai_san_pham.id','=','san_pham.id_LSP')
            ->select('san_pham.*')->where('loai_san_pham.id','=',$id)->get();

        return view('khach_hang.shop.loai-san-pham',compact('sanpham','allSP','loaisp','listSP'));
    }
    // Danh sách Màu Sản phẩm của từng Sản phẩm
    public function listColorProduct($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get();
        $listColorProduct = DB::table('mau_san_pham')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','giagoc','giamgia','ten_SP','san_pham.hinhanhgoc')
            ->where('san_pham.id','=',$id)->simplePaginate(6);
        return view('khach_hang.shop.list-color-product',compact('listColorProduct','loaisp','sanpham'));
    }
    // Xem chi tiet san pham de them cart
    public function listDetailColorProduct($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();
        $sanpham = DB::table('san_pham')->select('*')->get();
        $mausp = DB::table('mau_san_pham')
            ->join('san_pham','san_pham.id','=','mau_san_pham.id_SP')
            ->select('mau_san_pham.id','mau_san_pham.Ma_MSP','mau_san_pham.mau','mau_san_pham.hinhanh','mau_san_pham.thongTinMau',
            'mau_san_pham.soluongton','san_pham.hansudung_thang','san_pham.ten_SP','san_pham.xuatxu','san_pham.trongluong','san_pham.giagoc',
            'san_pham.giamgia','san_pham.sosao','mau_san_pham.id_SP')
            ->where('mau_san_pham.id','=',$id)->get();
        return view('khach_hang.shop.list-color-detail',compact('mausp','loaisp','sanpham'));
    }
    // View Lien He
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
    // Xu ly Lien He Shop
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
