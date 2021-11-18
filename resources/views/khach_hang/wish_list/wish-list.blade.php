@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
@endsection()

@section('content')

    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Wishlist</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Home</a></li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Wishlist main wrapper start -->
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="wishlist-main-wrapper mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Wishlist Table Area -->
                    <div class="wishlist-table table-responsive">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if( !empty($wishlist) )
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Hình ảnh</th>
                                <th class="pro-price">Tên sản phẩm</th>
                                <th class="pro-title">Màu</th>
                                <th class="pro-price">Gía</th>
                                <th class="pro-cart">Thêm giỏ hàng</th>
                                <th class="pro-remove">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($wishlist as $list)
                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_asset/image_son/mau_san_pham/{{$list->hinhanh_wl}}" alt="Product" /></a></td>
                                <td class="pro-price">{{$list->ten_san_pham_wl}}</td>
                                <td class="pro-title">{{$list->mau_wl}}</td>
                                <td class="pro-price"><span>{{$list->gia_wl}} VND</span></td>
                                <td class="pro-cart">
                                    <form action="{{route('add-cart')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="productIdColor" class="cart_product_id_{{$list->id_MSP}}" value="{{$list->id_MSP}}">
{{--                                        <button type="button" class="btn product-cart add-to-cart" name="add-to-cart" data-id_product="{{$list->id_MSP}}">Thêm giỏ hàng</button>--}}
                                        <button type="submit" class="btn product-cart add-to-cart" name="add-to-cart">Thêm giỏ hàng</button>
                                    </form>

                                </td>
                                <td class="pro-remove"><a href="{{route('detele-wish-list',['id'=>$list->id])}}"><i class="lnr lnr-trash"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h2>Bạn chưa thêm sản phẩm yêu thích</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
