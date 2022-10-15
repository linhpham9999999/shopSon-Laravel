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
                        <h3 class="title-3">Lịch sử mua hàng</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Trang chủ</a></li>
                            <li>Lịch sử mua hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-account-wrapper mt-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-custom">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Dashboard</a>
                                <a href="#orders" onclick="choXacNhan()" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Chờ xác nhận</a>
                                <a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Đang giao hàng</a>
                                <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Đã mua</a>
                                <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> Đơn đã hủy</a>
                                <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Thông tin tài khoản</a>
                                <a href="{{route('logoutKH')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->

                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8 col-custom">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Xin chào, <strong>
                                                    @if(\Illuminate\Support\Facades\Auth::guard('nguoi_dung')->check())
                                                        {{ \Illuminate\Support\Facades\Auth::guard('nguoi_dung')->user()->hoten }}
                                                    @else
                                                        {{ session('user_login') }}
                                                    @endif
                                                </strong></p>
                                        </div>
                                        <p class="mb-0">Đây là trang thông tin cá nhân và lịch sử mua hàng của bạn. Bạn có thể quản lý đơn hàng của mình tại đây</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        @if( !empty($cho_xac_nhan) )
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Mã hóa đơn</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th colspan="2">Action</th>
                                                </tr>
                                                </thead>
                                                @foreach($cho_xac_nhan as $cxn)
                                                <tbody>
                                                <tr>
                                                    <td>{{$cxn->Ma_HD }}</td>
                                                    <td>{{DateTime::createFromFormat('Y-m-d', $cxn->ngaydat)->format('m/d/Y')}}</td>
                                                    <td>{{ $cxn->trangthai}}</td>
                                                    <td>{{ $cxn->tongtien}}</td>
                                                    <td><a href="{{route('bill-detail',['id'=>$cxn->id])}}" class="btn flosun-button secondary-btn theme-color  rounded-0">Xem</a></td>
                                                    <td>
                                                        @if ($cxn->idTT == 3)
                                                            <a href="{{route('delete-order',['id'=>$cxn->id])}}" class="btn flosun-button secondary-btn theme-color  rounded-0">
                                                                Hủy
                                                            </a>
                                                        @else
                                                            <span></span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                        @else
                                            <h3>Hiện không có đơn hàng nào</h3>
                                        @endif
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="download" role="tabpanel">
                                    <div class="myaccount-content">
                                        @if( !empty($dang_giao_hang))
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Mã hóa đơn</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                @foreach($dang_giao_hang as $dgh)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$dgh->Ma_HD }}</td>
                                                        <td>{{DateTime::createFromFormat('Y-m-d', $dgh->ngaydat)->format('m/d/Y')}}</td>
                                                        <td>{{ $dgh->trangthai}}</td>
                                                        <td>{{ $dgh->tongtien}}</td>
                                                        <td><a href="{{route('bill-detail',['id'=>$dgh->id])}}" class="btn flosun-button secondary-btn theme-color  rounded-0">Xem</a></td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                        @else
                                            <h3>Hiện không có đơn hàng nào</h3>
                                        @endif
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                    <div class="myaccount-content">
                                        @if( !empty($da_mua))
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Mã hóa đơn</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                @foreach($da_mua as $dm)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$dm->Ma_HD }}</td>
                                                        <td>{{DateTime::createFromFormat('Y-m-d', $dm->ngaydat)->format('m/d/Y')}}</td>
                                                        <td>{{ $dm->trangthai}}</td>
                                                        <td>{{ $dm->tongtien}}</td>
                                                        <td><a href="{{route('bill-detail',['id'=>$dm->id])}}" class="btn flosun-button secondary-btn theme-color  rounded-0">Xem</a></td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                        @else
                                            <h3>Hiện không có đơn hàng nào</h3>
                                        @endif
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->

                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        @if( !empty($da_huy))
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Mã hóa đơn</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                @foreach($da_huy as $dh)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$dh->Ma_HD }}</td>
                                                        <td>{{DateTime::createFromFormat('Y-m-d', $dh->ngaydat)->format('m/d/Y')}}</td>
                                                        <td>{{ $dh->trangthai}}</td>
                                                        <td>{{ $dh->tongtien}}</td>
                                                        <td><a href="{{route('bill-detail',['id'=>$dh->id])}}" class="btn flosun-button secondary-btn theme-color  rounded-0">Xem</a></td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                        @else
                                            <h3>Hiện không có đơn hàng nào</h3>
                                        @endif
                                    </div>
                                </div>
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Thông tin tài khoản</h3>
                                        <div class="account-details-form">
                                            @if(session('alert'))
                                                <div class="alert alert-success" style="margin-bottom: 25px;">
                                                    {{session('alert')}}
                                                </div>
                                            @endif
                                            <form method="post" action="{{route('change-account',['id'=>$users->id])}}" accept-charset="UTF-8" >
                                                {{csrf_field()}}
                                                <div class="single-input-item mb-3">
                                                    <label class="required mb-1">Họ tên</label>
                                                    <input type="text" name="name" value="{{$users->hoten}}" placeholder="Họ tên" />
                                                    <div class="error"> {{$errors->first('name')}}</div>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label  class="required mb-1">Ngày sinh</label>
                                                    <input value="{{$users->ngaysinh}}" type="date" name="ngaysinh" placeholder="Ngày sinh" />
                                                    <div class="error"> {{$errors->first('ngaysinh')}}</div>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label class="required mb-1">Số điện thoại</label>
                                                    <input type="text" name="sodth" placeholder="Số điện thoại" value="{{$users->sodth}}" />
                                                    <div class="error"> {{$errors->first('sodth')}}</div>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label class="required mb-1">Email</label>
                                                    <input type="text" disabled placeholder="Email" value="{{$users->email}}" />
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <label class="required mb-1">Địa chỉ</label>
                                                    <input type="text" name="diachi" placeholder="Địa chỉ" value="{{$users->diachi}}" />
                                                    <div class="error">{{$errors->first('diachi')}}</div>
                                                </div>
                                                <div class="single-input-item single-item-button">
                                                    <button type="submit" class="btn flosun-button secondary-btn theme-color  rounded-0">Lưu</button>
                                                </div>
                                            </form>
                                                {{--                                                <fieldset>--}}
{{--                                                    <legend>Password change</legend>--}}
{{--                                                    <div class="single-input-item mb-3">--}}
{{--                                                        <label for="current-pwd" class="required mb-1">Current Password</label>--}}
{{--                                                        <input type="password" id="current-pwd" placeholder="Current Password" />--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-lg-6 col-custom">--}}
{{--                                                            <div class="single-input-item mb-3">--}}
{{--                                                                <label for="new-pwd" class="required mb-1">New Password</label>--}}
{{--                                                                <input type="password" id="new-pwd" placeholder="New Password" />--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-lg-6 col-custom">--}}
{{--                                                            <div class="single-input-item mb-3">--}}
{{--                                                                <label for="confirm-pwd" class="required mb-1">Confirm Password</label>--}}
{{--                                                                <input type="password" id="confirm-pwd" placeholder="Confirm Password" />--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </fieldset>--}}
                                        <form method="post" action="{{route('add-address')}}" accept-charset="UTF-8" class="contact-form">
                                            {{csrf_field()}}
                                            <fieldset>
                                                <legend>Thêm đia chỉ giao hàng</legend>
                                                @if(session('alert2'))
                                                    <div class="alert alert-success" style=" margin-bottom: 25px;">
                                                        {{session('alert2')}}
                                                    </div>
                                                @endif
                                                <div class="single-input-item mb-3">
                                                    <input type="text" name="diachinew"  placeholder="Nhập địa chỉ">
                                                    <div class="error">{{$errors->first('diachinew')}}</div>
                                                </div>
                                                <div class="single-input-item single-item-button">
                                                    <button type="submit" class="btn flosun-button secondary-btn theme-color  rounded-0">Lưu</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                        </div>
                                        @if(session('alert3'))
                                            <div class="alert alert-success" style=" margin-bottom: 25px;">
                                                {{session('alert3')}}
                                            </div>
                                        @endif
                                        <div class="myaccount-table table-responsive text-center" style=" margin-top: 20px;">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>Địa chỉ</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                @foreach($diachi as $dc)
                                                    <tbody>
                                                    <tr>
                                                        <td>{{$dc->dia_chi_giao_hang}}</td>
                                                        <td><a href="{{route('delete-address',['id'=>$dc->id])}}" class="btn flosun-button secondary-btn theme-color  rounded-0">Xóa</a></td>
                                                    </tr>
                                                    </tbody>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
        </div>
    </div>
</div>
@endsection
