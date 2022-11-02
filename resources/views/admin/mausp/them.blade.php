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
                        <h4 class="title">Thêm thông tin màu sản phẩm</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('actionThem3')}}" method="POST" role="form" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Sản phẩm</label>
                                        <select class="form-control" name="idSP">
                                            @foreach($sanpham as $sp)
                                                <option value="{{$sp->id}}">{{$sp->ten_SP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mã màu sản phẩm</label>
                                        <input type="text"  class="form-control" name="idMSP" placeholder="MSP001"/>
                                        <div class="error"> {{$errors->first('idMSP')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Tên màu sản phẩm</label>
                                        <input type="text" name="mau" class="form-control" placeholder="Màu">
                                        <div class="error"> {{$errors->first('mau')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Số lượng tồn</label>
                                        <input type="text" name="slton" class="form-control" placeholder="">
                                        <div class="error"> {{$errors->first('slton')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Thông tin màu</label>
                                        <textarea type="text" name="yn" class="form-control" placeholder="Ý nghĩa màu sản phẩm"></textarea>
                                        <div class="error"> {{$errors->first('yn')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Hình ảnh màu sản phẩm</label>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="status" value = "1">
                            <button type="submit" style="margin-left: 450px;" class="btn btn-info btn-fill pull-right">Lưu thông tin</button>
                            <button type="reset" class="btn btn-dim btn-warning pull-right">Làm mới</button>
                            <a href="{{route('dsMSP')}}" class="btn btn-dark pull-right">Xem Sản phẩm</a>
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
                <h5 class="modal-title">Thêm thông tin màu sản phẩm</h5>

                <a href="{{route('dsMSP')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>

            </div>
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-bottom: 5px;">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="modal-body">
                <form action="{{route('actionThem3')}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                    {{csrf_field()}}
                    --}}{{--<div class="form-group">
                        <label class="form-label" for="full-name">Loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="idLSP" id="idLSP-add">
                                @foreach($loaisp as $lsp)
                                    <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>--}}{{--
                    <div class="form-group">
                        <label class="form-label" for="email-address">Sản phẩm</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="idSP" id="idNPP-add">
                                @foreach($sanpham as $sp)
                                    <option value="{{$sp->id}}">{{$sp->ten_SP}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Mã màu sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="idMSP" placeholder="Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <div class="error"> {{$errors->first('idMSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Tên màu sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="mau" placeholder="Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                            <div class="error"> {{$errors->first('mau')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Số lượng tồn</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="slton" placeholder="Nhập số lượng tồn của sản phẩm"/>
                            <div class="error"> {{$errors->first('slton')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Thông tin màu</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="yn" placeholder="Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                            <div class="error"> {{$errors->first('yn')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-06">Hình ảnh</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="status" value = "1">
                    <div class="form-group" style="padding-left: 100px;">
                        <button type="submit" class="btn btn-lg btn-primary">Lưu thông tin</button>
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>--}}


