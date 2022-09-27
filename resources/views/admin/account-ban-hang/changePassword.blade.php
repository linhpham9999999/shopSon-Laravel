@extends('admin.layout-ban-hang.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="padding: 15px 15px">
                    @if(session('alert'))
                        <div class="alert alert-success">
                            {{session('alert')}}
                        </div>
                    @endif
                    <div class="header">
                        <h4 class="title">Thay đổi mật khẩu</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="{{route('post-change-password-admin-ban-hang')}}" accept-charset="UTF-8" class="contact-form">
                            {{csrf_field()}}
                            <div class="row" style="margin: 10px;margin-left: 250px;">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mật khẩu hiện tại</label>
                                        <input type="password" name="current_password" class="form-control">
                                        <div class="error">{{$errors->first('current_password')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;margin-left: 250px;">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Mật khẩu mới</label>
                                        <input type="password" name="new_password" class="form-control">
                                        <div class="error">{{$errors->first('new_password')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin: 10px;margin-left: 250px;">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label style="margin-bottom: unset;">Nhập lại mật khẩu</label>
                                        <input type="password" name="new_confirm_password" class="form-control">
                                        <div class="error">{{$errors->first('new_confirm_password')}}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="margin-left: 420px;"class="btn btn-info btn-fill pull-right">Lưu thay đổi</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
