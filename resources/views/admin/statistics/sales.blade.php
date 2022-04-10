@extends('admin.layout.index')
@section('content')
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Tổng doanh thu bán hàng</h3>
                    <div class="nk-block-des text-soft">
                        {{--                        <p>You have total 95 projects.</p>--}}
                    </div>
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
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Mã hóa đơn</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày giao </span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Người mua</span></th>
                                <th class="nk-tb-col tb-col-lg"><span class="sub-text">Số điện thoại</span></th>
                                <th class="nk-tb-col tb-col-md"><span class="sub-text">Tổng tiền</span></th>
                            </tr><!-- .nk-tb-item -->
                            </thead>
                            <tbody>
                            @foreach($sanphamdaban as $sp)
                                <tr class="nk-tb-item">
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->id}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$sp->Ma_HD}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->ngaygiao}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-md">
                                        <span>{{$sp->email_nguoimua}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-lg">
                                        <span>{{$sp->sodth_giao_hang}}</span>
                                    </td>
                                    <td class="nk-tb-col tb-col-mb">
                                        <span>{{ number_format($sp->tongtien)}}</span>
                                    </td>
                                </tr><!-- .nk-tb-item -->
                            @endforeach
                            </tbody>
                        </table><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <span><p style="font-weight: bold; padding-left: 800px;">Tổng tiền: <span style="padding-left: 10px; font-size: 20px">{{ $sum }} VNĐ</span></p></span>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
@endsection
