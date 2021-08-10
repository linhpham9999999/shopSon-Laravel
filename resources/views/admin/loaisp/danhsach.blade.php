@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại sản phẩm
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
                    <th>Mã loại sản phẩm</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                @foreach($loaisanpham as $lsp)
                    <tr class="odd gradeX" align="center">
                        <td>{{$lsp->Ma_LSP}}</td>
                        <td>{{$lsp->ten_LSP}}</td>
                        <td><a href="admin/loaisp/xoa/{{$lsp->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                        <td><a href="admin/loaisp/sua/{{$lsp->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
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
