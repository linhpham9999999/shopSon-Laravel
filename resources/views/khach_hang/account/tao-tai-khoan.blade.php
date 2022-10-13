@extends('khach_hang.layout.index')

@section('title')
    <title>Đăng ký</title>
    <style>
        .error {
            color: red;
            font-style: italic;
            font-family: Florence, cursive;
        }
    </style>
@endsection()

@section('content')
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative"> {{--Ảnh nền--}}
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

    <div class="login-register-area mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                    <div class="login-register-wrapper">
                        <div class="section-content text-center mb-5">
                            <h2 class="title-4 mb-2">Tạo tài khoản </h2>
                            <p class="desc-content">Vui lòng điền đầy đủ thông tin bên dưới.</p>
                        </div>
                        <form action="{{route('xu-ly-dang-ky')}}" method="post">
                            {{csrf_field()}}
                            <div class="single-input-item mb-3">
                                <input type="text" name="ten" placeholder="Họ tên">
                                <div class="error"> {{$errors->first('ten')}}</div>
                            </div>
                            <div style="background-color: white; margin-bottom: 30px; height: 40px; padding-top: 10px">
                                &nbsp;&nbsp;
                                <input type="radio" name="gtinh" checked value="1"/>
                                <label> Nam&nbsp;&nbsp;&nbsp;</label>

                                <input type="radio" name="gtinh" checked value="0"/>
                                <label> Nữ&nbsp;&nbsp;&nbsp;</label>

                                <input type="radio" name="gtinh" checked value="2"/>
                                <label> Khác&nbsp;&nbsp;&nbsp;</label>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="date" name="nsinh" placeholder="Ngày sinh Năm-Tháng-Ngày">
                                <div class="error"> {{$errors->first('nsinh')}}</div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="email" name="email" placeholder="Email">
                                <div class="error"> {{$errors->first('email')}}</div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="password" name="pass" placeholder="Enter your Password">
                                <div class="error"> {{$errors->first('pass')}}</div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="password" name="password_confirmation" placeholder="Retype your Password">
                                <div class="error"> {{$errors->first('password_confirmation')}}</div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="text" name="sodth" placeholder="Số điện thoại">
                                <div class="error"> {{$errors->first('sodth')}}</div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="text" name="diachi" placeholder="Địa chỉ">
                                <div class="error"> {{$errors->first('diachi')}}</div>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="hidden" name="chuc_vu_id" value="4">
                            </div>
                            <div class="single-input-item mb-3">
                                <button type="submit" style="margin-left: 180px"
                                        class="btn flosun-button secondary-btn theme-color rounded-0">Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

