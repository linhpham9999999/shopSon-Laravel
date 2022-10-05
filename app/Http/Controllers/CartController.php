<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * @param Request $request
     *
     * @throws Exception
     */

    public function store(Request  $request){
        $productIdColor = $request->productIdColor;
        $soluongton = DB::table('mau_san_pham')->select('soluongton')->where('id','=', $productIdColor)->first();
        $sluong = $soluongton->soluongton;
        $number = $request->number;
        if($number > $sluong){
            return back()->with('testquantity', 'Số lượng sản phẩm tồn không đủ bán');
        }

        $this->validate(
            $request,
            [
                'number'                => 'bail|required|integer|min:1'
            ],
            [
                'number.required'      => 'Bạn chưa nhập số lượng sản phẩm',
                'number.integer'       => 'Số lượng sản phẩm phải là 1 số nguyên',
                'number.min'           => 'Số lượng sản phẩm ít nhất là  1',
            ]
        );
//        dd($number);
//        $productIdColor = $request->get('cart_product_id'); //AJAX

        // Lấy sản phẩm từ DB dựa vào id
        $product = $this->getProduct($productIdColor);
        // Kiểm tra sản phẩm có hay ko
        if(!$product){
            throw new Exception('Product not found');
        }
        // Lấy giỏ hàng từ cookie
        $cookieCart = Cookie::get('cart');
        if(!$cookieCart){
            // Khởi tạo giỏ hàng
            $products = [];
            // Gán số lượng là sluong KH vừa nhập vào
            $product['quantity'] = $number;
            // Gán sản phẩm vào giỏ hàng
            $products[$productIdColor] = $product;

        }else{
            // decode giỏ hàng, string => array, json -> mảng
            $products = json_decode($cookieCart, true);
            // kiểm tra tăng số lượng
            $products = $this->increaseQuantity($products, $product, $productIdColor, $number);
        }
        // encode mảng thành chuỗi json
        $json = json_encode($products);
        // Gán lại giỏ hàng
        Cookie::queue('cart',$json,300000);

        return back()->with('thongbao', 'Đã thêm sản phẩm vào giỏ');
    }

    /**
     * @param  string  $productId
     * @param  string  $productIdColor
     *
     * @return array | boolean
     */
    public function getProduct( string $productIdColor): array
    {
        // Lấy sản phẩm từ DB
        $mausp = DB::table('mau_san_pham')
            ->find($productIdColor);

        $sanpham = DB::table('san_pham')->find($mausp->id_SP);

//        $mauson = DB::table('mau_san_pham')->find($sanpham->id);

        // Kiểm tra có sản phẩm hay k
        if ( ! $mausp){
            return false;
        }
        // trả về mảng sản phẩm trong cart
        if( Auth::guard('nguoi_dung')->check() )
        {
            $email = Auth::guard('nguoi_dung')->user()->email;
        }else{
            $email = session('email_user_login');
        }
        return [
            'id'                => $mausp->id,
            'image'             => $mausp->hinhanh,
            'name'              => $sanpham->ten_SP,
            'color'             => $mausp->mau,
//                'unit_price'        => $sanpham->giagoc,
            'promotion'         => 0,
            'unit_price'        => $sanpham->gia_ban_ra,
            'email'             => $email,
            'id_KM'             => NULL
        ];
    }
    /**
     * @param  array  $products
     * @param  array  $product
     * @param  array $productIdColor
     * @param  string | int  $productId
     *
     * @return array
     */

    public function increaseQuantity(array $products, array $product, string $productIdColor, int $number): array
    {
        // Ktra sản phẩm có trong giỏ hàng chưa
        if(array_key_exists( $productIdColor, $products)){
            // lấy sản phẩm trong cart ra
            $product                = $products[$productIdColor];
            // tăng số lượng sản phẩm lên number
            $product['quantity']    = $product['quantity'] + $number;
        } else { // chưa có sp đó trong giỏ
            // gán số lượng = number
            $product['quantity'] = $number;
        }
        // gán sản phẩm lại cart
        $products[$productIdColor] = $product;

        return $products;
    }


}
