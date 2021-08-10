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
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- cart main wrapper start -->
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            @if($isHasProduct)
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Ảnh</th>
                                <th class="pro-title">Tên sản phẩm</th>
                                <th class="pro-title">Màu son</th>
                                <th class="pro-price">Giá</th>
                                <th class="pro-quantity">Số lượng</th>
                                <th class="pro-subtotal">Tổng giá</th>
                                <th class="pro-remove">Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_asset/image_son/mau_san_pham/{{$product['image']}}" alt="Product" /></a></td>
                                    <td class="pro-title">{{$product['name']}}</td>
                                    <td class="pro-title">{{$product['color']}}</td>
                                    <td class="pro-price"><span>{{ $product['unit_price'] -  $product['promotion_price']}}</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{ $product['quantity'] }}" type="text" name="qty">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>{{ $product['unit_price']*$product['quantity'] -  $product['promotion_price']*$product['quantity'] }}</span></td>
                                    <td class="pro-remove"><a href="{{route('delete-cart',['id' => $product['id']])}}"><i class="lnr lnr-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                        <div class="apply-coupon-wrapper">
                            <form action="#" method="post" class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                <button class="btn flosun-button primary-btn rounded-0 black-btn">Áp dụng giảm giá</button>
                            </form>
                        </div>
                        <div class="cart-update mt-sm-16">
                            <a href="#" class="btn flosun-button primary-btn rounded-0 black-btn">Cập nhật giỏ hàng</a> <!--chuyển đến danh sach giỏ hàng-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>{{ $subPrice }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>{{ $shipping }}</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">{{ $subPrice +  $shipping }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="{{route('proceed-to-checkout')}}" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Kiểm tra trước khi đặt hàng</a>
                    </div>
                </div>
            </div>
            @else
                <h2>Không có sản phẩm</h2>
            @endif
        </div>
    </div>
@endsection
