<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\don_gia_san_pham;

use DB;

class DonGiaSpController extends Controller
{
    public function getDanhSach(){
        $dgsp = don_gia_san_pham::all();
        return view('admin.dongiasp.danhsach',['dongiasp'=>$dgsp]);
    }
    public  function getThem(){
        return view('admin.dongiasp.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'id' => 'bail|required|unique:don_gia_san_pham,Ma_DGSP|min:3|max:8',
                'gia' => 'bail|required|min:5|max:50',
                'tgian' => 'bail|required|date_format:Y-m-d'
            ],
            [
                'id.required' => 'Bạn chưa nhập Mã đơn giá sản phẩm',
                'id.unique' => 'Mã đơn giá sản phẩm đã tồn tại',
                'id.min' => 'Mã đơn giá sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'id.max' => 'Mã đơn giá sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'gia.required' => 'Bạn chưa nhập Giá sản phẩm',
                'gia.min' => 'Giá sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'gia.max' => 'Giá sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'tgian.required' => 'Bạn chưa nhập Thời gian bán sản phẩm',
                'tgian.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày'
            ]);
        $dongia = new don_gia_san_pham;
        $dongia->Ma_DGSP = $request->id;
        $dongia->thoigianbansanpham = $request->tgian;
        $dongia->dongia = $request->gia;
        $dongia->save();
        //chuyển hướng
        return redirect('admin/dongiasp/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($Ma_DGSP){
        $dongia = DB::table('don_gia_san_pham')->select('*')->where('Ma_DGSP','=',$Ma_DGSP)->first();
        return view('admin.dongiasp.sua',compact('dongia'));
    }

    public  function postSua(Request $request, $Ma_DGSP){

        $this->validate($request,
            [
                'gia' => 'bail|required|min:5|max:50',
                'tgian' => 'bail|required|date_format:Y-m-d'
            ],
            [
                'gia.required' => 'Bạn chưa nhập Giá sản phẩm',
                'gia.min' => 'Giá sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'gia.max' => 'Giá sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'tgian.required' => 'Bạn chưa nhập Thời gian bán sản phẩm',
                'tgian.date_format' => 'Thời gian phải có định dạng Năm-Tháng-Ngày'
            ]);
        $dongia = DB::table('don_gia_san_pham')->select('*')->where('Ma_DGSP','=',$Ma_DGSP)->update(['dongia'=>$request->gia]);
        $dongia = DB::table('don_gia_san_pham')->select('*')->where('Ma_DGSP','=',$Ma_DGSP)->update(['thoigianbansanpham'=>$request->tgian]);

        return redirect('admin/dongiasp/sua/'.$Ma_DGSP)->with('thongbao','Sửa thành công');
    }
    public  function getXoa($Ma_DGSP){
        $npp = DB::table('don_gia_san_pham')->select('*')->where('Ma_DGSP','=',$Ma_DGSP);
        $npp->delete();

        return redirect('admin/dongiasp/danhsach')->with('thongbao','Xóa thành công');
    }
}
