<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                HLYNK Lipsticks
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{route('homeAd')}}">
                    <i class="pe-7s-home"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li>
                <a href="{{route('info')}}">
                    <i class="pe-7s-user"></i>
                    <p>Thông tin cá nhân</p>
                </a>
            </li>
            <li>
                <a href="{{route('dsNPP')}}">
                    <i class="pe-7s-box2"></i>
                    <p>Nhà phân phối</p>
                </a>
            </li>
            <li>
                <a href="{{route('dsLSP')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Loại sản phẩm</p>
                </a>
            </li>
            <li class="active">
                <a href="{{route('dsSP')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="{{route('dsMSP')}}">
                    <i class="pe-7s-note2"></i>
                    <p>Màu sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="{{route('dsNV')}}">
                    <i class="pe-7s-users"></i>
                    <p>Nhân viên</p>
                </a>
            </li>
            <li>
                <a href="{{route('quanlyHD')}}">
                    <i class="pe-7s-shopbag"></i>
                    <p>Duyệt hóa đơn</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="pe-7s-mail"></i>
                    <p>Tin nhắn</p>
                </a>
            </li>
        </ul>
    </div>
</div>
