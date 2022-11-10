<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchColorProductController extends Controller
{
    // tìm kiếm theo mã, tên màu sản phẩm searchBanHang
    public function search(Request $request){
        $output="";
        $product_color = $request->product_color_input;
        $data = DB::table('mau_san_pham')->join('loai_san_pham','mau_san_pham.id_LSP','=','loai_san_pham.id')
            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau_san_pham.*','mau_san_pham.id as id', 'loai_san_pham.ten_LSP as ten_LSP',
                     'san_pham.ten_SP as ten_SP')
            ->where([['mau_san_pham.Ma_MSP','like','%'.$product_color.'%'],['mau_san_pham.trang_thai', '=', 1]])
            ->orWhere([['mau_san_pham.mau','like','%'.$product_color.'%'],['mau_san_pham.trang_thai', '=', 1]])
            ->orderBy('mau_san_pham.id','desc')
            ->paginate(5);
        foreach ($data as $dt){
            $output.=
                '<tr class="nk-tb-item">
                    <td class="nk-tb-col tb-col-md" style="text-align: center"><span># '.$dt->Ma_MSP.' </span></td>
                    <td class="nk-tb-col tb-col-lg"><span> '.$dt->mau.' </span></td>
                    <td class="nk-tb-col tb-col-md">'.'<img src="admin_asset/image_son/mau_san_pham/'.$dt->hinhanh.'" width="50px" height="50px"/>'.'</td>
                    <td class="nk-tb-col tb-col-md"><span> '.$dt->soluongton.' </span></td>
                    <td class="nk-tb-col tb-col-mb"><span> '.$dt->ten_SP.' </span></td>
                    <td class="nk-tb-col tb-col-mb"><span>'.$dt->ten_LSP.'</span></td>
                    <td class="nk-tb-col tb-col-mb">'.'
                     <button class="btn btn-sm  js-delete-mausanpham" data-id="'.$dt->id.'">
                                            '.'<img src="admin_asset/delete.png" width="30px" />'.'
                                        </button>
                    '.'</td>
                    <td class="nk-tb-col tb-col-mb">'.'
                    <a href="admin/mausp/sua/'.$dt->id.'">'.'<img src="admin_asset/edit.png" width="30px"/>'.'
                    </a>
                    '.'</td>
                </tr>';
        }
        return($output);
    }
}
