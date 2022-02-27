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
                Route::get('danhsach', 'App\Http\Controllers\NhaPhanPhoiController@getDanhSach')->name('dsNPP');

                Route::get('sua/{id}', 'App\Http\Controllers\NhaPhanPhoiController@getSua')->name('getSuaNPP');
                Route::post('post-sua', 'App\Http\Controllers\NhaPhanPhoiController@postSua')->name('actionSuaNPP');

                Route::post('xoa/{id}', 'App\Http\Controllers\NhaPhanPhoiController@postXoa')->name('deleteNPP');

//                Route::get('them', 'App\Http\Controllers\NhaPhanPhoiController@getThem')->name('getThemNPP');
                Route::post('them', 'App\Http\Controllers\NhaPhanPhoiController@postThem')->name('actionThem');
            }
        );
        // Quản lý loại sản phẩm
        Route::group(
            ['prefix' => 'loaisp', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\LoaiSanPhamController@getDanhSach')->name('dsLSP');

                Route::get('sua/{id}', 'App\Http\Controllers\LoaiSanPhamController@getSua');
                Route::post('post-sua', 'App\Http\Controllers\LoaiSanPhamController@postSua')->name('actionSuaLSP');

                Route::post('xoa/{id}', 'App\Http\Controllers\LoaiSanPhamController@postXoa');

//                Route::get('them', 'App\Http\Controllers\LoaiSanPhamController@getThem')->name('getThemLSP');
                Route::post('them', 'App\Http\Controllers\LoaiSanPhamController@postThem')->name('actionThem2');
            }
        );
        // Quản lý màu sản phẩm
        Route::group(
            ['prefix' => 'mausp', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\MauSpController@getDanhSach')->name('dsMSP');

                Route::get('sua/{id}', 'App\Http\Controllers\MauSpController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\MauSpController@postSua');

                Route::get('xoa/{id}', 'App\Http\Controllers\MauSpController@getXoa');

                Route::get('them', 'App\Http\Controllers\MauSpController@getThem')->name('getThemMSP');
                Route::post('them', 'App\Http\Controllers\MauSpController@postThem')->name('actionThem3');
            }
        );
        // Quản lý sản phẩm
        Route::group(
            ['prefix' => 'sanpham', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\ProductController@getDanhSach')->name('dsSP');

                Route::get('sua/{id}', 'App\Http\Controllers\ProductController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\ProductController@postSua')->name('postSuaSP');

                Route::post('xoa/{id}', 'App\Http\Controllers\ProductController@postXoa');

                Route::get('them', 'App\Http\Controllers\ProductController@getThem')->name('getThemSP');
                Route::post('them', 'App\Http\Controllers\ProductController@postThem')->name('actionThem4');
            }
        );
        //  Quản lý nhân viên
        Route::group(
            ['prefix' => 'nhanvien', 'middleware' => 'login'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\NhanVienController@getDanhSach')->name('dsNV');

                Route::get('sua/{id}', 'App\Http\Controllers\NhanVienController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\NhanVienController@postSua')->name('postSuaNV');

                Route::post('xoa/{id}', 'App\Http\Controllers\NhanVienController@postXoa');

                Route::get('them', 'App\Http\Controllers\NhanVienController@getThem')->name('getThemNV');
                Route::post('them', 'App\Http\Controllers\NhanVienController@postThem')->name('actionThem6');
            }
        );
        // Duyệt đơn hàng
        Route::group(['prefix'=>'duyetHD','middleware' => 'login'],
            function (){
                Route::get('danhsach', 'App\Http\Controllers\DuyetHDController@getDanhSach')->name('quanlyHD');
                Route::post('danhsach', 'App\Http\Controllers\DuyetHDController@postDanhSach')->name('duyetHD1');
                Route::get('chitietHD/{id}', 'App\Http\Controllers\DuyetHDController@getChiTiet')->name('chi_tiet_hd');
            }
        );
        // Thông tin cá nhân
        Route::get('/information','App\Http\Controllers\InfoController@getInfo')->name('info')
            ->middleware('login');
        Route::post('/update-information/{id}','App\Http\Controllers\InfoController@postInfo')->name('update-info')
            ->middleware('login');
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

        // Danh sách tất cả sản phẩm, loại sản phẩm, tìm kiếm sản phẩm theo Tên SP, Gía SP
        Route::group(
            ['prefix' => 'shop'],
            function () {
                Route::get('all-product', 'App\Http\Controllers\KhachHangController@listSP')->name('allSanPham');
                Route::get('product-type/{id}', 'App\Http\Controllers\KhachHangController@loaiSP')->name(
                    'loai-san-pham'
                );
                Route::post('/search', 'App\Http\Controllers\SearchProductController@search')->name('search-product');
                Route::post('/search-price', 'App\Http\Controllers\SearchProductController@searchPrice')->name('search-product-price');
            }
        );

        // Danh sách tất cả Màu sản phẩm
        Route::get('product-color-list/{id}', 'App\Http\Controllers\KhachHangController@listColorProduct')
            ->name('list-color-product');
        //Xem chi tiet Mau SP
        Route::get('product-color-detail/{id}', 'App\Http\Controllers\KhachHangController@listDetailColorProduct')
            ->name('product-color-detail');
        //Contact
        Route::group(
            ['prefix' => 'contact'],
            function () {
                Route::get('/', 'App\Http\Controllers\KhachHangController@contact')->name('contact');
                Route::post('/sent', 'App\Http\Controllers\KhachHangController@handleContact')->name('handle-contact');
            }
        );
        // Xem thông tin chi tiết tài khoản KH, chỉnh sửa tài khoản
        Route::group(
            ['prefix' => 'account', 'middleware' => 'loginKH'],
            function () {
                Route::get('/view-account','App\Http\Controllers\AccountKHController@viewAccount')->name('view-account');
                Route::post('/change-account/{id}','App\Http\Controllers\AccountKHController@postAccount')->name('change-account');
                Route::get('/change-password','App\Http\Controllers\ChangePasswordController@index')->name('password');
                Route::post('/change-password','App\Http\Controllers\ChangePasswordController@store')->name('change-password');
            }
        );

        //Cart
        Route::group(
            ['prefix' => 'cart', 'middleware' => 'loginKH'],
            function () {
                Route::post('/add-cart', 'App\Http\Controllers\CartController@store')->name('add-cart');
                Route::get('/view-cart', 'App\Http\Controllers\CheckoutController@showView')->name('view-cart');
                Route::get('delete/{id}', 'App\Http\Controllers\CheckoutController@deleteCart')->name('delete-cart');
            }
        );

        //WishList
        Route::group(
            ['prefix' => 'wishlist', 'middleware' => 'loginKH'],
            function () {
                Route::post('/add-wishlist', 'App\Http\Controllers\WishlistController@wishList')->name('add-wishlist');
                Route::get('/view-list', 'App\Http\Controllers\WishlistController@viewList')->name('wishList');
                Route::get('delete/{id}', 'App\Http\Controllers\WishlistController@deleteList')->name('detele-wish-list');
            }
        );
        // Mua hàng
        Route::group(
            ['prefix' => 'buy-products', 'middleware' => 'loginKH'],
            function () {
                Route::get('/billing-details', 'App\Http\Controllers\BuyProductsController@proceedCheckout')->name('proceed-to-checkout');
                Route::get('/order', 'App\Http\Controllers\BuyProductsController@orderStatus')->name('order-status');
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
        Route::post('/quickView','App\Http\Controllers\QuickViewController@quickView');
        Route::post('/quickViewColor','App\Http\Controllers\QuickViewController@quickViewColor');
        Route::get('/billDetail/{id}','App\Http\Controllers\BuyProductsController@billDetailView')->name('bill-detail');
        Route::get('/sales','App\Http\Controllers\SalesController@getSales')->name('get-sales');
    }
);
//Route::post('/api/confirm', 'App\Http\Controllers\ApiConfirmOrderController@confirmOrder');
?>
