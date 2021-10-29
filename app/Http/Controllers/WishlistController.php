<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishList(Request  $request)
    {
        $this->validate($request,
            [
                'lish_product_id_wish'=>'unique:wish_list,id_MSP',
            ],
            [
                'lish_product_id_wish.unique' => 'Đã tồn tại sản phẩm yêu thích',
            ]);
        // Chon mau san pham theo productIdColor
        $idmsp      = $request->get('lish_product_id_wish');
        $mausp      = DB::table('mau_san_pham')->find($idmsp);

        // Chon san pham theo idSP trong bang mausp vua chon -> lay thon tin san pham
        $idsp       = $mausp->id_SP;
        $sanpham    = DB::table('san_pham')->find($idsp);

        if( Auth::check() ){
            $email_wl = Auth::user()->email;
        }

            DB::table('wish_list')
                ->insert(
                    [
                        'mau_wl' => $mausp->mau,
                        'hinhanh_wl' => $mausp->hinhanh,
                        'thongTinMau_wl' => $mausp->thongTinMau,
                        'ten_san_pham_wl' => $sanpham->ten_SP,
                        'gia_wl' => $sanpham->giagoc - $sanpham->giamgia,
                        'email_wl' => $email_wl,
                        'id_MSP' => $idmsp
                    ]
                );

    }

    public function viewList()
    {
        $email = '';
        if( Auth::check()){
            $email = Auth::user()->email;
        }
        $wishlist = DB::table('wish_list')->select('*')->where('email_wl','=',$email)->get()->toArray();
        return view('khach_hang.wish_list.wish-list',compact('wishlist'));
    }

    public function deleteList($id)
    {
        DB::table('wish_list')->where('id','=',$id)->delete();

        return redirect()->route('wishList')->with('message','Xóa thành công');
    }

}
