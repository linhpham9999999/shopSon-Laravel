@extends('admin.layout-nhap-kho.index')
@section('content')
<div style="background-color: #008080">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin sản phẩm</h5>
                <a href="{{route('dsSP-nhap-kho')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-bottom: 5px;">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="modal-body">
                <form action="{{route('postSuaSP-nhap-kho',['id'=>$sanpham->id])}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" />
                    <div class="form-group">
                        <label class="form-label" for="full-name">Loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="idLSP" id="idLSP-edit">
                                @foreach($loaisp as $lsp)
                                <option value="{{$lsp->id}}" id="idLSP-edit" >{{$lsp->ten_LSP}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Mã sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->Ma_SP}}" name="idSP" id="idSP-edit" placeholder="Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự" required/>
                            <div class="error"> {{$errors->first('idSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Tên sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->ten_SP}}" name="tenSP" id="tenSP-edit" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 100 ký tự" required/>
                            <div class="error"> {{$errors->first('tenSP')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Xuất xứ</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->xuatxu}}" name="xuatxu" id="xuatxu-edit" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự" required />
                            <div class="error"> {{$errors->first('xuatxu')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Trọng lượng</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->trongluong}}" name="trluong" id="trluong-edit" placeholder="Nhập trọng lượng sản phẩm (g)" required />
                            <div class="error"> {{$errors->first('trluong')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giá nhập vào</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->gia_nhap_vao}}" name="gianhap" id="giagoc-edit" placeholder="Nhập giá sản phẩm (VNĐ)" required />
                            <div class="error"> {{$errors->first('gianhap')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giá bán ra</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->gia_ban_ra}}" name="giaban" id="giamgia-edit" placeholder="Nhập giá giảm sản phẩm (VNĐ)" required />
                            <div class="error"> {{$errors->first('giaban')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Hạn sử dụng</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->hansudung_thang}}" name="hsd" id="hsh-edit" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" required />
                            <div class="error"> {{$errors->first('hsd')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Giới thiệu</label>
                        <div class="form-control-wrap">
                            <input class="form-control" value="{{$sanpham->gioithieu}}" name="gthieu" id="gthieu-edit" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" required />
                            <div class="error"> {{$errors->first('gthieu')}}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Nổi bật</label>
                        <div class="form-control-wrap">
                            <select class="form-control" name="noibat" id="noibat-edit">
                                <option value="0">Không</option>
                                <option value="1">Có</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-06">Hình ảnh</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple class="custom-file-input" value="{{$sanpham->hinhanhgoc}}" name="hinh_anh" id="customFile">
                                <div class="error"> {{$errors->first('hinh_anh')}}</div>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 100px;">
                        <button type="submit" class="btn btn-lg btn-primary js-btn-update-sp">Lưu thông tin</button>
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
