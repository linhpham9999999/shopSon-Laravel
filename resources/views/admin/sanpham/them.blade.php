@extends('admin.layout.index')
@section('content')
<div style="background-color: #008080">
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
                        <label class="form-label" for="email-address">Nổi bật</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="noibat" id="noibat-add">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Hình ảnh</label>
                        <div class="form-control-wrap">
                            <input type="file" name="hinh_anh" id="hinh_anh-add"/>
                            <div class="error"> {{$errors->first('hinh_anh')}}</div>
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
