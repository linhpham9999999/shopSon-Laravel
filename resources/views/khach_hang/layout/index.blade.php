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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="khach_hang_asset/assets/images/title-KH.JPG">

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
    <link rel="stylesheet" href="khach_hang_asset/assets/scss/3-pages/_single-product.scss">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="khach_hang_asset/assets/css/style.css">
    <link rel="stylesheet" href="khach_hang_asset/assets/js/sweetalert.css">

    <!--alertify  CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <style>
        .error{
            color: red;
            font-style: italic;
            font-family: Florence, cursive;
        }
        .product-image {
            transition: transform .2s; /* Animation */
        }

        .product-image:hover {
            transform: scale(1.25); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
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
<script src="khach_hang_asset/assets/js/sweetalert.min.js"></script>
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/cart.js') }}"></script>
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/wishlist.js') }}"></script>
<script src="{{asset('khach_hang_asset/assets/js/custom_js/add-cart.js')}}"></script>
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/accept-order.js') }}"></script>
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/loadcart.js') }}"></script>
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/promotion.js') }}"></script>
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/rating.js') }}"></script>
<!-- alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script type="text/javascript">
    $('.xemnhanh').click(function(){
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/khach_hang/quickView')}}",
            method:"POST",
            dataType:"JSON",
            data:{product_id:product_id,_token:_token},
            success:function(data){
                $('#procduct_quickview_image').html(data.product_image);
                $('#procduct_quickview_title').html(data.product_name);
                $('#procduct_quickview_price').html(data.product_price);
                $('#procduct_quickview_tt').html(data.product_trluong);
                $('#procduct_quickview_xx').html(data.product_xuatxu);
                $('#procduct_quickview_hsd').html(data.product_hsd);
                $('#procduct_quickview_content').html(data.product_content);
            }
        })
    })
    $('.xemnhanhmau').click(function(){
        var color_product_id = $(this).data('id_product_color');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/khach_hang/quickViewColor')}}",
            method:"POST",
            dataType:"JSON",
            data:{color_product_id:color_product_id,_token:_token},
            success:function(data){
                $('#procduct_quickview_imageson').html(data.product_imageson);
                $('#procduct_quickview_mamau').html(data.product_mamau);
                $('#procduct_quickview_tenmau').html(data.product_tenmau);
                $('#procduct_quickview_ynghia').html(data.product_ynghia);
            }
        })
    })
</script>
<script type="text/javascript">
    function showDiv(divId, element)
    {
        document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
    }
</script>
<script>
    $(document).ready(function (){
        //Thông báo cho khách hàng khi họ chưa login
        $('.request-login').click(function (e){
            alertify.set('notifier','position','top-right');
            alertify.error('Vui lòng đăng nhập website!');
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    function deleteWishList(url) {
        $.ajax({
            type: "POST",
            url: url,
            success: function(response) {
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    }
    function deleleProductFromCart(url){
        $.ajax({
            type: "POST",
            url: url,
            success: function(response) {
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    }
    function deleteOrder(url){
        $.ajax({
            type: "POST",
            url: url,
            success: function(response) {
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    }
</script>
</body>
</html>
