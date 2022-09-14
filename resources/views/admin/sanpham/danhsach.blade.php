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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Giá nhập vào</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Giá bán ra</span></th>
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
                                        <span><img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" width="50px" height="50px"/></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->xuatxu}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->trongluong}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->gia_nhap_vao}} VNĐ</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->gia_ban_ra}} VNĐ</span>
                                    </td>
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
                                            <img src="admin_asset/delete.png" width="30px" />
                                        </button>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
{{--                                        <a data-id="{{$sp->id}}" class="btn btn-sm js-edit-btn-sp"><img src="admin_asset/edit.png" width="45px"/></a>--}}
                                        <a href="admin/sanpham/sua/{{$sp->id}}"><img src="admin_asset/edit.png" width="30px"/></a>
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
@endsection

