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
        @foreach($allSP as $sp)
        <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
            <div class="product-item">
                <div class="single-product position-relative mr-0 ml-0">
                    <div class="product-image">
                        <div class="d-block" > {{--Chi tiết sản phẩm--}}
                            <img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" alt="" class="product-image-1 w-100" width="350px" height="300px">
                            {{--img src="khach_hang_asset/assets/images/product/2.jpg" alt="" class="product-image-2 position-absolute w-100">--}}
                        </div>
                        <div class="add-action d-flex flex-column position-absolute">
                            {{--<a href="compare.html" title="Compare">
                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                            </a>--}}
                            {{--<a href="wishlist.html" title="Add To Wishlist">
                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                            </a>--}}
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
                            <h4 class="title-2">{{$sp->ten_SP}}</h4>
                        </div>
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
                        <div class="price-box">
                            <span class="regular-price ">{{ $sp->giagoc - $sp->giamgia }} </span>
                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>
                        </div>
                        <a href="{{route('list-color-product',['id' => $sp->id])}}" class="btn product-cart">CHỌN MÀU SON</a>
                    </div>
                    <div class="product-content-listview">
                        <div class="product-title">
                            <h4 class="title-2">{{$sp->ten_SP}}</h4>
                        </div>
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
                        @else
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        @endif
                        <div class="price-box">
                            <span class="regular-price ">{{ $sp->giagoc - $sp->giamgia }}</span>
                            <span class="old-price"><del>{{$sp->giagoc}}</del></span>
                        </div>
                        <p class="desc-content">{{$sp->gioithieu}}</p>
                        <div class="button-listview">
                            <a href="{{route('list-color-product',['id' => $sp->id])}}" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top"> <span>CHỌN MÀU SON</span> </a>
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
    <div class="row">
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
    </div>
</div>

<!-- Modal -->
{{--<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: 2px solid red; width: 800px; height: 500px;">
            <div class="modal-header">
                <h5 class="modal-title procduct_quickview_title" id="">
                    <span id="procduct_quickview_title"></span>Modal title
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <span id="procduct_quickview_image"></span>
                    </div>
                    <div class="col-md-7">
                        <style type="text/css">
                            h5.modal-title.procduct_quickview_title{
                                text-align: center;
                                font-size: 25px;
                                color: brown;
                            }
                            p.quickview{
                                font-size: 14px;
                                color: brown;
                            }
                            span#procduct_quickview_content img{
                                width: 100%;
                            }
                             @media screen and (min-width: 768px) {
                                .modal-dialog{
                                    width: 700px;
                                    margin-left:420px;
                                    margin-top: 100px;
                                }
                                .modal-sm{
                                    width: 350px;
                                }
                            }
                            @media screen and (min-width: 992px){
                                .modal-lg{
                                    width: 1200px;
                                }
                            }
                        </style>
                        <h2 class="quickview"><span id="procduct_quickview_title"></span></h2>
                        <p>Ma ID: <span id="procduct_quickview_id"></span></p>
                        <span>
                            <p class="quickview">Gia goc san pham: <span id="procduct_quickview_price"></span></p>
                            <p class="quickview">Giam gia: <span id="procduct_quickview_giamgia"></span></p>
                            <p class="quickview">So luong ton: <span id="procduct_quickview_slton"></span></p>
                            <p class="quickview">Trong luong: <span id="procduct_quickview_tt"></span></p>
                            <p class="quickview">Xuat su: <span id="procduct_quickview_xx"></span></p>
                            <p class="quickview">HSD: <span id="procduct_quickview_hsd"></span></p>
                        </span>
                        <p class="quickview">Mo ta san pham</p>
                        <fieldset>
                            <span id="procduct_quickview_content"></span>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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

@endsection
