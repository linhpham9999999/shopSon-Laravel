@extends('khach_hang.layout.index')

@section('title')
    <title>Chi tiết đơn hàng</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="khach_hang_asset/assets/css/linh.css">
@endsection()

@section('content')

    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Chi tiết đơn hàng</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Home</a></li>
                            <li>Chi tiết đơn hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($cthd as $ct)
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                    <div class="product-details-img" style="width: 400px;height: 400px;">
                        <img class="w-100"  src="admin_asset/image_son/mau_san_pham/{{$ct->hinhanh}}" alt="Product">
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative product-data-add-cart">
                        <div class="product-head mb-3">
                            <h2 class="product-title">{{$ct->Ma_MSP}} {{$ct->mau}}</h2>
                        </div>
                        <div class="price-box mb-2">
                            <span class="regular-price">{{ number_format( $ct->don_gia ,0,',','.')  }} VNĐ</span>
                        </div>
                        <div class="sku mb-3">
                            <span>#{{$ct->Ma_MSP}}</span>
                        </div>
                        <p class="desc-content mb-2">Số lượng mua: {{$ct->soluong}}</p>
                        <p class="desc-content mb-2">Thành tiền: {{ number_format( $ct->thanh_tien ,0,',','.')  }} VND</p>
                        <p class="desc-content mb-2">Phần trăm khuyến mãi (nếu có):
                            @if($khuyenmai != null)
                            {{$khuyenmai->phan_tram}} %
                            @else
                             Không có
                            @endif
                        </p>
                        <p class="desc-content mb-5">{{$ct->thongTinMau}}</p>
                    </div>
                    <a style="float: left;" class="btn flosun-button secondary-btn secondary-border rounded-0" href="{{route('product-color-detail',['id'=>$ct->idMSP])}}">Mua lại</a>
                    @if($ct->idTT === 1 || $ct->idTT === 5)
                    <a style="float: right; margin-right: 400px;" target="_blank" class="btn flosun-button secondary-btn" href="{{route('danh-gia-san-pham',['id'=>$ct->idMSP])}}">Đánh giá</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div style="height: 40px;margin-top: 25px;padding-top: 8px;text-align: center;background-color: darksalmon;margin-bottom: 25px;margin-left: 680px;margin-right: 400px;">
        Tổng tiền của đơn hàng:
        {{ number_format( $tongtien->tongtien ,0,',','.')  }} VND
    </div>
    <div class="data-order">
        <a href="{{route('lich-su-mua-hang')}}" style="float: right;width: 180px;margin-right: 400px;" class="btn flosun-button secondary-btn">Trở về</a>
        @if($ct->idTT === 3)
            <button style="float: left;margin-left: 680px;" class="btn flosun-button secondary-btn" >{{$ct->trangthai}}</button>
        @elseif($ct->idTT === 5 && (Auth::guard('nguoi_dung')->check() || !empty(session('user_login'))))
            <input type="hidden" name="idHD" value="{{$ct->idHD}}" class="order-id">
            <button style="float: left;margin-left: 630px;" class="btn flosun-button secondary-btn accept-receive-order">Đã nhận được hàng</button>
        @elseif($ct->idTT === 1)
        <button style="float: left;margin-left: 730px;" class="btn flosun-button secondary-btn">{{$ct->trangthai}}</button>
        @elseif($ct->idTT === 2)
            <button style="float: left;margin-left: 600px;" class="btn flosun-button secondary-btn">{{$ct->trangthai}}</button>
        @elseif($ct->idTT === 4)
            <button style="float: left;margin-left: 630px;" class="btn flosun-button secondary-btn">{{$ct->trangthai}}</button>
        @endif
{{--        <a style="float: left;margin-left: 48px;" class="btn flosun-button secondary-btn secondary-border rounded-0" href="{{route('product-color-detail',['id'=>$ct->idMSP])}}">Mua lại</a>--}}
    </div>
@endsection



{{--<div class="shop-main-area">--}}
{{--    <div class="container container-default custom-area">--}}
{{--        <div class="row flex-row-reverse" style=" margin-top: 60px;">--}}
{{--            <div class="card card-bordered">--}}
{{--                @foreach($cthd as $ct)--}}
{{--                    <div class="card-inner">--}}
{{--                        <div class="row pb-5">--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <div class="product-gallery mr-xl-1 mr-xxl-5">--}}
{{--                                    <div class="slider-init">--}}
{{--                                        <div class="slider-item rounded" style="width: 300px; height:300px;">--}}
{{--                                            <img src="admin_asset/image_son/mau_san_pham/{{$ct->hinhanh}}" style=" padding-left: 10px; padding-top: 40px" class="w-100" alt="" >--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div><!-- .product-gallery -->--}}
{{--                            </div><!-- .col -->--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <div class="product-info mt-5 mr-xxl-5">--}}
{{--                                    <h2 class="product-title">{{$ct->mau}} </h2>--}}
{{--                                    <h4 class="product-price text-primary">Giá {{ $ct->don_gia }} VNĐ</h4>--}}
{{--                                    <div class="product-rating">--}}

{{--                                    </div><!-- .product-rating -->--}}
{{--                                    <div class="lead" style="size: 15px">--}}
{{--                                        <p >{{$ct->thongTinMau}}</p>--}}
{{--                                    </div>--}}

{{--                                    <div>--}}
{{--                                        --}}{{--                                                Admin chưa duyệt thì ''Chờ xác nhân''--}}
{{--                                        @if($ct->idTT == '3')--}}
{{--                                            <span style="background-color: #555555;border: none;color: white;padding: 15px 32px;--}}
{{--                                                    text-align: center; text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;--}}
{{--                                                    ">{{$ct->trangthai}}</span>--}}
{{--                                        @endif--}}
{{--                                        --}}{{--                                                Khi Shipper đã giao thành công thì nút 'Nhận đc hàng' -> giao hàng rồi thì ấn vào -> 'Đã mua"--}}
{{--                                        <form action="{{route('accept-order')}}" method="POST">--}}
{{--                                            {{csrf_field()}}--}}
{{--                                            @if ( $ct->idTT == '5')--}}
{{--                                                <input type="hidden" name="idHD" value="{{$ct->idHD}}">--}}
{{--                                                <span class="buy_now_btn">--}}
{{--                                                    <button type="submit" style="background-color: #4CAF50;  border: none; color: white;--}}
{{--                                                    padding: 15px 32px;text-align: center;text-decoration: none; display: inline-block;--}}
{{--                                                    font-size: 16px; margin: 4px 2px;">Đã nhận được hàng</button>--}}
{{--                                                    </span>--}}
{{--                                            @endif--}}
{{--                                        </form>--}}

{{--                                        @if ( $ct->idTT == '1')--}}
{{--                                            <span class="buy_now_btn">--}}
{{--                                                <span style="background-color: #555555;  border: none; color: white;--}}
{{--                                                padding: 15px 32px;text-align: center;text-decoration: none; display: inline-block;--}}
{{--                                                font-size: 16px; margin: 4px 2px;">Đã mua</span>--}}
{{--                                                </span>--}}
{{--                                        @endif--}}


{{--                                    </div><!-- .product-meta -->--}}

{{--                                </div><!-- .product-info -->--}}
{{--                            </div><!-- .col -->--}}
{{--                        </div><!-- .row -->--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div style="width: 150px;margin-left: 500px;">--}}
{{--            <a href="{{route('lich-su-mua-hang')}}" class="btn flosun-button secondary-btn black-color rounded-0 w-100">Trở về</a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

