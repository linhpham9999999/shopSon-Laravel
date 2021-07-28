<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\loai_san_pham;

use DB;

class LoaiSanPhamController extends Controller
{
    public function getDanhSach(){
        $loaisp = loai_san_pham::all();
        return view('admin.loaisp.danhsach',['loaisanpham'=>$loaisp]);
    }
    public  function getThem(){
        return view('admin.loaisp.them');
    }
    public  function postThem(Request  $request){
        $this->validate($request,
            [
                'id' => 'bail|required|unique:loai_san_pham,Ma_LSP|min:3|max:8',
                'ten' => 'bail|unique:loai_san_pham,ten_LSP|required|min:5|max:50'
            ],
            [
                'id.required' => 'Bạn chưa nhập Mã loại sản phẩm',
                'id.unique' => 'Mã loại sản phẩm đã tồn tại',
                'id.min' => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'id.max' => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'ten.required' => 'Bạn chưa nhập Tên loại sản phẩm',
                'ten.unique' => 'Tên loại sản phẩm đã tồn tại',
                'ten.min' => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'ten.max' => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự'
            ]);
        $loaisp = new loai_san_pham;
        $loaisp->Ma_LSP = $request->id;
        $loaisp->ten_LSP = $request->ten;
        $loaisp->save();

        return redirect('admin/loaisp/them')->with('thongbao','Thêm thành công');
    }

    public  function getSua($Ma_LSP){
        $loaisp = DB::table('loai_san_pham')->select('*')->where('Ma_LSP','=',$Ma_LSP)->first();
        return view('admin.loaisp.sua',compact('loaisp'));
    }

    public  function postSua(Request $request, $Ma_LSP){
        $this->validate($request,
            [
                'ten' => 'bail|unique:loai_san_pham,ten_LSP|required|min:5|max:50'
            ],
            [
                'ten.required' => 'Bạn chưa nhập Tên loại sản phẩm',
                'ten.unique' => 'Tên loại sản phẩm đã tồn tại',
                'ten.min' => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'ten.max' => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự'
            ]);
        $loaisp = DB::table('loai_san_pham')->select('*')->where('Ma_LSP','=',$Ma_LSP)->update(['ten_LSP'=>$request->ten]);

        return redirect('admin/loaisp/sua/'.$Ma_LSP)->with('thongbao','Sửa thành công');
    }
    public  function getXoa($Ma_LSP){
        $lsp = DB::table('loai_san_pham')->select('*')->where('Ma_LSP','=',$Ma_LSP);
        $lsp->delete();

        return redirect('admin/loaisp/danhsach')->with('thongbao','Xóa thành công');
    }
}
