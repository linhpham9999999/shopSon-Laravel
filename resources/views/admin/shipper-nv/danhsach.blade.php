@extends('admin.layout-ban-hang.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Quản lý Shipper</h3>
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
                                    <a href="{{route('getThemShipper-ban-hang')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Họ tên</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Địa chỉ</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số điện thoại</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày vào làm</span></th>
                                <th class="nk-tb-col tb-col-mb" colspan="2" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($shipper as $nv)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$nv->hoten}}</span>
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
                                        <span>{{DateTime::createFromFormat('Y-m-d', $nv->ngay_vao_lam)->format('m/d/Y')}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <button class="btn btn-sm  js-delete-shipper" data-id="{{ $nv->id }}">
                                            <img src="admin_asset/delete.png" width="30px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        {{--                                        <a data-id="{{$sp->id}}" class="btn btn-sm js-edit-btn-sp"><img src="admin_asset/edit.png" width="45px"/></a>--}}
                                        <a href="admin/shipper-nv/sua/{{$nv->id}}"><img src="admin_asset/edit.png" width="30px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $shipper->links() !!}
                        </div>
                        {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
