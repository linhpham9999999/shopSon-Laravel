<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HLYNK Lipsticks</title>
    <base href="{{asset('')}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="admin_asset_new/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="admin_asset_new/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="admin_asset_new/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="admin_asset_new/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="admin_asset_new/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style>
        .error{
            color: red;
            font-style: italic;
            font-family: Florence, cursive;
        }
    </style>
</head>
<body>

<div class="wrapper">

    @yield('menu')

    <div class="main-panel">

        @include('admin.layout.header')

        <div class="content">
            @yield('content')
        </div>


        @include('admin.layout.footer')

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="admin_asset_new/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="admin_asset_new/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="admin_asset_new/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="admin_asset_new/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="admin_asset_new/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="admin_asset_new/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="admin_asset_new/js/demo.js"></script>

{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}

{{--        demo.initChartist();--}}

{{--        $.notify({--}}
{{--            icon: 'pe-7s-monitor',--}}
{{--            message: "Chào mừng bạn đến với hệ thống quản lý son môi <b>HLYNK Lipsticks</b>"--}}

{{--        },{--}}
{{--            type: 'info',--}}
{{--            timer: 4000--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}

</html>
