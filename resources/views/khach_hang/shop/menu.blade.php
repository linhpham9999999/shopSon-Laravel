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
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Tìm kiếm sản phẩm</h3>
                            <form action="{{route('search-product')}}" method="POST">
                                {{csrf_field()}}
                                <div class="search-box">
                                    <div class="input-group" >
                                        <span>
                                            <input type="text" name="keywords_submit" style="height: 50px; width: 200px" class="form-control" placeholder="Nhập tên sản phẩm" aria-label="Search Our Store">
                                        </span>
                                        <span>
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <i class="fa fa-search" style="height: 35px; padding-top: 10px "></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                    </div>

                    <div class="widget-list widget-mb-1"  style="font-size: 20px; color: black;margin-bottom: 0px">
                        <h3 class="widget-title" style="margin-bottom: 0px">Danh mục</h3>
                        <div ><hr style="background-color: #B1BDB2; height: 2px; margin-top: 15px;margin-bottom: 0px" ></div>
                        <div class="sidebar-body" style=" padding: 3px 0px 3px 0px;">
                            <a href="{{route('allSanPham')}}" style=" text-decoration: none; color: black;margin-top: 10px" >Tất cả sản phẩm</a></li>
                        </div>
                    </div>
                    <div id="menu" style="margin-top: 20px" >
                        <ul>
                            @foreach($loaisp as $lsp)
                                <li>
                                    <a href="khach_hang/shop/product-type/{{$lsp->id}}" style="background-color: #B3BDBD; padding: 5px 0px 5px 0px">{{$lsp->ten_LSP}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </aside>
                <!-- Sidebar Widget End -->
            </div>

        </div>

    </div>
</div>
<!-- Shop Main Area End Here -->
@endsection
