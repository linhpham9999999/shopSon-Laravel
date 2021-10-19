<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <title>Đăng nhập hệ thống quản lý</title>
    <base href="{{asset('')}}">
    <link rel="shortcut icon" type="image/x-icon" href="khach_hang_asset/assets/images/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="container">
    <div class="row">
        <div class="">
            <h1 style="color:#08298A; font-size: 25px; font-family: Monospace"><marquee>VUI LÒNG ĐĂNG NHẬP HỆ THỐNG QUẢN LÝ SHOP SON HLYNK LIPSTICKS</marquee></h1>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h1 style="color:#FF8000; font-size: 19px; text-align: center"><b>ĐĂNG NHẬP HỆ THỐNG QUẢN LÝ </b></h1>
                </div>

                <div class="panel-body">
                    @if(session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="{{route('xy-ly-dang-nhap')}}" method="POST">
                        {{csrf_field()}}
                        <fieldset>
                            <img class="profile-img" src="{{asset('images/user.png')}}" alt="User" width="325px" height="150px">
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" name="email" type="text" autofocus/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div style="text-align: center; font-family: Monospace;">
        <h4 style="font-size: 30px;"><span>HLYNK Lipsticks</span> Shop </h4>
            <p>Chuyên cung cấp những sản phẩm chất lượng, uy tín<br>
                Địa chỉ: 172/10A, Lê Bình, Hưng Lợi, Ninh Kiều, Cần Thơ<br>
                &#9990;: 0794246163 - &#9990;: 0788984972 - &#9993;: hlynklipsticks@gmail.com
            </p>
    </div>
</div>

<!-- jQuery -->
<script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin_asset/dist/js/sb-admin-2.js"></script>

</body>

</html>
