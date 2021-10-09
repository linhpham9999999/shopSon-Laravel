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
                        <h3 class="title-3">Trạng thái đơn hàng</h3>
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

    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        @if(!empty($hoadon))
                        <p ><strong>Lưu ý: Hóa đơn từ 300.000đ trở lên được freeship. Còn lại phí ship: 50.000đ</strong></p>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="pro-thumbnail">Mã hóa đơn</th>
                                <th class="pro-title">Ảnh</th>
                                <th class="pro-title">Tên màu</th>
                                <th class="pro-title">Ngày đặt</th>
                                <th class="pro-price">Giá</th>
                                <th class="pro-quantity">Số lượng</th>
                                <th class="pro-subtotal">Trạng thái</th>
                                <th class="pro-subtotal">Tổng tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hoadon as $hd)
                                <tr>
                                    <td class="pro-title">{{$hd->Ma_HD }}</td>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin_asset/image_son/mau_san_pham/{{ $hd->hinhanh }}" alt="Product" /></a></td>
                                    <td class="pro-title">{{ $hd->mau }}</td>
                                    <td class="pro-title">{{ $hd->ngaydat }}</td>
                                    <td class="pro-quantity">{{ $hd->don_gia}}</td>
                                    <td class="pro-quantity">{{ $hd->soluong }}</td>
                                    <td class="pro-subtotal">{{ $hd->trangthai}}</td>
                                    <td class="pro-subtotal">{{ $hd->tongtien}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <h2>Bạn chưa đặt mua sản phẩm nào</h2>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
