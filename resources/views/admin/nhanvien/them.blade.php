@extends('admin.layout.index')
@section('content')
    <div style="background-color: #008080">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thông tin nhân viên</h5>
                    <a href="{{route('dsNV')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>

                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-bottom: 5px;">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{route('actionThem6')}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label" for="email-address">Họ tên</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="ten" placeholder="Tên phải có độ dài từ 5 đến 50 ký tự" />
                                <div class="error"> {{$errors->first('ten')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Mật khẩu</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="pass" placeholder="Mật khẩu nhân viên phải có độ dài từ 8 đến 255 ký tự" />
                                <div class="error"> {{$errors->first('pass')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Nhập lại mật khẩu</label>
                            <div class="form-control-wrap">
                                <input type="password" class="form-control" name="pass2" placeholder="Mật khẩu phải trùng với Mật khẩu vừa nhập" />
                                <div class="error"> {{$errors->first('pass2')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Số điện thoại</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="sodth" placeholder="Số điện thoại phải có độ dài 10 ký tự" />
                                <div class="error"> {{$errors->first('sodth')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Giới tính</label>
                            <div class="form-control-wrap">
                                <select class="form-control" name="gtinh">
                                    <option value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Căn cước công dân</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="cccd" placeholder="Căn cước công dân" />
                            </div>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label class="form-label" for="email-address">Ngày sinh</label>--}}
{{--                            <div class="form-control-wrap">--}}
{{--                                <input class="form-control" name="nsinh" placeholder="Ngày sinh phải nhập theo dạng Năm-Tháng-Ngày" />--}}
{{--                                <div class="error"> {{$errors->first('nsinh')}}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input name="nsinh" class="form-control form-control-outlined date-picker" id="outlined-date-picker">
                                <label class="form-label-outlined" for="outlined-date-picker">Ngày sinh</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Hình ảnh</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Email</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="email" placeholder="Email phải có độ dài từ 5 đến 50 ký tự" />
                                <div class="error"> {{$errors->first('email')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right xl">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input name="date" class="form-control form-control-xl form-control-outlined date-picker" id="outlined-date-picker2">
                                <label class="form-label-outlined" for="outlined-date-picker2">Ngày vào làm</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Địa chỉ</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="diachi" placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự" />
                                <div class="error"> {{$errors->first('diachi')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Chức vụ</label>
                            <div class="form-control-wrap">
                                <select class="form-control" name="chuc_vu_id">
                                    @foreach($chucvu as $cv)
                                        <option value="{{$cv->id}}">{{$cv->CV_ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="trangthai" value="1">
                        <div class="form-group" style="padding-left: 100px;">
                            <button type="submit" class="btn btn-lg btn-primary">Lưu thông tin</button>
                            <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--@section('content')
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
@endsection--}}
