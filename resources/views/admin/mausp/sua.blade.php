@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Màu sản phẩm
                        <small>MÃ {{$mausanppham->Ma_MSP}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/mausp/sua/{{$mausanppham->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã màu sản phẩm</label>
                            <input class="form-control" name="idMSP" value="{{$mausanppham->Ma_MSP}}" placeholder="Mã màu sản phẩm phải có độ dài từ 3 đến 8 ký tự" />
                            <label>Tên màu sản phẩm</label>
                            <input class="form-control" name="mau" value="{{$mausanppham->mau}}" placeholder="Tên màu sản phẩm phải có độ dài từ 5 đến 30 ký tự" />
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
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
