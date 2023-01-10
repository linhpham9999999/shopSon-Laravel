<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu" style="background-color: aquamarine">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="html/index.html" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="admin_asset_new/images/logo-dark.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="admin_asset_new/images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('homeAd')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text" style="color: black">Trang chủ</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('dsLSP')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-panel"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý loại sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('dsSP')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('dsMSP')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-group-wd"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý màu sản phẩm</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{route('dsNV')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý nhân viên</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('danhsachKH')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý khách hàng</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('danhsachShipper')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-truck"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý shipper</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('dsKhoHang')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-archived"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý kho hàng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('dsKhoHang')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Danh sách</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('formSanPham')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Thêm</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('quanlyHD')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý đơn hàng<sup class="hd-cho-duyet" style="color: firebrick;font-size: 15px;"></sup></span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('quanlyHD')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Tất cả</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('chua-duyet')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Chưa duyệt<sup class="hd-chua-duyet" style="color: firebrick;font-size: 15px;"></sup></span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-giao-shipper')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Đơn đã giao vận chuyển<sup class="hd-cho-shiper-duyet" style="color: firebrick;font-size: 15px;"></sup></span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-duyet')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Đơn đang giao</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-mua')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Giao thành công & Đã mua</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-huy')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Đã hủy</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('get-sales')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                            <span class="nk-menu-text"  style="color: black">Thống kê doanh thu</span>
                            {{--                            Doanh thu theo tuần, tháng, năm ; Sản phẩm bán chạy nhất, bán ít nhất--}}
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('dsKhuyenMai')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
                            <span class="nk-menu-text" style="color: black">Quản lý khuyến mãi</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('quan-ly-cmt')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý bình luận</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('quan-ly-cmt')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Bình luận chờ duyệt</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('danh-sach-cmt')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Danh sách bình luận</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('them-tin-tuc')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý tin tức</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('them-tin-tuc')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Viết bài</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('quan-ly-tin-tuc')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Liệt kê tin tức</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('info')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text" style="color: black"> Thông tin cá nhân</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('info')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Chỉnh sửa thông tin</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('change-password-admin')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Đổi mật khẩu</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item">
                        <a href="https://ahachat.com/bots/58583239/chat/all" target="_blank" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-mail-fill"></em></span>
                            <span class="nk-menu-text" style="color: black"> Chat với khách hàng</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
