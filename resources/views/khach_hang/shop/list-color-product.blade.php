@extends('khach_hang.shop.menu')

@section('all-product')
    <div class="col-lg-9 col-12 col-custom widget-mt">
        <!--shop toolbar start-->
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
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
                                @if($msp->soluongton < 1)
                                    <span class="onsale">Hết!</span>
                                @endif
                                <div class="add-action d-flex flex-column position-absolute">
                                    <form>  {{--action="{{route('add-wishlist')}}" method="post"--}}
                                        {{csrf_field()}}
                                        {{--<input type="hidden" name="productId" value="{{$msp->id_SP}}">--}}
                                        <input type="hidden" name="productIdColor" class="lish_product_id_wish_{{$msp->id}}" value="{{$msp->id}}">
                                        <a title="Add To Wishlist">
                                            <button type="button" class="add-wish-list" name="add-wish-list" data-id_product_wish="{{$msp->id}}"><i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i></button>
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-title">
                                    <h4 class="title-2"> {{$msp->Ma_MSP}} {{$msp->mau}}</h4>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price ">{{ $msp->gia_ban_ra}} đ</span>
                                    {{--                                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>--}}
                                </div>
                                <a href="{{route('product-color-detail',['id' => $msp->id])}}"> <span>XEM CHI TIẾT SẢN PHẨM</span> </a>
                            </div>
                            <div class="product-content-listview">
                                <div class="product-title">
                                    <h4 class="title-2">{{$msp->Ma_MSP}} {{$msp->mau}}</h4>
                                </div>
                                <div class="price-box">
                                    <span class="regular-price "> {{ $msp->gia_ban_ra }} đ</span>
                                    {{--                                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>--}}
                                </div>
                                <p class="desc-content">{{$msp->thongTinMau}}</p>
                                <div class="button-listview">
                                    <a href="{{route('product-color-detail',['id' => $msp->id])}}" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top"> <span>XEM CHI TIẾT SẢN PHẨM</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12 col-custom">
                <div class="toolbar-bottom">
                    <div class="pagination">
                        <ul>
                            {!! $listColorProduct->links() !!}
                        </ul>
                    </div>
                    <p class="desc-content text-center text-sm-right mb-0">Showing {!! $listColorProduct->firstItem() !!} - {!! $listColorProduct->lastItem() !!}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal flosun-modal fade" id="xemnhanhmau" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: cursive">
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
                                    <div id="procduct_quickview_imageson">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title" >
                                            <span id="procduct_quickview_mamau"></span>
                                            <h3  id="procduct_quickview_tenmau" style="font-size: 30px; font-weight: bold; border-bottom: 2px solid black; padding-bottom: 5px">
                                            </h3>
                                        </div>
                                        <div class="price-box" style="margin-top: 40px">
                                            <p class="quickview"><strong>Ý nghĩa màu son: </strong><span id="procduct_quickview_ynghia"></span></p>
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

@endsection
