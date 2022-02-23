@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Loại sản phẩm </h3>
                    <div class="nk-block-des text-soft">
                        {{--                        <p>You have total 95 projects.</p>--}}
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="#" class="btn btn-primary btn-add" data-target="#modal-add" data-toggle="modal"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <table class="nk-tb-list nk-tb-ulist">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mã loại sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Tên loại sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-sm" colspan="2" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($loaisp as $lsp)
                                <tr class="nk-tb-item" > {{--id="npp_{{$lsp->id}}"--}}
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$lsp->Ma_LSP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$lsp->ten_LSP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-sm">
                                        <button class="btn btn-sm  js-delete-lsp" data-id="{{ $lsp->id }}">{{-- btn-outline-danger py-0--}}
                                            <img src="admin_asset/delete.png" width="45px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-sm">
                                        <a data-id="{{$lsp->id}}" class="btn btn-sm js-edit-btn"><img src="admin_asset/edit.png" width="45px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $loaisp->links() !!}
                        </div>
                        {{--                        Showing {!! $nha_phan_phoi->firstItem() !!} - {!! $nha_phan_phoi->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    @include('admin.loaisp.them')
    @include('admin.loaisp.sua')
@endsection


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
--}}
