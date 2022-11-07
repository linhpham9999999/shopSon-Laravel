<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
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
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboards</h6>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('homeBanHang')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">Trang chủ</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('dsLSP-ban-hang')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-panel"></em></span>
                            <span class="nk-menu-text">Quản lý loại sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('dsSP-ban-hang')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                            <span class="nk-menu-text">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('dsMSP-ban-hang')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-group-wd"></em></span>
                            <span class="nk-menu-text">Quản lý màu sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('quanlyHD-ban-hang')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Quản lý đơn hàng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('quanlyHD-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Tất cả</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('chua-duyet-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Chưa duyệt</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-giao-shipper-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Đơn đã giao vận chuyển</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-duyet-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Đơn đang giao</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-mua-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Giao thành công & Đã mua</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-huy-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Đã hủy</span></a>
                            </li>
                        </ul>
                    </li>
{{--                    <li class="nk-menu-item">--}}
{{--                        <a href="{{route('khach-hang-bh')}}" class="nk-menu-link">--}}
{{--                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>--}}
{{--                            <span class="nk-menu-text">Quản lý khách hàng</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('info-ban-hang')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text"> Quản lý tài khoản</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('info-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Chỉnh sửa thông tin</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('change-password-admin-ban-hang')}}" class="nk-menu-link"><span class="nk-menu-text">Đổi mật khẩu</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item">
                        <a href="https://ahachat.com/bots/58583239/chat/all" target="_blank" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-mail-fill"></em></span>
                            <span class="nk-menu-text"> Chat với khách hàng</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
