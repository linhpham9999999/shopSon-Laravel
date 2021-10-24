@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
@endsection()

@section('content')

    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Giới thiệu</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                            <li>Giới thiệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- About Area Start Here -->

    <!-- About Us Area End Here -->
    <!-- History Area Start Here -->
    <div class="our-history-area gray-bg pt-5 mt-text-3">
        <div class="our-history-area">
            <div class="container custom-area">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12 col-custom">
                        <div class="section-title text-center mb-30">
                            <span class="section-title-1">A little story about us</span>
                            <h2 class="section-title-large">SHOP HLYNKLIPSTICKS</h2>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                        <div class="history-area-content text-center border-0">
                            <p><strong>Giới thiệu </strong></p>
                            <p>Chúng tôi là Cửa hàng HLYNKLIPSTICKS, tại địa chỉ 172/10A, Lê Bình, Hưng Lợi, Ninh Kiều, Tp. Cần Thơ chuyên cung cấp những sản phẩm son môi uy tính và chất lượng.</p>
                        </div>
                        <div class="history-area-content text-center border-0">
                            <p><strong>Quy định sử dụng </strong></p>
                            <p>Khi khách hàng muốn mua sản phẩm online tại trang web thì cần phải đăng ký thành viên. Chúng tôi cam kết thông tin của Qúy khách hàng được bảo mật tuyệt đối nếu thông tin bị lộ sẽ chịu trách nhiệm trước pháp luật.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Logo Area End Here -->
    <!-- Newsletter Area Start Here -->
{{--    <div class="news-letter-area mt-text-6 pb-text-4">--}}
{{--        <div class="container custom-area">--}}
{{--            <div class="row align-items-center">--}}
{{--                <!--Section Title Start-->--}}
{{--                <div class="col-md-6 col-custom">--}}
{{--                    <div class="section-title text-left mb-35">--}}
{{--                        <h3 class="section-title-3">Send Newsletter</h3>--}}
{{--                        <p class="desc-content mb-0">Hãy nhập email của bạn để chúng tôi cập nhật những thông tin mới nhất.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Section Title End-->--}}
{{--                <div class="col-md-6 col-custom">--}}
{{--                    <div class="news-latter-box">--}}
{{--                        <div class="newsletter-form-wrap text-center">--}}
{{--                            <form id="mc-form" class="mc-form">--}}
{{--                                <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">--}}
{{--                                <button id="mc-submit" class="btn rounded-0" type="submit">Subscribe</button>--}}
{{--                            </form>--}}
{{--                            <!-- mailchimp-alerts Start -->--}}
{{--                            <div class="mailchimp-alerts text-centre">--}}
{{--                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->--}}
{{--                                <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->--}}
{{--                                <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->--}}
{{--                            </div>--}}
{{--                            <!-- mailchimp-alerts end -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
