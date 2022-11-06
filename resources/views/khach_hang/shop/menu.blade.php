@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="khach_hang_asset/assets/css/linh.css">
    <style>
        .abc{
            width: 350px;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 25px;
            -webkit-line-clamp: 3;
            height: 50px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
    </style>
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
                        <li><a href="{{route('trangchuKH')}}">Home</a></li>
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
                        {{--<div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Tìm kiếm sản phẩm</h3>
                            <form action="{{route('search-product')}}" method="POST">
                                {{csrf_field()}}
                                <div class="search-box">
                                    <div class="input-group" >
                                        <span>
                                            <input type="text" id="search_keywords" name="keywords_submit" style="height: 50px; width: 200px" class="form-control">
                                            <div id="search_ajax"></div>
                                        </span>
                                        <span>
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <i class="fa fa-search" style="height: 35px; padding-top: 10px "></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>--}}
{{--                        <div class="widget-list widget-mb-1">--}}
{{--                            <h3 class="widget-title">Giá</h3>--}}
{{--                            <!-- Widget Menu Start -->--}}
{{--                            <form action="#">--}}
{{--                                <div id="slider-range"></div>--}}
{{--                                <button type="submit">Bộ lọc</button>--}}
{{--                                <input type="text" name="text" id="amount" />--}}
{{--                            </form>--}}
{{--                            <!-- Widget Menu End -->--}}
{{--                        </div>--}}
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Danh mục loại sản phẩm</h3>
                            <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    <li><a href="{{route('allSanPham')}}">Tất cả</a></li>
                                    @foreach($loaisp as $lsp)
                                    <li><a href="khach_hang/shop/product-type/{{$lsp->id}}">{{$lsp->ten_LSP}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list mb-0">
                            <h3 class="widget-title">Sản phẩm mới nhất</h3>
                            <div class="sidebar-body">
                                @foreach($sanphamnew as $spn)
                                <div class="sidebar-product align-items-center">
                                    <a href="{{route('list-color-product',['id'=>$spn->id])}}" class="image">
                                        <img src="admin_asset/image_son/{{$spn->hinhanhgoc}}" alt="product">
                                    </a>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{route('list-color-product',['id' => $spn->id])}}">{{$spn->ten_SP}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">{{ number_format( $spn->gia_ban_ra ,0,',','.')  }} đ</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Main Area End Here -->
@endsection
