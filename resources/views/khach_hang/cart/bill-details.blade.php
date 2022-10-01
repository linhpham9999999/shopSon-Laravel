@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
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
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse" style=" margin-top: 60px;">
                    <div class="card card-bordered">
                        @foreach($cthd as $ct)
                            <div class="card-inner">
                                <div class="row pb-5">
                                    <div class="col-lg-4">
                                        <div class="product-gallery mr-xl-1 mr-xxl-5">
                                            <div class="slider-init">
                                                <div class="slider-item rounded" style="width: 300px; height:300px;">
                                                    <img src="admin_asset/image_son/mau_san_pham/{{$ct->hinhanh}}" style=" padding-left: 10px; padding-top: 40px" class="w-100" alt="" >
                                                </div>
                                            </div>
                                        </div><!-- .product-gallery -->
                                    </div><!-- .col -->
                                    <div class="col-lg-8">
                                        <div class="product-info mt-5 mr-xxl-5">
                                            <h2 class="product-title">{{$ct->mau}} </h2>
                                            <h4 class="product-price text-primary">Giá {{ $ct->don_gia }} VNĐ</h4>
                                            <div class="product-rating">

                                            </div><!-- .product-rating -->
                                            <div class="lead" style="size: 15px">
                                                <p >{{$ct->thongTinMau}}</p>
                                            </div>

                                            <div>
{{--                                                Admin chưa duyệt thì ''Chờ xác nhân''--}}
                                                @if($ct->idTT == '3')
                                                <span style="background-color: #555555;border: none;color: white;padding: 15px 32px;
                                                    text-align: center; text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;
                                                    ">{{$ct->trangthai}}</span>
                                                @endif
{{--                                                Khi Shipper đã giao thành công thì nút 'Nhận đc hàng' -> giao hàng rồi thì ấn vào -> 'Đã mua"--}}
                                                <form action="{{route('accept-order')}}" method="POST">
                                                    {{csrf_field()}}
                                                @if ( $ct->idTT == '5')
                                                        <input type="hidden" name="idHD" value="{{$ct->idHD}}">
                                                    <span class="buy_now_btn">
                                                    <button type="submit" style="background-color: #4CAF50;  border: none; color: white;
                                                    padding: 15px 32px;text-align: center;text-decoration: none; display: inline-block;
                                                    font-size: 16px; margin: 4px 2px;">Đã nhận được hàng</button>
                                                    </span>
                                                @endif
                                                </form>

                                                @if ( $ct->idTT == '1')
                                                    <span class="buy_now_btn">
                                                <span style="background-color: #555555;  border: none; color: white;
                                                padding: 15px 32px;text-align: center;text-decoration: none; display: inline-block;
                                                font-size: 16px; margin: 4px 2px;">Đã mua</span>
                                                </span>
                                                @endif


                                            </div><!-- .product-meta -->

                                        </div><!-- .product-info -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div>
                        @endforeach
                    </div>
            </div>
            <div style="width: 150px;margin-left: 500px;">
                <a href="{{route('order-status')}}" class="btn flosun-button secondary-btn black-color rounded-0 w-100">Trở về</a>
            </div>
        </div>
    </div>
    <!-- Shop Main Area End Here -->
@endsection

