@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST">
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
                            <label>Nhà phân phối</label>
                            <select class="form-control" name="idNPP">
                                @foreach($nhapp as $npp)
                                    <option value="{{$npp->id}}">{{$npp->ten_NPP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Mã sản phẩm</label>
                        <input class="form-control" name="id" value="{{$sanpham->Ma_SP}}" placeholder="Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" value="{{$sanpham->ten_SP}}" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                        <label>Xuất xứ</label>
                        <input class="form-control" name="xuatxu" value="{{$sanpham->xuatxu}}" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự" />
                        <label>Trọng lượng</label>
                        <input class="form-control" name="trluong" value="{{$sanpham->trongluong}}" placeholder="Nhập trọng lượng sản phẩm (g)" />
                        <label>Giá gốc</label>
                        <input class="form-control" name="giagoc" value="{{$sanpham->gia}}" placeholder="Nhập giá sản phẩm (VNĐ)" />
                        <label>Giảm giá</label>
                        <input class="form-control" name="giamgia" value="{{$sanpham->giamgia}}" placeholder="Nhập giảm giá sản phẩm (VNĐ)" />
                        <label>Số lượng tồn</label>
                        <input class="form-control" name="slton" value="{{$sanpham->soluongton}}" placeholder="Nhập số lượng tồn của sản phẩm" />
                        <label>Hạn sử dụng </label>
                        <input class="form-control" name="hsd" value="{{$sanpham->hansudung_thang}}" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" />
                        <label>Giới thiệu</label>
                        <input class="form-control" name="gthieu" value="{{$sanpham->gioithieu}}" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                        <label>Hình ảnh sản phẩm</label>
                        <input type="file" name="hinhanh"/>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
