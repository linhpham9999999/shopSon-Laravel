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
                        <h3 class="title-3">About Us</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>About Us</li>
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
                            <h2 class="section-title-large">Our History</h2>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                        <div class="history-area-content text-center border-0">
                            <p><strong>Captain America: Civil War Christopher Markus and Stephen McFeely see the Hulk as the game over moment.</strong></p>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus. Phasellus eu rhoncus dolor, vitae scelerisque sapien</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brand Logo Area End Here -->
    <!-- Newsletter Area Start Here -->
    <div class="news-letter-area mt-text-6 pb-text-4">
        <div class="container custom-area">
            <div class="row align-items-center">
                <!--Section Title Start-->
                <div class="col-md-6 col-custom">
                    <div class="section-title text-left mb-35">
                        <h3 class="section-title-3">Send Newsletter</h3>
                        <p class="desc-content mb-0">Hãy nhập email của bạn để chúng tôi cập nhật những thông tin mới nhất.</p>
                    </div>
                </div>
                <!--Section Title End-->
                <div class="col-md-6 col-custom">
                    <div class="news-latter-box">
                        <div class="newsletter-form-wrap text-center">
                            <form id="mc-form" class="mc-form">
                                <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">
                                <button id="mc-submit" class="btn rounded-0" type="submit">Subscribe</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                            </div>
                            <!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
