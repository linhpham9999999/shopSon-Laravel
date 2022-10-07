@extends('admin.layout.index')
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
                        <form action="{{route('search-order')}}" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="order_code_input" class="form-control border-transparent form-focus-none" placeholder="Bạn cần tìm...">
                            <button class="search-submit btn btn-icon" type="submit"><em class="icon ni ni-search" style="padding-bottom: 27px;"></em>
                            </button>
                        </form>
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
                                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Xem chi tiết</span></th>

                                </tr><!-- .nk-tb-item -->
                                </thead>
                                <tbody>
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
                                            <span>{{DateTime::createFromFormat('Y-m-d', $hd->ngaydat)->format('m/d/Y')}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ number_format($hd->tongtien)}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{$hd->trangthai}}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <a href="{{route('chi_tiet_hd',['id'=>$hd->id])}}" class="btn btn-dim btn-sm btn-primary">Chi tiết</a></td>
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
