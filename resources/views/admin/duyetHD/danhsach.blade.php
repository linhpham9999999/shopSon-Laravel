@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý hóa đơn
                        <small>danh sách</small>
                    </h1>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
            <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover"> {{--id="dataTables-example"--}}
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
                            <td>{{$hd->Ma_HD}}</td>
                            <td>{{$hd->hoten}}</td>
                            <td>{{$hd->ngaydat}}</td>
                            <td>{{$hd->tongtien}}</td>
                            <td class="js_status_{{$hd->id}}">{{$hd->trangthai}}</td>
                            <td><a href="{{route('chi_tiet_hd',['id'=>$hd->id])}}" style="text-decoration: none">Xem chi tiết</a></td>
                            @if($hd->id_TT == 3)
                                <td><button type="button" class="js_button_confirm" data-status="2" data-id="{{$hd->id}}">Duyệt</button></td>
                            @else
                                <td><button type="button">Đã duyệt</button></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
