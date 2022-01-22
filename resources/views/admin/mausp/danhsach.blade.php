@extends('admin.layout.index')
@section('menu')
    @include('admin.layout.menu_e')
@endsection
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Màu sản phẩm
                                <a href="{{route('getThemMSP')}}"><i class="pe-7s-plus"></i></a>
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
                                    <th>Mã màu sản phẩm</th>
                                    <th>Màu sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Ý nghĩa</th>
                                    <th>Delete</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $msp)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$msp->Ma_MSP}}</td>
                                        <td>{{$msp->mau}}</td>
                                        <td><img src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" width="100px"/></td>
                                        <td>{{$msp->thongTinMau}}</td>
                                        <td><a href="admin/mausp/xoa/{{$msp->id}}"><img src="admin_asset/delete.png" width="45px"/></a>
                                        </td>
                                        <td><a href="admin/mausp/sua/{{$msp->id}}"><img src="admin_asset/edit.png"
                                                                                        width="45px"/></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                    <div style="padding-left: 1080px">{!! $data->links() !!} Showing {!! $data->firstItem() !!} - {!! $data->lastItem() !!}</div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
