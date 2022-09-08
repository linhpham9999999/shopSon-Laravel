@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Nhân viên</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    {{--<a href="#" class="btn btn-primary btn-add" data-target="#modal-add-product" data-toggle="modal"><em class="icon ni ni-plus"></em><span>Thêm</span></a>--}}
                                    <a href="{{route('getThemNV')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
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
{{--                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ảnh</span></th>--}}
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Họ tên</span></th>
{{--                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày sinh</span></th>--}}
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Chức vụ</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Địa chỉ</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số điện thoại</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày vào làm</span></th>
                                <th class="nk-tb-col tb-col-mb" colspan="2" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($nhanvien as $nv)
                                <tr class="nk-tb-item">
{{--                                    <td class="nk-tb-col tb-col-md">--}}
{{--                                        <span><img src="images/{{$nv->hinhanh_user}}" alt="ảnh nhân viên" width="100px" height="100px"></span>--}}
{{--                                    </td>--}}
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$nv->hoten}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$nv->CV_ten}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$nv->diachi}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$nv->sodth}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$nv->email}} </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$nv->ngay_vao_lam}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <button class="btn btn-sm  js-delete-nhanvien" data-id="{{ $nv->id }}">{{-- btn-outline-danger py-0--}}
                                            <img src="admin_asset/delete.png" width="45px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        {{--                                        <a data-id="{{$sp->id}}" class="btn btn-sm js-edit-btn-sp"><img src="admin_asset/edit.png" width="45px"/></a>--}}
                                        <a href="admin/nhanvien/sua/{{$nv->id}}"><img src="admin_asset/edit.png" width="45px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $nhanvien->links() !!}
                        </div>
                        {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
{{--    <div id="page-wrapper">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="header">--}}
{{--                            <h4 class="title">Nhân viên--}}
{{--                                <a href="{{route('getThemNV')}}"><i class="pe-7s-plus"></i></a>--}}
{{--                            </h4>--}}
{{--                        </div>--}}

{{--                        @if(session('thongbao'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                {{session('thongbao')}}--}}
{{--                            </div>--}}
{{--                         @endif--}}
{{--                        <div class="content table-responsive table-full-width">--}}
{{--                            <table class="table table-hover table-striped" >--}}
{{--                            <thead>--}}
{{--                            <tr align="center">--}}
{{--                                <th style="text-align: center;">Họ tên</th>--}}
{{--                                <th style="text-align: center;">Địa chỉ</th>--}}
{{--                                <th style="text-align: center;">Số điện thoại</th>--}}
{{--                                <th style="text-align: center;">Giới tính</th>--}}
{{--                                <th style="text-align: center;">Ngày sinh</th>--}}
{{--                                <th style="text-align: center;">Email</th>--}}
{{--                                <th style="text-align: center;">Delete</th>--}}
{{--                                <th style="text-align: center;">Edit</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($nhanvien as $nv)--}}
{{--                                <tr class="odd gradeX" align="center">--}}
{{--                                    <td>{{$nv->hoten}}</td>--}}
{{--                                    <td>{{$nv->diachi}}</td>--}}
{{--                                    <td>{{$nv->sodth}}</td>--}}
{{--                                    <td>--}}
{{--                                        @if($nv->gioitinh == 0)--}}
{{--                                            {{'Nữ'}}--}}
{{--                                        @else--}}
{{--                                            {{'Nam'}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>{{$nv->ngaysinh}}</td>--}}
{{--                                    <td>{{$nv->email}}</td>--}}
{{--                                    <td><a href="admin/nhanvien/xoa/{{$nv->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>--}}
{{--                                    <td><a href="admin/nhanvien/sua/{{$nv->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span style="padding-left: 1080px">--}}
{{--                    {!! $nhanvien->links() !!} Showing {!! $nhanvien->firstItem() !!} - {!! $nhanvien->lastItem() !!}</span>--}}
{{--            </div>--}}
{{--            <!-- /.row -->--}}
{{--        </div>--}}
{{--        <!-- /.container-fluid -->--}}
{{--    </div>--}}
