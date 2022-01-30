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
        $loaisp = DB::table('loai_san_pham')->paginate(5);
        return view('admin.loaisp.danhsach',compact('loaisp'));
    }

    public function getThem()
    {
        return view('admin.loaisp.them');
    }

    public function postThem(Request $request)
    {
//        $this->validate(
//            $request,
//            [
//                'id'                => 'bail|required|unique:loai_san_pham,Ma_LSP|min:3|max:8',
//                'ten'               => 'bail|unique:loai_san_pham,ten_LSP|required|min:5|max:50'
//            ],
//            [
//                'id.required'       => 'Bạn chưa nhập Mã loại sản phẩm',
//                'id.unique'         => 'Mã loại sản phẩm đã tồn tại',
//                'id.min'            => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
//                'id.max'            => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
//                'ten.required'      => 'Bạn chưa nhập Tên loại sản phẩm',
//                'ten.unique'        => 'Tên loại sản phẩm đã tồn tại',
//                'ten.min'           => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự',
//                'ten.max'           => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự'
//            ]
//        );

        $loaisp = new loai_san_pham;
        $loaisp->Ma_LSP = $request->idLSP;
        $loaisp->ten_LSP = $request->tenLSP;
        $loaisp->save();
        return response()->json([
                                    'message'=>'Thêm thành công'
                                ],200);
    }

    public function getSua($id)
    {
        $loaisp = loai_san_pham::find($id);
        return response()->json($loaisp);
    }

    public function postSua(Request $request)
    {
//        $this->validate(
//            $request,
//            [
//                'Ma_LSP'        => 'bail|required|unique:loai_san_pham,Ma_LSP|min:3|max:8',
//                'ten'           => 'bail|required|min:5|max:50'
//            ],
//            [
//                'Ma_LSP.required'   => 'Bạn chưa nhập Mã loại sản phẩm',
//                'Ma_LSP.unique'     => 'Mã loại sản phẩm đã tồn tại',
//                'Ma_LSP.min'        => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
//                'Ma_LSP.max'        => 'Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự',
//                'ten.required'      => 'Bạn chưa nhập Tên loại sản phẩm',
//                'ten.min'           => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự',
//                'ten.max'           => 'Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự'
//            ]
//        );
        $id = $request->id;
        DB::table('loai_san_pham')->where(['id' => $id])->update([
                                            'Ma_LSP' => $request->idLSP,
                                            'ten_LSP' => $request->tenLSP
                                            ]);
        return response()->json(['message'=>'Cập nhật thành công'],200);
    }

    public function postXoa($id)
    {
        DB::table('loai_san_pham')->where('id','=',$id)->delete();
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
