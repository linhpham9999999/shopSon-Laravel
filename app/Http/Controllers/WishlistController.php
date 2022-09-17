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
//        dd($request->get('lish_product_id_wish'));
        $this->validate($request,
            [
                'lish_product_id_wish'=>'unique:wish_list,id_MSP',
            ],
            [
                'lish_product_id_wish.unique' => 'Đã tồn tại sản phẩm yêu thích',
            ]);
        // Chon mau san pham theo productIdColor
        $idmsp      = $request->get('lish_product_id_wish');

        if( Auth::guard('nguoi_dung')->check()) {
            $email_wl = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email_wl = session('email_user_login');
        }

        DB::table('yeu_thich')
            ->insert(
                [
                    'emailnguoidung' => $email_wl,
                    'id_MSP' => $idmsp
                ]
            );

    }

    public function viewList()
    {
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $wishlist = DB::table('yeu_thich')->join('mau_san_pham','yeu_thich.id_MSP','=','mau_san_pham.id')
                            ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau','gia_ban_ra','ten_SP','hinhanh','id_MSP')
            ->where('emailnguoidung','=',$email)
            ->get()->toArray();
        return view('khach_hang.wish_list.wish-list',compact('wishlist'));
    }

    public function deleteList($id)
    {
        DB::table('wish_list')->where('id','=',$id)->delete();
        return redirect()->route('wishList')->with('message','Xóa thành công');
    }

}
