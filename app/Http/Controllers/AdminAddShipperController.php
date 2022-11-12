<?php

namespace App\Http\Controllers;

use App\Models\chuc_vu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use DB;

class AdminAddShipperController extends Controller
{
    public function getDanhSach(){
        $shipper = DB::table('nguoi_giao_hang')
            ->select('hoten','email','diachi','sodth','nguoi_giao_hang.id as id','ngay_vao_lam')
            ->where('trang_thai','=',1)->paginate(5);
        return view('admin.shipper.danhsach',compact('shipper'));
    }
    public  function getThem(){
        return view('admin.shipper.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'pass'      =>'bail|required|min:8|max:255',
                'pass2'     =>'bail|required|same:pass',
                'ten'       => 'bail|required|min:5|max:50',
                'diachi'    => 'bail|required|min:5|max:255',
                'sodth'     => 'bail|required|min:10|max:10',
                'email'     => 'bail|required|unique:quan_tri,email|min:5|max:50',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'nsinh'     => 'bail|required|before:today',
                'date'      => 'bail|required|after:nsinh',
                'cccd'      => 'bail|required|min:10|max:50',
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
                'email.required'    => 'Bạn chưa nhập Email khách hàng',
                'email.unique'      => 'Emai nhân viên đã tồn tại',
                'email.min'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'email.max'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                'hinh_anh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                'nsinh.required'       =>'Bạn chưa nhập ngày sinh',
                'nsinh.before'       =>'Ngày sinh không hợp lệ',
                'date.required'       =>'Bạn chưa nhập ngày vào làm',
                'date.after'        =>'Ngày vào làm > ngày sinh',
                'cccd.required'   => 'CCCD là bắt buộc',
                'cccd.min'        => 'CCCD không hợp lệ',
                'cccd.max'        => 'CCCD không hợp lệ',
            ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_giao_hang')->insert(
            [
                'password' => Hash::make($request->pass),
                'hoten' => $request->ten,
                'diachi' => $request->diachi,
                'sodth' => $request->sodth,
                'gioitinh' => $request->gtinh,
                'ngay_sinh' => $request->nsinh,
                'email' => $request->email,
                'ngay_vao_lam'=>$request->date,
                'cccd'=>$request->cccd,
                'trang_thai'=>$request->trangthai,
                'hinhanh'=>$name,
                'created_at' => Carbon :: now ()
            ]
        );
        return redirect('admin/shipper/them')->with('thongbao','Thêm thành công');
    }
    public  function getSua($id){
        $shipper = DB::table('nguoi_giao_hang')->select('*')->where('id', '=', $id)->first();
        return view('admin.shipper.sua',compact('shipper'));
    }

    public  function postSua(Request $request, $id){
        $this->validate($request,
            [
                'ten'   => 'bail|required|min:5|max:50',
                'diachi'=> 'bail|required|min:5|max:255',
                'sodth' => 'bail|required|min:10|max:10',
                'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                'nsinh'     => 'bail|required|before:today',
                'date'      => 'bail|required|after:nsinh',
                'cccd'      => 'bail|required|min:10|max:50',
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
                'nsinh.required'       =>'Bạn chưa nhập ngày sinh',
                'nsinh.before'       =>'Ngày sinh không hợp lệ',
                'date.required'       =>'Bạn chưa nhập ngày vào làm',
                'date.after'        =>'Ngày vào làm > ngày sinh',
                'cccd.required'   => 'CCCD là bắt buộc',
                'cccd.min'        => 'CCCD không hợp lệ',
                'cccd.max'        => 'CCCD không hợp lệ',
            ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_giao_hang')->select('*')->where('id','=',$id)
            ->update([
                    'hoten' => $request->ten,
                    'diachi' => $request->diachi,
                    'sodth' => $request->sodth,
                    'gioitinh' => $request->gtinh,
                    'ngay_sinh' => $request->nsinh,
                    'ngay_vao_lam'=>$request->date,
                    'cccd'=>$request->cccd,
                    'hinhanh'=>$name,
                    'updated_at'=>Carbon :: now ()
                ]);
        return redirect('admin/shipper/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function postXoa($id)
    {
        DB::table('nguoi_giao_hang')->where('id','=',$id)->update(['trang_thai'=>0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }

    //Nhân viên Bán hàng
    public function getDanhSachBanHang(){
        $shipper = DB::table('nguoi_giao_hang')
            ->select('hoten','email','diachi','sodth','nguoi_giao_hang.id as id','ngay_vao_lam')
            ->where('trang_thai','=',1)->paginate(5);
        return view('admin.shipper-nv.danhsach',compact('shipper'));
    }
    public  function getThemBanHang(){
        return view('admin.shipper-nv.them');
    }
    public  function postThemBanHang(Request  $request){
        $this->validate($request,
                        [
                            'pass'      =>'bail|required|min:8|max:255',
                            'pass2'     =>'bail|required|same:pass',
                            'ten'       => 'bail|required|min:5|max:50',
                            'diachi'    => 'bail|required|min:5|max:255',
                            'sodth'     => 'bail|required|min:10|max:10',
                            'email'     => 'bail|required|unique:quan_tri,email|min:5|max:50',
                            'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                            'nsinh'     => 'bail|required|before:today',
                            'date'      => 'bail|required|after:nsinh',
                            'cccd'      => 'bail|required|min:10|max:50',
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
                            'email.required'    => 'Bạn chưa nhập Email khách hàng',
                            'email.unique'      => 'Emai nhân viên đã tồn tại',
                            'email.min'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                            'email.max'         => 'Email nhân viên phải có độ dài từ 5 đến 50 ký tự',
                            'hinh_anh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm',
                            'hinh_anh.mimes'    => 'File chọn phải là file hình ảnh (*.jpg, *png)',
                            'nsinh.required'       =>'Bạn chưa nhập ngày sinh',
                            'nsinh.before'       =>'Ngày sinh không hợp lệ',
                            'date.required'       =>'Bạn chưa nhập ngày vào làm',
                            'date.after'        =>'Ngày vào làm > ngày sinh',
                            'cccd.required'   => 'CCCD là bắt buộc',
                            'cccd.min'        => 'CCCD không hợp lệ',
                            'cccd.max'        => 'CCCD không hợp lệ',
                        ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_giao_hang')->insert(
            [
                'password' => Hash::make($request->pass),
                'hoten' => $request->ten,
                'diachi' => $request->diachi,
                'sodth' => $request->sodth,
                'gioitinh' => $request->gtinh,
                'ngay_sinh' => $request->nsinh,
                'email' => $request->email,
                'ngay_vao_lam'=>$request->date,
                'cccd'=>$request->cccd,
                'trang_thai'=>$request->trangthai,
                'hinhanh'=>$name,
                'created_at' => Carbon :: now ()
            ]
        );
        return redirect('admin/shipper-nv/them')->with('thongbao','Thêm thành công');
    }
    public  function getSuaBanHang($id){
        $shipper = DB::table('nguoi_giao_hang')->select('*')->where('id', '=', $id)->first();
        return view('admin.shipper-nv.sua',compact('shipper'));
    }

    public  function postSuaBanHang(Request $request, $id){
        $this->validate($request,
                        [
                            'ten'   => 'bail|required|min:5|max:50',
                            'diachi'=> 'bail|required|min:5|max:255',
                            'sodth' => 'bail|required|min:10|max:10',
                            'hinh_anh'  => 'bail|required|mimes:jpg,bmp,png',
                            'nsinh'     => 'bail|required|before:today',
                            'date'      => 'bail|required|after:nsinh',
                            'cccd'      => 'bail|required|min:10|max:50',
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
                            'nsinh.required'       =>'Bạn chưa nhập ngày sinh',
                            'nsinh.before'       =>'Ngày sinh không hợp lệ',
                            'date.required'       =>'Bạn chưa nhập ngày vào làm',
                            'date.after'        =>'Ngày vào làm > ngày sinh',
                            'cccd.required'   => 'CCCD là bắt buộc',
                            'cccd.min'        => 'CCCD không hợp lệ',
                            'cccd.max'        => 'CCCD không hợp lệ',
                        ]);
        if ($request->hasFile('hinh_anh')) {
            $tenfile = $request->hinh_anh;
            $name = $tenfile->getClientOriginalName();
            $tenfile->move('images', $name);
        }
        DB::table('nguoi_giao_hang')->select('*')->where('id','=',$id)
            ->update([
                         'hoten' => $request->ten,
                         'diachi' => $request->diachi,
                         'sodth' => $request->sodth,
                         'gioitinh' => $request->gtinh,
                         'ngay_sinh' => $request->nsinh,
                         'ngay_vao_lam'=>$request->date,
                         'cccd'=>$request->cccd,
                         'hinhanh'=>$name,
                         'updated_at'=>Carbon :: now ()
                     ]);
        return redirect('admin/shipper-nv/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function postXoaBanHang($id)
    {
        DB::table('nguoi_giao_hang')->where('id','=',$id)->update(['trang_thai'=>0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }

}
