@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="khach_hang_asset/assets/css/linh.css">
@endsection()

@section('content')

    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Chi tiết đơn hàng</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Home</a></li>
                            <li>Chi tiết đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                    <div class="card card-bordered">
                        @foreach($cthd as $ct)
                            <div class="card-inner">
                                <div class="row pb-5">
                                    <div class="col-lg-4">
                                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                                            <div class="slider-init">
                                                <div class="slider-item rounded" style="width: 300px; height:400px;">
                                                    <img src="admin_asset/image_son/mau_san_pham/{{$ct->hinhanh}}" style=" padding-left: 10px; padding-top: 40px" class="w-100" alt="" >
                                                </div>
                                            </div>
                                        </div><!-- .product-gallery -->
                                    </div><!-- .col -->
                                    <div class="col-lg-8">
                                        <div class="product-info mt-5 mr-xxl-5">
                                            <h2 class="product-title">{{$ct->mau}} </h2>
                                            <h4 class="product-price text-primary">Giá {{ $ct->don_gia }} VNĐ</h4>
                                            <div class="product-rating">

                                            </div><!-- .product-rating -->
                                            <div class="lead" style="size: 15px">
                                                <p >{{$ct->thongTinMau}}</p>
                                            </div>

                                            <div class="product-meta">
                                                <p>{{$ct->trangthai}}</p>
                                            </div><!-- .product-meta -->
                                        </div><!-- .product-info -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                        @endforeach
                    </div>
            </div>

        </div>
    </div>
    <!-- Shop Main Area End Here -->
@endsection

