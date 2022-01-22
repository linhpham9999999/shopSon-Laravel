@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_a')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('update-info',['id'=>$users->id])}}"  method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Công ty (disabled)</label>
                                        <input type="text" class="form-control" disabled placeholder="Company" value="HLYNK Lipsticks">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ Email</label>
                                        <input type="email" class="form-control" disabled placeholder="Email" value="{{$users->email}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giới tính</label>
                                        <input type="text" class="form-control" disabled placeholder="Giới tính"
                                               value=" @if($users->gioitinh == 0) {{'Nữ'}}
                                                        @else {{'Nam'}}
                                                        @endif " >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Họ tên</label>
                                        <input type="text" name="hoten" class="form-control" placeholder="Họ tên" value="{{$users->hoten}}">
                                        <div class="error">{{$errors->first('hoten')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <input type="text" name="ngaysinh" class="form-control" placeholder="Năm-Tháng-Ngày" value="{{$users->ngaysinh}}">
                                        <div class="error">{{$errors->first('ngaysinh')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ngày vào làm</label>
                                        <input type="text" name="ngay_vao_lam" class="form-control" placeholder="Ngày vào làm" value="{{$users->ngay_vao_lam}}">
                                        <div class="error">{{$errors->first('ngay_vao_lam')}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="sodth" class="form-control" placeholder="Số điện thoại" value="{{$users->sodth}}">
                                        <div class="error">{{$errors->first('sodth')}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input type="text" name="diachi" class="form-control" placeholder="Home Address" value="{{$users->diachi}}">
                                        <div class="error">{{$errors->first('diachi')}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Thông tin cá nhân</label>
                                        <textarea rows="5" name="info" class="form-control" placeholder="Here can be your description" value="Thông tin cá nhân">{{$users->thong_tin_user}}</textarea>
                                        <div class="error">{{$errors->first('info')}}</div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Cập nhật thông tin</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="ảnh bìa"/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-gray" src="images/{{$users->hinhanh_user}}" alt="ảnh cá nhân"/>

                            <h4 class="title">{{$users->hoten}}<br />
                                <small>{{$users->email}}</small>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
