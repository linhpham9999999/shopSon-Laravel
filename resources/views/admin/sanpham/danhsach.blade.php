@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
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
                        <th>Mã</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Xuất xứ</th>
                        <th>Trọng lượng (g)</th>
                        <th>Giá gốc</th>
                        <th>Giảm giá</th>
                        <th>Số lượng tồn</th>
                        <th>Hạn sử dụng</th>
                        <th>Giới thiệu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sanpham as $sp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$sp->Ma_SP}}</td>
                            <td>{{$sp->ten_SP}}</td>
                            <td><img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" width="100px"/></td>
                            <td>{{$sp->xuatxu}}</td>
                            <td>{{$sp->trongluong}}</td>
                            <td>{{$sp->giagoc}} VNĐ</td>
                            <td>{{$sp->giamgia}} VNĐ</td>
                            <td>{{$sp->soluongton}}</td>
                            <td>{{$sp->hansudung_thang}} tháng</td>
                            <td>{{$sp->gioithieu}}</td>
                            <td><a href="admin/sanpham/xoa/{{$sp->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                            <td><a href="admin/sanpham/sua/{{$sp->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
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
