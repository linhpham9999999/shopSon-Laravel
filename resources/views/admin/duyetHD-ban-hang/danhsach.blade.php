@extends('admin.layout-ban-hang.index')
@section('content')
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Quản lý đơn hàng</h3>
                <div class="nk-block-des text-soft search">
                    <input type="search" id="search-order" name="order_code_input" class="form-control border-transparent form-focus-none w3-input w3-border-0" placeholder="Bạn cần tìm...">
                </div>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <form action="{{route('tk-hd-tgian-ban-hang')}}" method="POST" role="form">
                            {{csrf_field()}}
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <label class="form-label-outlined" for="outlined-date-picker" style="margin-top: 42px;margin-left: 700px;">
                                        <input name="startdate" style="width: 105px;float: left;" class="from_date form-control form-control-outlined date-picker w3-input w3-border-0" placeholder="Từ ngày" id="outlined-date-picker">
                                        <em class="icon ni ni-calendar-alt" style=" margin-top: 10px;  padding-left: 2px; float: right;"></em>
                                    </label>
                                    <label class="form-label-outlined" for="outlined-date-picker2"  style="margin-top: 42px;margin-left: 850px;">
                                        <input name="enddate" style="width: 105px;float: left;" class="to_date form-control form-control-outlined date-picker w3-input w3-border-0" placeholder="Đến ngày" id="outlined-date-picker2">
                                        <em class="icon ni ni-calendar-alt" style=" margin-top: 10px;  padding-left: 2px; float: right;"></em>
                                    </label>
                                </li>
                                <li class="nk-block-tools-opt" style="margin-top: 46px;">
                                    <input type="submit" class="btn btn-info btn-fill pull-right" value="Lọc">
                                </li>
                                <li class="nk-block-tools-opt" style="margin-top: 46px;">
                                    <a href="{{route('quanlyHD-ban-hang')}}" class="btn btn-dark pull-right">Refesh</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div>
    <div class="nk-content-body">
        @if( !empty($isOrder) )
            <div class="nk-block" style="position: relative">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="card card-bordered card-stretch">
                    <div class="card-inner-group">
                        <div class="card-inner p-0">
                            <table class="nk-tb-list nk-tb-ulist">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col tb-col-md" style="text-align: center"><span class="sub-text">Mã hóa đơn</span></th>
                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Khách hàng</span></th>
                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Số điện thoại</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Ngày đặt</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Tổng tiền</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Trạng thái</span></th>
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Xem chi tiết</span></th>

                                </tr><!-- .nk-tb-item -->
                                </thead>
                                <tbody class="all-data-order">
                                @foreach($hoadon as $hd)
                                    <tr class="nk-tb-item" > {{--id="npp_{{$lsp->id}}"--}}
                                        {{--                                    <form action="{{route('duyetHD1')}}" method="POST">--}}
                                        {{--{{csrf_field()}}--}}
                                        <td class="nk-tb-col tb-col-md" style="text-align: center">
                                            <span>#{{$hd->Ma_HD}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$hd->hoten}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$hd->sodth_giao_hang}}</span>
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
                                            <a href="{{route('chi_tiet_hd-ban-hang',['id'=>$hd->id])}}" class="btn btn-dim btn-sm btn-primary">Chi tiết</a></td>
                                        {{--                                            <input type="hidden" name="idHD" value="{{$hd->id}}">--}}

                                        {{--                                            @if($hd->id_TT == 3)--}}
                                        {{--                                                <td><button type="submit">Duyệt</button></td>--}}
                                        {{--                                            @elseif($hd->id_TT == 2)--}}
                                        {{--                                                <td><button type="button">Đã duyệt</button></td>--}}
                                        {{--                                            @endif--}}
                                        {{--                                    </form>--}}
                                    </tr><!-- .nk-tb-item -->
                                @endforeach
                                </tbody>
                                <tbody id="Content" class="search-data-order">
                                </tbody>
                            </table><!-- .nk-tb-list -->
                            {{csrf_field()}}
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
