<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ADMIN
Route::group(
    ['prefix' => 'admin'],
    function () {
        Route::get('/', 'App\Http\Controllers\AD_AuthController@login')->name('login');
        Route::post('/test-login', 'App\Http\Controllers\AD_AuthController@check')->name('xy-ly-dang-nhap');
        Route::get('/trangchu',function () {
            return view('admin.trangchu');
        })->name('homeAd')->middleware('login');
        Route::get('logout', 'App\Http\Controllers\AD_AuthController@logout')->name('logoutAD');

        // Quản lý nhà phân phối
        Route::group(
            ['prefix' => 'nhaphanphoi', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\NhaPhanPhoiController@getDanhSach');

                Route::get('sua/{Ma_NPP}', 'App\Http\Controllers\NhaPhanPhoiController@getSua');
                Route::post('sua/{Ma_NPP}', 'App\Http\Controllers\NhaPhanPhoiController@postSua')->name('actionSuaNPP');

                Route::get('xoa/{Ma_NPP}', 'App\Http\Controllers\NhaPhanPhoiController@getXoa');

                Route::get('them', 'App\Http\Controllers\NhaPhanPhoiController@getThem');
                Route::post('them', 'App\Http\Controllers\NhaPhanPhoiController@postThem')->name('actionThem');
            }
        );
        // Quản lý loại sản phẩm
        Route::group(
            ['prefix' => 'loaisp', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\LoaiSanPhamController@getDanhSach');

                Route::get('sua/{id}', 'App\Http\Controllers\LoaiSanPhamController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\LoaiSanPhamController@postSua')->name('actionSuaLSP');

                Route::get('xoa/{id}', 'App\Http\Controllers\LoaiSanPhamController@getXoa');

                Route::get('them', 'App\Http\Controllers\LoaiSanPhamController@getThem');
                Route::post('them', 'App\Http\Controllers\LoaiSanPhamController@postThem')->name('actionThem2');
            }
        );
        // Quản lý màu sản phẩm
        Route::group(
            ['prefix' => 'mausp', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\MauSpController@getDanhSach');

                Route::get('sua/{id}', 'App\Http\Controllers\MauSpController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\MauSpController@postSua');

                Route::get('xoa/{id}', 'App\Http\Controllers\MauSpController@getXoa');

                Route::get('them', 'App\Http\Controllers\MauSpController@getThem');
                Route::post('them', 'App\Http\Controllers\MauSpController@postThem')->name('actionThem3');
            }
        );
        // Quản lý sản phẩm
        Route::group(
            ['prefix' => 'sanpham', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\ProductController@getDanhSach');

                Route::get('sua/{id}', 'App\Http\Controllers\ProductController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\ProductController@postSua');

                Route::get('xoa/{id}', 'App\Http\Controllers\ProductController@getXoa');

                Route::get('them', 'App\Http\Controllers\ProductController@getThem');
                Route::post('them', 'App\Http\Controllers\ProductController@postThem')->name('actionThem4');
            }
        );
        //  Quản lý nhân viên
        Route::group(
            ['prefix' => 'nhanvien', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\NhanVienController@getDanhSach');

                Route::get('sua/{id}', 'App\Http\Controllers\NhanVienController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\NhanVienController@postSua');

                Route::get('xoa/{id}', 'App\Http\Controllers\NhanVienController@getXoa');

                Route::get('them', 'App\Http\Controllers\NhanVienController@getThem');
                Route::post('them', 'App\Http\Controllers\NhanVienController@postThem')->name('actionThem6');
            }
        );
        // Duyệt đơn hàng
        Route::group(['prefix'=>'duyetHD','middleware' => 'login'],
            function (){
                Route::get('danhsach', 'App\Http\Controllers\DuyetHDController@getDanhSach');
                Route::get('chitietHD/{id}', 'App\Http\Controllers\DuyetHDController@getChiTiet')->name('chi_tiet_hd');
            }
        );
    }
);

// KHACH HANG
Route::group(
    ['prefix' => 'khach_hang'],
    function () {
        Route::get('/', 'App\Http\Controllers\KH_AuthController@login')->name('loginKH');
        Route::post('/', 'App\Http\Controllers\KH_AuthController@check')->name('xu-ly-dang-nhap-KH');

        Route::get('/create_account', 'App\Http\Controllers\KH_AuthController@create_account')->name('create_account');
        Route::post('/testDK', 'App\Http\Controllers\KH_AuthController@testDK')->name('xu-ly-dang-ky');

        Route::get('trangchu', 'App\Http\Controllers\KhachHangController@index')->name('trangchuKH');
        Route::get('/logout', 'App\Http\Controllers\KH_AuthController@logoutKH')->name('logoutKH');

        Route::group(
            ['prefix' => 'shop'],
            function () {
                Route::get('allSanPham', 'App\Http\Controllers\KhachHangController@listSP')->name('allSanPham');
                Route::get('loai-san-pham/{id}', 'App\Http\Controllers\KhachHangController@loaiSP')->name(
                    'loai-san-pham'
                );
                Route::get('details/{id}', 'App\Http\Controllers\KhachHangController@details')->name('details');
            }
        );

        //view-product màu
        Route::get('list-color-product/{id}', 'App\Http\Controllers\KhachHangController@listColorProduct')
            ->name('list-color-product');

        //Contact
        Route::group(
            ['prefix' => 'contact'],
            function () {
                Route::get('/', 'App\Http\Controllers\KhachHangController@contact')->name('contact');
                Route::post('/sent', 'App\Http\Controllers\KhachHangController@handleContact')->name('handle-contact');
            }
        );

        //Cart
        Route::group(
            ['prefix' => 'cart', 'middleware' => 'loginKH'],
            function () {
                Route::post('/', 'App\Http\Controllers\CartController@store')->name('add-cart');
                Route::get('/', 'App\Http\Controllers\CheckoutController@showView')->name('view-cart');
                Route::get('delete/{id}', 'App\Http\Controllers\CheckoutController@deleteCart')->name('delete-cart');
            }
        );

        //WishList
        Route::group(
            ['prefix' => 'wishlist', 'middleware' => 'loginKH'],
            function () {
                Route::post('/', 'App\Http\Controllers\WishlistController@wishList')->name('add-wishlist');
                Route::get('/', 'App\Http\Controllers\WishlistController@viewList')->name('wishList');
                Route::get('delete/{id}', 'App\Http\Controllers\WishlistController@deleteList')->name('detele-wish-list');
            }
        );
        // Mua hàng
        Route::group(
            ['prefix' => 'buy-products', 'middleware' => 'loginKH'],
            function () {
                Route::get('/billing-details', 'App\Http\Controllers\BuyProductsController@proceedCheckout')->name('proceed-to-checkout');
                Route::post('/order', 'App\Http\Controllers\BuyProductsController@orderSuccess')->name('order');
            }
        );

        //Thông tin về shop
        Route::group(
            ['prefix' => 'about_shop'],
            function () {
                Route::get('/', 'App\Http\Controllers\KhachHangController@aboutUs')->name('about_us');
            }
        );
    }
);

Route::post('/api/confirm', 'App\Http\Controllers\ApiConfirmOrderController@confirmOrder');

?>
