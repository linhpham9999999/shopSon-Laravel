@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhân viên
                        <small>thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('actionThem6')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Password nhân viên</label>
                            <input type="password" class="form-control" name="pass" placeholder="Mật khẩu nhân viên phải có độ dài từ 8 đến 255 ký tự" />
                            <div class="error"> {{$errors->first('pass')}}</div>

                            <label>Nhập lại password</label>
                            <input type="password" class="form-control" name="pass2" placeholder="Mật khẩu phải trùng với Mật khẩu vừa nhập" />
                            <div class="error"> {{$errors->first('pass2')}}</div>

                            <label>Họ tên</label>
                            <input class="form-control" name="ten" placeholder="Tên phải có độ dài từ 5 đến 50 ký tự" />
                            <div class="error"> {{$errors->first('ten')}}</div>

                            <label>Địa chỉ</label>
                            <input class="form-control" name="diachi" placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự" />
                            <div class="error"> {{$errors->first('diachi')}}</div>

                            <label>Số điện thoại</label>
                            <input class="form-control" name="sodth" placeholder="Số điện thoại phải có độ dài 10 ký tự" />
                            <div class="error"> {{$errors->first('sodth')}}</div>

                            <label>Giới tính</label>
                            <select class="form-control" name="gtinh">
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                            <label>Ngày sinh</label>
                            <input class="form-control" name="nsinh" placeholder="Ngày sinh phải dạng Năm-Tháng-Ngày" />
                            <div class="error"> {{$errors->first('nsinh')}}</div>

                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Email phải có độ dài từ 5 đến 50 ký tự" />
                            <div class="error"> {{$errors->first('email')}}</div>

                            <input class="form-control" type="hidden" name="quyen" value="1" />

                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
