@extends('admin.layout.index')
@section('content')
    <div style="background-color: #008080">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Sửa thông tin khách hàng</h6>
                    <a href="{{route('khach_hang')}}" style="margin-left: 140px" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>

                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    </a>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-bottom: 0px;">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{route('postSuaKH',['id'=>$khach_hang->id])}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label" for="email-address">Họ tên</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$khach_hang->hoten}}" name="ten" placeholder="Tên phải có độ dài từ 5 đến 50 ký tự"/>
                                <div class="error"> {{$errors->first('ten')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Số điện thoại</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$khach_hang->sodth}}" name="sodth" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự"/>
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
                            <label class="form-label" for="email-address">Ngày sinh</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$khach_hang->ngaysinh}}" name="nsinh"  placeholder="Ngày sinh phải dạng Năm-Tháng-Ngày" />
                                <div class="error"> {{$errors->first('nsinh')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Hình ảnh</label>
                            <div class="form-control-wrap">
                                <input type="file" name="hinh_anh" value="{{$khach_hang->hinhanh_user}}"/>
                                <div class="error"> {{$errors->first('hinh_anh')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Địa chỉ</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$khach_hang->diachi}}" name="diachi"  placeholder="Địa chỉ phải có độ dài từ 5 đến 255 ký tự"  />
                                <div class="error"> {{$errors->first('diachi')}}</div>
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
    </div>
@endsection
