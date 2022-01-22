@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_f')
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Nhân viên
                                <a href="{{route('getThemNV')}}"><i class="pe-7s-plus"></i></a>
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
                            <tr align="center">
                                <th style="text-align: center;">Họ tên</th>
                                <th style="text-align: center;">Địa chỉ</th>
                                <th style="text-align: center;">Số điện thoại</th>
                                <th style="text-align: center;">Giới tính</th>
                                <th style="text-align: center;">Ngày sinh</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Delete</th>
                                <th style="text-align: center;">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nhanvien as $nv)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$nv->hoten}}</td>
                                    <td>{{$nv->diachi}}</td>
                                    <td>{{$nv->sodth}}</td>
                                    <td>
                                        @if($nv->gioitinh == 0)
                                            {{'Nữ'}}
                                        @else
                                            {{'Nam'}}
                                        @endif
                                    </td>
                                    <td>{{$nv->ngaysinh}}</td>
                                    <td>{{$nv->email}}</td>
                                    <td><a href="admin/nhanvien/xoa/{{$nv->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                                    <td><a href="admin/nhanvien/sua/{{$nv->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <span style="padding-left: 1080px">
                    {!! $nhanvien->links() !!} Showing {!! $nhanvien->firstItem() !!} - {!! $nhanvien->lastItem() !!}</span>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
