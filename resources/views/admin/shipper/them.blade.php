@extends('admin.layout.index')
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
                        <h4 class="title">Thêm thông tin Shipper</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('actionThemShipper')}}" method="POST" role="form" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Họ tên</label>
                                        <input type="text"  class="form-control" name="ten" placeholder=""/>
                                        <div class="error"> {{$errors->first('ten')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Email</label>
                                        <input type="text"  class="form-control" name="email" placeholder=""/>
                                        <div class="error"> {{$errors->first('email')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Số điện thoại</label>
                                        <input type="text" name="sodth" class="form-control" placeholder="">
                                        <div class="error"> {{$errors->first('sodth')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Giới tính</label>
                                        <select class="form-control" name="gtinh">
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mật khẩu</label>
                                        <input type="password" class="form-control" name="pass">
                                        <div class="error"> {{$errors->first('pass')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Nhập lại mật khẩu</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="pass2">
                                        <div class="error"> {{$errors->first('pass2')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Căn cước công dân</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cccd">
                                        <div class="error"> {{$errors->first('cccd')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Ngày sinh</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="nsinh">
                                        <div class="error"> {{$errors->first('nsinh')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Hình ảnh</label>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Ngày vào làm</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" name="date">
                                        <div class="error"> {{$errors->first('date')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Địa chỉ</label>
                                        <textarea type="text" name="diachi" class="form-control" placeholder=""></textarea>
                                        <div class="error"> {{$errors->first('diachi')}}</div>
                                    </div>
                                </div>
                                <input type="hidden" name="trangthai" value="1">
                            </div>
                            <button type="submit" style="margin-left: 450px;" class="btn btn-info btn-fill pull-right">Lưu thông tin</button>
                            <button type="reset" class="btn btn-dim btn-warning pull-right">Làm mới</button>
                            <a href="{{route('danhsachShipper')}}" class="btn btn-dark pull-right">Xem Shipper</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
