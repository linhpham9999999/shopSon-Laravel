<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchProductController extends Controller
{
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $product = DB::table('san_pham')->where([['ten_SP','like','%'.$keywords.'%'],['trang_thai','=',1]])->get();
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();

        return view('khach_hang.shop.search',compact('product','loaisp'));
    }
    public function searchPrice(Request $request){
        $keywords = $request->price_submit;
        $product = DB::table('san_pham')->where([['gia_ban_ra','like','%'.$keywords.'%'],['trang_thai','=',1]])->get();
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();

        return view('khach_hang.shop.search-price',compact('product','loaisp'));
    }
}
