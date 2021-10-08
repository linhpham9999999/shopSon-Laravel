<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Carbon;

class BuyProductsController extends Controller
{
    public function proceedCheckout()
    {
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);
//        dd($products);
        $email = '';
        if( Auth::check()){
            $email = Auth::user()->email;
        }
        $users = DB::table('nguoi_dung')
            ->select('diachi', 'hoten', 'email', 'sodth')
            ->where('email','=',$email)->get();

         // Tính tổng tiền, phí ship
        $total = 0;
        $ship = 0;
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'] - $product['promotion_price'] * $product['quantity'];
            $total += $sumPrice;

            if($total < 500000)
            {
                $ship = 50000;
            } else {
                $ship = 0;
            }
        }
//        dd($total);
        return view('khach_hang.cart.proceed-to-checkout',compact('users','products','ship','total'));
    }

    public function orderSuccess(Request $request){
        $email = '' ;
        if( Auth::check()) {
            $email = Auth::user()->email;
        }
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);

        //Thêm dữ liệu vào bảng Hóa đơn
        DB::table('hoa_don')
            ->insert(['Ma_HD'               => 'HD'.rand(10,1000),
                     'id_TT'                => $request->trangthai,
                     'email_nguoimua'       => $email,
                     'dia_chi_giao_hang'    => $request->diachi,
                     'ngaydat'              => Carbon :: now (),
                     'tongtien'             => $request->total,
                     'ghichu'               => $request->note,
                     'sodth_giao_hang'      => $request->sodth
                     ]);
        $id_HD = DB::getPdo()->lastInsertId();

        //Thêm dữ liệu vào bảng Chi tiết hóa đơn
        foreach ( $products as $product)
        {
            DB::table('chi_tiet_hoa_don')
                ->insert(['id_HD'       => $id_HD,
                        'id_MSP'        => $product['id'],
                        'soluong'       => $product['quantity'],
                        'don_gia'       => $product['unit_price'] - $product['promotion_price'],
                        'thanh_tien'    => ($product['unit_price'] - $product['promotion_price'])*$product['quantity']
                         ]);
        }
        // Xóa sản phẩm trong giỏ sau khi mua

        // Chuyển đến xem trạng thái mua hàng
        $status = DB::table('hoa_don')->select('id_TT')->where('id','=',$id_HD)->get();
//        dd($products);
        return view('khach_hang.cart.status-order', compact('products','status'));
    }

    public function orderStatus(){
        $email = '' ;
        if( Auth::check()) {
            $email = Auth::user()->email;
        }
        $hoadon = DB::table('hoa_don')
            ->join('nguoi_dung','hoa_don.email_nguoimua','=','nguoi_dung.email')
            ->join('trang_thai','hoa_don.id_TT','=','trang_thai.id')
            ->join('chi_tiet_hoa_don','hoa_don.id','=','chi_tiet_hoa_don.id_HD')
            ->join('mau_san_pham','chi_tiet_hoa_don.id_MSP','=','mau_san_pham.id')
            ->select('hoa_don.email_nguoimua','mau_san_pham.hinhanh','hoa_don.Ma_HD','mau_san_pham.mau','ngaydat',
                        'chi_tiet_hoa_don.don_gia','chi_tiet_hoa_don.soluong','hoa_don.tongtien','trang_thai.trangthai')
            ->where('hoa_don.email_nguoimua','=',$email)
            ->get();
        return view('khach_hang.cart.get-status-order', compact('hoadon'));
    }

}
