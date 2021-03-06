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
    <link rel="stylesheet" href="khach_hang_asset/assets/js/sweetalert.css">
    <style>
        .error{
            color: red;
            font-style: italic;
            font-family: Florence, cursive;
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

<script type="text/javascript">
    $(document).ready(function (){
        //Them SP vao gio hang
        $('.add-to-cart').click(function (){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_'+id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/khach_hang/cart/add-cart')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id, _token:_token},/*ten dat: bien var*/
                success:function (data) {
                    swal({
                            title: "???? th??m 1 s???n ph???m v??o gi???",
                            text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                            showCancelButton: true,
                            cancelButtonText: "Xem ti???p",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "??i ?????n gi??? h??ng",
                            closeOnConfirm: false
                        },
                        function () {
                            window.location.href = "{{url('/khach_hang/cart/view-cart')}}";
                        });
                }
            });
        });
        //Them SP yeu thich
        $('.add-wish-list').click(function (){
            var id = $(this).data('id_product_wish');
            var lish_product_id_wish = $('.lish_product_id_wish_'+id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/khach_hang/wishlist/add-wishlist')}}',
                method: 'POST',
                middleware: 'loginKH',
                data:{lish_product_id_wish:lish_product_id_wish, _token:_token},/*ten dat: bien var*/
                success:function (data) {
                    swal({
                            title: "???? th??m s???n ph???m y??u th??ch",
                            // showCancelButton: true,
                            // confirmButtonClass: "btn-success",
                            // closeOnConfirm: false
                        },
                        function () {
                            //window.location.href = "{{url('/khach_hang/wishlist/view-list')}}";
                        });
                }
            });
        });
    });
</script>

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
    {{--$('.chitietHD').click(function(){--}}
    {{--    var id_hoadon = $(this).data('id_hoadon');--}}
    {{--    var _token = $('input[name="_token"]').val();--}}
    {{--    $.ajax({--}}
    {{--        url:"{{url('/khach_hang/billDetailView')}}",--}}
    {{--        method:"POST",--}}
    {{--        dataType:"JSON",--}}
    {{--        data:{id_hoadon:id_hoadon,_token:_token},--}}
    {{--        success:function(data){--}}
    {{--            $('#image').html(data.imageHD);--}}
    {{--            $('#maHD').html(data.maHD);--}}
    {{--            $('#diachiGH').html(data.diachiGH);--}}
    {{--            $('#ngaydat').html(data.ngaydat);--}}
    {{--            $('#ngaygiao').html(data.ngaygiao);--}}
    {{--            $('#sodth').html(data.sodth);--}}
    {{--            $('#tongtien').html(data.tongtien);--}}
    {{--            $('#ghichu').html(data.ghichu);--}}
    {{--            $('#trangthai').html(data.trangthai);--}}
    {{--        }--}}
    {{--    })--}}
    {{--})--}}
</script>

</body>

</html>
