@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn giá sản phẩm
                    <small>MÃ {{$dongia->Ma_DGSP}}</small>
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
                <form action="admin/dongiasp/sua/{{$dongia->Ma_DGSP}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Giá bán</label>
                        <input class="form-control" name="gia" value="{{$dongia->dongia}}" placeholder="Giá sản phẩm" />
                        <label>Thời gian bán</label>
                        <input class="form-control" name="tgian" value="{{$dongia->thoigianbansanpham}}" placeholder="Thời gian bán sản phẩm Năm-Tháng-Ngày" />
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
