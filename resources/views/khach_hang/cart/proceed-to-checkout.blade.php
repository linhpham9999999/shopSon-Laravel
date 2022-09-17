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
                            <p style="font-weight: bold; padding-left: 5px; margin-bottom: 15px; background-color: #F2F2F2; height: 30px; font-size: 15px; margin-right: 80px; padding-top: 5px">Vui lòng cập nhật số điện thoại (nếu thay đổi).</p>

                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Your Name <span class="required">*</span></label>
                                        <p class="formdetails">{{$users->hoten}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address </label>
                                        <p class="formdetails">{{$users->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input class="formdetails" placeholder="Số điện thoại" type="text" name="sodth" value="{{$users->sodth}}" />
                                    </div>
                                </div>

{{--                                <div class="col-md-12 col-custom">--}}
{{--                                    <div class="checkout-form-list">--}}
{{--                                        <label>Address <span class="required">*</span></label>--}}
{{--                                        <input class="formdetails" placeholder="địa chỉ" type="text" name="diachi" value="{{$users->diachi}}" />--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <p class="formdetails"><select name="diachi">
                                        @foreach($diachi as $dc)
                                            <option value="{{$dc->dia_chi_giao_hang}}">{{$dc->dia_chi_giao_hang}}</option>
                                        @endforeach
                                        </select></p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Hình thức giao hàng <span class="required">*</span></label>
                                        <p class="formdetails"><select name="delivery">
                                                @foreach($delivery as $del)
                                                    <option  value="{{$del->id}}">{{$del->ten_HTGH}}</option>
                                                @endforeach
                                            </select></p>
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
                                            <td class="cart-product-total text-center" ><span class="amount">{{ $product['unit_price']  * $product['quantity'] }}</span></td>
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
                </form>
                        <div class="your-order">
                            <h3>Thêm địa chỉ giao hàng</h3>
                            <form method="post" action="{{route('add-address')}}" accept-charset="UTF-8">
                                {{csrf_field()}}
                                <div class="input-item mb-4">
                                    <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="diachinew"  placeholder="Nhập địa chỉ">
                                    <div class="error">{{$errors->first('diachinew')}}</div>
                                </div>
                                <button type="submit" style=" margin-left: 170px;" class="btn flosun-button secondary-btn theme-color rounded-0">Thêm</button>
                            </form>
                        </div>
                    </div>

                @if(session('alert'))
                    <div class="alert alert-success" style="width: 600px">
                        {{session('alert')}}
                    </div>
                @endif

                <form action="{{route('thanh-toan-MOMO')}}" method="POST">
                    {{csrf_field()}}
                    <p><label for="">Phương thức thanh toán</label></p>
                    <input type="hidden" name="total_momo" value="{{ $total + $ship }}">
                    <button type="submit" style="background-color: aqua;height: 50px;width: 200px;" class="btn btn-warning check_out" name="payUrl">Thanh toán MOMO</button>
                </form>

                <p style="margin-top: 50px"><b>Lưu ý: </b>Cần chọn đúng hình thức cần thanh toán</p>
            </div>
        </div>
    </div>
@endsection
