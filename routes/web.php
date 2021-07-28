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
// admin đăng nhập
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ADMIN
Route::get('admin/trangchu', function (){
    return view('admin.trangchu');
});

Route::group(['prefix'=>'admin'],function() {
    Route::get('/', 'App\Http\Controllers\TestController@login')->name('login');
    Route::post('/trangchu', 'App\Http\Controllers\TestController@check')->name('xy-ly-dang-nhap');
    Route::get('logout', 'App\Http\Controllers\TestController@logout')->name('logoutAD');

    Route::group(['prefix' => 'nhaphanphoi', 'middleware' => 'login'], function () {
        //admin/nhaphanphoi/danhsach
        Route::get('danhsach', 'App\Http\Controllers\NhaPhanPhoiController@getDanhSach');

        Route::get('sua/{Ma_NPP}', 'App\Http\Controllers\NhaPhanPhoiController@getSua');
        Route::post('sua/{Ma_NPP}', 'App\Http\Controllers\NhaPhanPhoiController@postSua');

        Route::get('xoa/{Ma_NPP}', 'App\Http\Controllers\NhaPhanPhoiController@getXoa');

        Route::get('them', 'App\Http\Controllers\NhaPhanPhoiController@getThem');
        Route::post('them', 'App\Http\Controllers\NhaPhanPhoiController@postThem')->name('actionThem');
    });
    /*Route::group(['prefix' => 'dongiasp'], function () {
        //admin/nhaphanphoi/danhsach
        Route::get('danhsach', 'App\Http\Controllers\DonGiaSpController@getDanhSach');

        Route::get('sua/{Ma_DGSP}', 'App\Http\Controllers\DonGiaSpController@getSua');
        Route::post('sua/{Ma_DGSP}', 'App\Http\Controllers\DonGiaSpController@postSua');

        Route::get('xoa/{Ma_DGSP}', 'App\Http\Controllers\DonGiaSpController@getXoa');

        Route::get('them', 'App\Http\Controllers\DonGiaSpController@getThem');
        Route::post('them', 'App\Http\Controllers\DonGiaSpController@postThem')->name('actionThem1');
    });*/
    Route::group(['prefix' => 'loaisp', 'middleware' => 'login'], function () {
        //admin/loaisp/danhsach
        Route::get('danhsach', 'App\Http\Controllers\LoaiSanPhamController@getDanhSach');

        Route::get('sua/{Ma_LSP}', 'App\Http\Controllers\LoaiSanPhamController@getSua');
        Route::post('sua/{Ma_LSP}', 'App\Http\Controllers\LoaiSanPhamController@postSua');

        Route::get('xoa/{Ma_LSP}', 'App\Http\Controllers\LoaiSanPhamController@getXoa');

        Route::get('them', 'App\Http\Controllers\LoaiSanPhamController@getThem');
        Route::post('them', 'App\Http\Controllers\LoaiSanPhamController@postThem')->name('actionThem2');
    });
    Route::group(['prefix' => 'mausp', 'middleware' => 'login'], function () {
        //admin/loaisp/danhsach
        Route::get('danhsach', 'App\Http\Controllers\MauSpController@getDanhSach');

        Route::get('sua/{id}', 'App\Http\Controllers\MauSpController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\MauSpController@postSua');

        Route::get('xoa/{id}', 'App\Http\Controllers\MauSpController@getXoa');

        Route::get('them', 'App\Http\Controllers\MauSpController@getThem');
        Route::post('them', 'App\Http\Controllers\MauSpController@postThem')->name('actionThem3');
    });
    Route::group(['prefix' => 'sanpham', 'middleware' => 'login'], function () {
        //admin/loaisp/danhsach
        Route::get('danhsach', 'App\Http\Controllers\SanPhamController@getDanhSach');

        Route::get('sua/{id}', 'App\Http\Controllers\SanPhamController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\SanPhamController@postSua');

        Route::get('xoa/{id}', 'App\Http\Controllers\SanPhamController@getXoa');

        Route::get('them', 'App\Http\Controllers\SanPhamController@getThem');
        Route::post('them', 'App\Http\Controllers\SanPhamController@postThem')->name('actionThem4');
    });
    /*Route::group(['prefix' => 'hinhanh', 'middleware' => 'login'], function () {
        //admin/loaisp/danhsach
        Route::get('danhsach', 'App\Http\Controllers\HinhAnhController@getDanhSach');

        Route::get('sua/{Ma_HA}', 'App\Http\Controllers\HinhAnhController@getSua');
        Route::post('sua/{Ma_HA}', 'App\Http\Controllers\HinhAnhController@postSua');

        Route::get('xoa/{Ma_HA}', 'App\Http\Controllers\HinhAnhController@getXoa');

        Route::get('them', 'App\Http\Controllers\HinhAnhController@getThem');
        Route::post('them', 'App\Http\Controllers\HinhAnhController@postThem')->name('actionThem5');
    });*/
    Route::group(['prefix' => 'nhanvien', 'middleware' => 'login'], function () {
        //admin/loaisp/danhsach
        Route::get('danhsach', 'App\Http\Controllers\NhanVienController@getDanhSach');

        Route::get('sua/{id}', 'App\Http\Controllers\NhanVienController@getSua');
        Route::post('sua/{id}', 'App\Http\Controllers\NhanVienController@postSua');

        Route::get('xoa/{id}', 'App\Http\Controllers\NhanVienController@getXoa');

        Route::get('them', 'App\Http\Controllers\NhanVienController@getThem');
        Route::post('them', 'App\Http\Controllers\NhanVienController@postThem')->name('actionThem6');
    });
});

// KHACH HANG
Route::group(['prefix' => 'khach_hang'], function () {

    Route::get('/', 'App\Http\Controllers\KH_AuthController@login')->name('loginKH');
    Route::post('/', 'App\Http\Controllers\KH_AuthController@check')->name('xu-ly-dang-nhap-KH');

    Route::get('/create_account', 'App\Http\Controllers\KH_AuthController@create_account')->name('create_account');
    Route::post('/testDK', 'App\Http\Controllers\KH_AuthController@testDK')->name('xu-ly-dang-ky');

    Route::get('trangchu', 'App\Http\Controllers\KhachHangController@index')->name('trangchuKH');
    Route::get('/logout', 'App\Http\Controllers\KH_AuthController@logoutKH')->name('logoutKH');

    Route::group(['prefix' => 'shop'], function () {
        Route::get('allSanPham', 'App\Http\Controllers\KhachHangController@listSP')->name('allSanPham');
        Route::get('loai-san-pham/{id}', 'App\Http\Controllers\KhachHangController@loaiSP')->name('loai-san-pham');
        Route::get('details/{id}', 'App\Http\Controllers\KhachHangController@details')->name('details');
    });

    //view-product
    Route::get('list-color-product/{id}','App\Http\Controllers\KhachHangController@listColorProduct')->name('list-color-product');

    /*Route::group(['prefix' => 'account', 'middleware' => 'loginKH'], function () {
        Route::get('accountUser', 'App\Http\Controllers\KhachHangController@accountUser')->name('account_user');
    });*/

    /*//product wishlist
    Route::group(['prefix' => 'wish_list', 'middleware' => 'loginKH'], function () {
        Route::get('/', 'App\Http\Controllers\KhachHangController@wishList')->name('wishList');
    });*/

    //Contact
    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', 'App\Http\Controllers\KhachHangController@contact')->name('contact');
        Route::post('/sent', 'App\Http\Controllers\KhachHangController@handleContact')->name('handle-contact');
    });

});
?>
