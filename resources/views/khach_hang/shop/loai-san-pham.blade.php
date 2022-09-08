@extends('khach_hang.shop.menu')

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
            @foreach($listSP as $sp)
                <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                    <div class="product-item">
                        <div class="single-product position-relative mr-0 ml-0">
                            <div class="product-image">
                                <div class="d-block" > {{--Chi tiết sản phẩm--}}
                                    <img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" alt="" class="product-image-1 w-100" width="350px" height="300px">
                                    {{--img src="khach_hang_asset/assets/images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">--}}
                                </div>
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
                                    <h4 class="title-2"> {{$sp->ten_SP}}</h4>
                                </div>
{{--                                @if($sp->sosao == 0)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 1)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 2)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 3)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 4)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @else($sp->sosao == 5)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <div class="price-box">
                                    <span class="regular-price ">{{ $sp->gia_ban_ra }} </span>
                                </div>
                                <a href="{{route('list-color-product',['id' => $sp->id])}}" class="btn product-cart">CHỌN MÀU SON</a>
                            </div>
                            <div class="product-content-listview">
                                <div class="product-title">
                                    <h4 class="title-2"> {{$sp->ten_SP}}</h4>
                                </div>
{{--                                @if($sp->sosao == 0)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 1)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 2)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 3)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @elseif($sp->sosao == 4)--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star-o"></i>--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <div class="product-rating">--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                                <div class="price-box">
                                    <span class="regular-price ">{{ $sp->gia_ban_ra }}</span>
                                </div>
                                <p class="desc-content">{{$sp->gioithieu}}</p>
                                <div class="button-listview">
                                    <a href="{{route('list-color-product',['id' => $sp->id])}}" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"> <span>CHỌN MÀU SON</span> </a>
                                    <form>
                                        {{csrf_field()}}
                                        <a class="list-icon" title="Add To Wishlist">
                                            <button type="button" data-toggle="modal" data-target="#xemnhanh" class="quick-view xemnhanh" name="xemnhanh" data-id_product="{{$sp->id}}"><i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="xem chi tiết"></i></button>
                                        </a>
                                    </form>
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
                                                <p class="quickview"><strong>Số lượng tồn: </strong><span id="procduct_quickview_slton"></span></p>
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
    </div>
@endsection
