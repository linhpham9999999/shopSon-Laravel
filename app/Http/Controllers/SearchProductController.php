<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class SearchProductController extends Controller
{
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $sanpham = DB::table('san_pham')->select('*')
            ->where([['ten_SP','like','%'.$keywords.'%'],['trang_thai','=',1]])
            ->orWhere([['Ma_SP','like','%'.$keywords.'%'],['trang_thai','=',1]])
            ->simplePaginate(6);
        $loaisp = DB::table('loai_san_pham')->select('id','ten_LSP')->where('trang_thai','=',1)->get();
        $sanphamnew = DB::table('san_pham')->select('*')
            ->where('trang_thai','=',1)
            ->orderBy('id','desc')->take(3)->get();
        return view('khach_hang.shop.all-product',compact('loaisp','sanpham','sanphamnew'));
    }
    public function searchPrice(Request $request){

    }

    public function autocomplete(Request $request)
    {
        $data = $request->all();
        if($data['query']){
            $sanpham = DB::table('san_pham')->select('*')
                ->where([['ten_SP','like','%'.$data['query'].'%'],['trang_thai','=',1]])->get();
            $output='<ul class="dropdown-menu-md" style="display: block; position: relative">';
            foreach ($sanpham as $key => $val){
                $output .='
                <li class="li-search-ajax">'.$val->ten_SP.'</li>
                ';
            }
            $output .= '</ul';
            echo $output;

        }
    }

}
