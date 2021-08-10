<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    {{--<title>Shop son HLYNK Lipsticks</title>--}}
    <base href="{{asset('')}}">
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="khach_hang_asset/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/style.css">

</head>

<body>

<!--===== Pre-Loading area Start =====-->
<div id="preloader">
    <div class="preloader">
        <div class="spinner-block">
            <h1 class="spinner spinner-3 mb-0">.</h1>
        </div>
    </div>
</div>
<!--==== Pre-Loading Area End ====-->

<!-- Header Area Start Here -->
@include('khach_hang.layout.header')
<!-- Header Area End Here -->

@yield('content')

<!-- Testimonial Area Start Here -->
<!-- Testimonial Area End Here -->
<!-- Newsletter Area Start Here -->
<!-- Newsletter Area End Here -->
<!-- Blog Area Start Here -->
<!-- Blog Area End Here -->
<!--Footer Area Start-->
@include('khach_hang.layout.footer')
<!--Footer Area End-->
<!-- Scroll to Top Start -->
<a class="scroll-to-top" href="#">
    <i class="lnr lnr-arrow-up"></i>
</a>
<!-- Scroll to Top End -->

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="khach_hang_asset/assets/js/vendor/modernizr-3.7.1.min.js"></script>
<!-- jQuery JS -->
<script src="khach_hang_asset/assets/js/vendor/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="khach_hang_asset/assets/js/vendor/bootstrap.bundle.min.js"></script>

<!-- Swiper Slider JS -->
<script src="khach_hang_asset/assets/js/plugins/swiper-bundle.min.js"></script>
<!-- nice select JS -->
<script src="khach_hang_asset/assets/js/plugins/nice-select.min.js"></script>
<!-- Ajaxchimpt js -->
<script src="khach_hang_asset/assets/js/plugins/jquery.ajaxchimp.min.js"></script>
<!-- Jquery Ui js -->
<script src="khach_hang_asset/assets/js/plugins/jquery-ui.min.js"></script>
<!-- Jquery Countdown js -->
<script src="khach_hang_asset/assets/js/plugins/jquery.countdown.min.js"></script>
<!-- jquery magnific popup js -->
<script src="khach_hang_asset/assets/js/plugins/jquery.magnific-popup.min.js"></script>

<!-- Main JS -->
<script src="khach_hang_asset/assets/js/main.js"></script>


</body>

</html>
