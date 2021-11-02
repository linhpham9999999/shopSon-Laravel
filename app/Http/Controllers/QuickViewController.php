<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\san_pham;
use App\Models\mau_san_pham;
use Illuminate\Http\Request;


use DB;

class QuickViewController extends Controller{

    public function quickView(Request $request){
        $product_id = $request->product_id;
        $product = san_pham::find($product_id);

        $output['product_image'] = '<p><img width="100%" src="admin_asset/image_son/'.$product->hinhanhgoc.'" ></p>';
        $output['product_name'] = 'SON '.$product->ten_SP;
        $output['product_price'] = number_format($product->giagoc-$product->giamgia,0,',','.').'VND';
        $output['product_slton'] = $product->soluongton.' thỏi';
        $output['product_trluong'] = $product->trongluong.'g';
        $output['product_xuatxu'] = $product->xuatxu;
        $output['product_hsd'] = $product->hansudung_thang.' tháng';
        $output['product_content'] = $product->gioithieu;
        echo json_encode($output);
    }

    public function quickViewColor(Request $request)
    {
        $product_id = $request->color_product_id; // MÃ MÀU SẢN PHẨM
        $product = mau_san_pham::find($product_id);

        $output['product_imageson'] = '<p><img width="100%" src="admin_asset/image_son/mau_san_pham/'.$product->hinhanh.'" ></p>';
        $output['product_mamau'] = 'MÃ '.$product->Ma_MSP;
        $output['product_tenmau'] = $product->mau;
        $output['product_ynghia'] = $product->thongTinMau;
        echo json_encode($output);
    }
}
