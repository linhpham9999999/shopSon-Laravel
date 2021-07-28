@extends('admin.layout.index')

@section('content')
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhà Phân Phối
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
                    <th  style="text-align: center;">Mã nhà phân phối</th>
                    <th  style="text-align: center;">Tên nhà phân phối</th>
                    <th style="text-align: center;">Địa chỉ</th>
                    <th style="text-align: center;">Số điện thoại</th>
                    <th style="text-align: center;">Email</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($nhaphanphoi as $npp)
                        <tr class="odd gradeX" align="center">
                            <td>{{$npp->Ma_NPP}}</td>
                            <td>{{$npp->ten_NPP}}</td>
                            <td>{{$npp->diachi_NPP}}</td>
                            <td>{{$npp->sodth_NPP}}</td>
                            <td>{{$npp->email_NPP}}</td>
                            <td><a href="admin/nhaphanphoi/xoa/{{$npp->Ma_NPP}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                            <td><a href="admin/nhaphanphoi/sua/{{$npp->Ma_NPP}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
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
