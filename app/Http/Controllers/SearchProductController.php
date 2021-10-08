<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchProductController extends Controller
{
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $product = DB::table('san_pham')->where('ten_SP','like','%'.$keywords.'%')->get();
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->get();

        return view('khach_hang.shop.search',compact('product','loaisp'));
    }
}
