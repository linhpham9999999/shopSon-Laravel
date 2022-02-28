<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
    * @return View
    **/
    public function showView(): View
    {
        // lấy thông tin product
        [$product, $isHasProductsCart]  = $this->getProductsFromCart();
        $subPrice                       = $this->subPrice($product);
        $shipping                       = $this->shipPrice($product);
//        dd($isHasProductsCart);
        return view('khach_hang/cart/checkout',['products'     => $product,
                                                    'isHasProduct'  => $isHasProductsCart,
                                                    'subPrice'      => $subPrice,
                                                    'shipping'      => $shipping,
                                                    ]
        );
    }
    /**
     * @return array<string, string>
     */
    public function getProductsFromCart(): array
    {
        // khởi tạo biến
        $isHasProductsCart = false;
        // kiểm có giỏ hàng chưa
        if(Cookie::has('cart')){
            //Lấy giỏ hàng
            $cart = Cookie::get('cart');
            // decode giỏ hàng string -> array để lấy info
            $products = json_decode($cart, true);
            $isHasProductsCart = true;
        }
        else {
            $products = [];
        }
        return [$products, $isHasProductsCart];
    }

    /**
     * @param array $products
     */
    // Tính tổng tiền
    public function subPrice(array $products)
    {
        $sub = 0;
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'] - $product['promotion_price'] * $product['quantity'];
            $sub += $sumPrice;
        }
        return $sub;
    }
    //tính ship
    public function shipPrice(array $products)
    {
        $total = 0;
        $shipping = 0;
        foreach ($products as $product)
        {
            $sumPrice = $product['unit_price'] * $product['quantity'] - $product['promotion_price'] * $product['quantity'];
            $total += $sumPrice;

            if($total < 500000)
            {
                $shipping = 50000;
            } else {
                $shipping = 0;
            }
        }
        return $shipping;
    }

    public function deleteCart($id){
//        dd($quantity);
        $cart = Cookie::get('cart');
        $products = json_decode($cart, true);

        foreach ($products as $value){
            $quantity = $value['quantity'];
        }

        $soluongton = DB::table('mau_san_pham')->select('soluongton')->where('id','=', $id)->first();
        $quantitycurent = $soluongton->soluongton;

        DB::table('mau_san_pham')->select('soluongton')
            ->where('id','=',$id)
            ->update(['soluongton' => $quantitycurent + $quantity]);

        if (array_key_exists($id, $products)) {
            unset($products[$id]);

        }

        $json = json_encode($products);
        Cookie::queue('cart', $json, 60);
        return back()->with('message','Đã xóa khỏi giỏ!');
    }

}
