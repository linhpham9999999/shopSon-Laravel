<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TinTucController extends Controller
{
    public function getThem(){
        return view('admin.tintuc.them');
    }
    public function postThem(Request $request){
        $this->validate(
            $request,
            [
                'tieude'     => 'bail|required|min:10|max:50',
                'hinh_anh'   => 'bail|required|mimes:jpg,bmp,png',
                'motangan'   => 'bail|required|min:10',
                'noidung'    => 'bail|required|min:20',
            ],
            [
                'tieude.required'       => 'Chưa nhập tiêu đề',
                'tieude.min'            => 'Tiêu đề phải có độ dài từ 10 đến 50 ký tự',
                'tieude.max'            => 'Tiêu đề phải có độ dài từ 10 đến 50 ký tự',
                'hinh_anh.required'     => 'Bạn chưa chọn Hình ảnh màu sản phẩm',
                'hinh_anh.mimes'        => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'motangan.required'     => 'Bạn chưa nhập Mô tả ngắn tin tức',
                'motangan.min'          => 'Mô tả ngắn phải có độ dài ít nhất 10 ký tự',
                'noidung.required'      => 'Chưa nhập nội dung tin tức',
                'noidung.min'           => 'Tin tức phải có độ dài ít nhất 20 ký tự',
            ]
        );
        if( Auth::guard('web')->check()) {
            $email = Auth::guard('web')->user()->email;
        }
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('admin_asset/tintuc', $name);
        }
        DB::table('tin_tuc')->insert([
            'tieu_de'=>$request->tieude,
            'mo_ta_ngan'=>$request->motangan,
            'noi_dung'=>$request->noidung,
            'hinh_anh'=>$name,
            'created_at'=>Carbon::now(),
            'email_quan_tri'=>$email]);
        return back()->with('alert','Thêm tin tức thành công');
    }
    public function getDanhSach(){
        $data = DB::table('tin_tuc')
            ->join('quan_tri','quan_tri.email','=','tin_tuc.email_quan_tri')
            ->select('tin_tuc.*','quan_tri.hoten')
            ->orderBy('id','desc')->paginate(5);
        return view('admin.tintuc.danhsach',compact('data'));
    }
    public function docTinTuc(){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
        $data = DB::table('tin_tuc')
            ->join('quan_tri','quan_tri.email','=','tin_tuc.email_quan_tri')
            ->select('tin_tuc.*','quan_tri.hoten','email_quan_tri')
            ->orderBy('id','desc')
            ->simplePaginate(6);
        return view('khach_hang.tintuc.tintuc',compact('data','loaisp','sanphamnew'));
    }
    public function chiTietTinTuc($id){
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
        $data = DB::table('tin_tuc')
            ->join('quan_tri','quan_tri.email','=','tin_tuc.email_quan_tri')
            ->select('tin_tuc.*','quan_tri.hoten','email_quan_tri')
            ->where('tin_tuc.id','=',$id)->first();

        $tintuc = DB::table('tin_tuc')
            ->join('quan_tri','quan_tri.email','=','tin_tuc.email_quan_tri')
            ->select('tin_tuc.*','quan_tri.hoten','email_quan_tri')
            ->where('tin_tuc.id','=',$id)->simplePaginate(6);

        return view('khach_hang.tintuc.chitiet',compact('data','loaisp','sanphamnew','tintuc'));
    }
}
