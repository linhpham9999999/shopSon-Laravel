@extends('shipper.layout.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 15px 15px">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Thông tin cá nhân</h4>
                    </div>
                    <div class="content">
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Công ty</label>
                                        <input type="text" class="form-control" disabled placeholder="Company" value="Công ty vận chuyển J&T Express">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Địa chỉ Email</label>
                                        <input type="email" class="form-control" disabled placeholder="Email" value="{{$data->email}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Giới tính</label>
                                        <input type="text" class="form-control" disabled placeholder="Giới tính"
                                               value=" @if($data->gioitinh == 0) {{'Nữ'}}
                                               @else {{'Nam'}}
                                               @endif " >
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin: 10px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Họ tên</label>
                                        <input type="text" name="hoten" disabled class="form-control" placeholder="Họ tên" value="{{$data->hoten}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Ngày vào làm</label>
                                        <input type="text" name="ngay_vao_lam" disabled class="form-control" placeholder="Ngày vào làm" value="{{$data->ngay_vao_lam}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Số điện thoại</label>
                                        <input type="text" name="sodth" disabled class="form-control" placeholder="Số điện thoại" value="{{$data->sodth}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Căn cước công dân</label>
                                        <input type="text" name="cccd" disabled class="form-control" placeholder="Căn cước công dân" value="{{$data->cccd}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin: 10px;">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Địa chỉ</label>
                                        <input type="text" name="diachi" disabled class="form-control" placeholder="Home Address" value="{{$data->diachi}}">
                                    </div>
                                </div>
                            </div>
                            @if($data->trang_thai == 1)
                                <form action="{{route('chuyen-ban-giao-hang')}}"  method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <button type="submit" style="margin-left: 500px;height: 50px;" class="btn btn-info btn-fill pull-right">Đang trống đơn hàng</button>
                                </form>
                            @else
                                <form action="{{route('chuyen-trong-don-hang')}}"  method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <button type="submit" style="margin-left: 500px;height: 50px; " class="btn btn-danger btn-fill pull-right">Đang bận giao hàng</button>
                                </form>
                            @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
