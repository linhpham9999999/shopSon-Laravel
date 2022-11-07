@extends('admin.layout-nhap-kho.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Phiếu nhập hàng</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{route('actionThemKhoHang-nhap-kho')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Sản phẩm</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Màu</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Hình ảnh</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Nhà cung cấp</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Số lượng tồn</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Lợi nhuận</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Giá bán ra</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày tạo</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($data as $dt)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$dt->ten_SP}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$dt->mau}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md product-image-admin">
                                        <span><img src="admin_asset/image_son/mau_san_pham/{{$dt->hinhanh}}" width="50px" height="50px"/></span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$dt->nha_cung_cap}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$dt->soluongton}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$dt->loi_nhuan}} %</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{number_format($dt->gia_ban_ra,0,',','.')}} VND</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{DateTime::createFromFormat('Y-m-d', $dt->created_at)->format('m/d/Y')}}</span>
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
