<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Carbon;

use function Sodium\compare;

class KhuyenMaiController extends Controller
{
    public function getDanhSach()
    {
        $khuyenmai = DB::table('khuyen_mai')->select('*')->paginate(5);
        return view('admin.khuyenmai.danhsach', compact('khuyenmai' ));
    }

    public function getThem()
    {
        return view('admin.khuyenmai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'maKM'      => 'bail|required|unique:khuyen_mai,Ma_KM|min:5',
                'phantram'  => 'bail|required|numeric|min:1',
                'ngaybd'    => 'bail|required',
                'ngaykt'    => 'bail|required',
                'info'      => 'bail|required|min:10'
            ],
            [
                'maKM.required'           => 'Bạn chưa nhập Mã khuyến mãi',
                'maKM.unique'             => 'Mã khuyến mãi đã tồn tại',
                'maKM.min'                => 'Mã khuyến mãi phải có độ dài ít nhất 5 ký tự',
                'phantram.required'       => 'Bạn chưa nhập phần trăm khuyến mãi',
                'phantram.numeric'        => 'Phần trăm khuyến mãi phải là 1 số',
                'phantram.min'            => 'Phần trăm khuyến mãi phải lớn hơn 1',
                'ngaybd.min'              => 'Bạn chưa nhập ngày bắt đầu',
                'ngaykt.max'              => 'Bạn chưa nhập ngày kết thúc',
                'info.required'           => 'Bạn chưa nhập nội dung khuyến mãi',
                'info.min'                => 'Nội dung khuyến mãi phải có độ dài từ 10 ký tự'
            ]
        );
        DB::table('khuyen_mai')->insert(
            [
                'Ma_KM' => $request->maKM,
                'phan_tram' => $request->phantram,
                'ngay_bat_dau' => Carbon::createFromFormat(config('app.date_format'), $request->ngaybd)->format('Y-m-d'),
                'ngay_ket_thuc' => Carbon::createFromFormat(config('app.date_format'), $request->ngaykt)->format('Y-m-d'),
                'thong_tin' => $request->info,
                'created_at'=> Carbon::now()
            ]
        );
        return redirect('admin/khuyenmai/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $khuyenmai = DB::table('khuyen_mai')->select('*')
            ->where('id', '=', $id)
            ->first();
        return view('admin.khuyenmai.sua', compact('khuyenmai'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'maKM' => 'bail|required|unique:khuyen_mai,Ma_KM|min:5',
                'phantram' => 'bail|required|numeric|min:1',
                'ngaybd' => 'bail|required',
                'ngaykt' => 'bail|required',
                'info' => 'bail|required|min:10'
            ],
            [
                'maKM.required' => 'Bạn chưa nhập Mã khuyến mãi',
                'maKM.unique' => 'Mã khuyến mãi đã tồn tại',
                'maKM.min' => 'Mã khuyến mãi phải có độ dài ít nhất 5 ký tự',
                'phantram.required' => 'Bạn chưa nhập phần trăm khuyến mãi',
                'phantram.numeric' => 'Phần trăm khuyến mãi phải là 1 số',
                'phantram.min' => 'Phần trăm khuyến mãi phải lớn hơn 1',
                'ngaybd.min' => 'Bạn chưa nhập ngày bắt đầu',
                'ngaykt.max' => 'Bạn chưa nhập ngày kết thúc',
                'info.required' => 'Bạn chưa nhập nội dung khuyến mãi',
                'info.min' => 'Nội dung khuyến mãi phải có độ dài từ 10 ký tự'
            ]
        );
        DB::table('khuyen_mai')->select('*')->where('id', '=', $id)->update(
            [
                'Ma_KM' => $request->maKM,
                'phan_tram' => $request->phantram,
                'ngay_bat_dau' => Carbon::createFromFormat(config('app.date_format'), $request->ngaybd)->format('Y-m-d'),
                'ngay_ket_thuc' => Carbon::createFromFormat(config('app.date_format'), $request->ngaykt)->format('Y-m-d'),
                'thong_tin' => $request->info,
                'updated_at'=> Carbon::now()
            ]
        );
        return redirect('admin/khuyenmai/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    // KH xem thông báo khuyến mãi
    public function getData(){
        $current = Carbon::now()->toDateString();
        $data = DB::table('khuyen_mai')->select('*')
            ->where([['ngay_bat_dau','<=',$current],['ngay_ket_thuc','>=',$current]])->get()->toArray();
        return view('khach_hang/khuyenmai/danhsach',compact('data'));
    }

}
