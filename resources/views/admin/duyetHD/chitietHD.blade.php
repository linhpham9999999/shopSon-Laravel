@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
        <div class="row g-gs">
            <div class="col-lg-8">
                <div class="card card-bordered h-100">
                    <div class="card-inner">
                        <div class="card-title-group align-start mb-3">
                            <div class="card-title">
                                <h6 class="title">Chi tiết đơn hàng MÃ #{{$order_code->Ma_HD}}</h6>
                            </div>
                            <div class="card-tools mt-n1 mr-n1" >

                            </div>
                        </div><!-- .card-title-group -->
                        <div class="nk-order-ovwg">
                            <div class="row g-4 align-end">
                                <div class="col-xxl-8">
                                    <table style=" width: 700px; height: auto;" >
                                        <thead>
                                        <tr>
                                            <th style=" text-align: center; width: 150px">Mã màu sản phẩm</th>
                                            <th style=" text-align: center; width: 200px">Hình ảnh</th>
                                            <th style=" text-align: center">Số lượng</th>
                                            <th style=" text-align: center">Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $pd)
                                            <tr style="height: 190px">
                                                <td style="text-align: center">{{$pd->Ma_MSP}}</td>
                                                <td style="text-align: center"><img src="admin_asset/image_son/mau_san_pham/{{$pd->hinhanh}}" height="150px" width="150px"/></td>
                                                <td style="text-align: center">{{$pd->soluong}}</td>
                                                <td style="text-align: center">{{$pd->thanh_tien}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- .col -->
                                <div class="col-xxl-4">

                                </div><!-- .col -->
                            </div>
                        </div><!-- .nk-order-ovwg -->
                    </div><!-- .card-inner -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-lg-4">
                <div class="card card-bordered h-100">
                    <div class="card-inner-group">
                        <div class="card-inner card-inner-md">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Thông tin khách hàng</h6>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="nk-wg-action">
                                @foreach($user as $ct)
                                    <div class="row">
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Tên khách hàng:</label>
                                                <span class="formdetails">{{$ct->hoten}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Số điện thoại:</label>
                                                <span class="formdetails">{{$ct->sodth}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Email:</label>
                                                <span class="formdetails">{{$ct->email}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Trạng thái đơn hàng:</label>
                                                <span class="formdetails">{{$ct->trangthai}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Lời nhắn:</label>
                                                @if($ct->ghichu !== null)
                                                    <span class="formdetails">{{$ct->ghichu}}</span>
                                                @else
                                                    <span class="formdetails">Không có</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Tổng thanh toán (+ship):</label>
                                                <span class="formdetails">{{$ct->tongtien}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Hình thức thanh toán :</label>
                                                <span class="formdetails">{{$ct->ten_HTTT}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Ngày đặt hàng:</label>
                                                <span class="formdetails">{{$ct->ngaydat}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold; height: 0px">Địa chỉ: </label>
                                                <span class="formdetails">{{$ct->dia_chi_giao_hang}}</span>
                                            </div>
                                        </div>
                                        @if($ct->id_TT == 3 || $ct->id_TT == 6)
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold; margin-top: 15px;">Chọn người giao hàng: </label>
                                                <form action="{{route('chon-nguoi-giao-hang')}}" method="POST">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="idHD" value="{{$ct->id}}">
                                                    <select class="form-control" name="shipper">
                                                        @foreach($shipper as $sp)
                                                            <option value="" selected disabled hidden>Chọn ở đây</option>
                                                            <option value="{{$sp->id}}" data-value="{{$sp->hoten}}">{{$sp->hoten}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="error"> {{$errors->first('shipper')}}</div>
                                            </div>
                                        </div>
                                        @endif
                                        @if($ct->hinh_anh_giao_hang != null)
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold; height: 0px">Ảnh giao hàng: </label>
                                                <span class="formdetails"><img src="admin_asset/hinh-anh-giao-hang/{{$ct->hinh_anh_giao_hang}}" width="70px" height="70px"/></span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-lg-12" style="margin-left: 815px;">
                <span style="float: left">
                    @if($ct->id_TT == 3 || $ct->id_TT == 6)
                        <td><button type="submit" class="btn btn-primary">Chọn shipper giao hàng</button></td>
                    @elseif($ct->id_TT == 2)
                        <td><button type="button" class="btn btn-primary">Đã duyệt</button></td>
                    @elseif($ct->id_TT == 1)
                        <td><button type="button" class="btn btn-primary">Đã mua</button></td>
                    @endif
                </form>
{{--                <form action="{{route('duyetHD1')}}" method="POST">--}}
{{--                    {{csrf_field()}}--}}
{{--                    <input type="hidden" name="idHD" value="{{$ct->id}}">--}}
{{--                        @if($ct->id_TT == 3)--}}
{{--                            <td><button type="submit" class="btn btn-primary">Chọn nguoi-giao-hang giao hàng</button></td>--}}
{{--                        @elseif($ct->id_TT == 2)--}}
{{--                            <td><button type="button" class="btn btn-primary">Đã duyệt</button></td>--}}
{{--                        @elseif($ct->id_TT == 1)--}}
{{--                            <td><button type="button" class="btn btn-primary">Đã mua</button></td>--}}
{{--                        @endif--}}
{{--                </form>--}}

                </span>
                <span><a href="{{route('da-duyet')}}" class="btn btn-secondary">Trở về đơn hàng</a></span>
            </div>
            @endforeach
        </div><!-- .row -->
    </div>
    </div>
@endsection
