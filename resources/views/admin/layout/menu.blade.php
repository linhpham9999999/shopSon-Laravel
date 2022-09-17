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
                        <a href="{{route('homeAd')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                            <span class="nk-menu-text">Trang chủ</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('dsLSP')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-panel"></em></span>
                            <span class="nk-menu-text">Quản lý loại sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('dsSP')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-row"></em></span>
                            <span class="nk-menu-text">Quản lý sản phẩm</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('dsMSP')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-view-group-wd"></em></span>
                            <span class="nk-menu-text">Quản lý màu sản phẩm</span>
                        </a>
                    </li>
{{--                    quản trị viên--}}
                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                    <li class="nk-menu-item">
                        <a href="{{route('dsNV')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Quản lý nhân viên</span>
                        </a>
                    </li>
{{--                    <li class="nk-menu-item">--}}
{{--                        <a href="{{route('khach_hang')}}" class="nk-menu-link">--}}
{{--                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>--}}
{{--                            <span class="nk-menu-text">Quản lý khách hàng</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nk-menu-item">
                        <a href="{{route('dsKhoHang')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-archived"></em></span>
                            <span class="nk-menu-text">Quản lý kho hàng</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="{{route('da-mua')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text"> Quản lý đơn hàng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('chua-duyet')}}" class="nk-menu-link"><span class="nk-menu-text">Chưa duyệt</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-duyet')}}" class="nk-menu-link"><span class="nk-menu-text">Đã duyệt</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('da-mua')}}" class="nk-menu-link"><span class="nk-menu-text">Đã mua</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('get-sales')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                            <span class="nk-menu-text">Thống kê doanh thu</span>
                            {{--                            Doanh thu theo tuần, tháng, năm ; Sản phẩm bán chạy nhất, bán ít nhất--}}
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('dsKhuyenMai')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-offer"></em></span>
                            <span class="nk-menu-text">Quản lý khuyến mãi</span>
                        </a>
                    </li>
{{--                        <li class="nk-menu-item">--}}
{{--                            <a href="#" class="nk-menu-link">--}}
{{--                                <span class="nk-menu-icon"><em class="icon ni ni-notes-alt"></em></span>--}}
{{--                                <span class="nk-menu-text">Quản lý tin tức</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    <li class="nk-menu-item">
                        <a href="#" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">Quản lý bình luận</span>
                        </a>
                    </li>
                    @endif
{{--                        Nhân viên nhập kho --}}

                    @if(\Illuminate\Support\Facades\Auth::guard('nhan_vien_nhap_kho')->check())
                        <li class="nk-menu-item">
                            <a href="{{route('dsKhoHang')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-archived"></em></span>
                                <span class="nk-menu-text">Quản lý kho hàng</span>
                            </a>
                        </li>
                    @endif
{{--                        Nhân viên bán hàng--}}
                    @if(\Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->check())
                        <li class="nk-menu-item has-sub">
                            <a href="{{route('da-mua')}}" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                                <span class="nk-menu-text"> Quản lý đơn hàng</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('chua-duyet')}}" class="nk-menu-link"><span class="nk-menu-text">Chưa duyệt</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('da-duyet')}}" class="nk-menu-link"><span class="nk-menu-text">Đã duyệt</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('da-mua')}}" class="nk-menu-link"><span class="nk-menu-text">Đã mua</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{route('khach_hang')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Quản lý khách hàng</span>
                            </a>
                        </li>
                    @endif

                    <li class="nk-menu-item has-sub">
                        <a href="{{route('info')}}" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span>
                            <span class="nk-menu-text"> Quản lý tài khoản</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('info')}}" class="nk-menu-link"><span class="nk-menu-text">Chỉnh sửa thông tin</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('change-password-admin')}}" class="nk-menu-link"><span class="nk-menu-text">Đổi mật khẩu</span></a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
