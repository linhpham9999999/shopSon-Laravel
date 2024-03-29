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
                        <a href="{{route('homeNK')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text" style="color: black">Trang chủ</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('dsKhoHang-nhap-kho')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-archived"></em></span>
                            <span class="nk-menu-text"  style="color: black">Quản lý kho hàng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('dsKhoHang-nhap-kho')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Danh sách</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('formSanPham-nhap-kho')}}" class="nk-menu-link"><span class="nk-menu-text"  style="color: black">Thêm</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('info-nhap-kho')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text" style="color: black"> Thông tin cá nhân</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('info-nhap-kho')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Chỉnh sửa thông tin</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('change-password-admin-nhap-kho')}}" class="nk-menu-link"><span class="nk-menu-text" style="color: black">Đổi mật khẩu</span></a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
