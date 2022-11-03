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
                        <h3 class="title-3">Giỏ hàng</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                            <li>Giỏ hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            @if( !empty($products) === true)
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Ảnh</th>
                                    <th class="pro-quantity">Tên sản phẩm</th>
                                    <th class="pro-quantity">Màu son</th>
                                    <th class="pro-title">Giá</th>
                                    <th class="pro-title">Số lượng</th>
                                    <th class="pro-subtotal">Tổng giá</th>
                                    <th class="pro-remove">Xóa</th>
                                </tr>
                                </thead>
                                @foreach($products as $product)
                                <tbody>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_asset/image_son/mau_san_pham/{{$product['image']}}" alt="Product" /></a></td>
                                        <td class="pro-quantity">{{$product['name']}}</td>
                                        <td class="pro-quantity">{{$product['color']}}</td>
                                        <td class="pro-title"><span>{{ number_format($product['unit_price'],0,',','.')}}</span></td>
                                        {{--                                    <td class="pro-title"><input type="number" style="width:35px;" name="quantity" value="{{ $product['quantity'] }}"></td>--}}
                                        <td class="pro-quantity">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="{{ $product['quantity'] }}" type="text" name="quantitys[][quantity]">
                                                    <input class="js-product-id" value="{{ $product['id'] }}" type="text">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pro-subtotal"><span>{{ number_format($product['unit_price']*$product['quantity'],0,',','.') }}</span></td>
                                        <td class="pro-remove">
                                            <input type="hidden" class="product_id_cart_delete" value="{{$product['id']}}">
                                            @if((Auth::guard('nguoi_dung')->check() || !empty(session('user_login'))))
                                            <a class="delete-cart-to-btn" onclick="deleleProductFromCart('{{route('delete-cart',['id'=>$product['id']])}}')">
                                                <i class="lnr lnr-trash"></i>
                                            </a></td>
                                            @else
                                                <a class="request-login" href="{{route('loginKH')}}">
                                                    <i class="lnr lnr-trash"></i>
                                                </a>
                                            @endif
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="cart-update-option d-block d-md-flex justify-content-between" style="border: 1px solid white;">
                            <div class="apply-coupon-wrapper" style=" width: 420px;margin-left: 710px;">
{{--                                <button type="submit" class="btn flosun-button primary-btn rounded-0 black-btn">Cập nhật giỏ hàng</button>--}}
{{--                                <a href="{{route('allSanPham')}}" class="btn flosun-button primary-btn rounded-0 black-btn">Tiếp tục mua hàng</a>--}}
                                <span style="padding-right:10px "> <strong>Mã khuyến mãi: </strong></span>
                                @if(!empty($promotion))
                                    @foreach($promotion as $promo)
                                        <span style="border: 2px none slategray;border-right-style: solid;padding-right:7px;padding-left:7px">#{{$promo->Ma_KM}} (-{{$promo->phan_tram}}%)</span>
                                    @endforeach
                                @else
                                    <span style="padding-right:7px;padding-left:7px">Không có</span>
                                @endif
                            </div>
                        </div>
                        <div class="cart-update-option d-block d-md-flex justify-content-between" style="border: 1px solid white;">
                            <div class="apply-coupon-wrapper" style=" margin-left: 505px;">
                                <form action="#" method="post" class=" d-block d-md-flex">
                                    {{csrf_field()}}
                                    <input class="promotion_code" type="text" name="maKM" style="width: 350px;margin-left: 205px;" placeholder="Nhập mã giảm giá" required />
                                    <button class="btn flosun-button primary-btn rounded-0 black-btn apply-promotion-code">Áp dụng</button>
                                    <button style="margin-left: 2px" class="btn flosun-button primary-btn rounded-0 black-btn delete-promotion-code">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto col-custom">
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Cart Totals</h3>
                                <div class="table-responsive">
                                    <table class="table">
{{--                                        @foreach($products as $product)--}}
                                        <tr>
                                            <td>Sub Total
                                                -{{$product['promotion']}}%
                                            </td>
                                            <td>{{ number_format( $subPrice * (1 - $product['promotion']*0.01) ,0,',','.')  }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>{{ $shipping }}</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount">{{number_format( ($subPrice * (1 - $product['promotion']*0.01)) +  $shipping,0,',','.') }}</td>
                                        </tr>
{{--                                        @endforeach--}}
                                    </table>
                                </div>
                            </div>
                            <a href="{{route('proceed-to-checkout')}}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Kiểm tra trước khi đặt hàng</a>
                        </div>
                    </div>
                </div>

            @elseif( empty($products) === true)
                <h2>Không có sản phẩm</h2>
            @endif
        </div>
    </div>
@endsection
