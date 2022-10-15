<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartApiController extends Controller
{
    public function updateCart(Request $request) {
        $productId = $request->productId;
        $quantity = $request->quantity;;
        $cartRaw = Cookie::get('cart');
        $cart = json_decode($cartRaw, true);
        $newCart = [];
        foreach ($cart as $item) {
            if ($item['id'] === (int)$productId) {
                $item['quantity'] = $quantity;
                $newCart[] = $item;
            } else {
                $newCart[] = $item;
            }
        }
        Cookie::queue('cart', json_encode($newCart));
    }
}
