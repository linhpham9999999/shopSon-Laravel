@extends('khach_hang.layout.index')

@section('title')
    <title>Đăng nhập</title>
@endsection()

@section('content')
<!-- Header Area End Here -->
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Đăng nhập - Đăng ký</h3>
                    <ul>
                        <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Login Area Start Here -->
<div class="login-register-area mt-no-text">
    @if(session('alert'))
        <div class="alert alert-success">
            {{session('alert')}}
        </div>
    @endif
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h2 class="title-4 mb-2">Đăng nhập</h2>
                        <p class="desc-content">Vui lòng đăng nhập tài khoản bên dưới.</p>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{route('xu-ly-dang-nhap-KH')}}" method="post">
                        {{csrf_field()}}
                        <div class="single-input-item mb-3">
                            <input name="email" type="email" placeholder="Enter your Email">
                            <div class="error"> {{$errors->first('email')}}</div>
                        </div>
                        <div class="single-input-item mb-3">
                            <input type="password" name="password" placeholder="Enter your Password">
                            <div class="error"> {{$errors->first('password')}}</div>
                        </div>
                        <div class="single-input-item mb-3">
                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                <div class="remember-meta mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                                        <label class="custom-control-label" for="rememberMe">Nhớ tôi</label>
                                    </div>
                                </div>
                                <!--<a href="#" class="forget-pwd mb-3">Quên mật khẩu?</a>-->
                            </div>
                        </div>
                        <span class="single-input-item mb-3">
                            <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Đăng nhập</button>
                        </span>
                        <span class="single-input-item mb-3" style="margin-left: 130px">
                            <a href="{{route('create_account')}}" class="btn flosun-button secondary-btn theme-color rounded-0">Tạo tài khoản mới</a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
