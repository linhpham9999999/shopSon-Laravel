<!DOCTYPE html>
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
    <title>HLYNK Lipsticks</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="admin_asset_new/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="admin_asset_new/assets/css/theme.css?ver=2.9.0">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

</head>
<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<script src="admin_asset_new/assets/js/bundle.js?ver=2.9.0"></script>
<script src="admin_asset_new/assets/js/scripts.js?ver=2.9.0"></script>
<script src="admin_asset_new/assets/js/charts/gd-default.js?ver=2.9.0"></script>

</body>
</html>
