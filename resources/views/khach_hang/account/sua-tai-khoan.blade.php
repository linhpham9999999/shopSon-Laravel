@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
    <style>
        .error{
            color: red;
            font-style: italic;
            font-family: Florence, cursive;
        }
    </style>
@endsection()

@section('content')

    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Tài khoản</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                            <li>Tài khoản</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Contact Us Area Start Here -->
    <div class="contact-us-area mt-no-text" style="padding-top: 0px">
        <div class="container custom-area" style="margin-top: 0px">
            @if(session('alert'))
                <div class="alert alert-success">
                    {{session('alert')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-custom">
                    <form method="post" action="{{route('change-account',['id'=>$users->id])}}" accept-charset="UTF-8" class="contact-form">
                        {{csrf_field()}}
                        <div class="comment-box mt-5">
                            <h5 class="text-uppercase">Thông tin tài khoản</h5>
                            <div class="row mt-3">
                                    <div class="col-6 col-custom">
                                        <div class="input-item mb-4">
                                            <label>Họ tên</label>
                                            <input value="{{$users->hoten}}" class="border-0 rounded-0 w-100 input-area name gray-bg" type="text" name="name"  placeholder="Name">
                                            <div class="error"> {{$errors->first('name')}}</div>
                                        </div>
                                        <div class="input-item mb-4">
                                            <input type="radio" name="gtinh"  value="1"/>
                                            <label> Nam&nbsp;&nbsp;&nbsp;</label>

                                            <input type="radio" name="gtinh" checked value="0"/>
                                            <label> Nữ&nbsp;&nbsp;&nbsp;</label>

                                            <input type="radio" name="gtinh"  value="2"/>
                                            <label> Khác&nbsp;&nbsp;&nbsp;</label>
                                        </div>
                                        <div class="input-item mb-4">
                                            <label>Ngày sinh</label>
                                            <input  value="{{$users->ngaysinh}}" class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="ngaysinh"  placeholder="Nam-Thang-Ngay">
                                            <div class="error">{{$errors->first('ngaysinh')}}</div>
                                        </div>
                                        <div class="input-item mb-4">
                                            <label>Số điện thoại</label>
                                            <input  value="{{$users->sodth}}" class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="sodth"  placeholder="Phone">
                                            <div class="error">{{$errors->first('sodth')}}</div>
                                        </div>
                                        <div class="input-item mb-4">
                                            <label>Email</label>
                                            <p class="border-0 rounded-0 w-100 input-area email gray-bg" type="email"  >{{$users->email}}</p>

                                        </div>
                                        <div class="input-item mb-4">
                                            <label>Địa chỉ giao hàng</label>
                                            <input value="{{$users->diachi}}" class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="diachi"  placeholder="Address">
                                            <div class="error">{{$errors->first('diachi')}}</div>
                                        </div>
                                        {{--<div class="input-item mb-4">
                                            <label>Mật khẩu hiện tại</label>
                                            <input type="password" name="passhientai" class="border-0 rounded-0 w-100 input-area email gray-bg" placeholder="Current Password" />
                                            <div class="error">{{$errors->first('passhientai')}}</div>
                                        </div>
                                        <div class="input-item mb-4">
                                            <label>Mật khẩu mới</label>
                                            <input type="password" name="passmoi" class="border-0 rounded-0 w-100 input-area email gray-bg" placeholder="New Password" />
                                            <div class="error">{{$errors->first('passmoi')}}</div>
                                        </div>
                                        <div class="input-item mb-4">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password" name="passmoi2" class="border-0 rounded-0 w-100 input-area email gray-bg" placeholder="Confirm Password" />
                                            <div class="error">{{$errors->first('passmoi2')}}</div>
                                        </div>--}}
                                    </div>

                                <div class="col-12 col-custom mt-40">
                                    <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
