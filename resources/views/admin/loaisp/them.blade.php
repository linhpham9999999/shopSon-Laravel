<div class="modal fade" id="modal-add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm thông tin loại sản phẩm</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="" data-url="{{ route('actionThem2') }}" id="form-add-lsp" method="POST" role="form" class="form-validate is-alter">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="form-label" for="full-name">Mã loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" id="idLSP-add" name="idLSP" placeholder="Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Tên loại sản phẩm</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="tenLSP" id="tenLSP-add" placeholder="Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự" required/>
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
                        <small>thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    --}}
{{--@if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif--}}{{--

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('actionThem2')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã loại sản phẩm</label>
                            <input class="form-control" name="id" placeholder="Mã loại sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <div class="error"> {{$errors->first('id')}}</div>
                            <label>Tên loại sản phẩm</label>
                            <input class="form-control" name="ten" placeholder="Tên loại sản phẩm phải có độ dài từ 5 đến 50 ký tự" />
                            <div class="error"> {{$errors->first('ten')}}</div>
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
--}}
