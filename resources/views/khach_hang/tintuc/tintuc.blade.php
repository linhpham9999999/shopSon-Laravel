
@extends('khach_hang.shop.menu')

@section('all-product')
    <div class="col-lg-9 col-12 col-custom widget-mt">
        <!--shop toolbar start-->
        <div class="shop_toolbar_wrapper mb-30">
            <div class="shop_toolbar_btn">
                <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa fa-th"></i></button>
                <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
            </div>
        </div>
        <div class="row">
            @foreach($data as $dt)
            <div class="col-12 col-md-6 col-custom mb-30">
                <div class="blog-lst">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a class="d-block" target="_blank" href="{{route('chi-tiet-tin-tuc',['id'=>$dt->id])}}">
                                <img class="w-100 product-image" src="admin_asset/tintuc/{{$dt->hinh_anh}}" alt="Blog Image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-text">
                                <h4><a target="_blank" href="{{route('chi-tiet-tin-tuc',['id'=>$dt->id])}}">{{$dt->tieu_de}}</a></h4>
                                <div class="blog-post-info">
                                    <span>Admin</span>
                                    <span>- {{DateTime::createFromFormat('Y-m-d', $dt->created_at)->format('m/d/Y')}}</span>
                                </div>
                                <p class="abc">{{$dt->mo_ta_ngan}}</p>
                                <a target="_blank" href="{{route('chi-tiet-tin-tuc',['id'=>$dt->id])}}" class="readmore">
                                    Đọc thêm <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-12 col-custom">
                <div class="toolbar-bottom">
                    <div class="pagination">
                        <ul>
                            {!! $data->links() !!}
                        </ul>
                    </div>
                    <p class="desc-content text-center text-sm-right mb-0">Showing {!! $data->firstItem() !!} - {!! $data->lastItem() !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
