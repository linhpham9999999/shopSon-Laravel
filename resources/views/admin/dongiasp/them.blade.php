@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn giá sản phẩm
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
                <form action="{{route('actionThem1')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Mã đơn giá sản phẩm</label>
                        <input class="form-control" name="id" placeholder="Mã đơn giá sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                        <label>Giá bán</label>
                        <input class="form-control" name="gia" placeholder="Giá sản phẩm" />
                        <label>Thời gian bán</label>
                        <input class="form-control" name="tgian" placeholder="Thời gian bán sản phẩm Năm-Tháng-Ngày" />
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
