@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_d')
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Sản phẩm
                                <a href="{{route('getThemSP')}}"><i class="pe-7s-plus"></i></a>
                            </h4>
                        </div>

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped" >
                            <thead>
                            <tr align="center" style="text-align: center;">
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Hình ảnh</th>
                                <th>Xuất xứ</th>
                                <th>Trọng lượng (g)</th>
                                <th>Giá gốc</th>
                                <th>Giảm giá</th>
                                <th>Số lượng tồn</th>
                                <th>Hạn sử dụng</th>
                                {{--<th>Giới thiệu</th>--}}
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sanpham as $sp)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$sp->Ma_SP}}</td>
                                    <td>{{$sp->ten_SP}}</td>
                                    <td><img src="admin_asset/image_son/{{$sp->hinhanhgoc}}" width="100px" height="100px"/></td>
                                    <td>{{$sp->xuatxu}}</td>
                                    <td>{{$sp->trongluong}}</td>
                                    <td>{{$sp->giagoc}} VNĐ</td>
                                    <td>{{$sp->giamgia}} VNĐ</td>
                                    <td>{{$sp->soluongton}}</td>
                                    <td>{{$sp->hansudung_thang}} tháng</td>
                                    {{--<td>{{$sp->gioithieu}}</td>--}}
                                    <td>
                                        @if($sp->noibat == 1)
                                            {{ 'Có' }}
                                        @else
                                            {{'Không'}}
                                       @endif
                                    </td>
                                    <td><a href="admin/sanpham/xoa/{{$sp->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                                    <td><a href="admin/sanpham/sua/{{$sp->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div style="padding-left: 1080px">
                    {!! $sanpham->links() !!} Showing {!! $sanpham->firstItem() !!} - {!! $sanpham->lastItem() !!}</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
