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
                    <h3 class="title-3">Liên hệ</h3>
                    <ul>
                        <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Contact Us Area Start Here -->
<div class="contact-us-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-custom">
                <div class="contact-info-item">
                    <div class="con-info-icon">
                        <i class="lnr lnr-map-marker"></i>
                    </div>
                    <div class="con-info-txt">
                        <h4>Địa chỉ shop</h4>
                        <p>172/10A, Lê Bình, Hưng Lợi, Ninh Kiều, Cần Thơ</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-custom">
                <div class="contact-info-item">
                    <div class="con-info-icon">
                        <i class="lnr lnr-smartphone"></i>
                    </div>
                    <div class="con-info-txt">
                        <h4>Đường dây nóng</h4>
                        <p>Mobile: 079 424 6163<br>Fax: 077 899 2772</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-custom text-align-center">
                <div class="contact-info-item">
                    <div class="con-info-icon">
                        <i class="lnr lnr-envelope"></i>
                    </div>
                    <div class="con-info-txt">
                        <h4>Đóng góp ý kiến</h4>
                        <p>hlynklipsticks@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        @if(session('alert'))
            <div class="alert alert-success">
                {{session('alert')}}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-custom">
                <form method="post" action="{{route('handle-contact')}}" accept-charset="UTF-8" class="contact-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="comment-box mt-5">
                        <h5 class="text-uppercase">Liên hệ</h5>
                        <div class="row mt-3">
                            @if(!$email or !$name)
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area name gray-bg" type="text" name="name"  placeholder="Name">
                                        <div class="error"> {{$errors->first('name')}}</div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="email" name="email"  placeholder="Email">
                                        <div class="error"> {{$errors->first('email')}}</div>
                                    </div>
                                </div>

                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="con_content"  placeholder="Subject">
                                        <div class="error"> {{$errors->first('con_content')}}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <textarea cols="30" rows="5" class="border-0 rounded-0 w-100 custom-textarea input-area gray-bg" name="message"  placeholder="Message"></textarea>
                                        <div class="error"> {{$errors->first('message')}}</div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area name gray-bg" type="hidden" value="{{$name}}" name="name"  placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="hidden" value="{{$email}}" name="email"  placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <input class="border-0 rounded-0 w-100 input-area email gray-bg" type="text" name="con_content" placeholder="Subject">
                                        <div class="error"> {{$errors->first('con_content')}}</div>
                                    </div>
                                </div>
                                <div class="col-12 col-custom">
                                    <div class="input-item mb-4">
                                        <textarea cols="30" rows="5" class="border-0 rounded-0 w-100 custom-textarea input-area gray-bg" name="message"  placeholder="Message"></textarea>
                                        <div class="error"> {{$errors->first('message')}}</div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$idUser}}" name="idUser"/>
                            @endif
                                <div class="col-12 col-custom mt-40">
                                    <button type="submit" class="btn flosun-button secondary-btn theme-color rounded-0">Gửi tin nhắn</button>
                                </div>
                                {{--<p class="col-8 col-custom form-message mb-0"></p>--}}
                                {{--@if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            {{$error}}<br>
                                        @endforeach
                                    </div>
                                @endif--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
