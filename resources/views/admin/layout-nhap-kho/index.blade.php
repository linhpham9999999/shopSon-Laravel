<!DOCTYPE html>
<html lang="zxx" class="js" >
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="admin_asset_new/images/title-Ad.JPG">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Page Title  -->
    <title>HLYNK Lipsticks</title>
    <base href="{{asset('')}}">
@yield('cssKH')
<!-- StyleSheets  -->
    <link rel="stylesheet" href="admin_asset_new/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="admin_asset_new/assets/css/theme.css?ver=2.9.0">
    {{--    thêm--}}
    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
    @include('admin.layout-nhap-kho.menu')
    <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
        @include('admin.layout-nhap-kho.header')
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
        @include('admin.layout-nhap-kho.footer')
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
<script type="text/javascript">
    $(document).ready(function () {
        //Thêm Loại sản phẩm
        $('#form-add-lsp').submit(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    idLSP: $('#idLSP-add').val(),
                    tenLSP: $('#tenLSP-add').val(),
                    trangthai: $('#trangthai-add').val(),
                },
                success: function (response) {
                    toastr.success(response.message)
                    $('#modal-add').modal('hide');
                    console.log(response.data)
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
        //Xóa loại sản phẩm
        $('.js-delete-lsp').on('click', function(e){
            if(!confirm("Bạn có chắc xóa không?")) {
                return false;
            }
            e.preventDefault();
            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
                {
                    url: "admin/loaisp-nhap-kho/xoa/" + id,
                    method: 'POST',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){
                        $("#success").html(response.message)
                        Swal.fire('Remind!',
                            'Xóa thành công Loại sản phẩm!',
                            'success').then(function() {
                            location.reload();
                        })
                    }
                });
            return false;
        })
    });
</script>

<script>
    //Sửa loại sản phẩm
    $(document).ready(function (){
        $('.js-edit-btn').on('click', function() {
            var id = $(this).data('id');
            $.get('admin/loaisp/sua/' + id, function(lsp){
                $("#id").val(lsp.id);
                $("#idLSP-edit").val(lsp.Ma_LSP);
                $("#tenLSP-edit").val(lsp.ten_LSP);
                $('#modal-edit-lsp').modal('show');
            })
        })
        $('.js-btn-update-lsp').on('click',function (e) {
            e.preventDefault();
            $.ajax({
                url: "admin/loaisp-kho-hang/post-sua",
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    _token: $("meta[name='csrf-token']").attr("content"),
                    id: $('#id').val(),
                    idLSP: $('#idLSP-edit').val(),
                    tenLSP: $('#tenLSP-edit').val(),
                }),
                success: function (response) {
                    toastr.success(response.message)
                    $('#modal-edit-lsp').modal('hide');
                    console.log(response)
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        //Xóa Sản phẩm
        $('.js-delete-sanpham').on('click', function(e){
            if(!confirm("Bạn có chắc xóa không?")) {
                return false;
            }
            e.preventDefault();
            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
                {
                    url: "admin/sanpham-kho-hang/xoa/" + id,
                    method: 'POST',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){
                        $("#success").html(response.message)
                        Swal.fire('Remind!',
                            'Xóa thành công Sản phẩm!',
                            'success').then(function() {
                            location.reload();
                        })
                    }
                });
            return false;
        })

        // Xóa Màu sản phẩm
        $('.js-delete-mausanpham').on('click', function(e){
            if(!confirm("Bạn có chắc xóa không?")) {
                return false;
            }
            e.preventDefault();
            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax(
                {
                    url: "admin/mausp-kho-hang/xoa/" + id,
                    method: 'POST',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){
                        $("#success").html(response.message)
                        Swal.fire('Remind!',
                            'Xóa thành công Màu sản phẩm!',
                            'success').then(function() {
                            location.reload();
                        })
                    }
                });
            return false;
        })
    });
</script>
<script type="text/javascript">
    $('#search-order').on('keyup',function (){
        $value = $(this).val();
        if($value){
            $('.all-data-order').hide();
            $('.search-data-order').show();
        }
        else{
            $('.all-data-order').show();
            $('.search-data-order').hide();
        }
        $.ajax({
            type:'get',
            url:'{{route('search-order')}}',
            data:{'order_code_input':$value},
            success:function(data){
                console.log(data);
                $('#Content').html(data);
            }
        });
    })
</script>
</body>
</html>
