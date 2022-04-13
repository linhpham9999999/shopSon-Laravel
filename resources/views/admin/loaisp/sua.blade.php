<div class="modal fade" id="modal-edit-lsp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin loại sản phẩm</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit-lsp" method="POST" role="form" class="form-validate is-alter">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" />
                    <div class="form-group">
                        <label class="form-label" for="full-name">Mã loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="idLSP" id="idLSP-edit" placeholder="Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Tên loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="tenLSP" id="tenLSP-edit" placeholder="Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 100px;">
                        <button type="button" class="btn btn-lg btn-primary js-btn-update-lsp">Lưu thông tin</button>
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--
@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_c')
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm
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

                    <form action="{{route('actionSuaLSP',['id'=>$loaisp->id])}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã loại sản phẩm</label>
                            <input class="form-control" name="Ma_LSP" value="{{$loaisp->Ma_LSP}}" placeholder="Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <div class="error"> {{$errors->first('Ma_LSP')}}</div>

                            <label>Tên loại sản phẩm</label>
                            <input class="form-control" name="ten" value="{{$loaisp->ten_LSP}}" placeholder="Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                            <div class="error"> {{$errors->first('ten')}}</div>
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
--}}
