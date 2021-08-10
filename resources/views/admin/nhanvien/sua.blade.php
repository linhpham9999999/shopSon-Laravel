@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nhân viên
                        <small>sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/nhanvien/sua/{{$nhanvien->id}}" method="POST">
                        {{csrf_field()}}
                        <label>Họ tên</label>
                        <input class="form-control" name="ten" value="{{$nhanvien->hoten}}" placeholder="Họ tên phải có độ dài từ 5 đến 50 ký tự" />
                        <div class="error"> {{$errors->first('ten')}}</div>
                        <label>Địa chỉ</label>
                        <input class="form-control" name="diachi" value="{{$nhanvien->diachi}}" placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự" />
                        <div class="error"> {{$errors->first('diachi')}}</div>
                        <label>Số điện thoại</label>
                        <input class="form-control" name="sodth" value="{{$nhanvien->sodth}}" placeholder="Số điện thoại phải có độ dài 10 ký tự" />
                        <div class="error"> {{$errors->first('sodth')}}</div>
                        <label>Giới tính</label>
                        <select class="form-control" name="gtinh">
                            <option value="0">Nữ</option>
                            <option value="1">Nam</option>
                        </select>

                        <label>Ngày sinh</label>
                        <input class="form-control" name="nsinh" value="{{$nhanvien->ngaysinh}}" placeholder="Ngày sinh phải dạng Năm-Tháng-Ngày" />
                        <div class="error"> {{$errors->first('nsinh')}}</div>
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{$nhanvien->email}}" placeholder="Email phải có độ dài từ 5 đến 40 ký tự" />
                        <div class="error"> {{$errors->first('email')}}</div>
                        <button type="submit" class="btn btn-default">Sửa</button>
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
