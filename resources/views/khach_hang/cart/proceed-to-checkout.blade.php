@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
    <style>
        .formdetails{
            border: 1.5px solid #D8D8D8;
            padding-left: 8px;
            margin-top: 10px;
            height: 40px;
            padding-top: 7px;
        }
    </style>
@endsection()

@section('content')

    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Checkout</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
            <div class="row">
                <form action="{{route('order')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-lg-6 col-12 col-custom" style="float: left">
                        <div class="checkbox-form">
                            <h3>Chi tiết hóa đơn</h3>
                            <p style="font-weight: bold; padding-left: 5px; margin-bottom: 15px; background-color: #F2F2F2; height: 30px; font-size: 15px; margin-right: 80px; padding-top: 5px">Vui lòng cập nhật số điện thoại, địa chỉ giao hàng (nếu thay đổi).</p>
                            @foreach($users as $user)
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Your Name <span class="required">*</span></label>
                                        <p class="formdetails">{{$user->hoten}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address </label>
                                        <p class="formdetails">{{$user->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <p class="formdetails">{{$user->sodth}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <p class="formdetails">{{$user->diachi}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Hình thức thanh toán <span class="required">*</span></label>
                                        <p class="formdetails"><select name="payment">
                                            @foreach($payments as $payment)
                                                <option  value="{{$payment->id}}">{{$payment->ten_HTTT}}</option>
                                            @endforeach
                                        </select></p>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <div>
                                        <input id="ship-box" type="checkbox">
                                        <label for="ship-box">Ship đến một địa chỉ khác?</label>
                                    </div>
                                </div>
                                <div id="ship-box-info" class="row mt-2">
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input placeholder="Địa chỉ" type="text" name="diachi" value="{{$user->diachi}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-custom">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input placeholder="Số điện thoại" type="text" name="sodth" value="{{$user->sodth}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="order-notes mt-3">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Ghi chú</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" name="note" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: những lưu ý đặc biệt khi giao hàng."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 col-custom" style="float: right; " >
                        <div class="your-order">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                    </thead>
                                    @foreach($products as $product)
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="cart-product-name">{{ $product['name'] }} {{ $product['color'] }}<strong class="product-quantity">
                                                    × {{$product['quantity']}}</strong></td>
                                            <td class="cart-product-total text-center" ><span class="amount">{{ ($product['unit_price'] - $product['promotion_price']) * $product['quantity'] }}</span></td>
                                        </tr>
                                    @endforeach
                                    <tr class="cart_item">
                                        <th> Shipping</th>
                                        <td class="cart-product-total text-center"><span class="amount">{{$ship}}</span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="order-total">
                                        <th>Tổng tiền</th>
                                        <td class="text-center"><strong><span class="amount">
                                                 {{ $total + $ship }}
                                                </span></strong></td>
                                    </tr>
                                    <input type="hidden" name="total" value="{{ $total + $ship }}"/>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="order-button-payment">
                                        <input type="hidden" value="3" name="trangthai">
                                        <button type="submit" class="btn flosun-button secondary-btn black-color rounded-0 w-100">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
