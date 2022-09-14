@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Màu sản phẩm</h3>
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
                                    {{--<a href="#" class="btn btn-primary btn-add" data-target="#modal-add-product" data-toggle="modal"><em class="icon ni ni-plus"></em><span>Thêm</span></a>--}}
                                    <a href="{{route('getThemMSP')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
                                </li>
                            </ul>
                            {{--                            @include('admin.sanpham.them')--}}
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mã</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Màu sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Hình ảnh</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số lượng tồn</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Tên sản phảm</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Loại sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-mb" colspan="2" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$dt->Ma_MSP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$dt->mau}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span><img src="admin_asset/image_son/mau_san_pham/{{$dt->hinhanh}}" width="50px" height="50px"/></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$dt->soluongton}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$dt->ten_SP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$dt->ten_LSP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <button class="btn btn-sm  js-delete-mausanpham" data-id="{{ $dt->id }}">{{-- btn-outline-danger py-0--}}
                                            <img src="admin_asset/delete.png" width="30px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        {{--                                        <a data-id="{{$sp->id}}" class="btn btn-sm js-edit-btn-sp"><img src="admin_asset/edit.png" width="45px"/></a>--}}
                                        <a href="admin/mausp/sua/{{$dt->id}}"><img src="admin_asset/edit.png" width="30px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $data->links() !!}
                        </div>
                        {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    {{--<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Màu sản phẩm
                                <a href="{{route('getThemMSP')}}"><i class="pe-7s-plus"></i></a>
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
                                    <th>Mã màu sản phẩm</th>
                                    <th>Màu sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Ý nghĩa</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $msp)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$msp->Ma_MSP}}</td>
                                        <td>{{$msp->mau}}</td>
                                        <td><img src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" width="100px"/></td>
                                        <td>{{$msp->thongTinMau}}</td>
                                        <td><a href="admin/mausp/xoa/{{$msp->id}}"><img src="admin_asset/delete.png" width="45px"/></a>
                                        </td>
                                        <td><a href="admin/mausp/sua/{{$msp->id}}"><img src="admin_asset/edit.png"
                                                                                        width="45px"/></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <div style="padding-left: 1080px">{!! $data->links() !!} Showing {!! $data->firstItem() !!} - {!! $data->lastItem() !!}</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>--}}
@endsection
