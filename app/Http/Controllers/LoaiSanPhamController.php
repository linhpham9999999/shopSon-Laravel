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
        $loaisp = DB::table('loai_san_pham')->where('trang_thai','=',1)->paginate(5);
        return view('admin.loaisp.danhsach',compact('loaisp'));
    }

    public function getThem()
    {
        return view('admin.loaisp.them');
    }

    public function postThem(Request $request)
    {
        $loaisp = new loai_san_pham;
        $loaisp->Ma_LSP = $request->idLSP;
        $loaisp->ten_LSP = $request->tenLSP;
        $loaisp->trang_thai = $request->trangthai;
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
        $id = $request->id;
        DB::table('loai_san_pham')->where(['id' => $id])->update([
                                                                     'Ma_LSP' => $request->idLSP,
                                                                     'ten_LSP' => $request->tenLSP
                                                                 ]);
        return response()->json(['message'=>'Cập nhật thành công'],200);
    }

    public function postXoa($id)
    {
        DB::table('loai_san_pham')->where('id','=',$id)->update(['trang_thai' => 0]);
        DB::table('san_pham')->where('id_LSP','=',$id)->update(['trang_thai' => 0]);
        DB::table('mau_san_pham')->where('id_LSP','=',$id)->update(['trang_thai' => 0]);
        return response()->json([
                                    'message' => 'Data deleted successfully!'
                                ]);
    }
}
