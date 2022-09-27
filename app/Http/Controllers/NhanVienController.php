<?php

namespace App\Http\Controllers;

use App\Models\chuc_vu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use DB;

class NhanVienController extends Controller
{
    public function getDanhSach(){
        $nhanvien = DB::table('quan_tri')->join('chuc_vu','quan_tri.chuc_vu_id','=','chuc_vu.id')
            ->select('quan_tri.id as id','hoten', 'sodth','email','diachi','ngay_vao_lam','chuc_vu.CV_ten')
            ->where('trang_thai','=',1)->paginate(5);
        return view('admin.nhanvien.danhsach',compact('nhanvien'));
    }
    public  function getThem(){
        $chucvu = chuc_vu::all();
        return view('admin.nhanvien.them',compact('chucvu'));
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
                'email'     => 'bail|required|unique:quan_tri,email|min:5|max:50',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
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
                'email.required'    => 'Bạn chưa nhập Email khách hàng',
                'email.unique'      => 'Emai nhân viên đã tồn tại',
                'email.min'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'email.max'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
            ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('quan_tri')->insert(
            [
                'password' => Hash::make($request->pass),
                'hoten' => $request->ten,
                'diachi' => $request->diachi,
                'sodth' => $request->sodth,
                'gioitinh' => $request->gtinh,
                'ngaysinh' => Carbon::createFromFormat(config('app.date_format'), $request->nsinh)->format('Y-m-d'),
                'email' => $request->email,
                'chuc_vu_id'=>$request->chuc_vu_id,
                'ngay_vao_lam'=>Carbon::createFromFormat(config('app.date_format'), $request->date)->format('Y-m-d'),
                'cccd'=>$request->cccd,
                'trang_thai'=>$request->trangthai,
                'hinhanh'=>$name,
                'created_at' => Carbon :: now ()
            ]
        );
        if($request->chuc_vu_id == 2) {
            DB::table('nhan_vien_nhap_kho')->insert(
                [
                    'password' => Hash::make($request->pass),
                    'hoten' => $request->ten,
                    'diachi' => $request->diachi,
                    'sodth' => $request->sodth,
                    'gioitinh' => $request->gtinh,
                    'ngaysinh' => Carbon::createFromFormat(config('app.date_format'), $request->nsinh)->format('Y-m-d'),
                    'email' => $request->email,
                    'chuc_vu_id'=>$request->chuc_vu_id,
                    'ngay_vao_lam'=>Carbon::createFromFormat(config('app.date_format'), $request->date)->format('Y-m-d'),
                    'cccd'=>$request->cccd,
                    'trang_thai'=>$request->trangthai,
                    'hinhanh'=>$name,
                    'created_at' => Carbon :: now ()
                ]
            );
        }
        if($request->chuc_vu_id == 3) {
            DB::table('nhan_vien_ban_hang')->insert(
                [
                    'password' => Hash::make($request->pass),
                    'hoten' => $request->ten,
                    'diachi' => $request->diachi,
                    'sodth' => $request->sodth,
                    'gioitinh' => $request->gtinh,
                    'ngaysinh' => Carbon::createFromFormat(config('app.date_format'), $request->nsinh)->format('Y-m-d'),
                    'email' => $request->email,
                    'chuc_vu_id'=>$request->chuc_vu_id,
                    'ngay_vao_lam'=>Carbon::createFromFormat(config('app.date_format'), $request->date)->format('Y-m-d'),
                    'cccd'=>$request->cccd,
                    'trang_thai'=>$request->trangthai,
                    'hinhanh'=>$name,
                    'created_at' => Carbon :: now ()
                ]
            );
        }

        return redirect('admin/nhanvien/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($id){
        $nhanvien = DB::table('quan_tri')->select('*')->where('id', '=', $id)->first();
        $chucvu = chuc_vu::all();
//        dd($id, $nhanvien);
        return view('admin.nhanvien.sua',compact('chucvu','nhanvien'));
    }

    public  function postSua(Request $request, $id){
        $this->validate($request,
            [
                'ten'   => 'bail|required|min:5|max:50',
                'diachi'=> 'bail|required|min:5|max:255',
                'sodth' => 'bail|required|min:10|max:10',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png'
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
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
            ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('quan_tri')->select('*')->where('id','=',$id)->update([
            'hoten' => $request->ten,
            'diachi' => $request->diachi,
            'sodth' => $request->sodth,
            'gioitinh' => $request->gtinh,
            'ngaysinh' => Carbon::createFromFormat(config('app.date_format'), $request->nsinh)->format('Y-m-d'),
            'chuc_vu_id'=>$request->chuc_vu_id,
            'ngay_vao_lam'=>Carbon::createFromFormat(config('app.date_format'), $request->date)->format('Y-m-d'),
            'cccd'=>$request->cccd,
            'hinhanh'=>$name,
            'updated_at'=>Carbon :: now ()
        ]);

        if($request->chuc_vu_id == 2){
            DB::table('nhan_vien_nhap_kho')->select('*')->where('id','=',$id)->update([
                'hoten' => $request->ten,
                'diachi' => $request->diachi,
                'sodth' => $request->sodth,
                'gioitinh' => $request->gtinh,
                'ngaysinh' => Carbon::createFromFormat(config('app.date_format'), $request->nsinh)->format('Y-m-d'),
                'chuc_vu_id'=>$request->chuc_vu_id,
                'ngay_vao_lam'=>Carbon::createFromFormat(config('app.date_format'), $request->date)->format('Y-m-d'),
                'cccd'=>$request->cccd,
                'hinhanh'=>$name,
                'updated_at'=>Carbon :: now ()
            ]);
        }

        if($request->chuc_vu_id == 3){
            DB::table('nhan_vien_ban_hang')->select('*')->where('id','=',$id)->update([
                  'hoten' => $request->ten,
                  'diachi' => $request->diachi,
                  'sodth' => $request->sodth,
                  'gioitinh' => $request->gtinh,
                  'ngaysinh' => Carbon::createFromFormat(config('app.date_format'), $request->nsinh)->format('Y-m-d'),
                  'chuc_vu_id'=>$request->chuc_vu_id,
                  'ngay_vao_lam'=>Carbon::createFromFormat(config('app.date_format'), $request->date)->format('Y-m-d'),
                  'cccd'=>$request->cccd,
                  'hinhanh'=>$name,
                  'updated_at'=>Carbon :: now ()
              ]);
        }
        return redirect('admin/nhanvien/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public  function postXoa($id){
        DB::table('quan_tri')->where('id','=',$id)->update(['trang_thai'=>0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
