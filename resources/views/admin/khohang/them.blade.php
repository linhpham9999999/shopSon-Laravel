@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="padding: 15px 15px">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Quản lý kho hàng</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('actionThemKhoHang')}}" enctype="multipart/form-data" method="POST">
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Công ty</label>
                                        <input type="text" class="form-control" disabled placeholder="Company" value="HLYNK Lipsticks">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Địa chỉ Email</label>
                                        <input type="email" class="form-control" disabled placeholder="Email" value="{{$users->email}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Giới tính</label>
                                        <input type="text" class="form-control" disabled placeholder="Giới tính"
                                               value=" @if($users->gioitinh == 0) {{'Nữ'}}
                                               @else {{'Nam'}}
                                               @endif " >
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin: 10px;">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Họ tên</label>
                                        <input type="text" name="hoten" class="form-control" placeholder="Họ tên" value="{{$users->hoten}}">
                                        <div class="error">{{$errors->first('hoten')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Ngày sinh</label>
                                        <input type="text" name="ngaysinh" class="form-control" placeholder="Năm-Tháng-Ngày" value="{{$users->ngaysinh}}">
                                        <div class="error">{{$errors->first('ngaysinh')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Ngày vào làm</label>
                                        <input type="text" name="ngay_vao_lam" class="form-control" placeholder="Ngày vào làm" value="{{$users->ngay_vao_lam}}">
                                        <div class="error">{{$errors->first('ngay_vao_lam')}}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="margin-left: 500px;" class="btn btn-info btn-fill pull-right">Cập nhật thông tin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

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

                                    <div class="row">
                                        <div class="col-md-12 col-custom">
                                            <div class="checkout-form-list">
                                                <label style="font-weight: bold">Tên khách hàng:</label>
                                                <span class="formdetails">{{$ct->hoten}}</span>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div>
        </div>
    </div>
@endsection
