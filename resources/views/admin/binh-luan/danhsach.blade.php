@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Quản lý bình luận</h3>
                    <div class="nk-block-des text-soft">
                        {{--                        <p>You have total 95 projects.</p>--}}
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
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        @if(!empty($data))
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <table class="nk-tb-list nk-tb-ulist data-comment">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mã</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Màu sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Hình ảnh</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Khách hàng</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Nội dung</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày tạo</span></th>
                                <th class="nk-tb-col tb-col-mb" style="text-align: center"><span class="sub-text">Action</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($data as $sp)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>#{{$sp->Ma_MSP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$sp->mau}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <img src="admin_asset/image_son/mau_san_pham/{{$sp->hinhanh}}" width="50px" height="50px"/>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->emailnguoidung}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$sp->noi_dung}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{DateTime::createFromFormat('Y-m-d',$sp->create_at)->format('m/d/Y')}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <form action="{{route('duyet-cmt')}}" method="POST">
                                            {{csrf_field()}}
                                        <input type="hidden" name="idCMT" value="{{$sp->idCMT}}" class="id-comment">
                                        <button type="submit" class="btn-primary duyet-binh-luan">Duyệt</button>
                                        </form>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
{{--                            {!! $data->links() !!}--}}
                        </div>
                        {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
        @else
            <h3 style="text-align: center">Hiện không có bình luận chờ duyệt</h3>
        @endif
    </div>
@endsection

