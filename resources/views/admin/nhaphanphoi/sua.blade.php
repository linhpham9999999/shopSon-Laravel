<div class="modal fade" id="modal-edit-npp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin nhà phân phối</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit-npp" method="POST" role="form" class="form-validate is-alter">
                    {{csrf_field()}}
                    <input type="hidden" name="id" id="id" />
                    <div class="form-group">
                        <label class="form-label" for="full-name">Mã nhà phân phối</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="idNPP" id="idNPP-edit" placeholder="Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự" required/>
                            {{--                            <div class="error"> {{$errors->first('idNPP')}}</div>--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Tên nhà phân phối</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="tenNPP" id="tenNPP-edit" placeholder="Tên nhà phân phối phải có độ dài từ 10 đến 100 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Địa chỉ</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="dcNPP" id="dcNPP-edit" placeholder="Địa chỉ phải có độ dài từ 10 đến 255 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone-no">Số điện thoại</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="sodtNPP" id="sodtNPP-edit" placeholder="Số điện thoại phải có độ dài 10 ký tự" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email-address">Email</label>
                        <div class="form-control-wrap">
                            <input class="form-control" name="emailNPP" id="emailNPP-edit" placeholder="Email phải có độ dài từ 10 đến 40 ký tự" required />
                        </div>
                    </div>
                    <div class="form-group" style="padding-left: 100px;">
                        <button type="button" class="btn btn-lg btn-primary js-btn-update-npp">Lưu thông tin</button>
                        <button type="reset" class="btn btn-lg btn-light">Làm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--
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
                    <h1 class="page-header">Nhà phân phối
                        <small>thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 BIẾN errors là khi validate sẽ tạo ra để kiểm tra lỗi-->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('actionThem')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Mã nhà phân phối</label>
                            <input class="form-control" name="idNPP" placeholder="Mã nhà phân phối phải có độ dài từ 3 đến 8 ký tự" />
                            <div class="error"> {{$errors->first('idNPP')}}</div>
                            <label>Tên nhà phân phối</label>
                            <input class="form-control" name="tenNPP" placeholder="Tên nhà phân phối phải có độ dài từ 10 đến 100 ký tự" />
                            <div class="error"> {{$errors->first('tenNPP')}}</div>
                            <label>Địa chỉ </label>
                            <input class="form-control" name="dcNPP" placeholder="Địa chỉ phải có độ dài từ 10 đến 255 ký tự" />
                            <div class="error"> {{$errors->first('dcNPP')}}</div>
                            <label>Số điện thoại </label>
                            <input class="form-control" name="sodtNPP" placeholder="Số điện thoại phải có độ dài 10 ký tự" />
                            <div class="error"> {{$errors->first('sodtNPP')}}</div>
                            <label>Email </label>
                            <input class="form-control" name="emailNPP" placeholder="Email phải có độ dài từ 10 đến 40 ký tự" />
                            <div class="error"> {{$errors->first('emailNPP')}}</div>
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
--}}
