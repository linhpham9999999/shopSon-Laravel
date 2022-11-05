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
        $khuyenmai = DB::table('khuyen_mai')->select('*')->orderBy('khuyen_mai.id','desc')->paginate(5);
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
                'info'      => 'bail|required|min:10',
                'gia_yc'    => 'bail|required|numeric|min:1',
                'ngaybd'    => 'bail|required|after:yesterday',
                'ngaykt'    => 'bail|required|after_or_equal:ngaybd|after:yesterday'
            ],
            [
                'maKM.required'           => 'Bạn chưa nhập Mã khuyến mãi',
                'maKM.unique'             => 'Mã khuyến mãi đã tồn tại',
                'maKM.min'                => 'Mã khuyến mãi phải có độ dài ít nhất 5 ký tự',
                'phantram.required'       => 'Bạn chưa nhập phần trăm khuyến mãi',
                'phantram.numeric'        => 'Phần trăm khuyến mãi phải là 1 số',
                'phantram.min'            => 'Phần trăm khuyến mãi phải lớn hơn 1',
                'info.required'           => 'Bạn chưa nhập nội dung khuyến mãi',
                'info.min'                => 'Nội dung khuyến mãi phải có độ dài từ 10 ký tự',
                'gia_yc.required'         => 'Bạn chưa nhập giá yêu cầu',
                'gia_yc.numeric'          => 'Giá yêu cầu phải là một số ',
                'gia_yc.min'              => 'Giá yêu cầu không hợp lệ',
                'ngaybd.required'         =>'Bạn chưa nhập ngày bắt đầu',
                'ngaybd.after'            =>'Ngày bắt đầu phải từ ngày hiện tại',
                'ngaykt.required'         =>'Bạn chưa nhập ngày kết thúc',
                'ngaykt.after_or_equal'   =>'Ngày kết thúc phải >= ngày bắt đầu',
                'ngaykt.after'            =>'Ngày kết thúc ít nhất là ngày hiện tại',
            ]
        );
        DB::table('khuyen_mai')->insert(
            [
                'Ma_KM' => $request->maKM,
                'phan_tram' => $request->phantram,
                'ngay_bat_dau' => $request->ngaybd,
                'ngay_ket_thuc' =>$request->ngaykt,
                'thong_tin' => $request->info,
                'gia_yeu_cau' => $request->gia_yc,
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
                'maKM'      => 'bail|required|unique:khuyen_mai,Ma_KM|min:5',
                'phantram'  => 'bail|required|numeric|min:1',
                'info'      => 'bail|required|min:10',
                'gia_yc'    => 'bail|required|numeric|min:1',
                'ngaybd'    => 'bail|required|after:yesterday',
                'ngaykt'    => 'bail|required|after_or_equal:ngaybd|after:yesterday'
            ],
            [
                'maKM.required'           => 'Bạn chưa nhập Mã khuyến mãi',
                'maKM.unique'             => 'Mã khuyến mãi đã tồn tại',
                'maKM.min'                => 'Mã khuyến mãi phải có độ dài ít nhất 5 ký tự',
                'phantram.required'       => 'Bạn chưa nhập phần trăm khuyến mãi',
                'phantram.numeric'        => 'Phần trăm khuyến mãi phải là 1 số',
                'phantram.min'            => 'Phần trăm khuyến mãi phải lớn hơn 1',
                'info.required'           => 'Bạn chưa nhập nội dung khuyến mãi',
                'info.min'                => 'Nội dung khuyến mãi phải có độ dài từ 10 ký tự',
                'gia_yc.required'         => 'Bạn chưa nhập giá yêu cầu',
                'gia_yc.numeric'          => 'Giá yêu cầu phải là một số ',
                'gia_yc.min'              => 'Giá yêu cầu không hợp lệ',
                'ngaybd.required'         =>'Bạn chưa nhập ngày bắt đầu',
                'ngaybd.after'            =>'Ngày bắt đầu phải từ ngày hiện tại',
                'ngaykt.required'         =>'Bạn chưa nhập ngày kết thúc',
                'ngaykt.after_or_equal'   =>'Ngày kết thúc phải >= ngày bắt đầu',
                'ngaykt.after'            =>'Ngày kết thúc ít nhất là ngày hiện tại',
            ]
        );
        DB::table('khuyen_mai')->select('*')->where('id', '=', $id)->update(
            [
                'Ma_KM' => $request->maKM,
                'phan_tram' => $request->phantram,
                'ngay_bat_dau' => $request->ngaybd,
                'ngay_ket_thuc' =>  $request->ngaykt,
                'thong_tin' => $request->info,
                'gia_yeu_cau' => $request->gia_yc,
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
