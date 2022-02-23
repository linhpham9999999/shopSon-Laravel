@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Nhà phân phối</h3>
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
                                    <button class="btn btn-primary js-btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></button>
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mã nhà phân phối</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Tên nhà phân phối</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Địa chỉ</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số điện thoại</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-mb" colspan="2" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                                @foreach($nha_phan_phoi as $npp)
                                <tr class="nk-tb-item" id="npp_{{$npp->id}}">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$npp->Ma_NPP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$npp->ten_NPP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$npp->diachi_NPP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$npp->sodth_NPP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$npp->email_NPP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <button class="btn btn-sm  js-delete-ncc" data-id="{{ $npp->id }}">{{-- btn-outline-danger py-0--}}
                                            <img src="admin_asset/delete.png" width="45px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <a data-id="{{$npp->id}}" class="btn btn-sm js-edit-btn-npp"><img src="admin_asset/edit.png" width="45px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                                @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $nha_phan_phoi->links() !!}
                        </div>
{{--                        Showing {!! $nha_phan_phoi->firstItem() !!} - {!! $nha_phan_phoi->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    @include('admin.nhaphanphoi.them')
    @include('admin.nhaphanphoi.sua')
@endsection

