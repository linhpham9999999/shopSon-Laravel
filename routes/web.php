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
        Route::get('/ban-hang', 'App\Http\Controllers\AD_AuthController@loginBanHang')->name('login-ban-hang');
        Route::get('/nhap-kho', 'App\Http\Controllers\AD_AuthController@loginNhapKho')->name('login-nhap-kho');

        // quản trị viên
        Route::post('/test-login', 'App\Http\Controllers\AD_AuthController@check')->name('xy-ly-dang-nhap');
        // nhân viên bán hàng
        Route::post('/kt-ban-hang', 'App\Http\Controllers\AD_AuthController@checkBanHang')->name('xy-ly-dang-nhap-ban-hang');
        // nhân viên nhập kho
        Route::post('/kt-nhap-kho', 'App\Http\Controllers\AD_AuthController@checkNhapKho')->name('xy-ly-dang-nhap-nhap-kho');

        Route::get('/trangchu',function () {
            return view('admin.trangchu');
        })->name('homeAd')->middleware('checkQuanTriVien');

        Route::get('/trangchu-nhap-kho',function () {
            return view('admin.trangchu-nhap-kho');
        })->name('homeNK')->middleware('checkNhapKho');

        Route::get('/trangchu-ban-hang',function () {
            return view('admin.trangchu-ban-hang');
        })->name('homeBanHang')->middleware('checkBanHang');

        Route::get('logout', 'App\Http\Controllers\AD_AuthController@logout')->name('logoutAD');
        Route::get('logout-ban-hang', 'App\Http\Controllers\AD_AuthController@logoutBanHang')->name('logoutBH');
        Route::get('logout-nhap-kho', 'App\Http\Controllers\AD_AuthController@logoutNhapKho')->name('logoutNK');

        // Quản lý khách hàng
        Route::group(
            ['prefix' => 'khach_hang', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\AdminAddUserController@getDanhSach')->name('khach_hang');

                Route::get('them', 'App\Http\Controllers\AdminAddUserController@getThem')->name('getThemShipper');
                Route::post('them', 'App\Http\Controllers\AdminAddUserController@postThem')->name('actionThemKH');

                Route::post('xoa/{id}', 'App\Http\Controllers\AdminAddUserController@postXoa');

                Route::get('sua/{id}', 'App\Http\Controllers\AdminAddUserController@getSua')->name('getSuaKH');
                Route::post('sua/{id}', 'App\Http\Controllers\AdminAddUserController@postSua')->name('postSuaKH');
            }
        );
        // Quản lý loại sản phẩm
        Route::group(
            ['prefix' => 'loaisp', 'middleware' => 'checkAll'],
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
            ['prefix' => 'mausp', 'middleware' => 'checkAll'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\MauSpController@getDanhSach')->name('dsMSP');

                Route::get('sua/{id}', 'App\Http\Controllers\MauSpController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\MauSpController@postSua')->name('actionSuaMSP');

                Route::post('xoa/{id}', 'App\Http\Controllers\MauSpController@postXoa');

                Route::get('them', 'App\Http\Controllers\MauSpController@getThem')->name('getThemMSP');
                Route::post('them', 'App\Http\Controllers\MauSpController@postThem')->name('actionThem3');
                // tìm theo mã, màu sp
                Route::get('/tim-kiem', 'App\Http\Controllers\SearchColorProductController@search')->name('search-color-product');
            }
        );
        // Quản lý sản phẩm
        Route::group(
            ['prefix' => 'sanpham', 'middleware' => 'checkAll'],
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
            ['prefix' => 'khohang', 'middleware' => 'checkNhapKho'],
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
            ['prefix' => 'nhanvien', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\NhanVienController@getDanhSach')->name('dsNV');

                Route::get('sua/{id}', 'App\Http\Controllers\NhanVienController@getSua');
                Route::post('sua/{id}', 'App\Http\Controllers\NhanVienController@postSua')->name('postSuaNV');

                Route::post('xoa/{id}', 'App\Http\Controllers\NhanVienController@postXoa');

                Route::get('them', 'App\Http\Controllers\NhanVienController@getThem')->name('getThemNV');
                Route::post('them', 'App\Http\Controllers\NhanVienController@postThem')->name('actionThem6');
            }
        );
        // Quản lý bình luận
        Route::group(
            ['prefix' => 'binh-luan', 'middleware' => 'checkQuanTriVien'],
            function () {
                Route::get('danh-sach-can-duyet', 'App\Http\Controllers\RatingController@getDanhSachCanDuyet')->name('quan-ly-cmt');
                Route::get('danh-sach-da-duyet', 'App\Http\Controllers\RatingController@getDanhSachDaDuyet')->name('danh-sach-cmt');
                Route::post('duyet', 'App\Http\Controllers\RatingController@duyetBinhLuan')->name('duyet-cmt');
            }
        );
        // Duyệt đơn hàng
        Route::group(['prefix'=>'duyetHD','middleware' => 'checkBanHang'],
            function (){
                // tất cả hóa đơn
                Route::get('danhsach', 'App\Http\Controllers\DuyetHDController@getDanhSach')->name('quanlyHD');
                //Xem theo trang thai
                Route::get('chua-duyet', 'App\Http\Controllers\DuyetHDController@getDSChuaDuyet')->name('chua-duyet');
                // giao shipper có 2 TH: bị từ chối, chưa phản hồi
                Route::get('da-giao-shipper', 'App\Http\Controllers\DuyetHDController@getDSDaGiaoShipper')->name('da-giao-shipper');
                Route::get('da-duyet', 'App\Http\Controllers\DuyetHDController@getDSDaDuyet')->name('da-duyet');
                Route::get('da-mua', 'App\Http\Controllers\DuyetHDController@getDSDaMua')->name('da-mua');
                Route::get('da-huy', 'App\Http\Controllers\DuyetHDController@getDSDaHuy')->name('da-huy');
                // Chi tiết hóa đơn
                Route::get('chitietHD/{id}', 'App\Http\Controllers\DuyetHDController@getChiTiet')->name('chi_tiet_hd');
                // chọn nguoi-giao-hang giao hàng
                Route::post('chitietHD', 'App\Http\Controllers\DuyetHDController@chonShipper')->name('chon-nguoi-giao-hang');
                // Tìm kiếm HĐ theo mã, tên khách hàng
                Route::get('/tim-kiem-hoa-don', 'App\Http\Controllers\SearchOrderController@search')->name('search-order');
                Route::post('/tim-kiem-hoa-don-ngay', 'App\Http\Controllers\SearchOrderController@fetch_data')->name('search-order-date');

                // load số đơn hàng chờ duyệt
                Route::get('/load-count-order','App\Http\Controllers\CountOrderController@loadcount');
                Route::get('/load-count-order2','App\Http\Controllers\CountOrderController@loadcount2');
                Route::get('/load-count-order3','App\Http\Controllers\CountOrderController@loadcount3');
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
            ->middleware('checkAll');
        Route::post('/update-information/{id}','App\Http\Controllers\InfoController@postInfo')->name('update-info')
            ->middleware('checkAll');

        //Thay đổi mật khẩu
        Route::get('/changePassword','App\Http\Controllers\ADChangePasswordController@index')->name('change-password-admin')
            ->middleware('checkAll');
        Route::post('/changePassword','App\Http\Controllers\ADChangePasswordController@store')->name('post-change-password-admin');

        //Thống kê doanh thu
        Route::get('/sales','App\Http\Controllers\SalesController@getSales')->name('get-sales')->middleware('checkQuanTriVien');

        // Quản lý tin tức
        Route::group(['prefix'=>'tin-tuc','middleware' => 'checkQuanTriVien'],
            function (){
                Route::get('/them', 'App\Http\Controllers\TinTucController@getThem')->name('them-tin-tuc');
                Route::post('/them', 'App\Http\Controllers\TinTucController@postThem')->name('postThemTinTuc');
                Route::get('/danhsach', 'App\Http\Controllers\TinTucController@getDanhSach')->name('quan-ly-tin-tuc');
            }
        );

        // NHÂN VIÊN BÁN HÀNG
        // Thông tin cá nhân
        Route::get('/information-ban-hang','App\Http\Controllers\InfoController@getInfoBanHang')->name('info-ban-hang')
            ->middleware('checkAll');
        Route::post('/update-information-ban-hang/{id}','App\Http\Controllers\InfoController@postInfoBanHang')->name('update-info-ban-hang')
            ->middleware('checkAll');

        //Thay đổi mật khẩu
        Route::get('/changePassword-ban-hang','App\Http\Controllers\ADChangePasswordController@indexBanHang')->name('change-password-admin-ban-hang')
            ->middleware('checkAll');
        Route::post('/changePassword-ban-hang','App\Http\Controllers\ADChangePasswordController@storeBanHang')->name('post-change-password-admin-ban-hang');

        // Duyệt đơn hàng
        Route::group(['prefix'=>'duyetHD-ban-hang','middleware' => 'checkBanHang'],
            function (){

                // tất cả hóa đơn
                Route::get('danhsach', 'App\Http\Controllers\DuyetHDController@getDanhSachBanHang')->name('quanlyHD-ban-hang');
                //Xem theo trang thai
                Route::get('chua-duyet', 'App\Http\Controllers\DuyetHDController@getDSChuaDuyetBanHang')->name('chua-duyet-ban-hang');
                // giao shipper có 2 TH: bị từ chối, chưa phản hồi
                Route::get('da-giao-shipper', 'App\Http\Controllers\DuyetHDController@getDSDaGiaoShipperBanHang')->name('da-giao-shipper-ban-hang');
                Route::get('da-duyet', 'App\Http\Controllers\DuyetHDController@getDSDaDuyetBanHang')->name('da-duyet-ban-hang');
                Route::get('da-mua', 'App\Http\Controllers\DuyetHDController@getDSDaMuaBanHang')->name('da-mua-ban-hang');
                Route::get('da-huy', 'App\Http\Controllers\DuyetHDController@getDSDaHuyBanHang')->name('da-huy-ban-hang');
                // Chi tiết hóa đơn
                Route::get('chitietHD/{id}', 'App\Http\Controllers\DuyetHDController@getChiTietBanHang')->name('chi_tiet_hd-ban-hang');
                // chọn nguoi-giao-hang giao hàng
                Route::post('chitietHD', 'App\Http\Controllers\DuyetHDController@chonShipperBanHang')->name('chon-nguoi-giao-hang-ban-hang');
                // Tìm kiếm HĐ theo mã, tên khách hàng
                Route::get('/tim-kiem-hoa-don', 'App\Http\Controllers\SearchOrderController@searchBanHang')->name('search-order-ban-hang');

                // load số đơn hàng chờ duyệt
                Route::get('/load-count-order','App\Http\Controllers\CountOrderController@loadcount');
                Route::get('/load-count-order2','App\Http\Controllers\CountOrderController@loadcount2');
                Route::get('/load-count-order3','App\Http\Controllers\CountOrderController@loadcount3');
            }
        );

        // NHÂN VIÊN NHẬP KHO
        // Thông tin cá nhân
        Route::get('/information-nhap-kho','App\Http\Controllers\InfoController@getInfoNhapKho')->name('info-nhap-kho')
            ->middleware('checkAll');
        Route::post('/update-information-nhap-kho/{id}','App\Http\Controllers\InfoController@postInfoNhapKho')->name('update-info-nhap-kho')
            ->middleware('checkAll');

        //Thay đổi mật khẩu
        Route::get('/changePassword-nhap-kho','App\Http\Controllers\ADChangePasswordController@indexNhapKho')->name('change-password-admin-nhap-kho')
            ->middleware('checkAll');
        Route::post('/changePassword-nhap-kho','App\Http\Controllers\ADChangePasswordController@storeNhapKho')->name('post-change-password-admin-nhap-kho');

        // Quản lý kho hàng
        Route::group(
            ['prefix' => 'khohang-nv', 'middleware' => 'checkNhapKho'],
            function () {
                Route::get('danhsach', 'App\Http\Controllers\KhoHangController@getDanhSachKhoHang')->name('dsKhoHang-nhap-kho');
                Route::get('them', 'App\Http\Controllers\KhoHangController@getThemKhoHang')->name('formSanPham-nhap-kho');
                Route::post('tim-kiem', 'App\Http\Controllers\KhoHangController@searchKhoHang')->name('searchProduct-nhap-kho');
                Route::get('chi-tiet-nhap/{id}','App\Http\Controllers\KhoHangController@detailKhoHang')->name('chiTietNhapKho-nhap-kho');
                Route::post('them', 'App\Http\Controllers\KhoHangController@postThemKhoHang')->name('actionThemKhoHang-nhap-kho');
            }
        );
    }
);
//SHIPPER
Route::group(
    ['prefix' => 'nguoi-giao-hang'],
    function () {
        Route::get('/','App\Http\Controllers\ShipperController@login')->name('loginShipper');
        Route::post('/test-login-nguoi-giao-hang', 'App\Http\Controllers\ShipperController@check')->name('xy-ly-dang-nhap-nguoi-giao-hang');

        Route::get('/trangchu',function () {
            return view('nguoi-giao-hang.trangchu');
        })->name('homeShipper');

        Route::get('logout', 'App\Http\Controllers\ShipperController@logout')->name('logoutSP');
        Route::get('/status', 'App\Http\Controllers\ShipperController@status')->name('statusShipper');
//        Route::post('/chuyen-ban-giao-hang', 'App\Http\Controllers\ShipperController@chuyenBanGiaoHang')->name('chuyen-ban-giao-hang');
//        Route::post('/chuyen-trong-don-hang', 'App\Http\Controllers\ShipperController@chuyenTrongDonHang')->name('chuyen-trong-don-hang');

        Route::group(
            ['prefix' => 'hoadon', 'middleware' => 'checkNguoiGiaoHang'],
            function () {
                Route::get('/don-can-giao', 'App\Http\Controllers\ShipperController@danhSachDonCanGiao')->name('don-hang-can-giao');
                Route::get('/chi-tiet-don-can-giao/{id}', 'App\Http\Controllers\ShipperController@chiTietDonCanGiao')->name('chi-tiet-don-can-giao');
                Route::post('/xac-nhan-giao-hang', 'App\Http\Controllers\ShipperController@xacNhan')->name('xac-nhan-giao-hang');
                Route::post('/tu-choi-giao-hang', 'App\Http\Controllers\ShipperController@tuChoi')->name('tu-choi-giao-hang');
                Route::get('/don-dang-giao', 'App\Http\Controllers\ShipperController@danhSachDonDangGiao')->name('don-hang-dang-giao');
                Route::get('/chi-tiet-don-dang-giao/{id}', 'App\Http\Controllers\ShipperController@chiTietDonDangGiao')->name('chi-tiet-don-dang-giao');
                Route::post('/don-da-giao', 'App\Http\Controllers\ShipperController@daGiaoThanhCong')->name('giao-hang-thanh-cong');
                Route::get('/don-da-giao', 'App\Http\Controllers\ShipperController@danhSachDonDaGiao')->name('don-hang-da-giao');
                Route::get('/chi-tiet-don-da-giao/{id}', 'App\Http\Controllers\ShipperController@chiTietDonDaGiao')->name('chi-tiet-don-da-giao');
                Route::get('/don-tu-choi', 'App\Http\Controllers\ShipperController@danhSachTuChoi')->name('don-hang-da-huy');
                Route::get('/chi-tiet-don-tu-choi/{id}', 'App\Http\Controllers\ShipperController@chiTietDonTuChoi')->name('chi-tiet-don-tu-choi');
            }
        );
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
                // search ajax
                Route::post('/autocomplete-ajax','App\Http\Controllers\SearchProductController@autocomplete');
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
                Route::post('/add', 'App\Http\Controllers\CartController@store')->name('add-cart');
                Route::get('/view-cart', 'App\Http\Controllers\CheckoutController@showView')->name('view-cart');
                Route::post('delete/{id}', 'App\Http\Controllers\CheckoutController@deleteCart')->name('delete-cart');
                // Ap dung khuyen mai
                Route::post('/app-promotion','App\Http\Controllers\CheckoutController@applyPromo')->name('applyPromotion');
                // delete khuyến mãi
                Route::post('/delete-promotion','App\Http\Controllers\CheckoutController@deletePromo')->name('applyPromotion');
                // load count cart
                Route::get('/load-cart-data','App\Http\Controllers\CartController@loadcount');
            }
        );
        //WishList
        Route::group(
            ['prefix' => 'wishlist', 'middleware' => 'loginKH'],
            function () {
                Route::post('/add', 'App\Http\Controllers\WishlistController@wishList')->name('add-wishlist');
                Route::get('/view-list', 'App\Http\Controllers\WishlistController@viewList')->name('wishList');
                Route::post('delete/{id}', 'App\Http\Controllers\WishlistController@deleteList')->name('detele-wish-list');
            }
        );
        // Mua hàng
        Route::group(
            ['prefix' => 'buy-products', 'middleware' => 'loginKH'],
            function () {
                //Kiem tra truoc khi thanh toan
                Route::get('/billing-details', 'App\Http\Controllers\BuyProductsController@proceedCheckout')->name('proceed-to-checkout');
                //Huy don hang khi trang thai chua duyet
                Route::post('/delete-order/{id}', 'App\Http\Controllers\DeleteOrderController@delete')->name('delete-order');
                // cap nhat gio hàng
                Route::post('/api/update-cart', 'App\Http\Controllers\CartApiController@updateCart')->name('getProductDetailApi');
            }
        );
        //Thông tin đơn hàng
        Route::group(
            ['prefix' => 'don-hang', 'middleware' => 'loginKH'],
            function () {
                //lịch sử mua hàng
                Route::post('/chi-tiet', 'App\Http\Controllers\BuyProductsController@orderSuccess')->name('order');
                Route::get('/chi-tiet', 'App\Http\Controllers\OrderHistoryController@getData')->name('lich-su-mua-hang');
                //Chi tiết từng hóa đơn
                Route::get('/chi-tiet-hoa-don/{id}','App\Http\Controllers\BuyProductsController@billDetailView')->name('bill-detail');
                // đánh giá sao SP sau khi mua
                Route::get('/danh-gia/{id}', 'App\Http\Controllers\KhachHangController@listDetailColorProductRating')->name('danh-gia-san-pham');
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

        //KH xác nhận lấy hàng
        Route::post('/accept-order','App\Http\Controllers\DuyetHDController@confirm')->name('accept-order')->middleware('loginKH');
        //Thanh toán bằng MOMO
        Route::post('/momo_payment','App\Http\Controllers\CheckoutController@momoPayment')->name('thanh-toan-MOMO')->middleware('loginKH');

        Route::group(
            ['prefix' => 'mail'],
            function () {
                Route::get('/mail-order','App\Http\Controllers\MailController@getData')->name('getMail');
            }
        );
        // đánh giá sản phẩm
        Route::post('/insert-rating','App\Http\Controllers\RatingController@rating');
        Route::post('/insert-comment','App\Http\Controllers\RatingController@comment')->name('add-comment')->middleware('loginKH');

        // Xem tin tức
        Route::get('/xem-tin-tuc','App\Http\Controllers\TinTucController@docTinTuc')->name('xem-tin-tuc');
        Route::get('/xem-tin-tuc/{id}','App\Http\Controllers\TinTucController@chiTietTinTuc')->name('chi-tiet-tin-tuc');
    }
);
//Route::post('/api/confirm', 'App\Http\Controllers\ApiConfirmOrderController@confirmOrder');
?>

