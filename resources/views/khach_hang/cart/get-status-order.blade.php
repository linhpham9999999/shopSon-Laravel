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
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area" style="margin-right: 220px;">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('alert'))
                        <div class="alert alert-success" style="width: 240px;">
                            {{session('alert')}}
                        </div>
                    @endif
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive" style="border:10px solid lightpink; border-radius: 25px; padding: 40px;width: 1300px;">
                        @if(!empty($hoadon))
                        <p ><strong>Lưu ý: Hóa đơn từ 300.000đ trở lên được freeship. Còn lại phí ship: 50.000đ</strong></p>
                        <table class="table table-bordered" style=" margin: 10px 10px 10px 50px;width: 1100px; border:hidden;">
                            <thead>
                            <tr style="background-color: gainsboro; border-radius:20px">
                                <th style="border: hidden" class="pro-thumbnail">Mã hóa đơn</th>
                                <th style="border: hidden" class="pro-title">Ngày đặt</th>
                                <th style="border: hidden" class="pro-thumbnail">Ngày giao</th>
                                <th style="border: hidden" class="pro-subtotal">Trạng thái</th>
                                <th style="border: hidden" class="pro-subtotal">Xem chi tiết</th>
                                <th style="border: hidden;" class="pro-subtotal">Chỉnh sửa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hoadon as $hd)
                                <tr style="border: hidden">
                                    <td style="border: hidden; background-color: lavenderblush" class="pro-title">{{$hd->Ma_HD }}</td>
                                    <td style="border: hidden; background-color: lavenderblush" class="pro-thumbnail">{{DateTime::createFromFormat('Y-m-d', $hd->ngaydat)->format('m/d/Y')}}</td>
                                    <td style="border: hidden; background-color: lavenderblush" class="pro-subtotal">{{DateTime::createFromFormat('Y-m-d', $hd->ngaygiao)->format('m/d/Y')}}</td>
                                    <td style="border: hidden; background-color: lavenderblush" class="pro-subtotal">{{ $hd->trangthai}}</td>

                                    <td style="border: hidden; background-color: lavenderblush" class="pro-subtotal">
                                        <a href="{{route('bill-detail',['id'=>$hd->id])}}" >Chi tiết</a>
                                    </td>
                                    <td style="border: hidden; background-color: lavenderblush" class="pro-subtotal">
                                        @if ($hd->idTT == 3)
                                            <a href="{{route('delete-order',['id'=>$hd->id])}}" style=" border-radius: 5px;padding: 5px; background-color: deeppink;">
                                                <i class="lnr lnr-trash">Hủy</i>
                                            </a>
{{--                                            <button type="button" data-toggle="modal" data-target="#huydon" style=" border-radius: 5px;padding: 5px; background-color: deeppink;" >Hủy</button>--}}
{{--                                                                                        <!-- Modal -->--}}
{{--                                            <div id="huydon" class="modal fade" role="dialog">--}}
{{--                                                <div class="modal-dialog">--}}
{{--                                                    <form>--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    <!-- Modal content-->--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header">--}}
{{--                                                            <h4 class="modal-title">Lý do hủy đơn hàng</h4>--}}
{{--                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                            <p style="text-align: left;">--}}
{{--                                                                <textarea class="lydohuydon" rows="5" cols="65" required placeholder="Lý do hủy đơn hàng...(bắt buộc)"></textarea>--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>--}}
{{--                                                            <button type="button" id="{{$hd->id}}" onclick="Huydonhang(this.id)" style=" border-radius: 5px;padding: 5px; background-color: forestgreen;">Gửi lý do hủy</button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <a href="#" style=" border-radius: 5px;padding: 7px; background-color: deeppink;">
                                                <i class="lnr lnr-trash">Sửa</i>
                                            </a>
                                        @else
                                            <button style=" border-radius: 5px;padding: 5px; background-color: deeppink;" >Hủy</button>
                                            <a href="#" style="pointer-events: none;border-radius: 5px;padding: 5px; background-color: gainsboro;">
                                                <i class="lnr lnr-trash">Sửa</i>
                                            </a>
                                        @endif
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
