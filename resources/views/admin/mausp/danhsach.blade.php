@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Màu sản phẩm
                        <small>danh sách </small>
                    </h1>
                    <span>{!! $data->links() !!} Showing {!! $data->firstItem() !!} - {!! $data->lastItem() !!}</span>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
            <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" >{{--id="dataTables-example"--}}
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- /#page-wrapper -->
@endsection
