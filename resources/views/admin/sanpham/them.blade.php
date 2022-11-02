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
                        <h4 class="title">Thêm thông tin sản phẩm</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('actionThem4')}}" method="POST" role="form" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Loại sản phẩm</label>
                                        <select class="form-control" name="idLSP">
                                            @foreach($loaisanpham as $lsp)
                                                <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mã sản phẩm</label>
                                        <input type="text"  class="form-control" name="idSP" placeholder="MSP001"/>
                                        <div class="error"> {{$errors->first('idSP')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Tên sản phẩm</label>
                                        <input type="text" name="tenSP" class="form-control" placeholder="Màu">
                                        <div class="error"> {{$errors->first('tenSP')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Xuất xứ</label>
                                        <input type="text" name="xuatxu" class="form-control">
                                        <div class="error"> {{$errors->first('xuatxu')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Trọng lượng</label>
                                        <input type="text" name="trluong" class="form-control" placeholder="4 (g)">
                                        <div class="error"> {{$errors->first('trluong')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Giá nhập vào</label>
                                        <input name="gianhap" class="form-control" placeholder="100000 VND">
                                        <div class="error">{{$errors->first('gianhap')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Giá bán ra</label>
                                        <input name="giaban" class="form-control" placeholder="100000 VND">
                                        <div class="error">{{$errors->first('giaban')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Hạn sử dụng</label>
                                        <input name="hsd" class="form-control" placeholder="1 tháng">
                                        <div class="error">{{$errors->first('hsd')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Giới thiệu</label>
                                        <textarea type="text" name="gthieu" class="form-control" placeholder=""></textarea>
                                        <div class="error"> {{$errors->first('gthieu')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Thành phần</label>
                                        <textarea name="thanhphan" class="form-control" placeholder=""></textarea>
                                        <div class="error">{{$errors->first('thanhphan')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label style="margin-bottom: unset;">Hình ảnh sản phẩm</label>
                                    <div class="form-group">
                                       <div class="custom-file">
                                            <input type="file" multiple class="custom-file-input" name="hinh_anh" id="customFile">
                                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                       </div>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value = "1">
                            </div>
                            <button type="submit" style="margin-left: 450px;" class="btn btn-info btn-fill pull-right">Lưu thông tin</button>
                            <button type="reset" class="btn btn-dim btn-warning pull-right">Làm mới</button>
                            <a href="{{route('dsSP')}}" class="btn btn-dark pull-right">Xem Sản phẩm</a>
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
                <h5 class="modal-title">Thêm thông tin sản phẩm</h5>
                <a href="{{route('dsSP')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-bottom: 5px;">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="modal-body">
                <form action="{{route('actionThem4')}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="form-label" for="full-name">Loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="idLSP" id="idLSP-add">
                                @foreach($loaisanpham as $lsp)
                                    <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Mã sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="idSP" id="idSP-add" placeholder="Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <div class="error"> {{$errors->first('idSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Tên sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="tenSP" id="tenSP-add" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự" />
                            <div class="error"> {{$errors->first('tenSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Xuất xứ</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="xuatxu" id="xuatxu-add" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự"  />
                            <div class="error"> {{$errors->first('xuatxu')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Trọng lượng</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="trluong" id="trluong-add" placeholder="Nhập trọng lượng sản phẩm (g)"  />
                            <div class="error"> {{$errors->first('trluong')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Gía nhập vào</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="gianhap" id="giagoc-add" placeholder="Nhập giá sản phẩm (VNĐ)"  />
                            <div class="error"> {{$errors->first('gianhap')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giảm bán ra</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="giaban" id="giamgia-add" placeholder="Nhập giá giảm sản phẩm (VNĐ)"  />
                            <div class="error"> {{$errors->first('giaban')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Hạn sử dụng</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="hsd" id="hsh-add" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" />
                            <div class="error"> {{$errors->first('hsd')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giới thiệu</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="gthieu" id="gthieu-add" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                            <div class="error"> {{$errors->first('gthieu')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Thành phần</label>
                        <div class="form-control-wrap">
                            <textarea class="form-control" name="gthieu" id="gthieu-add" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự">
                            </textarea>
                            <div class="error"> {{$errors->first('gthieu')}}</div>
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
