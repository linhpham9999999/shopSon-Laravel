@extends('admin.layout-ban-hang.index')
@section('content')
    <div class="nk-content-body" style="text-align: center">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content" >
                    <h3 class="nk-block-title page-title" >QUẢN LÝ BÁN HÀNG</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">ĐƠN HÀNG  <span class="hd-chua-duyet" style="color: firebrick;font-size: 20px;"></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('quanlyHD-ban-hang')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">CHATBOT</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="https://ahachat.com/bots/58583239/chat/all" target="_blank">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">TÀI KHOẢN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('info-ban-hang')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">KHÁCH HÀNG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('danhsachKH-ban-hang')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">SHIPPER</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('danhsachShipper-ban-hang')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
