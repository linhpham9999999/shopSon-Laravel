@extends('admin.layout.index')
@section('content')
    <div style="background-color: #008080">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa thông tin màu sản phẩm</h5>
                    <a href="{{route('dsMSP')}}" class="btn btn-wider btn-primary"><span>Back</span><em class="icon ni ni-arrow-right"></em></a>

                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-bottom: 0px">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{route('actionSuaMSP',['id'=>$mausanppham->id])}}" method="POST" role="form" enctype="multipart/form-data" class="form-validate is-alter">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="form-label" for="full-name">Loại sản phẩm</label>
                            <div class="form-control-wrap">
                                <select class="form-control" name="idLSP" id="idLSP-edit">
                                    @foreach($loaisp as $lsp)
                                        <option value="{{$lsp->id}}" >{{$lsp->ten_LSP}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Sản phẩm</label>
                            <div class="form-control-wrap">
                                <select class="form-control" name="idSP" id="idNPP-edit">
                                    @foreach($sanpham as $sp)
                                        <option value="{{$sp->id}}" >{{$sp->ten_SP}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Mã màu sản phẩm</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$mausanppham->Ma_MSP}}" name="idMSP" id="idSP-edit" placeholder="Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự"/>
                                <div class="error"> {{$errors->first('idMSP')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Tên màu sản phẩm</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$mausanppham->mau}}" name="mau" id="tenSP-edit" placeholder="Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự"/>
                                <div class="error"> {{$errors->first('mau')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Số lượng tồn</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$mausanppham->soluongton}}" name="slton" id="xuatxu-edit" placeholder="Nhập số lượng tồn của sản phẩm" />
                                <div class="error"> {{$errors->first('slton')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Ý nghĩa màu</label>
                            <div class="form-control-wrap">
                                <input class="form-control" value="{{$mausanppham->thongTinMau}}" name="yn" id="trluong-edit" placeholder="Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 500 ký tự"/>
                                <div class="error"> {{$errors->first('yn')}}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="default-06">Hình ảnh</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" multiple class="custom-file-input" value="{{$mausanppham->hinhanh}}" name="hinh_anh" id="customFile">
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
