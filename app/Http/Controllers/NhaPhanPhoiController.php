<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nha_phan_phoi;

use DB;

class NhaPhanPhoiController extends Controller
{
    public function getDanhSach(){
        $nha_phan_phoi = DB::table('nha_phan_phoi')->paginate(5);
        return view('admin.nhaphanphoi.danhsach',compact('nha_phan_phoi'));
    }
    public  function getThem(){
        return view('admin.nhaphanphoi.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'idNPP'     => 'bail|required|unique:nha_phan_phoi,Ma_NPP|min:3|max:8',
                'tenNPP'    => 'bail|required|unique:nha_phan_phoi,ten_NPP|min:10|max:100',
                'dcNPP'     => 'bail|required|min:10|max:255',
                'sodtNPP'   => 'bail|required|min:10|max:10',
                'emailNPP'  => 'bail|required|email|min:10|max:40',
            ],
            [
                'idNPP.required'    => 'Bạn chưa nhập Mã nhà phân phối',
                'idNPP.unique'      => 'Mã nhà phân phối đã tồn tại',
                'idNPP.min'         => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'idNPP.max'         => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'tenNPP.required'   => 'Bạn chưa nhập Tên nhà phân phối',
                'tenNPP.unique'     => 'Tên nhà phân phối đã tồn tại',
                'tenNPP.min'        => 'Tên nhà phân phối phải có độ dài từ 10 đến 100 ký tự',
                'tenNPP.max'        => 'Tên nhà phân phối phải có độ dài từ 10 đến 100 ký tự',
                'dcNPP.required'    => 'Bạn chưa nhập Địa chỉ nhà phân phối',
                'dcNPP.min'         => 'Địa chỉ phải có độ dài từ 10 đến 255 ký tự',
                'dcNPP.max'         => 'Địa chỉ phải có độ dài từ 10 đến 255 ký tự',
                'sodtNPP.required'  => 'Bạn chưa nhập Số điện thoại nhà phân phối',
                'sodtNPP.min'       => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodtNPP.max'       => 'Số điện thoại phải có độ dài 10 ký tự',
                'emailNPP.required' => 'Bạn chưa nhập Email nhà phân phối',
                'emailNPP.email'    => 'Dữ liệu nhập vào phải có dạng email (*@gmail.com)',
                'emailNPP.min'      => 'Email phải có độ dài từ 10 đến 40 ký tự',
                'emailNPP.max'      => 'Email phải có độ dài 1từ 10 đến 40 ký tự'
            ]);
        //lưu thông tin thêm nhaphanphoi vào csdl
        $nhaphanphoi = new nha_phan_phoi;
        $nhaphanphoi->Ma_NPP = $request->idNPP;
        $nhaphanphoi->ten_NPP = $request->tenNPP;
        $nhaphanphoi->diachi_NPP = $request->dcNPP;
        $nhaphanphoi->sodth_NPP = $request->sodtNPP;
        $nhaphanphoi->email_NPP = $request->emailNPP;
        $nhaphanphoi->save();
        //chuyển hướng
        return redirect('admin/nhaphanphoi/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($id){
        $phanphoi = DB::table('nha_phan_phoi')->select('*')->where('id','=',$id)->get();
        return view('admin.nhaphanphoi.sua',compact('phanphoi'));
    }

    public  function postSua(Request $request, $id){
        $this->validate($request,
            [
                'idNPP'             => 'bail|required|min:3|max:8',
                'tenNPP'            => 'bail|required|min:10|max:100',
                'dcNPP'             => 'bail|required|min:10|max:255',
                'sodtNPP'           => 'bail|required|min:10|max:10',
                'emailNPP'          => 'bail|required|min:10|max:50',
            ],
            [
                'idNPP.required'    => 'Bạn chưa nhập Mã nhà phân phối',
                'idNPP.min'         => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'idNPP.max'         => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'tenNPP.required'   => 'Bạn chưa nhập Tên nhà phân phối',
                'tenNPP.min'        => 'Tên nhà phân phối phải có độ dài từ 10 đến 100 ký tự',
                'tenNPP.max'        => 'Tên nhà phân phối phải có độ dài từ 10 đến 100 ký tự',
                'dcNPP.required'    => 'Bạn chưa nhập Địa chỉ nhà phân phối',
                'dcNPP.min'         => 'Địa chỉ phải có độ dài từ 10 đến 255 ký tự',
                'dcNPP.max'         => 'Địa chỉ phải có độ dài từ 10 đến 255 ký tự',
                'sodtNPP.required'  => 'Bạn chưa nhập Số điện thoại nhà phân phối',
                'sodtNPP.min'       => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodtNPP.max'       => 'Số điện thoại phải có độ dài 10 ký tự',
                'emailNPP.required' => 'Bạn chưa nhập Email nhà phân phối',
                'emailNPP.min'      => 'Email phải có độ dài từ 10 đến 50 ký tự',
                'emailNPP.max'      => 'Email phải có độ dài 1từ 10 đến 50 ký tự'
            ]);
        DB::table('nha_phan_phoi')->select('*')->where('id','=',$id)
            ->update([     'Ma_NPP'      =>$request->idNPP,
                         'ten_NPP'       =>$request->tenNPP,
                         'diachi_NPP'    =>$request->dcNPP,
                         'sodth_NPP'     =>$request->sodtNPP,
                         'email_NPP'     =>$request->emailNPP]);
        return redirect('admin/nhaphanphoi/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public  function getXoa($id){
        DB::table('nha_phan_phoi')->where('id','=',$id)->delete();
        return redirect('admin/nhaphanphoi/danhsach')->with('thongbao','Xóa thành công');
    }
}
