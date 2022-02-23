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
                        <h3 class="title-3">Lịch sử mua hàng</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                            <li>Lịch sử mua hàng</li>
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
                                <th class="pro-title">Ngày đặt</th>
                                <th class="pro-thumbnail">Ngày giao</th>
                                <th class="pro-subtotal">Trạng thái</th>
                                <th class="pro-subtotal">Xem chi tiết</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hoadon as $hd)
                                <tr>
                                    <td class="pro-title">{{$hd->Ma_HD }}</td>
                                    <td class="pro-thumbnail">{{ $hd->ngaydat }}</td>
{{--                                    <td class="pro-title"><a href="#"><img class="img-fluid" src="admin_asset/image_son/mau_san_pham/{{ $hd->hinhanh }}" alt="Product" /></a></td>--}}
                                    <td class="pro-subtotal">{{ $hd->ngaygiao}}</td>
                                    <td class="pro-subtotal">{{ $hd->trangthai}}</td>
                                    <td class="pro-subtotal">
                                        <a href="{{route('bill-detail',['id'=>$hd->id])}}" >Chi tiết</a>
                                    </td>
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
    <div class="modal flosun-modal fade" id="chitietHD" tabindex="-1" role="dialog" aria-hidden="true" style="font-family: cursive">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid custom-area">

                        <div class="row">
                            <div class="col-md-6 col-custom">
                                <div class="modal-product-img">
                                    <div id="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title" style="font-size: 30px; font-weight: bold; border-bottom: 2px solid black; padding-bottom: 5px" >
                                            <h3 id="maHD" ></h3>
                                        </div>
                                        <div class="price-box" style="margin-top: 40px">
                                            <p class="quickview"><strong>Địa chỉ giao hàng: </strong><span id="diachiGH"></span></p>
                                            <p class="quickview"><strong>Ngày đặt: </strong><span id="ngaydat"></span></p>
                                            <p class="quickview"><strong>Ngày giao: </strong><span id="ngaygiao"></span></p>
                                            <p class="quickview"><strong>Số điện thoại: </strong><span id="sodth"></span></p>
                                            <p class="quickview"><strong>Tổng tiền: </strong><span id="tongtien"></span></p>
                                            <p class="quickview"><strong>Trạng thái đơn hàng: </strong><span id="trangthai"></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
