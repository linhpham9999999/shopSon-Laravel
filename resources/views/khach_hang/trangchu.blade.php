@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
@endsection()

@section('content')
<!-- Slider/Intro Section Start -->
<div class="intro11-slider-wrap section-2">
    <div class="intro11-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="intro11-section swiper-slide slide-5 slide-bg-1 bg-position">
                <!-- Intro Content Start TIÊU ĐỀ SHOP -->
                <div class="intro11-content-2 text-center">
                    <h1 class="different-title" style="color: black">Welcome</h1>
                    <h2 class="title" style="color: blanchedalmond">HLYNK LIPSTICKS</h2>
                    <a href="{{route('allSanPham')}}" class="btn flosun-button  secondary-btn theme-color rounded-0">Bộ sưu tập</a>
                </div>
                <!-- Intro Content End -->
            </div>
            <div class="intro11-section swiper-slide slide-6 slide-bg-1 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content-2 text-center">
                    <h1 class="different-title">Welcome</h1>
                    <h2 class="title">HLYNK LIPSTICKS</h2>
                    <a href="{{route('allSanPham')}}" class="btn flosun-button  secondary-btn theme-color rounded-0">Bộ sưu tập</a>
                </div>
                <!-- Intro Content End -->
            </div>
        </div>
        <!-- Slider Navigation -->
        <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
        <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
        <!-- Slider pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
<!-- Slider/Intro Section End -->
<!-- Shop Collection Start Here -->
<!-- Shop Collection End Here -->
<!--Product Area Start-->
<div class="product-area mt-text-3">
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">The Most Trendy</span>
                    <h3 class="section-title-3">Sản phẩm bán chạy</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row product-row" >
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        @foreach($san_pham_ban_chay as $sp)
                            <div class="single-item swiper-slide">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="{{route('list-color-product',['id'=>$sp->id])}}">
                                            <img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" alt="" class="product-image-1 w-100" width="420px" height="300px">
                                            {{--<img src="khach_hang_asset/assets/images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">--}}
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <form>
                                                {{csrf_field()}}
                                                <a class="list-icon" title="Add To Wishlist">
                                                    <button type="button" data-toggle="modal" data-target="#xemnhanh" class="quick-view xemnhanh" name="xemnhanh" data-id_product="{{$sp->id}}"><i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="xem chi tiết"></i></button>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">{{$sp->ten_SP}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">{{ $sp->gia_ban_ra}} VND</span>
{{--                                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>--}}
                                        </div>
                                        <a href="{{route('list-color-product',['id'=>$sp->id])}}" class="btn product-cart">Chọn màu sản phẩm</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container custom-area-2 overflow-hidden">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">New Product</span>
                    <h3 class="section-title-3">Sản phẩm mới nhất</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row product-row" >
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        @foreach($sanphamnew as $spn)
                            <div class="single-item swiper-slide">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="{{route('list-color-product',['id'=>$spn->id])}}">
                                            <img src="admin_asset/image_son/{{$spn->hinhanhgoc}}" alt="" class="product-image-1 w-100" width="420px" height="300px">
                                            {{--<img src="khach_hang_asset/assets/images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">--}}
                                        </a>
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <form>
                                                {{csrf_field()}}
                                                <a class="list-icon" title="Add To Wishlist">
                                                    <button type="button" data-toggle="modal" data-target="#xemnhanh" class="quick-view xemnhanh" name="xemnhanh" data-id_product="{{$spn->id}}"><i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="xem chi tiết"></i></button>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">{{$spn->ten_SP}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">{{ $spn->gia_ban_ra}} VND</span>
                                            {{--                                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>--}}
                                        </div>
                                        <a href="{{route('list-color-product',['id'=>$spn->id])}}" class="btn product-cart">Chọn màu sản phẩm</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider pagination -->
                    <div class="swiper-pagination default-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="brand-logo-area gray-bg pt-no-text pb-no-text mt-text-5">
    <div class="container custom-area">
        <div class="row">
            <!--Section Title Start-->
            <div class="col-12 col-custom">
                <div class="section-title text-center mb-30">
                    <span class="section-title-1">Our Branchs</span>
                    <h3 class="section-title-3">Các thương hiệu</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row">
            <div class="col-12 col-custom">
                <div class="brand-logo-carousel swiper-container intro11-carousel-wrap arrow-style-3">
                    <div class="swiper-wrapper">
{{--                        @foreach($sanpham as $sp)--}}
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/1">
                                <img src="khach_hang_asset/assets/images/brand/black-rouge.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/4">
                                <img src="khach_hang_asset/assets/images/brand/mac.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/2">
                                <img src="khach_hang_asset/assets/images/brand/3ce.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/9">
                                <img src="khach_hang_asset/assets/images/brand/philo.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/7">
                                <img src="khach_hang_asset/assets/images/brand/vavachi.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/8">
                                <img src="khach_hang_asset/assets/images/brand/dhc.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/6">
                                <img src="khach_hang_asset/assets/images/brand/ysl.JPG" alt="Brand Logo">
                            </a>
                        </div>
                        <div class="single-brand swiper-slide product-image">
                            <a href="http://localhost:8999/shopSon/public/khach_hang/product-color-list/5">
                                <img src="khach_hang_asset/assets/images/brand/dior.JPG" alt="Brand Logo">
                            </a>
                        </div>
{{--                        @endforeach--}}
                    </div>
                    <!-- Slider Navigation -->
                    <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                    <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Product Area End-->
<div class="modal flosun-modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: cursive">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                <span class="close-icon" aria-hidden="true">x</span>
            </button>
            <div class="modal-body">
                <div class="container-fluid custom-area">
                    <div class="row">
                        <div class="col-md-6 col-custom">
                            <div class="modal-product-img">
                                <div id="procduct_quickview_image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-custom">
                            <div class="modal-product">
                                <div class="product-content">
                                    <div class="product-title" >
                                        <h3  id="procduct_quickview_title" style="font-size: 30px; font-weight: bold; border-bottom: 2px solid black; padding-bottom: 5px">
                                        </h3>
                                    </div>
                                    <div class="price-box" style="margin-top: 40px">
                                        <p class="quickview"><strong>Giá sản phẩm: </strong><span id="procduct_quickview_price"></span></p>
                                        <p class="quickview"><strong>Trọng lượng: </strong><span id="procduct_quickview_tt"></span></p>
                                        <p class="quickview"><strong>Xuất xứ: </strong><span id="procduct_quickview_xx"></span></p>
                                        <p class="quickview"><strong>HSD: </strong><span id="procduct_quickview_hsd"></span></p>
                                        <p class="quickview"><strong>Ý nghĩa sản phẩm: </strong><span id="procduct_quickview_content"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
