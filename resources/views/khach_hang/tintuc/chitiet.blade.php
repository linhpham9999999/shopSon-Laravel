@extends('khach_hang.shop.menu')

@section('all-product')
    <div class="col-lg-9 col-12 col-custom widget-mt">
        <!--shop toolbar start-->
        <div class="blog-post-details">
            <figure class="blog-post-thumb mb-5">
                <img src="admin_asset/tintuc/{{$data->hinh_anh}}" alt="Blog Image">
            </figure>
            <section class="blog-post-wrapper product-summery">
                <div class="section-content section-title">
                    <h2 class="section-title-2 mb-3">{{$data->tieu_de}}</h2>
                    <p class="mb-4">{{$data->mo_ta_ngan}}</p>
                    <p class="mb-5" style="text-align: justify">{{$data->noi_dung}}</p>
                </div>
                <div class="share-article">
                           <span class="left-side">
                                <a href="khach_hang/xem-tin-tuc/{{$tintuc->firstItem()}}"> <i class="fa fa-long-arrow-left"></i> Trước</a>
                           </span>
                    <span class="right-side">
                            <a href="khach_hang/xem-tin-tuc/{{$tintuc->lastItem()}}">Sau <i class="fa fa-long-arrow-right"></i></a>
                    </span>
                </div>
            </section>
        </div>
    </div>
@endsection
