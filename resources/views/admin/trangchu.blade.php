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
            <div class="card text-white mb-4 home-hover" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black" >LOẠI SẢN PHẨM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('dsLSP')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4 home-hover" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">SẢN PHẨM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('dsSP')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">MÀU SẢN PHẨM</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('dsMSP')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">KHO HÀNG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('dsKhoHang')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">NHÂN VIÊN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('dsNV')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body"style="color: black" >ĐƠN HÀNG  <span class="hd-chua-duyet" style="color: firebrick;font-size: 20px;"></span></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('quanlyHD')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">BÌNH LUẬN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('quan-ly-cmt')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black" >KHUYẾN MÃI</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('dsKhuyenMai')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">TÀI KHOẢN CÁ NHÂN</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('info')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">DOANH THU</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('get-sales')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">CHATBOT</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="https://ahachat.com/bots/58583239/chat/all" target="_blank">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">TIN TỨC</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('quan-ly-tin-tuc')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">KHÁCH HÀNG</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('danhsachKH')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card text-white mb-4" style="background-color: antiquewhite;">
                <div class="card-body" style="color: black">SHIPPER</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" style="color: black" href="{{route('danhsachShipper')}}">Quản lý</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
@endsection
