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
                    <h3 class="title-3">Shop Sidebar</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="row flex-row-reverse">

            @yield('all-product')

            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget widget-mt">
                    <div class="widget_inner">
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Tìm kiếm</h3>
                            <div class="search-box">
                                <div class="input-group" >
                                    <input type="text" style="height: 50px; width: 200px" class="form-control" placeholder="Search Our Store" aria-label="Search Our Store">
                                    <span class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fa fa-search" style="height: 35px; padding-top: 10px "></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Giá</h3>
                            <!-- Widget Menu Start -->
                            <form action="#">
                                <div id="slider-range"></div>
                                <button type="submit">Bộ lọc</button>
                                <input type="text" name="text" id="amount" />
                            </form>
                            <!-- Widget Menu End -->
                        </div>
                    </div>

                    @include('khach_hang.shop.menu')

                </aside>
                <!-- Sidebar Widget End -->
            </div>

        </div>

    </div>
</div>
<!-- Shop Main Area End Here -->
@endsection
