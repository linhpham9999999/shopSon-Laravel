<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\hinh_anh;
use App\Models\san_pham;
use App\Models\mau_san_pham;
use App\Models\don_gia_san_pham;

use DB;

class HinhAnhController extends Controller
{
    public function getDanhSach(){
        $hinhanh = DB::table('hinh_anh')->join('san_pham','hinh_anh.Ma_SP','=','san_pham.Ma_SP')->get();
        return view('admin.hinhanh.danhsach',compact('hinhanh',));
    }
    public  function getThem(){
        $mausp = DB::table('mau_san_pham')->select('Ma_MSP','ten_MSP')->get();
        $sanpham = DB::table('san_pham')->select('Ma_SP','ten_SP','giagoc')->get();
        $dongiasp = DB::table('don_gia_san_pham')->select('*')->get();
        return view('admin.hinhanh.them', compact('mausp','sanpham','dongiasp'));
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'idHA' => 'bail|required|unique:hinh_anh,Ma_HA|min:3|max:8',
                'hinhanh' => 'bail|required'
            ],
            [
                'idHA.required' => 'Bạn chưa nhập Mã hình ảnh sản phẩm',
                'idHA.unique' => 'Mã hình ảnh sản phẩm đã tồn tại',
                'idHA.min' => 'Mã hình ảnh phải có độ dài từ 3 đến 8 ký tự',
                'idHA.max' => 'Mã hình ảnh phải có độ dài từ 3 đến 8 ký tự',
                'hinhanh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm'
            ]);
        DB::table('hinh_anh')->insert([
            'Ma_SP' => $request->idSP,
            'Ma_MSP' => $request->idMSP,
            'Ma_DGSP' => $request->idDGSP,
            'Ma_HA' => $request->idHA,
            'hinhanh' => $request->hinhanh
        ]);
        return redirect('admin/hinhanh/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($Ma_HA){
        $hinhanh = DB::table('hinh_anh')->select('*')->where('Ma_HA','=',$Ma_HA)->first();
        $mausp = DB::table('mau_san_pham')->select('Ma_MSP','ten_MSP')->get();
        $sanpham = DB::table('san_pham')->select('ten_SP')->get();
        $dongiasp = DB::table('don_gia_san_pham')->select('*')->get();
        return view('admin.sanpham.sua',compact('hinhanh','mausp','sanpham','dongiasp'));
    }

    public  function postSua(Request $request, $Ma_HA){
        $this->validate($request,
            [
                'hinhanh' => 'bail|required'
            ],
            [
                'hinhanh.required' => 'Bạn chưa chọn Hình ảnh của sản phẩm'
            ]);
        DB::table('hinh_anh')->select('*')->where('Ma_HA','=',$Ma_HA)->update(['Ma_SP' => $request->id ,
            'Ma_LSP' => $request->idSP,
            'Ma_MSP' => $request->idMSP,
            'Ma_DGSP' => $request->idDGSP,
            'hinhanhgoc' => $request->hinhanh
        ]);

        return redirect('admin/hinhanh/sua/'.$Ma_HA)->with('thongbao','Sửa thành công');
    }
    public  function getXoa($Ma_HA){
        $ha = DB::table('hinh_anh')->select('*')->where('Ma_HA','=',$Ma_HA);
        $ha->delete();

        return redirect('admin/hinhanh/danhsach')->with('thongbao','Xóa thành công');
    }
}
