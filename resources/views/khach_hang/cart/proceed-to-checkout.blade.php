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
        <div class="custom-container">
            <div class="row">
                <form action="{{route('order')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-lg-6 col-12 col-custom" style="float: left">
                        <div class="checkbox-form" style="border: 8px dotted crimson;margin: 0px 50px; padding: 10px; background-color: mistyrose;">
                            <h3 style="text-align: center">Chi tiết hóa đơn</h3>
                            <p style="font-weight: bold; padding-left: 5px; margin-bottom: 15px; background-color: #F2F2F2; height: 30px; font-size: 15px; margin-right: 80px; padding-top: 5px">Vui lòng cập nhật số điện thoại (nếu thay đổi).</p>

                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Your Name <span class="required">*</span></label>
                                        <p class="formdetails" style="height: 50px">{{$users->hoten}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address </label>
                                        <p class="formdetails" style="height: 50px">{{$users->email}}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input class="formdetails" style="height: 50px" placeholder="Số điện thoại" type="text" name="sodth" value="{{$users->sodth}}" />
                                        <div class="error"> {{$errors->first('sodth')}}</div>
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
                                        <p class="formdetails" style="height: 50px"><select style="height: 30px; border: 1px solid crimson;" name="diachi">
                                        @foreach($diachi as $dc)
{{--                                            <option value="" selected disabled hidden>Chọn địa chỉ giao hàng</option>--}}
                                            <option value="{{$dc->dia_chi_giao_hang}}">{{$dc->dia_chi_giao_hang}}</option>
                                        @endforeach
                                        </select></p>
                                        <div class="error"> {{$errors->first('diachi')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Hình thức giao hàng <span class="required">*</span></label>
                                        <p class="formdetails" style="height: 50px"><select style="height: 30px;border: 1px solid crimson;" name="delivery">
                                                @foreach($delivery as $del)
                                                    <option  value="{{$del->id}}">{{$del->ten_HTGH}}</option>
                                                @endforeach
                                            </select></p>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Hình thức thanh toán <span class="required">*</span></label>
                                        <p class="formdetails" style="height: 50px">
                                            <select style="height: 30px;border: 1px solid crimson;" id="thanhtoanmomo" name="payment" onchange="showDiv('payment_momo', this)">

                                           <option value="1">Thanh toán bằng ATM MOMO</option>
                                           <option value="2">Thanh toán khi nhận hàng</option>
                                        </select></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12 col-custom" style="float: right; " >
                        <div class="your-order" style="border: 5px solid crimson;margin-right: 50px;background-color: mistyrose; padding-top: 10px;">
                            <h3 style="text-align: center">Đơn hàng của bạn</h3>
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
                                            <td class="cart-product-total text-center" ><span class="amount">{{number_format($product['unit_price']  * $product['quantity'] * (1 - $product['promotion']*0.01),0,',','.')}}</span></td>
                                        </tr>
                                    @endforeach
                                    <tr class="cart_item">
                                        <th>Ship</th>
                                        <td class="cart-product-total text-center"><span class="amount">{{number_format($ship,0,',','.')}}</span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr class="order-total">
                                        <th>Tổng tiền</th>
                                        <td class="text-center"><strong><span class="amount">
                                                 {{number_format($total + $ship,0,',','.')}}
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
                    @if(session('alert'))
                        <input type="hidden" value="1" name="dathanhtoanmomo">
                    @endif
                </form>
                        <div class="your-order" style="margin-right: 50px; margin-top: 40px;  background-color: mistyrose;">
                            <h3 style="text-align: center; padding-left: 50px; padding-right: 50px;">Thêm địa chỉ giao hàng</h3>
                            <form method="post" action="{{route('add-address')}}" accept-charset="UTF-8">
                                {{csrf_field()}}
                                <div class="input-item mb-4">
                                    <input style="height: 40px;" class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="diachinew"  placeholder="Nhập địa chỉ">
                                    <div class="error">{{$errors->first('diachinew')}}</div>
                                </div>
                                <button style="margin-left: 250px" type="submit" style=" margin-left: 170px;" class="btn flosun-button secondary-btn theme-color rounded-0">Thêm</button>
                            </form>
                        </div>
                    </div>
                <div id="payment_momo" style="display: block; margin: 10px 50px 0px 60px;width: 200px">
                    <form action="{{route('thanh-toan-MOMO')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="total_momo" value="{{ $total + $ship }}">
                        <button type="submit" style="background-color: aqua;height: 50px;width: 200px;" class="btn btn-warning check_out" name="payUrl">Thanh toán MOMO</button>
                    </form>
                </div>
                @if(session('alert'))
                    <div class="alert alert-success" style="width: 250px;margin-top: 10px;float: left;height: 50px;background-color: lime;">
                        {{session('alert')}}
                    </div>
                @endif
                <div class="alert alert-danger" style="width: 250px;margin-top: 10px;float: left;height: 50px;">
                    {{$errors->first('dathanhtoanmomo')}}
                </div>
            </div>
        </div>
    </div>
@endsection
