@extends('nguoi-giao-hang.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Quản lý đơn hàng</h3>
                    <div class="nk-block-des text-soft">
                        {{--                        <p>You have total 95 projects.</p>--}}
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        @if( !empty($isOrder) )
            <div class="nk-block">
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner p-0">
                            <table class="nk-tb-list nk-tb-ulist">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col tb-col-md" style="text-align: center"><span class="sub-text">Mã hóa đơn</span></th>
                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Khách hàng</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày đặt</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Tổng tiền</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Trạng thái</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Xem</span></th>

                                </tr><!-- .nk-tb-item -->
                                </thead>
                                <tbody>
                                @foreach($hoadon as $hd)
                                    <tr class="nk-tb-item" >
                                        <td class="nk-tb-col tb-col-md" style="text-align: center">
                                            <span>#{{$hd->Ma_HD}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$hd->hoten}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{DateTime::createFromFormat('Y-m-d', $hd->ngaydat)->format('m/d/Y')}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ number_format($hd->tongtien)}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$hd->trangthai}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <a href="{{route('chi-tiet-don-can-giao',['id'=>$hd->id])}}" class="btn btn-dim btn-sm btn-primary">Chi tiết</a></td>
                                   </tr><!-- .nk-tb-item -->
                                @endforeach
                                </tbody>
                            </table><!-- .nk-tb-list -->
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="navi">
                                {!! $hoadon->links() !!}
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner-group -->
                </div><!-- .card -->
            </div><!-- .nk-block -->
        @else
            <h3 style="text-align: center">Hiện không có đơn hàng nào</h3>
        @endif
    </div>

@endsection
