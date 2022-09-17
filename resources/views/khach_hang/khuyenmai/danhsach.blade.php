@extends('khach_hang.layout.index')

@section('title')
    <title>Shop son HLYNK Lipsticks</title>
@endsection()

@section('content')
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Khuyến mãi</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Home</a></li>
                            <li>Khuyến mãi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wishlist-main-wrapper mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Wishlist Table Area -->
                    <div class="wishlist-table table-responsive">
                        @if( !empty($data) )
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Mã khuyến mãi</th>
                                    <th class="pro-title">Tỉ lệ giảm giá</th>
                                    <th class="pro-price">Hạn sử dụng</th>
                                    <th class="pro-cart">Nội dung</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $dt)
                                    <tr>
                                        <td class="pro-price"><img class="img-fluid" src="admin_asset_new/images/favicon.png" alt="Product" /><span>{{$dt->Ma_KM}}</span></td>
                                        <td class="pro-price">{{$dt->phan_tram}}%</td>
                                        <td class="pro-title">{{DateTime::createFromFormat('Y-m-d', $dt->ngay_ket_thuc)->format('m/d/Y')}}</td>
                                        <td class="pro-price">{{$dt->thong_tin}}</td>
                                       </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2>Bạn chưa có mã giảm giá nào</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
