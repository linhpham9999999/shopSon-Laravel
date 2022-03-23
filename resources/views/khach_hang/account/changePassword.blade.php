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
                        <h3 class="title-3">Thay đổi mật khẩu</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                            <li>Thay đổi mật khẩu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Contact Us Area Start Here -->
    <div class="contact-us-area mt-no-text" style="padding-top: 0px; margin-top:0px">
        <div class="container custom-area" style="margin-top: 0px">
            @if(session('alert'))
                <div class="alert alert-success">
                    {{session('alert')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-custom">
                    <form method="post" action="{{route('change-password')}}" accept-charset="UTF-8" class="contact-form">
                        {{csrf_field()}}
                        {{--@foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach--}}
                        <div class="comment-box mt-5">
                            <h5 class="text-uppercase">Thay đổi mật khẩu</h5>
                            <div class="row mt-3" style="margin-left: 280px;">
                                <div class="col-8 col-custom">
                                    <div class="input-item mb-4">
                                        <input type="password" name="current_password" class="border-0 rounded-0 w-100 input-area email gray-bg" placeholder="Mật khẩu hiện tại" />
                                        <div class="error">{{$errors->first('current_password')}}</div>
                                    </div>
                                    <div class="input-item mb-4">
                                        <input type="password" name="new_password" class="border-0 rounded-0 w-100 input-area email gray-bg" placeholder="Mật khẩu mới" />
                                        <div class="error">{{$errors->first('new_password')}}</div>
                                    </div>
                                    <div class="input-item mb-4">
                                        <input type="password" name="new_confirm_password" class="border-0 rounded-0 w-100 input-area email gray-bg" placeholder="Nhập lại mật khẩu mới" />
                                        <div class="error">{{$errors->first('new_confirm_password')}}</div>
                                    </div>
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
