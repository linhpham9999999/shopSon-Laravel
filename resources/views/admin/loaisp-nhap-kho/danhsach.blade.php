@extends('admin.layout-nhap-kho.index')
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
                                            <img src="admin_asset/delete.png" width="30px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-sm">
                                        <a data-id="{{$lsp->id}}" class="btn btn-sm js-edit-btn"><img src="admin_asset/edit.png" width="30px"/></a>
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
    @include('admin.loaisp-nhap-kho.them')
    @include('admin.loaisp-nhap-kho.sua')
@endsection
