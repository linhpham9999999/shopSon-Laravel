
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
                                            <span>{{$hd->ngaydat}}</span>
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
                        {{--                        Showing {!! $nha_phan_phoi->firstItem() !!} - {!! $nha_phan_phoi->lastItem() !!}--}}
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
        @else
        <h3 style="text-align: center">Không có đơn hàng nào đang chờ duyệt</h3>
        @endif
    </div>

@endsection
{{--@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Quản lý hóa đơn
                            </h4>
                        </div>

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <!-- /.col-lg-12 -->
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped" >
                            <thead>
                            <tr align="center">
                                <th>Mã hóa đơn</th>
                                <th>Khách hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Xem chi tiết</th>
                                <th>Duyệt hóa đơn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hoadon as $hd)
                                <tr class="odd gradeX" align="center">
                                    <form action="{{route('duyetHD1')}}" method="POST">
                                        {{csrf_field()}}
                                        <td>{{$hd->Ma_HD}}</td>
                                        <td>{{$hd->hoten}}</td>
                                        <td>{{$hd->ngaydat}}</td>
                                        <td>{{$hd->tongtien}}</td>
                                        <td class="js_status_{{$hd->id}}">{{$hd->trangthai}}</td>
                                        <td><a href="{{route('chi_tiet_hd',['id'=>$hd->id])}}" style="text-decoration: none">Xem chi tiết</a></td>
                                        <input type="hidden" name="idHD" value="{{$hd->id}}">

                                        @if($hd->id_TT == 3)
                                            <td><button type="submit">Duyệt</button></td>
                                        @elseif($hd->id_TT == 2)
                                            <td><button type="button">Đã duyệt</button></td>
                                        @endif

                                    </form>
                                    --}}{{--@if($hd->id_TT == 3)
                                        <td><button type="button" class="js_button_confirm" data-status="2" data-id="{{$hd->id}}">Duyệt</button></td>
                                    @else
                                        <td><button type="button">Đã duyệt</button></td>
                                    @endif--}}{{--
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <span style="padding-left: 1080px">{!! $hoadon->links() !!} Showing {!! $hoadon->firstItem() !!} - {!! $hoadon->lastItem() !!}</span>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection--}}
