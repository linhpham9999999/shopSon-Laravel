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
                        <h4 class="title">Thêm thông tin Khuyến mãi</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('actionSuaKM',['id'=>$khuyenmai->id])}}" method="POST" role="form" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mã khuyến mãi</label>
                                        <input type="text" value="{{$khuyenmai->Ma_KM}}"  class="form-control" name="maKM" placeholder=""/>
                                        <div class="error"> {{$errors->first('maKM')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Phần trăm khuyến mãi</label>
                                        <input type="text" value="{{$khuyenmai->phan_tram}}" name="phantram" class="form-control" placeholder="Phần trăm khuyến mãi (%)">
                                        <div class="error"> {{$errors->first('phantram')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Giá yêu cầu</label>
                                        <input type="text" value="{{$khuyenmai->gia_yeu_cau}}" name="gia_yc" class="form-control" placeholder="">
                                        <div class="error"> {{$errors->first('gia_yc')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Ngày bắt đầu</label>
                                    <div class="form-group">
                                        <input type="date" value="{{$khuyenmai->ngay_bat_dau}}" class="form-control" name="ngaybd">
                                        <div class="error"> {{$errors->first('ngaybd')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Ngày kết thúc</label>
                                    <div class="form-group">
                                        <input type="date" value="{{$khuyenmai->ngay_ket_thuc}}" class="form-control" name="ngaykt">
                                        <div class="error"> {{$errors->first('ngaykt')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label style="margin-bottom: unset;">Nội dụng</label>
                                    <div class="form-group">
                                        <input type="text" value="{{$khuyenmai->thong_tin}}" class="form-control" name="info" placeholder="Nội dung khuyến mãi">
                                        <div class="error"> {{$errors->first('info')}}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="margin-left: 450px;" class="btn btn-info btn-fill pull-right">Lưu thông tin</button>
                            <button type="reset" class="btn btn-dim btn-warning pull-right">Làm mới</button>
                            <a href="{{route('dsKhuyenMai')}}" class="btn btn-dark pull-right">Xem Khuyến mãi</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
