@extends('khach_hang.mail.layout.index')
@section('content')
    <div class="nk-content-body" >
        <div class="content-page wide-md m-auto">
            <div class="nk-block">
                <div class="card card-bordered" >
                    <div class="card-inner" style="background-color: mistyrose; width: 750px" >
                        <h4 class="title text-soft mb-4 overline-title" style="padding: 15px">Đây là email tự động. Qúy khách hàng vui lòng không trả lời email này</h4>
                        <table class="email-wraper">
                            <tr>
                                <td class="py-5">
                                    <table class="email-header">
                                        <tbody>
                                        <tr>
                                            <td class="text-center pb-4" style="padding-left: 100px;color: deeppink;">
                                                <h2 class="email-title"><strong>CÔNG TY THƯƠNG MẠI ĐIỆN TỬ SHOP SON HLYNK LIPTICKS</strong></h2>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="col-md-12" style="margin: 20px 40px;">
                                        <h3 class="email-heading email-heading-s1 mb-4">Chào bạn {{$shipping_array['customer_name']}},
                                            <i style="color: midnightblue;">Đơn hàng đã xác nhận và shipper đang giao hàng</i></h3>
                                        <h4 class="fs-16px text-base" style="text-transform: uppercase;">Thông tin đơn hàng</h4>
                                        <p>Mã đơn hàng : {{$order_code->Ma_HD}}</p>
                                        <p>Mã Khuyến mãi (nếu có) : {{$promotion_code}}</p>
                                        <p>Dịch vụ : <strong>Đặt hàng trực tuyến</strong></p>
                                    </div>
                                    <div class="col-md-12" style="margin: 20px 40px;">
                                        <h4 class="fs-16px text-base" style="text-transform: uppercase;">Thông tin người nhận</h4>
                                        <p>Email : {{$shipping_array['customer_email']}}</p>
                                        <p>Họ Tên : {{$shipping_array['customer_name']}}</p>
                                        <p>Số điện thoại : {{$shipping_array['customer_phone']}}</p>
                                        <p>Địa chỉ: {{$shipping_array['customer_address']}}</p>
                                        <p>Hình thức thanh toán: {{$payment_method->ten_HTTT}}</p>
                                    </div>
                                    <div class="col-md-12" style="margin: 20px 40px;">
                                        <h4 class="fs-16px text-base" style="text-transform: uppercase;">Sản phẩm đã đặt</h4>
                                        <table>
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-md" style="text-align: center">Sản phẩm</td>
                                                <td class="nk-tb-col tb-col-md" style="text-align: center">Màu sản phẩm</td>
                                                <td class="nk-tb-col tb-col-md" style="text-align: center">Số lượng</td>
                                                <td class="nk-tb-col tb-col-md" style="text-align: center">Giá tiền</td>
                                                <td class="nk-tb-col tb-col-md" style="text-align: center">Thành tiền (bao gồm phí ship)</td>
                                            </tr>
                                            @foreach($cart_array as $cart)
                                                <tr class="nk-tb-item">
                                                    <td class="nk-tb-col tb-col-md" style="text-align: center">{{$cart['product_name']}}</td>
                                                    <td class="nk-tb-col tb-col-md" style="text-align: center">{{$cart['product_color']}}</td>
                                                    <td class="nk-tb-col tb-col-md"style="text-align: center">{{$cart['product_quantity']}}</td>
                                                    <td class="nk-tb-col tb-col-md" style="text-align: center">{{number_format($cart['product_price'],0,',','.')}}</td>
                                                    <td class="nk-tb-col tb-col-md" style="text-align: center">{{number_format($cart['product_price_total'],0,',','.')}}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col tb-col-md" colspan="5" align="right">Tổng tiền thanh toán: <strong>{{number_format($total,0,',','.')}}</strong>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-12" style="margin: 20px 40px;">
                                        <p>Mọi chi tiết xin liên hệ tại website <a href="http://localhost:8999/shopSon/public/khach_hang/trangchu" style="text-decoration: none">Shop Son HLYNK Lipticks</a>.</p>
                                        <p>Hoặc liên hệ qua số Hotline: 077889999. Cảm ơn quý khách hàng đã đặt hàng cho shop chúng tôi</p>
                                    </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
