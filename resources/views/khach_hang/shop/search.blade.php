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
            @foreach($product as $sp)
                <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                    <div class="product-item">
                        <div class="single-product position-relative mr-0 ml-0">
                            <div class="product-image">
                                <div class="d-block" > {{--Chi tiết sản phẩm--}}
                                    <img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" alt="" class="product-image-1 w-100" width="350px" height="300px">
                                </div>
                                <div class="add-action d-flex flex-column position-absolute">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
