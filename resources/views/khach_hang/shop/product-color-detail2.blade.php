@extends('khach_hang.layout.index')

@section('title')
    <title>Đánh giá sản phẩm</title>
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
                            <div class="swiper-wrapper">
                                <div class="swiper-slide img-magnifier-container">
                                    <img id="myimage" src="admin_asset/image_son/mau_san_pham/{{$msp->hinhanh}}" alt="Product">
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
                                <div class="rating_wrap">
                                    <h5 class="rating-title-1 font-weight-bold mb-2">Đánh sao sản phẩm</h5>
                                    <ul class="list-inline" title="Average Rating">
                                        {{csrf_field()}}
                                        @for($count=1; $count<=5; $count++)
                                            @php
                                                if($count <= $rating){
                                                    $color = 'color:#ffcc00;';
                                                }else{
                                                    $color = 'color:#ccc;';
                                                }
                                            @endphp
                                        <li title="đánh giá sao"
                                        id="{{$msp->id}}-{{$count}}"
                                        data-index="{{$count}}"
                                        data-product_id="{{$msp->id}}"
                                        data-rating="{{$rating}}"
                                        class="rating"
                                        style="cursor: pointer; {{$color}} font-size: 30px; display: inline-block"
                                        > &#9733
                                        </li>
                                        @endfor
                                    </ul>
                                </div>
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

                                        <img id="myimage" src="admin_asset/image_son/mau_san_pham/{{$sptt->hinhanh}}" alt="" class="product-image-1 w-100">

                                        @if($sptt->soluongton < 1)
                                            <span class="onsale">Hết!</span>
                                        @endif
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <input type="hidden" class="product_id_wish" value="{{$sptt->id}}">
                                            @if((Auth::guard('nguoi_dung')->check() || !empty(session('user_login'))))
                                                <a title="Add To Wishlist">
                                                    <button type="button" class="add-wish-list-to-btn-sptt" name="add-wish-list">
                                                        <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <a title="Add To Wishlist" class="request-login">
                                                    <button type="button">
                                                        <i class="lnr lnr-heart" class="request-login" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{route('product-color-detail',['id' => $sptt->id])}}">{{$sptt->Ma_MSP}} {{$sptt->mau}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">{{$sptt->gia_ban_ra}}</span>
                                        </div>
                                        <a href="{{route('product-color-detail',['id' => $sptt->id])}}" class="btn product-cart">XEM CHI TIẾT</a>
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

