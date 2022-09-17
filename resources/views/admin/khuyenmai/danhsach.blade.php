@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Khuyến mãi</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div>
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <a href="{{route('getThemKM')}}" class="btn btn-primary btn-add"><em class="icon ni ni-plus"></em><span>Thêm</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner p-0">
                        <table class="nk-tb-list nk-tb-ulist">
                            <thead>
                            <tr class="nk-tb-item nk-tb-head">
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mã</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Phần trăm</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Giá yêu cầu</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày bắt đầu</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày kết thúc</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Nội dung</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Action</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($khuyenmai as $km)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$km->Ma_KM}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$km->phan_tram}} %</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{number_format($km->gia_yeu_cau,0,',','.')}} VNĐ</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{DateTime::createFromFormat('Y-m-d', $km->ngay_bat_dau)->format('m/d/Y')}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{DateTime::createFromFormat('Y-m-d', $km->ngay_ket_thuc)->format('m/d/Y')}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{$km->thong_tin}} </span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <a href="admin/khuyenmai/sua/{{$km->id}}"><img src="admin_asset/edit.png" width="30px"/></a>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="navi">
                            {!! $khuyenmai->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

