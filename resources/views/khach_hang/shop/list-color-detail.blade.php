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
                            <li>Chi tiết sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <div class="card card-bordered">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @foreach($mausp as $msp)
                        <div class="card-inner">
                            <div class="row pb-5">
                                <div class="col-lg-6">
                                    <div class="product-gallery mr-xl-1 mr-xxl-5">
                                        <div class="slider-init">
                                            <div class="slider-item rounded product-image">
                                                <img src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" style=" padding-left: 10px" class="w-100" alt="" >
                                            </div>
                                        </div>
                                    </div><!-- .product-gallery -->
                                </div><!-- .col -->
                                <div class="col-lg-6">
                                    <div class="product-info mt-5 mr-xxl-5">
                                        <h4 class="product-price text-primary">{{ $msp->gia_ban_ra }}VNĐ</h4>
{{--                                        <small class="text-muted fs-14px old-price"> đã giảm {{$msp->giamgia}}</small>--}}
                                        <h2 class="product-title">{{$msp->ten_SP}} {{$msp->mau}}</h2>
                                        <div class="product-rating">

                                        </div><!-- .product-rating -->
                                        <div class="lead" style="size: 15px">
                                            <p >{{$msp->thongTinMau}}</p>
                                        </div>
                                        <div class="product-meta">
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Hạn sử dụng</div>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Xuất xứ</div>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Trọng lượng</div>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Số lượng tồn</div>
                                                </li>
                                                <li>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->hansudung_thang}} tháng</div>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->xuatxu}}</div>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->trongluong}}gram</div>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->soluongton}} thỏi</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-meta">
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-16px text-muted" style="font-weight: bold; padding-top: 9px">Số lượng mua</div>
                                                </li>
                                                <li>
                                                    <div class="fs-18px fw-bold text-secondary" style="padding-left: 10px">
                                                        <form action="{{route('add-cart')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="text" name="number" style=" width: 100px" class="form-control number-spinner">
                                                            <div class="error"> {{$errors->first('number')}}</div>
                                                            @if(session('testquantity'))
                                                                <div class="error">{{session('testquantity')}}</div>
                                                            @endif
                                                            <input type="hidden" name="productId" value="{{$msp->id_SP}}">
                                                            <input type="hidden" name="productIdColor" class="cart_product_id_{{$msp->id}}" value="{{$msp->id}}">
                                                            {{--<button type="button" style="border: 2px solid green; margin-top: 30px; background-color: green; color: whitesmoke" class="btn product-cart add-to-cart" name="add-to-cart" data-id_product="{{$msp->id}}">Thêm giỏ hàng</button>--}}
                                                            <input type="submit" value="Thêm giỏ hàng" style="border: 2px solid green; margin-top: 30px; background-color: green; color: whitesmoke">
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-meta">

                                        </div><!-- .product-meta -->
                                    </div><!-- .product-info -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
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

