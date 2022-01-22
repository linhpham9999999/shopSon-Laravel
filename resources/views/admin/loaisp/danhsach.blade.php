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
                <div class="card">
                    <div class="header">
                        <h4 class="title">Loại sản phẩm
                            <a href="{{route('getThemLSP')}}"><i class="pe-7s-plus"></i></a>
                        </h4>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <!-- /.col-lg-12 -->
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped" >
                        <thead>
                        <tr align="center">
                            <th  style="text-align: center;">Mã loại sản phẩm</th>
                            <th  style="text-align: center;">Tên loại sản phẩm</th>
                            <th  style="text-align: center;">Delete</th>
                            <th  style="text-align: center;">Edit</th>
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
                </div>
            </div>
            <span style="padding-left: 1080px">{!! $loaisanpham->links() !!} Showing {!! $loaisanpham->firstItem() !!} - {!! $loaisanpham->lastItem() !!}</span>
        </div>
    </div>
</div>
@endsection
