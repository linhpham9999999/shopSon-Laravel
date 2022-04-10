@extends('admin.layout.index')
@section('content')
    <div style="background-color: #008080">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa thông tin nhân viên</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
{{--                        <em class="icon ni ni-cross"></em>--}}
                    </a>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-bottom: 0px;">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{route('postSuaNV',['id'=>$nhanvien->id])}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label" for="email-address">Họ tên</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->hoten}}" name="ten" placeholder="Tên phải có độ dài từ 5 đến 50 ký tự"/>
                                <div class="error"> {{$errors->first('ten')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Số điện thoại</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->sodth}}" name="sodth" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự"/>
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
                            <label class="form-label" for="email-address">Địa chỉ</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->diachi}}" name="diachi"  placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự"  />
                                <div class="error"> {{$errors->first('diachi')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Ngày sinh</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->ngaysinh}}" name="nsinh"  placeholder="Ngày sinh phải dạng Năm-Tháng-Ngày" />
                                <div class="error"> {{$errors->first('nsinh')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Ngày vào làm</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->ngay_vao_lam}}" name="date" placeholder="Ngày vào làm phải dạng Năm-Tháng-Ngày" required />
                                <div class="error"> {{$errors->first('date')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Email</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->email}}" name="email" placeholder="Email phải có độ dài từ 5 đến 50 ký tự"  />
                                <div class="error"> {{$errors->first('email')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Thông tin</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$nhanvien->thong_tin_user}}" name="info" placeholder="Thông tin nhân viên" />
                                <div class="error"> {{$errors->first('info')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Hình ảnh</label>
                            <div class="form-control-wrap">
                                <input type="file" name="hinh_anh" value="{{$nhanvien->hinhanh_user}}"/>
                                <div class="error"> {{$errors->first('hinh_anh')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-lg btn-primary js-btn-update-sp" value="Lưu thông tin" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--<div id="page-wrapper">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <h1 class="page-header">Nhân viên--}}
{{--                    <small>sửa</small>--}}
{{--                </h1>--}}
{{--            </div>--}}
{{--            <!-- /.col-lg-12 -->--}}
{{--            <div class="col-lg-7" style="padding-bottom:120px">--}}
{{--                @if(session('thongbao'))--}}
{{--                    <div class="alert alert-success">--}}
{{--                        {{session('thongbao')}}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <form action="admin/nhanvien/sua/{{$nhanvien->id}}" method="POST">--}}
{{--                    {{csrf_field()}}--}}
{{--                    <label>Họ tên</label>--}}
{{--                    <input class="form-control" name="ten" value="{{$nhanvien->hoten}}" placeholder="Tên nhân viên phải có độ dài từ 5 đến 50 ký tự" />--}}
{{--                    <div class="error"> {{$errors->first('ten')}}</div>--}}
{{--                    <label>Địa chỉ</label>--}}
{{--                    <input class="form-control" name="diachi" value="{{$nhanvien->diachi}}" placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự" />--}}
{{--                    <div class="error"> {{$errors->first('diachi')}}</div>--}}
{{--                    <label>Số điện thoại</label>--}}
{{--                    <input class="form-control" name="sodth" value="{{$nhanvien->sodth}}" placeholder="Số điện thoại phải có độ dài 10 ký tự" />--}}
{{--                    <div class="error"> {{$errors->first('sodth')}}</div>--}}
{{--                    <label>Giới tính</label>--}}
{{--                    <select class="form-control" name="gtinh">--}}
{{--                        <option value="0">Nữ</option>--}}
{{--                        <option value="1">Nam</option>--}}
{{--                    </select>--}}

{{--                    <label>Ngày sinh</label>--}}
{{--                    <input class="form-control" name="nsinh" value="{{$nhanvien->ngaysinh}}" placeholder="Ngày sinh phải dạng Năm-Tháng-Ngày" />--}}
{{--                    <div class="error"> {{$errors->first('nsinh')}}</div>--}}
{{--                    <label>Email</label>--}}
{{--                    <input class="form-control" name="email" value="{{$nhanvien->email}}" placeholder="Email phải có độ dài từ 5 đến 50 ký tự" />--}}
{{--                    <div class="error"> {{$errors->first('email')}}</div>--}}
{{--                    <button type="submit" class="btn btn-default">Sửa</button>--}}
{{--                    <button type="reset" class="btn btn-default">Làm mới</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.row -->--}}
{{--    </div>--}}
{{--    <!-- /.container-fluid -->--}}
{{--</div>--}}
