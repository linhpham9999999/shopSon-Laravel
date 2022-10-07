@extends('nguoi-giao-hang.layout.index')
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
                                    <table>
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
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .col -->
            <form action="{{route('giao-hang-thanh-cong')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @if($ct->id_TT == 2)
                    <div class="col-lg-4" style="margin-left: 470px;">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="form-group">
                                    <label class="form-label" for="default-06" ><span style="text-align: center">Hình ảnh giao hàng</span></label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-left: 500px;">
                        <span style="float: left">
                            <input type="hidden" name="idHD" value="{{$ct->id}}">
                            <td><button type="submit" class="btn btn-success">Giao hàng thành công</button></td>
                        </span>
                    </div>
            </form>
                @elseif($ct->id_TT == 5)
                    <div class="col-lg-4" style="margin-left: 470px;">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="form-group">
                                    <label class="form-label" for="default-06" ><span style="text-align: center">Hình ảnh giao hàng</span></label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" disabled name="hinh_anh" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" style="margin-left: 500px;">
                        <span style="float: left">
                            <input type="hidden" name="idHD" value="{{$ct->id}}">
                            <td><button type="button" class="btn btn-success">Giao hàng thành công</button></td>
                        </span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
