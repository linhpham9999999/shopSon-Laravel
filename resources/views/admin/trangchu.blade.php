@extends('admin.layout.index')
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
                <div class="card-body" >LOẠI SẢN PHẨM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsLSP')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
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

    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">NHÂN VIÊN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('dsNV')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body" >ĐƠN HÀNG  <span class="hd-chua-duyet" style="color: firebrick;font-size: 20px;"></span></div>
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
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">TÀI KHOẢN CÁ NHÂN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('info')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
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
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">KHÁCH HÀNG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('danhsachKH')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: steelblue;">
                <div class="card-body">SHIPPER</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{route('danhsachShipper')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
