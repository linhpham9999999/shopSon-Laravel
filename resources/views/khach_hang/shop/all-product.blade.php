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
                            <a class="quick-view" href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                            </a>
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
                             {{--<form action="">
                                 {{csrf_field()}}
                                 <input type="hidden" name="idSP" value="{{$sp1->id}}"/>
                                 <button type="submit" class="btn product-cart">Thêm giỏ hàng</button>
                             </form>--}}
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
                            {{--<a class="list-icon" href="compare.html" title="Compare">
                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="top" title="Compare"></i>
                            </a>
                            <a class="list-icon" href="wishlist.html" title="Add To Wishlist">
                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="top" title="Wishlist"></i>
                            </a>--}}
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
<div class="modal flosun-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                <span class="close-icon" aria-hidden="true">x</span>
            </button>
            @foreach($sanpham as $sp1)
                <div class="modal-body">
                    <div class="container-fluid custom-area">
                        <div class="row">
                            <div class="col-md-6 col-custom">
                                <div class="modal-product-img">
                                    <div class="w-100" href="#">
                                        <img class="w-100" src="admin_asset/image_son/{{$sp1->hinhanhgoc}}" alt="Product1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">
                                                {{$sp1->ten_SP}}
                                            </h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">{{ $sp1->giagoc - $sp1->giamgia }}</span>
                                            <span class="old-price"><del>{{$sp1->giagoc}}</span>
                                        </div>
                                        <div class="product-rating">
                                            @if($sp1->sosao == 0)
                                                <div class="product-rating">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp1->sosao == 1)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp1->sosao == 2)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp1->sosao == 3)
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            @elseif($sp1->sosao == 4)
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
                                            <span>Review</span>
                                        </div>
                                        <p class="desc-content">{{$sp1->gioithieu}}</p>
                                        <div class="quantity-with-btn">
                                            <div class="add-to_btn">
                                                <a class="btn product-cart button-icon flosun-button dark-btn" href="cart.html">Add to cart</a>
                                                <a class="btn flosun-button secondary-btn rounded-0" href="wishlist.html">Add to wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
