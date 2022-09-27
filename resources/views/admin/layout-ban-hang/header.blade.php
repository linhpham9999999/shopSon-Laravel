<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="{{route('homeBanHang')}}">
                        <div class="nk-news-icon">
                            <em class="icon ni ni-card-view"></em>
                        </div>
                        <div class="nk-news-text" style="width: 300px">
                            <p>Hệ thống quản lý SHOP SON HLYNK Lipstick</p>
                        </div>
                    </a>
                </div>
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown language-dropdown d-none d-sm-block mr-n1">
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-s1">
                            <ul class="language-list">
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="./images/flags/english.png" alt="" class="language-flag">
                                        <span class="language-name">English</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                        <span class="language-name">Español</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="./images/flags/french.png" alt="" class="language-flag">
                                        <span class="language-name">Français</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="language-item">
                                        <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                        <span class="language-name">Türkçe</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li><!-- .dropdown -->
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">
                                        @if(\Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->check())
                                            {{ \Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->user()->hoten }}
                                        @endif
                                    </div>
                                    <div>
                                        @if(\Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->check())
                                        <a href="{{route('logoutBH')}}"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">
                                             @if(\Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->check())
                                                {{ \Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->user()->hoten }}
                                            @endif
                                        </span>
                                        <span class="sub-text">
                                            @if(\Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->check())
                                                {{ \Illuminate\Support\Facades\Auth::guard('nhan_vien_ban_hang')->user()->hoten }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="html/user-profile-regular.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                    {{--                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>--}}
                                    {{--                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>--}}
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    {{--                                    @if(\Illuminate\Support\Facades\Auth::guard('quan_tri')->check())--}}
                                    <li><a href="{{route('logoutBH')}}"><em class="icon ni ni-signout"></em><span>Sign out</span></a>
                                        {{--  @endif--}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fliud -->
</div>
