<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="{{route('homeShipper')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="admin_asset_new/images/logo-shipper.JPG" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="admin_asset_new/images/logo-shipper.JPG" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
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
{{--                    <li class="nk-menu-item">--}}
{{--                        <a href="{{route('loginShipper')}}" class="nk-menu-link">--}}
{{--                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>--}}
{{--                            <span class="nk-menu-text">Trang chủ</span>--}}
{{--                        </a>--}}
{{--                    </li><!-- .nk-menu-item -->--}}
                    <li class="nk-menu-item">
                        <a href="{{route('statusShipper')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text">Thông tin cá nhân</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Danh sách các đơn hàng  <sup class="hd-can-giao" style="color: firebrick;font-size: 15px;"></sup></span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('don-hang-can-giao')}}" class="nk-menu-link"><span class="nk-menu-text">ĐH cần giao  <sup class="hd-can-giao" style="color: firebrick;font-size: 15px;"></sup></span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('don-hang-dang-giao')}}" class="nk-menu-link"><span class="nk-menu-text">ĐH đang giao</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('don-hang-da-giao')}}" class="nk-menu-link"><span class="nk-menu-text">ĐH đã giao</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('don-hang-da-huy')}}" class="nk-menu-link"><span class="nk-menu-text">ĐH từ chối</span></a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
