@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_b')
@endsection
@section('content')
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Nhà Phân Phối
                            <a href="{{route('getThemNPP')}}"><i class="pe-7s-plus"></i></a>
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
                            <th  style="text-align: center;">Mã nhà phân phối</th>
                            <th  style="text-align: center;">Tên nhà phân phối</th>
                            <th style="text-align: center;">Địa chỉ</th>
                            <th style="text-align: center;">Số điện thoại</th>
                            <th style="text-align: center;">Email</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($nha_phan_phoi as $npp)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$npp->Ma_NPP}}</td>
                                    <td>{{$npp->ten_NPP}}</td>
                                    <td>{{$npp->diachi_NPP}}</td>
                                    <td>{{$npp->sodth_NPP}}</td>
                                    <td>{{$npp->email_NPP}}</td>
                                    <td><a href="admin/nhaphanphoi/xoa/{{$npp->id}}"><img src="admin_asset/delete.png" width="45px"/></a></td>
                                    <td><a href="admin/nhaphanphoi/sua/{{$npp->id}}"><img src="admin_asset/edit.png" width="45px"/></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <span style="padding-left: 1080px">{!! $nha_phan_phoi->links() !!} Showing {!! $nha_phan_phoi->firstItem() !!} - {!! $nha_phan_phoi->lastItem() !!}</span>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
