@extends('khach_hang.shop.danhsach')

@section('all-product')
    <div class="col-lg-9 col-12 col-custom widget-mt">
        <!--shop toolbar start-->
        <div class="shop_toolbar_wrapper mb-30">
            <div class="shop_toolbar_btn">
                <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa fa-th"></i></button>
                <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
            </div>
        </div>
        <div class="row shop_wrapper grid_3">
            @foreach($listColorProduct as $msp)
                <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                    <div class="product-item">
                        <div class="single-product position-relative mr-0 ml-0">
                            <div class="product-image">
                                <div class="d-block" > {{--Chi tiết sản phẩm--}}
                                    <img src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" alt="" class="product-image-1 w-100" width="350px" height="300px">
                                </div>
                                <div class="add-action d-flex flex-column position-absolute">
                                    <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-title">
                                    <h4 class="title-2"> <a href="product-details.html">{{$msp->Ma_MSP}} {{$msp->mau}}</a></h4>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price ">{{ $msp->giagoc - $msp->giamgia }} </span>
                                    <span class="old-price"><del>{{$msp->giagoc}}</del></span>
                                </div>
                                <a href="#" class="btn product-cart">Thêm giỏ hàng</a>
                            </div>
                            <div class="product-content-listview">
                                <div class="product-title">
                                    <h4 class="title-2"> <a href="product-details.html">{{$msp->Ma_MSP}} {{$msp->mau}}</a></h4>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price ">{{ $msp->giagoc - $msp->giamgia }}</span>
                                    <span class="old-price"><del>{{$msp->giagoc}}</del></span>
                                </div>
                                <p class="desc-content">{{$msp->thongTinMau}}</p>
                                <div class="button-listview">
                                    <a href="#" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"> <span>THÊM GIỎ HÀNG</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{--<div class="row">
            <div class="col-sm-12 col-custom">
                <div class="toolbar-bottom">
                    <div class="pagination">
                        <ul>
                            {!! $allSP->links() !!}
                        </ul>
                    </div>
                    <p class="desc-content text-center text-sm-right mb-0">Showing {!! $allSP->firstItem() !!} - {!! $allSP->lastItem() !!}</p>
                </div>
            </div>
        </div>--}}
    </div>
@endsection
