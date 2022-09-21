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
        })->name('homeAd')->middleware('checkQuanTriVien');

        Route::get('logout', 'App\Http\Controllers\AD_AuthController@logout')->name('logoutAD');

        // Quản lý khách hàng
        Route::group(
            ['prefix' => 'khach_hang', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\AdminAddUserController@getDanhSach')->name('khach_hang');

                Route::get('them', 'App\Http\Controllers\AdminAddUserController@getThem')->name('getThemKH');
                Route::post('them', 'App\Http\Controllers\AdminAddUserController@postThem')->name('actionThemKH');

                Route::post('xoa/{id}', 'App\Http\Controllers\AdminAddUserController@postXoa');

                Route::get('sua/{id}', 'App\Http\Controllers\AdminAddUserController@getSua')->name('getSuaKH');
                Route::post('sua/{id}', 'App\Http\Controllers\AdminAddUserController@postSua')->name('postSuaKH');
            }
        );
        // Quản lý loại sản phẩm
        Route::group(
            ['prefix' => 'loaisp', 'middleware' => 'checkQuanTriVien'],
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
            ['prefix' => 'mausp', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\MauSpController@getDanhSach')->name('dsMSP');

                Route::get('sua/{id}', 'App\Http\Controllers\MauSpController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\MauSpController@postSua')->name('actionSuaMSP');

                Route::post('xoa/{id}', 'App\Http\Controllers\MauSpController@postXoa');

                Route::get('them', 'App\Http\Controllers\MauSpController@getThem')->name('getThemMSP');
                Route::post('them', 'App\Http\Controllers\MauSpController@postThem')->name('actionThem3');
            }
        );
        // Quản lý sản phẩm
        Route::group(
            ['prefix' => 'sanpham', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\ProductController@getDanhSach')->name('dsSP');

                Route::get('sua/{id}', 'App\Http\Controllers\ProductController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\ProductController@postSua')->name('postSuaSP');

                Route::post('xoa/{id}', 'App\Http\Controllers\ProductController@postXoa');

                Route::get('them', 'App\Http\Controllers\ProductController@getThem')->name('getThemSP');
                Route::post('them', 'App\Http\Controllers\ProductController@postThem')->name('actionThem4');
            }
        );
        //Quản lý kho hàng
        Route::group(
            ['prefix' => 'khohang', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\KhoHangController@getDanhSach')->name('dsKhoHang');
                Route::get('them', 'App\Http\Controllers\KhoHangController@getThem')->name('formSanPham');
                Route::post('tim-kiem', 'App\Http\Controllers\KhoHangController@search')->name('searchProduct');
                Route::get('chi-tiet-nhap/{id}','App\Http\Controllers\KhoHangController@detail')->name('chiTietNhapKho');
                Route::post('them', 'App\Http\Controllers\KhoHangController@postThem')->name('actionThemKhoHang');
            }
        );
        //  Quản lý nhân viên
        Route::group(
            ['prefix' => 'nhanvien'],
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
        Route::group(['prefix'=>'duyetHD','middleware' => 'checkQuanTriVien'],
            function (){
                Route::get('danhsach', 'App\Http\Controllers\DuyetHDController@getDanhSach')->name('quanlyHD');
                Route::post('danhsach', 'App\Http\Controllers\DuyetHDController@postDanhSach')->name('duyetHD1');

                Route::get('chitietHD/{id}', 'App\Http\Controllers\DuyetHDController@getChiTiet')->name('chi_tiet_hd');

                //Xem theo trang thai
                Route::get('chua-duyet', 'App\Http\Controllers\DuyetHDController@getDSChuaDuyet')->name('chua-duyet');

                Route::get('da-duyet', 'App\Http\Controllers\DuyetHDController@getDSDaDuyet')->name('da-duyet');
                Route::get('da-mua', 'App\Http\Controllers\DuyetHDController@getDSDaMua')->name('da-mua');
            }
        );
        // Quản lý thông tin khuyến mãi
        Route::group(['prefix'=>'khuyenmai','middleware' => 'checkQuanTriVien'],
            function (){
                Route::get('danhsach', 'App\Http\Controllers\KhuyenMaiController@getDanhSach')->name('dsKhuyenMai');

                Route::get('them', 'App\Http\Controllers\KhuyenMaiController@getThem')->name('getThemKM');
                Route::post('them', 'App\Http\Controllers\KhuyenMaiController@postThem')->name('actionThemKM');

                Route::get('sua/{id}', 'App\Http\Controllers\KhuyenMaiController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\KhuyenMaiController@postSua')->name('actionSuaKM');
            }
        );
        // Thông tin cá nhân
        Route::get('/information','App\Http\Controllers\InfoController@getInfo')->name('info')
            ->middleware('checkQuanTriVien');
        Route::post('/update-information/{id}','App\Http\Controllers\InfoController@postInfo')->name('update-info')
            ->middleware('checkQuanTriVien');

        //Thay đổi mật khẩu
        Route::get('/changePassword','App\Http\Controllers\ADChangePasswordController@index')->name('change-password-admin')
            ->middleware('checkQuanTriVien');
        Route::post('/changePassword','App\Http\Controllers\ADChangePasswordController@store')->name('post-change-password-admin');

        //Thống kê doanh thu
        Route::get('/sales','App\Http\Controllers\SalesController@getSales')->name('get-sales')->middleware('checkQuanTriVien');
    }
);

// KHACH HANG
Route::group(
    ['prefix' => 'khach_hang'],
    function () {
        Route::get('/', 'App\Http\Controllers\KH_AuthController@login')->name('loginKH');
        //LOGIN GOOGLE
        Route::get('/login-google','App\Http\Controllers\KH_AuthController@login_google')->name('login-gg');
        Route::get('/google/callback','App\Http\Controllers\KH_AuthController@callback_google');

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
        // Xem chi tiet Mau SP
        Route::get('product-color-detail/{id}', 'App\Http\Controllers\KhachHangController@listDetailColorProduct')
            ->name('product-color-detail');
        // Contact
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

                Route::get('/change-password','App\Http\Controllers\ChangePasswordController@index')->name('passwordKH');
                Route::post('/change-password','App\Http\Controllers\ChangePasswordController@store')->name('change-password');
                //Thêm địa chỉ giao hàng
                Route::post('/add-address','App\Http\Controllers\AccountKHController@postAddress')->name('add-address');
                //Xoa DCGH
                Route::get('delete/{id}', 'App\Http\Controllers\AccountKHController@postDelete')->name('delete-address');
            }
        );

        //Cart
        Route::group(
            ['prefix' => 'cart', 'middleware' => 'loginKH'],
            function () {
                Route::post('/add-cart', 'App\Http\Controllers\CartController@store')->name('add-cart');
                Route::get('/view-cart', 'App\Http\Controllers\CheckoutController@showView')->name('view-cart');
                Route::get('delete/{id}', 'App\Http\Controllers\CheckoutController@deleteCart')->name('delete-cart');
                // Ap dung khuyen mai
                Route::post('/app-promotion','App\Http\Controllers\CheckoutController@applyPromo')->name('applyPromotion');
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
                //Kiem tra truoc khi thanh toan
                Route::get('/billing-details', 'App\Http\Controllers\BuyProductsController@proceedCheckout')->name('proceed-to-checkout');
//                Route::get('/billing-detail', 'App\Http\Controllers\BuyProductsController@proceedCheckoutPromo')->name('proceed-to-checkout-promotion');
                // Update cart
                Route::get('/increaseQuantity/{id}','App\Http\Controllers\BuyProductsController@increaseQuantity')->name('increaseQuantity');
                Route::get('/decreaseQuantity/{id}','App\Http\Controllers\BuyProductsController@decreaseQuantity')->name('decreaseQuantity');
                //Trang thai dat hang
                Route::get('/order', 'App\Http\Controllers\BuyProductsController@orderStatus')->name('order-status');
                Route::post('/order', 'App\Http\Controllers\BuyProductsController@orderSuccess')->name('order');
                //Huy don hang khi trang thai chua duyet
                Route::get('/delete-order/{id}', 'App\Http\Controllers\DeleteOrderController@delete')->name('delete-order');
            }
        );
        //Khuyên mãi
        Route::get('/khuyenMai','App\Http\Controllers\KhuyenMaiController@getData')->name('getDataKM');

        //Thông tin về shop
        Route::group(
            ['prefix' => 'about_shop'],
            function () {
                Route::get('/', 'App\Http\Controllers\KhachHangController@aboutUs')->name('about_us');
            }
        );
        Route::post('/quickView','App\Http\Controllers\QuickViewController@quickView');
        Route::post('/quickViewColor','App\Http\Controllers\QuickViewController@quickViewColor');
        //Chi tiết từng hóa đơn
        Route::get('/billDetail/{id}','App\Http\Controllers\BuyProductsController@billDetailView')->name('bill-detail')->middleware('loginKH');
        //KH xác nhận lấy hàng
        Route::post('/accept-order','App\Http\Controllers\DuyetHDController@confirm')->name('accept-order')->middleware('loginKH');
        //Thanh toán bằng MOMO
        Route::post('/momo_payment','App\Http\Controllers\CheckoutController@momoPayment')->name('thanh-toan-MOMO')->middleware('loginKH');
    }


);
//Route::post('/api/confirm', 'App\Http\Controllers\ApiConfirmOrderController@confirmOrder');

?>

