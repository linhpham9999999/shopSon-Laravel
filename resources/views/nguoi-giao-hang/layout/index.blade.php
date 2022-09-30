<!DOCTYPE html>
<html lang="zxx" class="js" >
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="admin_asset_new/images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title  -->
    <title>Trang giao hàng</title>
    <base href="{{asset('')}}">
    @yield('cssKH')
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="admin_asset_new/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="admin_asset_new/assets/css/theme.css?ver=2.9.0">
{{--    thêm--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <style>
        .error{
            color: red;
            font-style: italic;
            font-family: Florence, cursive;
        }
        .navi {
            margin-top: 10px;
        }
        .navi nav{
            height: 50px;
        }
        .navi svg {
            width: 25px;
        }
        .text-sm {
            margin-bottom: 10px;
        }

    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        @include('nguoi-giao-hang.layout.menu')
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('nguoi-giao-hang.layout.header')
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            @include('nguoi-giao-hang.layout.footer')
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<script src="admin_asset_new/assets/js/bundle.js?ver=2.9.0"></script>
<script src="admin_asset_new/assets/js/scripts.js?ver=2.9.0"></script>
<script src="admin_asset_new/assets/js/charts/gd-default.js?ver=2.9.0"></script>
{{--xóa--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{--thêm--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

{{--lay cai nay ko con logout duoc--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>

<script src="js/app.js"></script>
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $( document ).ready(function() {
        $("#outlined-date-picker").datepicker({
            format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'
        });
        $("#outlined-date-picker2").datepicker({
            format: 'yyyy-mm-dd' //can also use format: 'dd-mm-yyyy'
        });
    });
</script>

</body>
</html>
