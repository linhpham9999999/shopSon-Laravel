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
                        <h4 class="title">Chi tiết nhập hàng</h4>
                    </div>
                    <div class="content">
                        <form action="{{route('actionThemKhoHang')}}"  method="POST">
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Sản phẩm</label>
                                        <input type="text" class="form-control" disabled placeholder="Tên sản phẩm" value="{{$sanpham->ten_SP}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mã màu sản phẩm</label>
                                        <input type="text" class="form-control" disabled placeholder="Mã màu sản phẩm" value="{{$mausanpham->Ma_MSP}}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Màu</label>
                                        <input type="email" class="form-control" disabled placeholder="Màu" value="{{$mausanpham->mau}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Số lượng tồn</label>
                                        <input type="text" class="form-control" disabled placeholder="Số lượng tồn" value="{{$mausanpham->soluongton}}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" style="margin-bottom: unset;">Giá gốc hiện tại</label>
                                        <input type="text" class="form-control" disabled placeholder="Giá gốc hiện tại" value="{{$sanpham->gia_nhap_vao}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 30px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <img class="product-image-admin2" src="admin_asset/image_son/mau_san_pham/{{$mausanpham->hinhanh}}" width="200px" height="200px"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Nhà cung cấp</label>
                                        <input type="text" name="ncc" class="form-control" placeholder="Nhà cung cấp">
                                        <div class="error">{{$errors->first('ncc')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Số lượng nhập vào</label>
                                        <input type="text" name="soluong" class="form-control" placeholder="Số lượng nhập vào">
                                        <div class="error">{{$errors->first('soluong')}}</div>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin: 10px;">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Đơn giá</label>
                                        <span class="overline-title">VND</span>
                                        <input type="text" name="dongia" class="form-control" placeholder="Đơn giá">
                                        <div class="error">{{$errors->first('dongia')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Lợi nhuận</label>
                                        <input type="text" name="loinhuan" class="form-control" placeholder="Lợi nhuận">
                                        <div class="error">{{$errors->first('loinhuan')}}</div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="idSP" value="{{$sanpham->id}}">
                            <input type="hidden" name="idMSP" value="{{$mausanpham->id}}">
                            <button type="submit" style="margin-left: 900px;" class="btn btn-info btn-fill pull-right">Lưu</button>
                            <a href="{{route('dsKhoHang')}}" class="btn btn-secondary">Xem</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
