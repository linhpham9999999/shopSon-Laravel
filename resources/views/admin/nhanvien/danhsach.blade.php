@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách hàng
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
                        <th>Họ tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nhanvien as $nv)
                        <tr class="odd gradeX" align="center">
                            <td>{{$nv->hoten}}</td>
                            <td>{{$nv->diachi}}</td>
                            <td>{{$nv->sodth}}</td>
                            <td>
                                @if($nv->gioitinh == 0)
                                    {{'Nữ'}}
                                @else
                                    {{'Nam'}}
                                @endif
                            </td>
                            <td>{{$nv->ngaysinh}}</td>
                            <td>{{$nv->email}}</td>
                            <td><a href="admin/nhanvien/xoa/{{$nv->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                            <td><a href="admin/nhanvien/sua/{{$nv->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
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
