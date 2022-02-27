<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\nguoi_dung;

use DB;

class NhanVienController extends Controller
{
    public function getDanhSach(){
        $nhanvien = DB::table('nguoi_dung')->select('*')->where('quyen','=','1')->paginate(5);
        return view('admin.nhanvien.danhsach',['nhanvien'=>$nhanvien]);
    }
    public  function getThem(){
        return view('admin.nhanvien.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'pass'      =>'bail|required|min:8|max:255',
                'pass2'     =>'bail|required|same:pass',
                'ten'       => 'bail|required|min:5|max:50',
                'diachi'    => 'bail|required|min:5|max:255',
                'sodth'     => 'bail|required|min:10|max:10',
                'gtinh'     => 'bail|required',
                'nsinh'     => 'bail|required|date_format:Y-m-d',
                'email'     => 'bail|required|unique:nguoi_dung,email|min:5|max:50',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'date'      => 'bail|required|date_format:Y-m-d'
            ],
            [
                'pass.required'     => 'Bạn chưa nhập Mật khẩu nhân viên',
                'pass.min'          => 'Mật khẩu nhân viên phải có độ dài từ 8 đến 255 ký tự',
                'pass.max'          => 'Mật khẩu nhân viên phải có độ dài từ 8 đến 255 ký tự',
                'pass2.required'    => 'Bạn chưa nhập lại password',
                'pass2.same'        => 'Password không khớp',
                'ten.required'      => 'Bạn chưa nhập Tên nhân viên',
                'ten.min'           => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'ten.max'           => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'diachi.required'   => 'Bạn chưa nhập Địa chỉ nhân viên',
                'diachi.min'        => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'diachi.max'        => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'sodth.required'    => 'Bạn chưa nhập Số điện thoại nhân viên',
                'sodth.min'         => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth.max'         => 'Số điện thoại phải có độ dài 10 ký tự',
                'gtinh.required'    => 'Bạn chưa nhập Giới tính khách hàng',
                'nsinh.required'    => 'Bạn chưa nhập Thời gian bán sản phẩm',
                'nsinh.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
                'email.required'    => 'Bạn chưa nhập Email khách hàng',
                'email.unique'      => 'Emai nhân viên đã tồn tại',
                'email.min'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'email.max'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'date.required'    => 'Bạn chưa nhập Thời gian bán sản phẩm',
                'date.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
            ]);
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
                'quyen'=>$request->quyen,
                'ngay_vao_lam'=>$request->date,
                'thong_tin_user'=>$request->info,
                'hinhanh_user'=>$name,
            ]
        );

        return redirect('admin/nhanvien/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($id){
        $nhanvien = DB::table('nguoi_dung')->select('*')->where('id','=',$id)->first();
        return view('admin.nhanvien.sua',compact('nhanvien'));
    }

    public  function postSua(Request $request, $id){
        $this->validate($request,
            [
                'ten'   => 'bail|required|min:5|max:50',
                'diachi'=> 'bail|required|min:5|max:255',
                'sodth' => 'bail|required|min:10|max:10',
                'nsinh' => 'bail|required|date_format:Y-m-d',
                'email' => 'bail|required|unique:nguoi_dung,email|min:5|max:50',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'date'      => 'bail|required|date_format:Y-m-d'
            ],
            [
                'ten.required'          => 'Bạn chưa nhập Tên nhân viên',
                'ten.min'               => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'ten.max'               => 'Tên nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'diachi.required'       => 'Bạn chưa nhập Địa chỉ nhân viên',
                'diachi.min'            => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'diachi.max'            => 'Địa chỉ nhân viên phải có độ dài từ 5 đến 255 ký tự',
                'sodth.required'        => 'Bạn chưa nhập Số điện thoại nhân viên',
                'sodth.min'             => 'Số điện thoại phải có độ dài 10 ký tự',
                'sodth.max'             => 'Số điện thoại phải có độ dài 10 ký tự',
                'nsinh.required'        => 'Bạn chưa nhập Thời gian bán sản phẩm',
                'nsinh.date_format'     => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
                'email.required'        => 'Bạn chưa nhập Email khách hàng',
                'email.unique'          => 'Emai nhân viên đã tồn tại',
                'email.min'             => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'email.max'             => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'date.required'    => 'Bạn chưa nhập Thời gian bán sản phẩm',
                'date.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày',
            ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_dung')->select('*')->where('id','=',$id)->update([
                'hoten'     => $request->ten,
                'diachi'    => $request->diachi,
                'sodth'     => $request->sodth,
                'gioitinh'  => $request->gtinh,
                'ngaysinh'  => $request->nsinh,
                'email'     => $request->email,
                'ngay_vao_lam'=>$request->date,
                'thong_tin_user'=>$request->info,
                'hinhanh_user'=>$name,
        ]);

        return redirect('admin/nhanvien/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public  function postXoa($id){
        DB::table('nguoi_dung')->where('id','=',$id)->delete();
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
