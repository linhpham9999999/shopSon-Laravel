<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\nha_phan_phoi;

use DB;

class NhaPhanPhoiController extends Controller
{
    public function getDanhSach(){
        $nha_phan_phoi = nha_phan_phoi::all();
        return view('admin.nhaphanphoi.danhsach',['nhaphanphoi'=>$nha_phan_phoi]);
    }
    public  function getThem(){
        return view('admin.nhaphanphoi.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'idNPP' => 'bail|required|unique:nha_phan_phoi,Ma_NPP|min:3|max:8',
                'tenNPP' => 'bail|required|unique:nha_phan_phoi,ten_NPP|min:5|max:100',
                'dcNPP' => 'bail|required|min:5|max:100',
                'sodtNPP' => 'bail|required|min:10|max:10',
                'emailNPP' => 'bail|required|email|min:3|max:40',
            ],
            [
                'idNPP.required' => 'Bạn chưa nhập mã nhà phân phối',
                'idNPP.unique' => 'Mã nhà phân phối đã tồn tại',
                'idNPP.min' => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'idNPP.max' => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'tenNPP.required' => 'Bạn chưa nhập Tên nhà phân phối',
                'tenNPP.unique' => 'Tên nhà phân phối đã tồn tại',
                'tenNPP.min' => 'Tên nhà phân phối phải có độ dài từ 5 đến 50 ký tự',
                'tenNPP.max' => 'Tên nhà phân phối phải có độ dài từ 5 đến 50 ký tự',
                'dcNPP.required' => 'Bạn chưa nhập Địa chỉ nhà phân phối',
                'dcNPP.min' => 'Địa chỉ phải có độ dài từ 5 đến 50 ký tự',
                'dcNPP.max' => 'Địa chỉ phải có độ dài từ 5 đến 50 ký tự',
                'sodtNPP.required' => 'Bạn chưa nhập Số điện thoại nhà phân phối',
                'sodtNPP.min' => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodtNPP.max' => 'Số điện thoại phải có độ dài 10 ký tự',
                'emailNPP.required' => 'Bạn chưa nhập Email nhà phân phối',
                'emailNPP.email' => 'Dữ liệu nhập vào phải có dạng email',
                'emailNPP.min' => 'Email phải có độ dài từ 5 đến 40 ký tự',
                'emailNPP.max' => 'Email phải có độ dài 1từ 5 đến 40 ký tự'
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

    public  function getSua($Ma_NPP){
        $phanphoi = DB::table('nha_phan_phoi')->select('*')->where('Ma_NPP','=',$Ma_NPP)->get();
        return view('admin.nhaphanphoi.sua',compact('phanphoi'));
    }

    public  function postSua(Request $request, $Ma_NPP){
        $phanphoi = DB::table('nha_phan_phoi')->select('*')->where('Ma_NPP','=',$Ma_NPP)->update(['ten_NPP'=>$request->tenNPP]);
        $phanphoi = DB::table('nha_phan_phoi')->select('*')->where('Ma_NPP','=',$Ma_NPP)->update(['diachi_NPP'=>$request->dcNPP]);
        $phanphoi = DB::table('nha_phan_phoi')->select('*')->where('Ma_NPP','=',$Ma_NPP)->update(['sodth_NPP'=>$request->sodtNPP]);
        $phanphoi = DB::table('nha_phan_phoi')->select('*')->where('Ma_NPP','=',$Ma_NPP)->update(['email_NPP'=>$request->emailNPP]);
        $this->validate($request,
            [
                'Ma_NPP' => 'unique:nha_phan_phoi,Ma_NPP|min:3|max:8',
                'ten_NPP' => 'unique:nha_phan_phoi,ten_NPP|min:5|max:50',
                'diachi_NPP' => 'min:5|max:50',
                'sodth_NPP' => 'min:10|max:10',
                'email_NPP' => 'unique:nha_phan_phoi,Ten|min:3|max:40',
            ],
            [
                'Ma_NPP.unique' => 'Mã nhà phân phối đã tồn tại',
                'Ma_NPP.min' => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'Ma_NPP.max' => 'Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự',
                'ten_NPP.unique' => 'Tên nhà phân phối đã tồn tại',
                'ten_NPP.min' => 'Tên nhà phân phối phải có độ dài từ 5 đến 50 ký tự',
                'diachi_NPP.min' => 'Địa chỉ phải có độ dài từ 5 đến 50 ký tự',
                'diachi_NPP.max' => 'Địa chỉ phải có độ dài từ 5 đến 50 ký tự',
                'sodth_NPP.min' => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth_NPP.max' => 'Số điện thoại phải có độ dài 10 ký tự',
                'email_NPP.min' => 'Email phải có độ dài từ 5 đến 40 ký tự',
                'email_NPP.max' => 'Email phải có độ dài 1từ 5 đến 40 ký tự'
            ]);
        return redirect('admin/nhaphanphoi/sua/'.$Ma_NPP)->with('thongbao','Sửa thành công');
    }
    public  function getXoa($Ma_NPP){
        $npp = DB::table('nha_phan_phoi')->where('Ma_NPP','=',$Ma_NPP)->delete();
        return redirect('admin/nhaphanphoi/danhsach')->with('thongbao','Xóa thành công');
    }
}
