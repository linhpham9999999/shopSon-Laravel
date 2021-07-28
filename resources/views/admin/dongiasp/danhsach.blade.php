@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn giá sản phẩm
                    <small>danh sách</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
             @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>Mã Đơn giá sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Thời gian bán</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($dongiasp as $dgsp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$dgsp->Ma_DGSP}}</td>
                            <td>{{$dgsp->dongia}}</td>
                            <td>{{$dgsp->thoigianbansanpham}}</td>
                            <td><a href="admin/dongiasp/xoa/{{$dgsp->Ma_DGSP}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                            <td><a href="admin/dongiasp/sua/{{$dgsp->Ma_DGSP}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
