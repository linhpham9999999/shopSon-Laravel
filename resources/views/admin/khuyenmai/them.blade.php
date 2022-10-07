@extends('admin.layout.index')
@section('content')
    <div style="background-color: #008080">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thông tin khuyến mãi</h5>
                    <a href="{{route('dsKhuyenMai')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-bottom: 5px;">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{route('actionThemKM')}}" method="POST" role="form" class="form-validate is-alter">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label" for="email-address">Mã khuyến mãi</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="maKM" placeholder="Mã khuyến mãi" />
                                <div class="error"> {{$errors->first('maKM')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Phần trăm khuyến mãi</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="phantram" placeholder="Phần trăm khuyến mãi (%)" />
                                <div class="error"> {{$errors->first('phantram')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Giá yêu cầu</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="gia_yc" placeholder="Giá yêu cầu" />
                                <div class="error"> {{$errors->first('gia_yc')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right ">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input name="ngaybd" class="form-control form-control-outlined date-picker" id="outlined-date-picker">
                                <label class="form-label-outlined" for="outlined-date-picker">Ngày bắt đầu</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right xl">
                                    <em class="icon ni ni-calendar-alt"></em>
                                </div>
                                <input name="ngaykt" class="form-control form-control-xl form-control-outlined date-picker" id="outlined-date-picker2">
                                <label class="form-label-outlined" for="outlined-date-picker2">Ngày kết thúc</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Nội dung</label>
                            <div class="form-control-wrap">
                                <input class="form-control" name="info" placeholder="Nội dung khuyến mãi" />
                                <div class="error"> {{$errors->first('info')}}</div>
                            </div>
                        </div>
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
