<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchColorProductController extends Controller
{
    // tìm kiếm theo mã, tên màu sản phẩm
    public function search(Request $request){
        $product_color = $request->product_color_input;
        $data = DB::table('mau_san_pham')->join('loai_san_pham','mau_san_pham.id_LSP','=','loai_san_pham.id')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','mau_san_pham.id as id', 'loai_san_pham.ten_LSP as ten_LSP',
                     'san_pham.ten_SP as ten_SP')
            ->where([['mau_san_pham.trang_thai', '=', 1],['san_pham.trang_thai','=',1],['loai_san_pham.trang_thai','=',1]])
            ->orderBy('mau_san_pham.id','desc')
            ->where('mau_san_pham.Ma_MSP','like','%'.$product_color.'%')
            ->orWhere('mau_san_pham.mau','like','%'.$product_color.'%')
            ->paginate(5);
        return view('admin.mausp.danhsach',compact('data'));
    }
}
