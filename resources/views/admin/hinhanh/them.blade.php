@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hình sản phẩm
                        <small>thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('actionThem5')}}"  method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Giá gốc sản phẩm</label>
                            <select class="form-control" name="idSP">
                                @foreach($sanpham as $sp)
                                    <option value="{{$sp->Ma_SP}}">{{$sp->ten_SP}}: {{$sp->giagoc}} đ</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Màu sản phẩm</label>
                            <select class="form-control" name="idMSP">
                                @foreach($mausp as $msp)
                                    <option value="{{$msp->Ma_MSP}}">{{$msp->Ma_MSP}}: {{$msp->ten_MSP}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Đơn giá sản phẩm</label>
                            <select class="form-control" name="idDGSP">
                                @foreach($dongiasp as $dgsp)
                                    <option value="{{$dgsp->Ma_DGSP}}">{{$dgsp->thoigianbansanpham}}: {{$dgsp->dongia}} đ</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mã hình ảnh</label>
                            <input class="form-control" name="idHA" placeholder="Mã hình ảnh phải có độ dài từ 3 đến 8 ký tự" />
                            <label>Hình ảnh sản phẩm</label>
                            <input type="file" name="hinhanh"/>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
