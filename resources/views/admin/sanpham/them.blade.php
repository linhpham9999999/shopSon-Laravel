@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
                        <small>thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('actionThem4')}}"  method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Loại sản phẩm</label>
                            <select class="form-control" name="idLSP">
                                @foreach($loaisanpham as $lsp){{$lsp->ten_LSP}}
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
                        <div class="form-group">
                            <label>Mã sản phẩm</label>
                            <input class="form-control" name="id" placeholder="Mã sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="ten" placeholder="Tên sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                            <label>Xuất xứ</label>
                            <input class="form-control" name="xuatxu" placeholder="Xuất xứ sản phẩm có độ dài từ 3 đến 50 ký tự" />
                            <label>Trọng lượng</label>
                            <input class="form-control" name="trluong" placeholder="Nhập trọng lượng sản phẩm (g)" />
                            <label>Giá gốc</label>
                            <input class="form-control" name="giagoc" placeholder="Nhập giá sản phẩm (VNĐ)" />
                            <label>Giảm giá</label>
                            <input class="form-control" name="giamgia" placeholder="Nhập giảm giá sản phẩm (VNĐ)" />
                            <label>Số lượng tồn</label>
                            <input class="form-control" name="slton" placeholder="Nhập số lượng tồn của sản phẩm" />
                            <label>Hạn sử dụng </label>
                            <input class="form-control" name="hsd" placeholder="Nhập hạn sử dụng sản phẩm (tháng)" />
                            <label>Giới thiệu</label>
                            <input class="form-control" name="gthieu" placeholder="Thông tin sản phẩm phải có độ dài từ 5 đến 500 ký tự" />
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" name="hinhanh"/>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
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
