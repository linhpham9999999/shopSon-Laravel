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

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST"  enctype="multipart/form-data">
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
                        <div class="error"> {{$errors->first('id')}}</div>

                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="ten" value="{{$sanpham->ten_SP}}" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                        <div class="error"> {{$errors->first('ten')}}</div>

                        <label>Xuất xứ</label>
                        <input class="form-control" name="xuatxu" value="{{$sanpham->xuatxu}}" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự" />
                        <div class="error"> {{$errors->first('xuatxu')}}</div>

                        <label>Trọng lượng</label>
                        <input class="form-control" name="trluong" value="{{$sanpham->trongluong}}" placeholder="Nhập trọng lượng sản phẩm (g)" />
                        <div class="error"> {{$errors->first('trluong')}}</div>

                        <label>Giá gốc</label>
                        <input class="form-control" name="giagoc" value="{{$sanpham->giagoc}}" placeholder="Nhập giá sản phẩm (VNĐ)" />
                        <div class="error"> {{$errors->first('giagoc')}}</div>

                        <label>Giảm giá</label>
                        <input class="form-control" name="giamgia" value="{{$sanpham->giamgia}}" placeholder="Nhập giảm giá sản phẩm (VNĐ)" />
                        <div class="error"> {{$errors->first('giamgia')}}</div>

                        <label>Số lượng tồn</label>
                        <input class="form-control" name="slton" value="{{$sanpham->soluongton}}" placeholder="Nhập số lượng tồn của sản phẩm" />
                        <div class="error"> {{$errors->first('slton')}}</div>

                        <label>Hạn sử dụng </label>
                        <input class="form-control" name="hsd" value="{{$sanpham->hansudung_thang}}" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" />
                        <div class="error"> {{$errors->first('hsd')}}</div>

                        <label>Giới thiệu</label>
                        <input class="form-control" name="gthieu" value="{{$sanpham->gioithieu}}" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                        <div class="error"> {{$errors->first('gthieu')}}</div>

                        <label>Số sao</label>
                        <select class="form-control" name="sosao">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <label>Nổi bật</label>
                        <select class="form-control" name="noibat">
                            <option value="0">Không</option>
                            <option value="1">Có</option>
                        </select>

                        <label>Hình ảnh sản phẩm</label>
                        <input type="file" name="hinh_anh" />
                        <div class="error"> {{$errors->first('hinh_anh')}}</div>

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
