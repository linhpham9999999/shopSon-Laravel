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
        $idmsp = $request->input('product_id');
        if( Auth::guard('nguoi_dung')->check()) {
            $email_wl = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email_wl = session('email_user_login');
        }
        $data = DB::table('yeu_thich')->select('emailnguoidung','id_MSP')
            ->where([['emailnguoidung','=',$email_wl],['id_MSP','=',$idmsp]])->first();
        if(!empty($data)){
            return response()->json(['status'=>'Màu son đã được thêm yêu thích']);
        }
        else{
            DB::table('yeu_thich')
                ->insert(
                    [
                        'emailnguoidung' => $email_wl,
                        'id_MSP' => $idmsp
                    ]
                );
            return response()->json(['status'=>'Thêm màu son yêu thích thành công']);
        }
    }

    public function viewList()
    {
        if( Auth::guard('nguoi_dung')->check()) {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        $wishlist = DB::table('yeu_thich')
                        ->join('nguoi_dung','nguoi_dung.email','=','yeu_thich.emailnguoidung')
                        ->join('mau_san_pham','yeu_thich.id_MSP','=','mau_san_pham.id')
                        ->join('san_pham','mau_san_pham.id_SP','=','san_pham.id')
            ->select('mau','gia_ban_ra','ten_SP','hinhanh','yeu_thich.id_MSP','yeu_thich.id')
            ->where('yeu_thich.emailnguoidung','=',$email)
            ->get()->toArray();
        return view('khach_hang.wish_list.wish-list',compact('wishlist'));
    }

    public function deleteList(Request $request)
    {
        $idmsp = $request->product_id;
        DB::table('yeu_thich')->where('id','=',$idmsp)->delete();
        return response()->json(['status'=>'Xóa màu son yêu thích thành công']);
    }

}
