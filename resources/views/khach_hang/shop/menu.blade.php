{{--<div class="widget-list widget-mb-1"  style="font-size: 20px; color: black">
    <h3 class="widget-title">Danh mục</h3>
    <div ><hr style="background-color: #B1BDB2; height: 2px"></div>
    <div class="sidebar-body" style=" padding: 3px 0px 3px 0px;">
        <a href="{{route('allSanPham')}}" style=" text-decoration: none; color: black" >Tất cả sản phẩm</a></li>
    </div>
    <div class="navbar-default sidebar" role="navigation" style=" margin-top: 0px">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    @foreach($loaisp as $lsp)
                    <a href="#" id="title" style=" color: black" data-product-type-id="{{$lsp->id}}">{{$lsp->ten_LSP}}<span class="fa arrow" style="padding-left: 80px"></span></a>
                        @foreach($allSP as $sp)
                            @if($lsp->id == $sp->id_LSP)
                                <ul class="nav" id="side-menu">
                                    <li>
                                        <a href="#" style="margin-left: 35px; color: black">{{$sp->ten_SP}}</a>
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>--}}

{{--
<div class="widget-list widget-mb-1">
    <h3 class="widget-title">Danh mục</h3>
    <div class="sidebar-body">
        <ul class="sidebar-list">
            <li><a href="{{route('allSanPham')}}">Tất cả sản phẩm</a></li>
            @foreach($loaisp as $lsp)
                <a href="#" > {{$lsp->ten_LSP}}</a>
                @foreach($allSP as $sp)
                    @if($lsp->id == $sp->id_LSP)
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="#" style="margin-left: 35px; color: black">{{$sp->ten_SP}}</a>
                            </li>
                        </ul>
                    @endif
                @endforeach
            @endforeach
        </ul>
    </div>
</div>
--}}
<div class="widget-list widget-mb-1"  style="font-size: 20px; color: black;margin-bottom: 0px">
    <h3 class="widget-title" style="margin-bottom: 0px">Danh mục</h3>
    <div ><hr style="background-color: #B1BDB2; height: 2px; margin-top: 15px;margin-bottom: 0px" ></div>
    <div class="sidebar-body" style=" padding: 3px 0px 3px 0px;">
        <a href="{{route('allSanPham')}}" style=" text-decoration: none; color: black;margin-top: 10px" >Tất cả sản phẩm</a></li>
    </div>
</div>
<div id="menu" style="margin-top: 20px" >
    <ul>
        @foreach($loaisp as $lsp)
        <li>
            <a href="khach_hang/shop/loai-san-pham/{{$lsp->id}}" style="background-color: #B3BDBD; padding: 5px 0px 5px 0px">{{$lsp->ten_LSP}}</a>
                @foreach($sanpham as $sp)
                    <ul>
                        @if($lsp->id == $sp->id_LSP)
                            <li><a href="khach_hang/shop/details/{{$sp->id}}" style="text-align: center; background-color:#DAE3E3 ;">{{$sp->ten_SP}}</a></li>
                        @endif
                    </ul>
                @endforeach
        </li>
        @endforeach
    </ul>
</div>
