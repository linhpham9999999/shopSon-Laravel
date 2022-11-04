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
            transform: scale(1.25);
        }
        .img-magnifier-container {
            position:relative;
        }

        .img-magnifier-glass {
            position: absolute;
            border: 3px solid #000;
            border-radius: 50%;
            cursor: none;
            /*Set the size of the magnifier glass:*/
            width: 200px;
            height: 200px;
        }
    </style>
    <script>
        function magnify(imgID, zoom) {
            var img, glass, w, h, bw;
            img = document.getElementById(imgID);
            /*create magnifier glass:*/
            glass = document.createElement("DIV");
            glass.setAttribute("class", "img-magnifier-glass");
            /*insert magnifier glass:*/
            img.parentElement.insertBefore(glass, img);
            /*set background properties for the magnifier glass:*/
            glass.style.backgroundImage = "url('" + img.src + "')";
            glass.style.backgroundRepeat = "no-repeat";
            glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
            bw = 3;
            w = glass.offsetWidth / 2;
            h = glass.offsetHeight / 2;
            /*execute a function when someone moves the magnifier glass over the image:*/
            glass.addEventListener("mousemove", moveMagnifier);
            img.addEventListener("mousemove", moveMagnifier);
            /*and also for touch screens:*/
            glass.addEventListener("touchmove", moveMagnifier);
            img.addEventListener("touchmove", moveMagnifier);
            function moveMagnifier(e) {
                var pos, x, y;
                /*prevent any other actions that may occur when moving over the image*/
                e.preventDefault();
                /*get the cursor's x and y positions:*/
                pos = getCursorPos(e);
                x = pos.x;
                y = pos.y;
                /*prevent the magnifier glass from being positioned outside the image:*/
                if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
                if (x < w / zoom) {x = w / zoom;}
                if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
                if (y < h / zoom) {y = h / zoom;}
                /*set the position of the magnifier glass:*/
                glass.style.left = (x - w) + "px";
                glass.style.top = (y - h) + "px";
                /*display what the magnifier glass "sees":*/
                glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
            }
            function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                /*get the x and y positions of the image:*/
                a = img.getBoundingClientRect();
                /*calculate the cursor's x and y coordinates, relative to the image:*/
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /*consider any page scrolling:*/
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x : x, y : y};
            }
        }
    </script>
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
<script src="{{ asset('khach_hang_asset/assets/js/custom_js/search.js') }}"></script>
<!-- alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
{{--<chat>--}}
<script type="text/javascript" src="https://ahachat.com/customer-chats/customer_chat_saHFgB6Ob26364c6a86c1e2.js"></script>
{{--<chat>--}}
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
<script>
    /* Initiate Magnify Function
    with the id of the image, and the strength of the magnifier glass:*/
    magnify("myimage", 2);
</script>
</body>
</html>
