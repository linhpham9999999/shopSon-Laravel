<?php

namespace App\Http\Controllers;

use App\Models\chuc_vu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use DB;

class AdminAddUserController extends Controller
{
    public function getDanhSach(){
        $khachhang = DB::table('nguoi_dung')
            ->select('hoten','gioitinh','ngaysinh','diachi','sodth','email','nguoi_dung.id as id')->paginate(5);
        return view('admin.khach_hang.danhsach',compact('khachhang'));
    }
    public  function getThem(){
        return view('admin.khach_hang.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'pass' => 'bail|required|min:8|max:255',
                'pass2' => 'bail|required|same:pass',
                'ten' => 'bail|required|min:5|max:50',
                'diachi' => 'bail|required|min:5|max:255',
                'sodth' => 'bail|required|min:10|max:10',
                'nsinh' => 'bail|required|date_format:Y-m-d',
                'hinh_anh' => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'pass.required' => 'Bạn chưa nhập Mật khẩu',
                'pass.min' => 'Mật khẩu nhân viên phải có độ dài từ 8 đến 255 ký tự',
                'pass.max' => 'Mật khẩu nhân viên phải có độ dài từ 8 đến 255 ký tự',
                'pass2.required' => 'Bạn chưa nhập lại password',
                'pass2.same' => 'Password không khớp',
                'ten.required' => 'Bạn chưa nhập Tên khách hàng',
                'ten.min' => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'ten.max' => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'diachi.required' => 'Bạn chưa nhập Địa chỉ',
                'diachi.min' => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'diachi.max' => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'sodth.required' => 'Bạn chưa nhập Số điện',
                'sodth.min' => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth.max' => 'Số điện thoại phải có độ dài 10 ký tự',
                'nsinh.required' => 'Bạn chưa nhập ngày sinh',
                'nsinh.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh',
                'hinh_anh.mimes' => 'File chọn phải là file hình ảnh (*.jpg, *png)'
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_dung')->insert(
            [
                'password' => Hash::make($request->pass),
                'hoten' => $request->ten,
                'diachi' => $request->diachi,
                'sodth' => $request->sodth,
                'gioitinh' => $request->gtinh,
                'ngaysinh' => $request->nsinh,
                'email' => $request->email,
                'chuc_vu_id'=>$request->chuc_vu_id,
                'hinhanh_user'=>$name,
                'created_at' => Carbon :: now ()
            ]
        );
        return redirect('admin/khach_hang/them')->with('thongbao','Thêm thành công');
    }
    public  function getSua($id){
        $khach_hang = DB::table('nguoi_dung')
            ->select('hoten','gioitinh','ngaysinh','diachi','sodth','nguoi_dung.id as id','hinhanh_user')
            ->where('id','=',$id)->first();
        return view('admin.khach_hang.sua',compact('khach_hang'));
    }
    public  function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'ten' => 'bail|required|min:5|max:50',
                'diachi' => 'bail|required|min:5|max:255',
                'sodth' => 'bail|required|min:10|max:10',
                'nsinh' => 'bail|required|date_format:Y-m-d',
                'hinh_anh' => 'bail|required|mimes:jpg,bmp,png'
            ],
            [
                'ten.required' => 'Bạn chưa nhập Tên khách hàng',
                'ten.min' => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'ten.max' => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'diachi.required' => 'Bạn chưa nhập Địa chỉ',
                'diachi.min' => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'diachi.max' => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'sodth.required' => 'Bạn chưa nhập Số điện',
                'sodth.min' => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth.max' => 'Số điện thoại phải có độ dài 10 ký tự',
                'nsinh.required' => 'Bạn chưa nhập ngày sinh',
                'nsinh.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh',
                'hinh_anh.mimes' => 'File chọn phải là file hình ảnh (*.jpg, *png)'
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_dung')->select('hoten', 'diachi','sodth','gioitinh','ngaysinh','hinhanh_user','updated_at')->where('id', '=', $id)
            ->update([
                    'hoten' => $request->ten,
                    'diachi' => $request->diachi,
                    'sodth' => $request->sodth,
                    'gioitinh' => $request->gtinh,
                    'ngaysinh' => $request->nsinh,
                    'hinhanh_user' => $name,
                    'updated_at'=>Carbon :: now ()
                ]);
        return redirect('admin/khach_hang/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function postXoa($id)
    {
        DB::table('nguoi_dung')->where('id','=',$id)->delete();
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
