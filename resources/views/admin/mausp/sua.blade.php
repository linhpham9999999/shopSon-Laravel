@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Màu sản phẩm
                        <small>MÃ {{$mausanppham->Ma_MSP}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/mausp/sua/{{$mausanppham->id}}" method="POST" enctype="multipart/form-data">
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
                            <input class="form-control" name="idMSP" value="{{$mausanppham->Ma_MSP}}"
                                   placeholder="Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự"/>
                            <div class="error"> {{$errors->first('idMSP')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Tên màu sản phẩm</label>
                            <input class="form-control" name="mau" value="{{$mausanppham->mau}}"
                                   placeholder="Tên màu sản phẩm phải có độ dài từ 5 đến 50 ký tự"/>
                            <div class="error"> {{$errors->first('mau')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Ý nghĩa màu sản phẩm</label>
                            <input class="form-control" name="yn" value="{{$mausanppham->thongTinMau}}"
                                   placeholder="Ý nghĩa màu sản phẩm phải có độ dài từ 5 đến 255 ký tự"/>
                            <div class="error"> {{$errors->first('yn')}}</div>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="hinhanh"/>
                            <div class="error"> {{$errors->first('hinhanh')}}</div>
                        </div>
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
