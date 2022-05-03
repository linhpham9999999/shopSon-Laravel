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
                    <a href="{{route('allSanPham')}}" class="btn flosun-button  secondary-btn theme-color rounded-0">Shop Collection</a>
                </div>
                <!-- Intro Content End -->
            </div>
            <div class="intro11-section swiper-slide slide-6 slide-bg-1 bg-position">
                <!-- Intro Content Start -->
                <div class="intro11-content-2 text-center">
                    <h1 class="different-title">Welcome</h1>
                    <h2 class="title">HLYNK LIPSTICKS</h2>
                    <a href="{{route('allSanPham')}}" class="btn flosun-button  secondary-btn theme-color rounded-0">Shop Collection</a>
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
                    <h3 class="section-title-3">Sản phẩm nổi bật</h3>
                </div>
            </div>
            <!--Section Title End-->
        </div>
        <div class="row product-row" >
            <div class="col-12 col-custom">
                <div class="product-slider swiper-container anime-element-multi">
                    <div class="swiper-wrapper">
                        @foreach($sanpham as $sp)
                            <div class="single-item swiper-slide">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
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
                                        <div class="product-rating">
                                            @if($sp->sosao == 0)
                                                <div class="product-rating">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp->sosao == 1)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp->sosao == 2)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp->sosao == 3)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp->sosao == 4)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @else($sp->sosao == 5)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">{{ $sp->giagoc - $sp->giamgia }}</span>
                                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>
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
