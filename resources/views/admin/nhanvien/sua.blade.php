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
                        <h4 class="title">Sửa thông tin Nhân viên</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('postSuaNV',['id'=>$nhanvien->id])}}" method="POST" role="form" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Họ tên</label>
                                        <input type="text" value="{{$nhanvien->hoten}}"  class="form-control" name="ten" placeholder=""/>
                                        <div class="error"> {{$errors->first('ten')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Email</label>
                                        <input type="text" value="{{$nhanvien->email}}" disabled class="form-control" name="email" placeholder=""/>
                                        <div class="error"> {{$errors->first('email')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Số điện thoại</label>
                                        <input type="text" value="{{$nhanvien->sodth}}" name="sodth" class="form-control" placeholder="">
                                        <div class="error"> {{$errors->first('sodth')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Giới tính</label>
                                        <select class="form-control" name="gtinh">
                                            <option value="0">Nữ</option>
                                            <option value="1">Nam</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Căn cước công dân</label>
                                    <div class="form-group">
                                        <input type="text" value="{{$nhanvien->cccd}}" class="form-control" name="cccd">
                                        <div class="error"> {{$errors->first('cccd')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Ngày sinh</label>
                                    <div class="form-group">
                                        <input type="date" value="{{$nhanvien->ngaysinh}}" class="form-control" name="nsinh">
                                        <div class="error"> {{$errors->first('nsinh')}}</div>
                                    </div>
                                </div>
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
                                        <input type="date" value="{{$nhanvien->ngay_vao_lam}}" class="form-control" name="date">
                                        <div class="error"> {{$errors->first('date')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">

                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Chức vụ</label>
                                    <select class="form-control" name="chuc_vu_id">
                                        @foreach($chucvu as $cv)
                                            <option value="{{$cv->id}}">{{$cv->CV_ten}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Địa chỉ</label>
                                        <textarea type="text" placeholder="{{$nhanvien->diachi}}" name="diachi" class="form-control" placeholder=""></textarea>
                                        <div class="error"> {{$errors->first('diachi')}}</div>
                                    </div>
                                </div>
                                <input type="hidden" name="trangthai" value="1">
                            </div>
                            <button type="submit" style="margin-left: 450px;" class="btn btn-info btn-fill pull-right">Lưu thông tin</button>
                            <button type="reset" class="btn btn-dim btn-warning pull-right">Làm mới</button>
                            <a href="{{route('dsNV')}}" class="btn btn-dark pull-right">Xem Nhân viên</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--<div style="background-color: #008080">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin nhân viên</h5>
                <a href="{{route('dsNV')}}" style="margin-left: 140px" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>

                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    --}}{{--                        <em class="icon ni ni-cross"></em>--}}{{--
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
                        <label class="form-label" for="email-address">Căn cước công dân</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$nhanvien->cccd}}" name="cccd" placeholder="Căn cước công dân" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <div class="form-icon form-icon-right ">
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
                                <input type="file" multiple class="custom-file-input" name="hinh_anh" value="{{$nhanvien->hinhanh}}" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
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
                        <label class="form-label" for="email-address">Địa chỉ</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$nhanvien->diachi}}" name="diachi"  placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự"  />
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
                    <div class="form-group" style="padding-left: 100px;">
                        <input type="submit" class="btn btn-lg btn-primary js-btn-update-sp" value="Lưu thông tin" />
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>--}}
