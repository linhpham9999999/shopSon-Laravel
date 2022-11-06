@extends('admin.layout.index')
@section('cssKH')
    <style>
        .abc span{
            width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 25px;
            -webkit-line-clamp: 3;
            height: 75px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
    </style>
@endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Liệt kê bài viết</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{route('them-tin-tuc')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">STT</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Tiêu đề</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Hình ảnh</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mô tả ngắn</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Nội dung bài viết</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày tạo</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Tác giả</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$dt->id}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$dt->tieu_de}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md product-image-admin">
                                        <span><img src="admin_asset/tintuc/{{$dt->hinh_anh}}" width="50px" height="50px"/></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md abc">
                                        <span>{{$dt->mo_ta_ngan}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb abc">
                                        <span>{{$dt->noi_dung}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{DateTime::createFromFormat('Y-m-d', $dt->created_at)->format('m/d/Y')}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$dt->hoten}}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-inner">
                        <div class="navi">
                            {!! $data->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
