@extends('admin.layout-ban-hang.index')
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
                        <h4 class="title">Sửa thông tin sản phẩm</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('postSuaSP-ban-hang',['id'=>$sanpham->id])}}" method="POST" role="form" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Loại sản phẩm</label>
                                        <select class="form-control" name="idLSP">
                                            @foreach($loaisp as $lsp)
                                                <option value="{{$lsp->id}}">{{$lsp->ten_LSP}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mã sản phẩm</label>
                                        <input type="text" value="{{$sanpham->Ma_SP}}" class="form-control" name="idSP" placeholder="MSP001"/>
                                        <div class="error"> {{$errors->first('idSP')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Tên sản phẩm</label>
                                        <input type="text" value="{{$sanpham->ten_SP}}" name="tenSP" class="form-control" placeholder="Màu">
                                        <div class="error"> {{$errors->first('tenSP')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Xuất xứ</label>
                                        <input type="text" value="{{$sanpham->xuatxu}}" name="xuatxu" class="form-control">
                                        <div class="error"> {{$errors->first('xuatxu')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Trọng lượng</label>
                                        <input type="text" name="trluong" value="{{$sanpham->trongluong}}" class="form-control" placeholder="4 (g)">
                                        <div class="error"> {{$errors->first('trluong')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Giá nhập vào</label>
                                        <input name="gianhap" class="form-control" value="{{$sanpham->gia_nhap_vao}}" placeholder="100000 VND">
                                        <div class="error">{{$errors->first('gianhap')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Giá bán ra</label>
                                        <input name="giaban" class="form-control" value="{{$sanpham->gia_ban_ra}}" placeholder="100000 VND">
                                        <div class="error">{{$errors->first('giaban')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Hạn sử dụng</label>
                                        <input name="hsd" class="form-control" value="{{$sanpham->hansudung_thang}}" placeholder="1 tháng">
                                        <div class="error">{{$errors->first('hsd')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Giới thiệu</label>
                                        <textarea type="text" placeholder="{{$sanpham->gioithieu}}" name="gthieu" class="form-control" placeholder=""></textarea>
                                        <div class="error"> {{$errors->first('gthieu')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Thành phần</label>
                                        <textarea name="thanhphan" placeholder="{{$sanpham->thanh_phan}}" class="form-control" placeholder=""></textarea>
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
                            <a href="{{route('dsSP-ban-hang')}}" class="btn btn-dark pull-right">Xem Sản phẩm</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
