@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Sản phẩm</h3>
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
                                    <a href="{{route('getThemSP')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
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
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Tên sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Hình ảnh</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Xuất xứ</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Trọng lượng</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Giá gốc</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Giảm giá</span></th>
{{--                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số lượng tồn</span></th>--}}
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Hạn sử dụng</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Nổi bật</span></th>
                                <th class="nk-tb-col tb-col-mb" colspan="2" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($sanpham as $sp)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->Ma_SP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$sp->ten_SP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span><img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" width="100px" height="100px"/></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->xuatxu}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->trongluong}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->giagoc}} VNĐ</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->giamgia}} VNĐ</span>
                                    </td>
{{--                                    <td class="nk-tb-col tb-col-mb">--}}
{{--                                        <span>{{$sp->soluongton}}</span>--}}
{{--                                    </td>--}}
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->hansudung_thang}} tháng</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        @if($sp->noibat == 1)
                                            {{ 'Có' }}
                                        @else
                                            {{'Không'}}
                                        @endif
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <button class="btn btn-sm  js-delete-sanpham" data-id="{{ $sp->id }}">{{-- btn-outline-danger py-0--}}
                                            <img src="admin_asset/delete.png" width="45px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
{{--                                        <a data-id="{{$sp->id}}" class="btn btn-sm js-edit-btn-sp"><img src="admin_asset/edit.png" width="45px"/></a>--}}
                                        <a href="admin/sanpham/sua/{{$sp->id}}"><img src="admin_asset/edit.png" width="45px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $sanpham->links() !!}
                        </div>
                        {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
{{--    @include('admin.nhaphanphoi.them')--}}
{{--    @include('admin.nhaphanphoi.sua')--}}
@endsection


{{--@section('menu')
    @include('admin.layout.menu_d')
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Sản phẩm
                                <a href="{{route('getThemSP')}}"><i class="pe-7s-plus"></i></a>
                            </h4>
                        </div>

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped" >
                            <thead>
                            <tr align="center" style="text-align: center;">
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Xuất xứ</th>
                                <th>Trọng lượng (g)</th>
                                <th>Giá gốc</th>
                                <th>Giảm giá</th>
                                <th>Số lượng tồn</th>
                                <th>Hạn sử dụng</th>
                                --}}{{--<th>Giới thiệu</th>--}}{{--
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sanpham as $sp)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$sp->Ma_SP}}</td>
                                    <td>{{$sp->ten_SP}}</td>
                                    <td><img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" width="100px" height="100px"/></td>
                                    <td>{{$sp->xuatxu}}</td>
                                    <td>{{$sp->trongluong}}</td>
                                    <td>{{$sp->giagoc}} VNĐ</td>
                                    <td>{{$sp->giamgia}} VNĐ</td>
                                    <td>{{$sp->soluongton}}</td>
                                    <td>{{$sp->hansudung_thang}} tháng</td>
                                    --}}{{--<td>{{$sp->gioithieu}}</td>--}}{{--
                                    <td>
                                        @if($sp->noibat == 1)
                                            {{ 'Có' }}
                                        @else
                                            {{'Không'}}
                                       @endif
                                    </td>
                                    <td><a href="admin/sanpham/xoa/{{$sp->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                                    <td><a href="admin/sanpham/sua/{{$sp->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div style="padding-left: 1080px">
                    {!! $sanpham->links() !!} Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection--}}
