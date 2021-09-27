@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hình ảnh
                        <small>danh sách</small>
                    </h1>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" > {{--id="dataTables-example"--}}
                    <thead>
                    <tr align="center">
                        <th>Mã hình ảnh</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Màu sản phẩm</th>
                        <th>Giá gốc</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hinhanh as $ha)
                        <tr class="odd gradeX" align="center">
                            <td>{{$ha->Ma_HA}}</td>
                            <td><img src="admin_asset/image_son/{{$ha->hinhanh}}" width="100px"/></td>
                            <td>{{$ha->ten_SP}}</td>
                            <td>{{$ha->Ma_MSP}}</td>
                            <td>{{$ha->giagoc}}</td>
                            <td><a href="admin/hinhanh/xoa/{{$ha->Ma_HA}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                            <td><a href="admin/hinhanh/sua/{{$ha->Ma_HA}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
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
