@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_g')
@endsection
@section('content')
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
                                    {{--@if($hd->id_TT == 3)
                                        <td><button type="button" class="js_button_confirm" data-status="2" data-id="{{$hd->id}}">Duyệt</button></td>
                                    @else
                                        <td><button type="button">Đã duyệt</button></td>
                                    @endif--}}
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
@endsection
