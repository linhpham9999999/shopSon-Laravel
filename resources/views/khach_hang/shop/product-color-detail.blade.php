@extends('khach_hang.layout.index')

@section('title')
    <title>Chi tiết màu sản phẩm</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="khach_hang_asset/assets/css/linh.css">
@endsection()

@section('content')
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shop Sidebar</h3>
                        <ul>
                            <li><a href="{{route('trangchuKH')}}">Home</a></li>
                            <li>Chi tiết sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($mausp as $msp)
        <div class="single-product-main-area">
            <div class="container container-default custom-area">
                <div class="row">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                        <div class="product-details-img">
                            <div class="single-product-img swiper-container gallery-top popup-gallery">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide img-magnifier-container">
                                        <a class="w-100" href="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}">
                                            <img id="myimage" class="w-100" src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" alt="Product">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="single-product-thumb swiper-container gallery-thumbs">
                                <div class="swiper-wrapper img-magnifier-container">
                                    <div class="swiper-slide">
                                        <img  id="myimage" src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" alt="Product">
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next swiper-button-white"><i class="lnr lnr-arrow-right"></i></div>
                                <div class="swiper-button-prev swiper-button-white"><i class="lnr lnr-arrow-left"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-custom">
                        <div class="product-summery position-relative product-data-add-cart">
                            <div class="product-head mb-3">
                                <h2 class="product-title">#{{$msp->Ma_MSP}} {{$msp->mau}}</h2>
                            </div>
                            <div class="price-box mb-2">
                                <span class="regular-price">{{ number_format( $msp->gia_ban_ra ,0,',','.')  }} VNĐ</span>
                            </div>
                            <div class="product-rating mb-3">
                                <ul class="list-inline" title="Average Rating">
                                    @for($count=1; $count<=5; $count++)
                                        @php
                                            if($count <= $rating){
                                                $color = 'color:#ffcc00;';
                                            }else{
                                                $color = 'color:#ccc;';
                                            }
                                        @endphp
                                        <li title="đánh giá sao"
                                            style=" {{$color}} font-size: 30px; display: inline-block"
                                        > &#9733
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <p class="desc-content mb-2">Nơi sản xuất: {{$msp->xuatxu}}</p>
                            <p class="desc-content mb-2">Khối lượng tinh: {{$msp->trongluong}}gram</p>
                            <p class="desc-content mb-2">Số lượng tồn: {{$msp->soluongton}}</p>
                            <p class="desc-content mb-5">{{$msp->gioithieu}}</p>

                            <div class="quantity-with_btn mb-5">
                                <div class="quantity">
                                    {{--                                <div class="cart-plus-minus">--}}
                                    <input class="cart-plus-minus-box number_product" value="1" type="number" style=" width: 100px;height: 45px;text-align: center;" name="number">
                                    {{--                                </div>--}}

                                    {{--                                <input type="hidden" name="productId" value="{{$msp->id_SP}}">--}}
                                    <input type="hidden" class="cart_product_id_color" value="{{$msp->id}}">
                                </div>
                                <div class="add-to_cart">
                                    @if((Auth::guard('nguoi_dung')->check() || !empty(session('user_login'))))
                                        <button class="btn product-cart button-icon flosun-button dark-btn add-product-cart" value="">Thêm vào giỏ</button>
                                    @else
                                        <button class="btn product-cart button-icon flosun-button dark-btn request-login" value="">Thêm vào giỏ</button>
                                    @endif
                                    <a class="btn flosun-button secondary-btn secondary-border rounded-0" href="{{route('allSanPham')}}">Tiếp tục mua hàng</a>
                                </div>
                            </div>
                            <div class="error">{{$errors->first('number')}}</div>

                        </div>
                    </div>
                </div>
                <div class="row mt-no-text">
                    <div class="col-lg-12 col-custom">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Đánh giá</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Bảo quản sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="review-tab" data-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Hướng dẫn sử dụng</a>
                            </li>
                        </ul>
                        <div class="tab-content mb-text" id="myTabContent">
                            <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="desc-content">
                                    <p class="mb-3">{{$msp->thongTinMau}}</p>
                                    <p class="mb-3"><strong>Thành phẩn sản phẩm làm từ:</strong> {{$msp->thanh_phan}}</p>
                                    <p class="mb-3">Thành phần có thể thay đổi theo quyết định của nhà sản xuất nên để biết danh sách các thành phần hoàn chỉnh có trong sản phẩm thì bạn vui lòng tham khảo chi tiết trên bao bì sản phẩm giúp HLYNK nhé!</p>
                                </div>

                            </div>
                            <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                                <!-- Start Single Content -->
                                <div class="product_tab_content  border p-3">
                                    <div class="review_address_inner">
                                        <!-- Start Single Review -->
                                        <div class="pro_review mb-5">
                                            <div class="review_thumb">
                                                <img alt="review images" style="width: 200px; height: 200px" src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-2">
                                                    <i><h5>Admin - <span>{{DateTime::createFromFormat('Y-m-d',$msp->created_at)->format('m/d/Y')}}</span></h5></i>
                                                </div>
                                                <p>{{$msp->thongTinMau}}</p>
                                                @foreach($comment as $cmt)
                                                    <div class="review_info mb-2">
                                                        <i><h5>{{$cmt->emailnguoidung}} - <span>{{DateTime::createFromFormat('Y-m-d',$cmt->create_at)->format('m/d/Y')}}</span></h5></i>
                                                    </div>
                                                    <p>{{$cmt->noi_dung}}</p>
                                                @endforeach
                                            </div>

                                        </div>
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-custom">
                                                @if(session('alert'))
                                                    <div class="alert alert-success" style="width: 300px">
                                                        {{session('alert')}}
                                                    </div>
                                                @endif
                                                <form action="{{route('add-comment')}}" method="POST" class="comment-form-area">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="idMSP" value="{{$msp->id}}">
                                                    <div class="comment-form-comment mb-3">
                                                        <label>Nội dung</label>
                                                        <textarea class="comment-notes" required="required" name="comment"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit">
                                                        <button type="submit" class="btn flosun-button secondary-btn rounded-0">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>

                            <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="shipping-policy">
                                    <h4 class="title-3 mb-4">Lưu ý bảo quản</h4>
                                    <ul class="policy-list mb-2">
                                        <li>Bảo quản son ở nơi khô ráo thoáng mát</li>
                                        <li>Tránh ánh nắng trực tiếp</li>
                                        <li>Để xa tầm tay trẻ em, đậy nắp sau khi sử dụng</li>
                                        <li>Nên sử dụng tẩy tế bào chết cho môi thường xuyên, để đôi môi luôn mềm mượt căng mịn và dễ lên màu hơn</li>
                                        <li>Trong quá trình sử dụng sản phẩm trang điểm môi nếu thấy da có các biểu hiện khác thường như: xuất hiện các vết đỏ,  ngứa, hay bị kích ứng thì phải ngưng sử dụng ngay và hỏi ý kiến tư vấn từ chuyên gia da liễu</li>
                                        <li>Đóng kỹ nắp son để bảo quản chất son bên trong sau khi sử dụng</li>
                                        <li>Nên tẩy trang kĩ sau khi thoa son</li>
                                    </ul> </div>
                            </div>
                            <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                                <div class="size-tab table-responsive-lg">
                                    <h4 class="title-3 mb-4">Hướng dẫn sử dụng</h4>
                                    <ul class="policy-list mb-2">
                                        <li>Bước 1: Nên tẩy da chết và dưỡng môi mỗi ngày</li>
                                        <li>Bước 2: Nên dùng sản phẩm giúp giấu trọn khuyết điểm trên môi, vẽ viền môi sắc nét. Ai không thíc thoa full thì hãy dùng kem nền và che khuyết điểm để xóa viền môi</li>
                                        <li>Bước 3: Thoa trực tiếp son lên. Thoa 1 lớp mỏng lên môi, bặm nhẹ để màu lan ra. Có thể dùng bút/tay tán đều màu môi theo sở thích</li>
                                        <li>Bước 4: Nên tẩy trang kĩ sau khi thoa son</li>
                                    </ul> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="product-area mt-text-3">
            <div class="container custom-area-2 overflow-hidden">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12 col-custom">
                        <div class="section-title text-center mb-30">
                            <h3 class="section-title-3" style="padding-top: 10px;">SẢN PHẨM TƯƠNG TỰ</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row product-row">
                    <div class="col-12 col-custom">
                        <div class="product-slider swiper-container anime-element-multi">
                            <div class="swiper-wrapper">
                                @foreach($san_pham_tuong_tu as $sptt)
                                    <div class="single-item swiper-slide">
                                        <!--Single Product Start-->
                                        <div class="single-product position-relative mb-30">
                                            <div class="img-magnifier-container">
                                                <a class="d-block" href="product-details.html">
                                                    <img id="myimage" src="admin_asset/image_son/mau_san_pham/{{$sptt->hinhanh}}" alt="" class="product-image-1 w-100">
                                                </a>
                                                @if($sptt->soluongton < 1)
                                                    <span class="onsale">Hết!</span>
                                                @endif
                                                <div class="add-action d-flex flex-column position-absolute">
                                                    <a href="wishlist.html" title="Add To Wishlist">
                                                        <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                                    </a>
                                                    {{--                                            <a href="#exampleModalCenter" title="Quick View" data-toggle="modal" data-target="#exampleModalCenter">--}}
                                                    {{--                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>--}}
                                                    {{--                                            </a>--}}
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-title">
                                                    <h4 class="title-2"> <a href="">{{$sptt->Ma_MSP}} {{$sptt->mau}}</a></h4>
                                                </div>
                                                <div class="price-box">
                                                    <span class="regular-price ">{{$sptt->gia_ban_ra}}</span>
                                                </div>
                                                <a href="{{route('product-color-detail',['id' => $msp->id])}}" class="btn product-cart">XEM CHI TIẾT</a>
                                            </div>
                                        </div>
                                        <!--Single Product End-->
                                    </div>
                                @endforeach
                            </div>
                            <!-- Slider pagination -->
                            <div class="swiper-pagination default-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

<!-- Breadcrumb Area Start Here -->
{{--<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shop Sidebar</h3>
                    <ul>
                        <li><a href="{{route('trangchuKH')}}">Home</a></li>
                        <li>Chi tiết sản phẩm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="shop-main-area">
    <div class="container container-default custom-area">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom widget-mt">
                <div class="card card-bordered">
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    @foreach($mausp as $msp)
                        <div class="card-inner">
                            <div class="row pb-5">
                                <div class="col-lg-6">
                                    <div class="product-gallery mr-xl-1 mr-xxl-5">
                                        <div class="slider-init">
                                            <div class="slider-item rounded product-image">
                                                <img src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" style=" padding-left: 10px" class="w-100" alt="" >
                                            </div>
                                        </div>
                                    </div><!-- .product-gallery -->
                                </div><!-- .col -->
                                <div class="col-lg-6">
                                    <div class="product-info mt-5 mr-xxl-5">
                                        <h4 class="product-price text-primary">{{ number_format( $msp->gia_ban_ra ,0,',','.')  }} VNĐ</h4>
                                        --}}{{--                                        <small class="text-muted fs-14px old-price"> đã giảm {{$msp->giamgia}}</small>--}}{{--
                                        <h2 class="product-title">{{$msp->ten_SP}} {{$msp->mau}}</h2>
                                        <div class="product-rating">

                                        </div><!-- .product-rating -->
                                        <div class="lead" style="size: 15px">
                                            <p >{{$msp->thongTinMau}}</p>
                                        </div>
                                        <div class="product-meta">
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Hạn sử dụng</div>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Xuất xứ</div>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Trọng lượng</div>
                                                    <div class="fs-14px text-muted" style="font-weight: bold">Số lượng tồn</div>
                                                </li>
                                                <li>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->hansudung_thang}} tháng</div>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->xuatxu}}</div>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->trongluong}}gram</div>
                                                    <div class="fs-16px fw-bold text-secondary" style="padding-left: 20px"> {{$msp->soluongton}} thỏi</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-meta">
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-16px text-muted" style="font-weight: bold; padding-top: 9px">Số lượng mua</div>
                                                </li>
                                                <li>
                                                    <div class="fs-18px fw-bold text-secondary" style="padding-left: 10px">
                                                        <form action="{{route('add-cart')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="text" name="number" style=" width: 100px" class="form-control number-spinner">
                                                            <div class="error"> {{$errors->first('number')}}</div>
                                                            @if(session('testquantity'))
                                                                <div class="error">{{session('testquantity')}}</div>
                                                            @endif
                                                            <input type="hidden" name="productId" value="{{$msp->id_SP}}">
                                                            <input type="hidden" name="productIdColor" class="cart_product_id_{{$msp->id}}" value="{{$msp->id}}">
                                                            --}}{{--<button type="button" style="border: 2px solid green; margin-top: 30px; background-color: green; color: whitesmoke" class="btn product-cart add-to-cart" name="add-to-cart" data-id_product="{{$msp->id}}">Thêm giỏ hàng</button>--}}{{--
                                                            <input type="submit" value="Thêm giỏ hàng" style="border: 2px solid green; margin-top: 30px; background-color: green; color: whitesmoke">
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-meta">

                                        </div><!-- .product-meta -->
                                    </div><!-- .product-info -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                <aside class="sidebar_widget widget-mt">
                    <div class="widget_inner">
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Tìm kiếm sản phẩm</h3>
                            <form action="{{route('search-product')}}" method="POST">
                                {{csrf_field()}}
                                <div class="search-box">
                                    <div class="input-group" >
                                        <span>
                                            <input type="search" name="keywords_submit" style="height: 50px; width: 200px" class="form-control" placeholder="Bạn cần tìm..." aria-label="Search Our Store">
                                        </span>
                                        <span>
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <i class="fa fa-search" style="height: 35px; padding-top: 10px "></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        --}}{{--                        <div class="widget-list widget-mb-1">--}}{{--
                        --}}{{--                            <h3 class="widget-title">Giá</h3>--}}{{--
                        --}}{{--                            <!-- Widget Menu Start -->--}}{{--
                        --}}{{--                            <form action="#">--}}{{--
                        --}}{{--                                <div id="slider-range"></div>--}}{{--
                        --}}{{--                                <button type="submit">Bộ lọc</button>--}}{{--
                        --}}{{--                                <input type="text" name="text" id="amount" />--}}{{--
                        --}}{{--                            </form>--}}{{--
                        --}}{{--                            <!-- Widget Menu End -->--}}{{--
                        --}}{{--                        </div>--}}{{--
                        <div class="widget-list widget-mb-1">
                            <h3 class="widget-title">Danh mục loại sản phẩm</h3>
                            <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    <li><a href="{{route('allSanPham')}}">Tất cả</a></li>
                                    @foreach($loaisp as $lsp)
                                        <li><a href="khach_hang/shop/product-type/{{$lsp->id}}">{{$lsp->ten_LSP}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="widget-list mb-0">
                            <h3 class="widget-title">Sản phẩm mới nhất</h3>
                            <div class="sidebar-body">
                                @foreach($sanphamnew as $spn)
                                    <div class="sidebar-product align-items-center">
                                        <a href="product-details.html" class="image">
                                            <img src="admin_asset/image_son/{{$spn->hinhanhgoc}}" alt="product">
                                        </a>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"> <a href="{{route('list-color-product',['id' => $spn->id])}}">{{$spn->ten_SP}}</a></h4>
                                            </div>
                                            <div class="price-box">
                                                <span class="regular-price ">{{ number_format( $spn->gia_ban_ra ,0,',','.')  }} đ</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Sidebar Widget End -->
            </div>
        </div>

    </div>
</div>--}}
<!-- Shop Main Area End Here -->

