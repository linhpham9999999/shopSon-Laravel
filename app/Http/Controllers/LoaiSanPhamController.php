<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\loai_san_pham;

use DB;

class LoaiSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $loaisp = loai_san_pham::all();
        return view('admin.loaisp.danhsach', ['loaisanpham' => $loaisp]);
    }

    public function getThem()
    {
        return view('admin.loaisp.them');
    }

    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
                'id'                => 'bail|required|unique:loai_san_pham,Ma_LSP|min:3|max:8',
                'ten'               => 'bail|unique:loai_san_pham,ten_LSP|required|min:5|max:50'
            ],
            [
                'id.required'       => 'Bạn chưa nhập Mã loại sản phẩm',
                'id.unique'         => 'Mã loại sản phẩm đã tồn tại',
                'id.min'            => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'id.max'            => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'ten.required'      => 'Bạn chưa nhập Tên loại sản phẩm',
                'ten.unique'        => 'Tên loại sản phẩm đã tồn tại',
                'ten.min'           => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'ten.max'           => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự'
            ]
        );
        $loaisp = new loai_san_pham;
        $loaisp->Ma_LSP = $request->id;
        $loaisp->ten_LSP = $request->ten;
        $loaisp->save();

        return redirect('admin/loaisp/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $loaisp = DB::table('loai_san_pham')->select('*')->where('id', '=', $id)->first();
        return view('admin.loaisp.sua', compact('loaisp'));
    }

    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'Ma_LSP'            => 'bail|required|min:3|max:8',
                'ten'           => 'bail|required|min:5|max:50'
            ],
            [
                'Ma_LSP.required'    => 'Bạn chưa nhập Mã loại sản phẩm',
                'Ma_LSP.min'         => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'Ma_LSP.max'         => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
                'ten.required'   => 'Bạn chưa nhập Tên loại sản phẩm',
                'ten.min'        => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự',
                'ten.max'        => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự'
            ]
        );
        DB::table('loai_san_pham')->select('*')->where('id', '=', $id)
            ->update(
                [
                    'Ma_LSP' => $request->Ma_LSP,
                    'ten_LSP' => $request->ten
                ]
            );

        return redirect('admin/loaisp/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $lsp = DB::table('loai_san_pham')->select('*')->where('id', '=', $id);
        $lsp->delete();

        return redirect('admin/loaisp/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
