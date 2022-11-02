<header class="main-header-area">
    <!-- Main Header Area Start -->
    <div class="main-header header-sticky">
        <div class="container custom-area">
            <div class="row align-items-center">
                <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                    <div class="header-logo d-flex align-items-center">
                        <a href="{{route('trangchuKH')}}">
                            <img class="img-full" src="khach_hang_asset/assets/images/logo/logo.png"  alt="Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                    <nav class="main-nav d-none d-lg-flex">
                        <ul class="nav">
                            <li>
                                <a href="{{route('trangchuKH')}}">
                                    <span class="menu-text"> Trang chủ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('allSanPham')}}">
                                    <span class="menu-text">Shop</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li><a href="{{route('allSanPham')}}">Sản phẩm </a></li>
                                    <li><a href="{{route('wishList')}}">Sản phẩm yêu thích</a></li>
                                    <li><a href="{{route('getDataKM')}}">Khuyến mãi</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('about_us')}}">
                                    <span class="menu-text"> Giới thiệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">
                                    <span class="menu-text"> Liên hệ</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('view-cart')}}">
                                    <span class="menu-text">Giỏ hàng</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li><a href="{{route('view-cart')}}">Giỏ hàng</a></li>
                                    <li><a href="{{route('lich-su-mua-hang')}}">Lịch sử mua hàng</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('lich-su-mua-hang')}}">
                                    <span class="menu-text"> Tài khoản </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    @if( session('user_login') == null)
                                        <li><a href="{{route('passwordKH')}}">Đổi mật khẩu</a></li>
                                    @endif
                                    <li><a href="{{route('create_account')}}">Đăng ký thành viên</a></li>
                                    <li><a href="{{route('loginKH')}}">Login</a></li>
                                    <li><a href="{{route('logoutKH')}}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-6 col-6 col-custom">
                    <div class="header-right-area main-nav">
                        <ul class="nav">
                            <li class="minicart-wrap">
                                <a href="{{route('view-cart')}}" class="minicart-btn toolbar-btn">
                                    <i class="fa fa-shopping-cart"></i>
                                    @if((Auth::guard('nguoi_dung')->check() || !empty(session('user_login'))))
                                    <span class="cart-item_count cart-count">0</span> <!--Số lượng sản phẩm trong giỏ hàng-->
                                    @endif
                                </a>
                                {{--<div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                    <div class="single-cart-item">
                                        <div class="cart-img">
                                            <a href="cart.html"><img src="khach_hang_asset/assets/images/cart/1.jpg" alt=""></a>
                                        </div>

                                        <div class="cart-text">
                                            <h5 class="title"><a href="cart.html">Odio tortor consequat</a></h5>
                                            <div class="cart-text-btn">
                                                <div class="cart-qty">
                                                    <span>1×</span>
                                                    <span class="cart-price">$98.00</span>
                                                </div>
                                                <button type="button"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="cart-price-total d-flex justify-content-between">
                                        <h5>Tổng tiền :</h5>
                                        <h5>$166.00</h5>
                                    </div>
                                    <div class="cart-links d-flex justify-content-between">
                                        <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">Giỏ Hàng</a>
                                        <a class="btn flosun-button secondary-btn rounded-0" href="checkout.html">Thủ tục thanh toán</a>
                                    </div>
                                </div>--}}
                            </li>
                            <li class="sidemenu-wrap">
                                <i class="fa fa-search"></i>
                                <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-search">
                                    <li>
                                        <form action="{{route('search-product')}}" method="POST">
                                            {{csrf_field()}}
                                            <input name="keywords_submit" id="search_keywords" placeholder="Nhập tên sản phẩm" type="text">
                                            <button type="submit" class="btn-danger">Tìm</button>
                                            <div id="search_ajax"></div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="account-menu-wrap d-none d-lg-flex">
                                <a href="javascript:void(0)" class="off-canvas-menu-btn">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <li class="mobile-menu-btn d-lg-none">
                                <a class="off-canvas-btn" href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper" id="mobileMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>
            <div class="off-canvas-inner">
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search product...">
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <!-- mobile menu end -->
                <div class="offcanvas-widget-area">
                    <ul class="menu-top-menu">
                        <li><a href="{{route('about_us')}}">About Us</a></li>
                    </ul>
                    <p class="desc-content">
                        ....
                    </p> <!--Thông tin về shop-->
                    <div class="top-info-wrap text-left text-black">
                        <ul class="address-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="linhp2494@gmail.com">(1245) 2456 012</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="linhp2494@gmail.com">linhp2494@gmail.com</a>
                            </li>
                        </ul>
                        <div class="widget-social">
                            <a class="facebook-color-bg" title="Facebook-f" href="https://www.facebook.com/pthl0111"><i class="fa fa-facebook-f"></i></a>
                            <a class="twitter-color-bg" title="Twitter" href="https://twitter.com/login?lang=en"><i class="fa fa-twitter"></i></a>
                            <a class="youtube-color-bg" title="Youtube" href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- off-canvas menu start -->
    <div class="off-canvas-menu-wrapper" id="sideMenu">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="off-canvas-inner">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-times"></i>
                </div>
                <!-- offcanvas widget area start -->
                <div class="offcanvas-widget-area">
                    <ul class="menu-top-menu">
                        <li><a href="{{route('about_us')}}">Welcome</a></li>
                    </ul>
                    <p class="desc-content">
                        Chào bạn
                        @if(\Illuminate\Support\Facades\Auth::guard('nguoi_dung')->check())
                            {{ \Illuminate\Support\Facades\Auth::guard('nguoi_dung')->user()->hoten }}
                        @else
                            {{ session('user_login') }}
                        @endif
                        <br> <br>
                        Chào mừng bạn đến với shop Son HLYNKLIPSTICKS của chúng tôi.
                        <br>

                    </p> <!--Thông tin về shop-->
                    <div class="top-info-wrap text-left text-black">
                        <ul class="address-info">
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="hlynklipsticks.@gmail.com">0794246163</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="hlynklipsticks.@gmail.com">hlynklipsticks.@gmail.com</a>
                            </li>
                        </ul>
                        <div class="widget-social">
                            <a class="facebook-color-bg" title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                            <a class="twitter-color-bg" title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="linkedin-color-bg" title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a class="youtube-color-bg" title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                            <a class="vimeo-color-bg" title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                        </div>
                    </div>
                </div>
                <!-- offcanvas widget area end -->
            </div>
        </div>
    </div>

    <!-- off-canvas menu end -->
    <!-- off-canvas menu end -->
</header>
