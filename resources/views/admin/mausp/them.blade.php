@extends('admin.layout.index')
@section('content')
    <div style="background-color: #008080">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thông tin màu sản phẩm</h5>

                    <a href="{{route('dsMSP')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>

{{--                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        --}}{{--                    <em class="icon ni ni-cross"></em>--}}
{{--                    </a>--}}
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-bottom: 5px;">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{route('actionThem3')}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label" for="full-name">Loại sản phẩm</label>
                            <div class="form-control-wrap">
                                <select class="form-control" name="idLSP" id="idLSP-add">
                                    @foreach($loaisp as $lsp)
                                        <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                            <label class="form-label" for="email-address">Hình ảnh</label>
                            <div class="form-control-wrap">
                                <input type="file" name="hinh_anh" id="hinh_anh-add"/>
                                <div class="error"> {{$errors->first('hinh_anh')}}</div>
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
    </div>
    {{--<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Màu sản phẩm
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
                    <form action="{{route('actionThem3')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="idLSP">
                                @foreach($loaisp as $lsp)
                                    <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select class="form-control" name="idSP">
                                @foreach($sanpham as $sp)
                                    <option value="{{$sp->id}}">{{$sp->ten_SP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mã màu sản phẩm</label>
                            <input class="form-control" name="idMSP" placeholder="Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <div class="error"> {{$errors->first('idMSP')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Tên màu sản phẩm</label>
                            <input class="form-control" name="mau" placeholder="Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                            <div class="error"> {{$errors->first('mau')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Ý nghĩa màu sản phẩm</label>
                            <input class="form-control" name="yn" placeholder="Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                            <div class="error"> {{$errors->first('yn')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinhanh" />
                            <div class="error"> {{$errors->first('hinhanh')}}</div>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>--}}

@endsection


