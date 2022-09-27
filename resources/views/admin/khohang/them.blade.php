@extends('admin.layout.index')
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Quản lý kho hàng</h3>
                            <div class="nk-block-des text-soft">
{{--                                <p>Lưu ý: Đơn giá và lợi nhuận của các màu sản phẩm thuộc một sản phẩm phải giống nhau</p>--}}
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <a href="#" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-download-cloud"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner position-relative card-tools-toggle">
                                <div class="card-title-group">
                                    <div class="card-tools">
                                        <div class="form-inline flex-nowrap gx-3">
                                            <form action="{{route('searchProduct')}}" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-wrap w-150px">
                                                    <select class="form-select" name="tenSP" data-search="off" data-placeholder="Sản phẩm">
                                                        @foreach($sanpham as $sp)
                                                            <option value="{{ $sp->ten_SP }}">{{$sp->ten_SP}}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                        </div><!-- .form-inline -->
                                    </div><!-- .card-tools -->
                                    <div style="padding-right: 800px">
                                        <span class="d-none d-md-block"><button type="submit" class="btn btn-dim btn-outline-light disabled">Apply</button></span>
                                        <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                    </div>
                                    </form>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                            <li>
                                                <div class="toggle-wrap">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                    <div class="toggle-content" data-content="cardTools">

                                                    </div><!-- .toggle-content -->
                                                </div><!-- .toggle-wrap -->
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- .card-tools -->
                                </div><!-- .card-title-group -->
                                <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                        </div>
                                    </div>
                                </div><!-- .card-search -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-ulist">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col tb-col-mb"><span>Mã</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span>Hình ảnh</span></div>
                                        <div class="nk-tb-col tb-col-mb"><span>Màu</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Số lượng tồn</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Ý nghĩa</span></div>
                                        <div class="nk-tb-col tb-col-md"><span>Nhập thêm</span></div>
                                    </div><!-- .nk-tb-item -->
                                    @foreach($productColor as $data)
                                    <div class="nk-tb-item">

                                        <div class="nk-tb-col tb-col-mb">
                                            <span class="tb-lead-sub">{{$data->Ma_MSP}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span class="tb-status text-success"><img src="admin_asset/image_son/mau_san_pham/{{$data->hinhanh}}" width="50px" height="50px"/></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-mb">
                                            <span class="tb-lead-sub">{{$data->mau}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md" style="width: 100px; text-align: center">
                                            <span class="tb-date">{{$data->soluongton}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md" style="width: 500px;">
                                             <span class="tb-date">{{$data->thongTinMau}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <a href="{{route('chiTietNhapKho',['id'=>$data->id])}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em></a>
                                        </div>
                                     </div><!-- .nk-tb-item -->
                                    @endforeach
                                </div>
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                <div class="navi">
                                    {!! $productColor->links() !!}
                                </div>
                                {{--                        Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}--}}
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
@endsection
