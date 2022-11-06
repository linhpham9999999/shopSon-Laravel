@extends('admin.layout.index')

@section('cssKH')
    <style>
        .home-hover:hover{
            background-color:slategray;
        }
    </style>
@endsection

@section('content')
    <div class="nk-content-body" style="text-align: center">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content" >
                    <h3 class="nk-block-title page-title" >Chuyên cung cấp sản phẩm son môi chính hãng</h3>
                    <div class="nk-block-des text-soft">
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4 home-hover" style="background-color: steelblue;">
                <div class="card-body" >SẢN PHẨM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsSP')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">MÀU SẢN PHẨM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsMSP')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body" >KHO HÀNG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsKhoHang')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">NHÂN VIÊN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsNV')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body" >ĐƠN HÀNG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('quanlyHD')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">BÌNH LUẬN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('quan-ly-cmt')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body" >KHUYẾN MÃI</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsKhuyenMai')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">TÀI KHOẢN CÁ NHÂN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('info')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body" >DOANH THU</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('get-sales')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">CHATBOT</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="https://ahachat.com/bots/58583239/chat/all" target="_blank">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">TIN TỨC</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('quan-ly-tin-tuc')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--<div style="padding-top: 20px; padding-left: 110px; ">
    --}}{{--        <h1 style="font-size: 25px; font-family: Monospace; text-align: center; color:#FF1493 ; text-shadow: #FF1493 -1px -2px 0.5em">CHÀO MỪNG BẠN ĐẾN VỚI HỆ THỐNG QUẢN LÝ SHOP SON HLYNK LIPSTICKS</h1>--}}{{--
    <img  src="{{asset('admin_asset_new/images/3-1.jpg')}}" alt="trang-chu-Son" width="1000px" height="500px">
</div>--}}
