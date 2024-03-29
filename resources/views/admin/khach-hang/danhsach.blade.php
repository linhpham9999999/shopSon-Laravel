@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Quản lý Khách hàng</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày sinh</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Địa chỉ</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số điện thoại</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Email</span></th>
                                <th class="nk-tb-col tb-col-mb" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($khachhang as $kh)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$kh->hoten}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        @if($kh->ngaysinh !== null)
                                            <span>{{DateTime::createFromFormat('Y-m-d', $kh->ngaysinh)->format('m/d/Y')}}</span>
                                        @else
                                            <span>Chưa cập nhật</span>
                                        @endif
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        @if($kh->diachi !== null)
                                            <span>{{$kh->diachi}}</span>
                                        @else
                                            <span><p>Chưa cập nhật</p></span>
                                        @endif
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        @if($kh->sodth === null)
                                            <span><p>Chưa cập nhật</p></span>
                                        @else
                                            <span>{{$kh->sodth}}</span>
                                        @endif
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$kh->email}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <button class="btn btn-sm  js-delete-khachhang" data-id="{{ $kh->id }}">
                                            <img src="admin_asset/delete.png" width="45px" />
                                        </button>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $khachhang->links() !!}
                        </div>
                        {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
