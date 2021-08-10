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
                                <th class="pro-subtotal">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_asset/image_son/mau_san_pham/{{ $product['image'] }}" alt="Product" /></a></td>
                                    <td class="pro-title">{{ $product['name'] }}</td>
                                    <td class="pro-title">{{ $product['color'] }}</td>
                                    <td class="pro-quantity">{{ $product['unit_price'] - $product['promotion_price'] }}</td>
                                    <td class="pro-quantity">{{ $product['quantity'] }}</td>
                                    <td class="pro-price">{{ ($product['unit_price'] - $product['promotion_price']) * $product['quantity'] }}</td>
                                    <td class="pro-subtotal">
                                        @foreach($status as $st)
                                            @if( $st->id_TT == 3)
                                                {{ 'Chờ xác nhận' }}
                                            @elseif( $st->id_TT == 1 )
                                                {{ 'Đã mua' }}
                                            @elseif( $st->id_TT == 2 )
                                                {{ 'Đang chờ lấy hàng' }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
