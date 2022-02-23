<!DOCTYPE html>
<html lang="zxx" class="js">

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
        @include('admin.layout.menu')
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('admin.layout.header')
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
            @include('admin.layout.footer')
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- select region modal -->
{{--<div class="modal fade" tabindex="-1" role="dialog" id="region">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>--}}
{{--            <div class="modal-body modal-body-md">--}}
{{--                <h5 class="title mb-4">Select Your Country</h5>--}}
{{--                <div class="nk-country-region">--}}
{{--                    <ul class="country-list text-center gy-2">--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/arg.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Argentina</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/aus.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Australia</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/bangladesh.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Bangladesh</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/canada.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Canada <small>(English)</small></span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/china.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Centrafricaine</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/china.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">China</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/french.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">France</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/germany.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Germany</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/iran.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Iran</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/italy.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Italy</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/mexico.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">México</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/philipine.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Philippines</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/portugal.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Portugal</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/s-africa.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">South Africa</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/spanish.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Spain</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/switzerland.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">Switzerland</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/uk.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">United Kingdom</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#" class="country-item">--}}
{{--                                <img src="./images/flags/english.png" alt="" class="country-flag">--}}
{{--                                <span class="country-name">United State</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- .modal-content -->--}}
{{--    </div><!-- .modla-dialog -->--}}
{{--</div><!-- .modal -->--}}
<!-- JavaScript -->
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
        //Thêm nhà cung cấp
        // $('#form-add-npp').submit(function (e) {
        //     e.preventDefault();
        //     var url = $(this).attr('data-url');
        //     $.ajax({
        //         type: 'post',
        //         url: url,
        //         data: {
        //             idNPP: $('#idNPP-add').val(),
        //             tenNPP: $('#tenNPP-add').val(),
        //             dcNPP: $('#dcNPP-add').val(),
        //             sodtNPP: $('#sodtNPP-add').val(),
        //             emailNPP: $('#emailNPP-add').val(),
        //         },
        //         success: function (response) {
        //             toastr.success(response.message)
        //             $('#modal-add').modal('hide');
        //             console.log(response.data)
        //             location.reload();
        //         },
        //         error: function (jqXHR, textStatus, errorThrown) {
        //             //xử lý lỗi tại đây
        //         }
        //     })
        // })
        //Xóa nhà cung cấp
        $('.js-delete-ncc').on('click', function(e){
            if(!confirm("Bạn có chắc xóa không?")) {
                return false;
            }
            e.preventDefault();
            // var id = $(this).data("id");
            var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            // var url = e.target;

            $.ajax(
                {
                    url: "admin/nhaphanphoi/xoa/" + id, //or you can use url: "company/"+id,
                    method: 'POST',
                    data: {
                        _token: token,
                        id: id
                    },
                    success: function (response){
                        $("#success").html(response.message)
                        Swal.fire('Remind!',
                            'Xóa thành công Nhà phân phối!',
                            'success').then(function() {
                            location.reload();
                        })
                    }
                });
            return false;
        })
    });
    //Thêm sản phẩm
    // $('#form-add-product').submit(function (e) {
    //     e.preventDefault();
    //     var url = $(this).attr('data-url');
    //     $.ajax({
    //         type: 'post',
    //         url: url,
    //         data: {
    //             idLSP: $('#idLSP-add').val(),
    //             idNPP: $('#idNPP-add').val(),
    //             idSP: $('#idSP-add').val(),
    //             tenSP: $('#tenSP-add').val(),
    //             xuatxu: $('#xuatxu-add').val(),
    //             trluong: $('#trluong-add').val(),
    //             giagoc: $('#giagoc-add').val(),
    //             giamgia: $('#giamgia-add').val(),
    //             hsh: $('#hsh-add').val(),
    //             gthieu: $('#gthieu-add').val(),
    //             sosao: $('#sosao-add').val(),
    //             noibat: $('#noibat-add').val(),
    //             hinh_anh: $('#hinh_anh-add').val(),
    //         },
    //         success: function (response) {
    //             toastr.success(response.message)
    //             $('#modal-add-product').modal('hide');
    //             console.log(response.data)
    //             location.reload();
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             console.log(errorThrown)
    //         }
    //     })
    // })
</script>

<script>
    //Sửa nhà cung cấp
    $(document).ready(function (){
        $('.js-edit-btn-npp').on('click', function() {
            var id = $(this).data('id');
            $.get('admin/nhaphanphoi/sua/' + id, function(npp){
                $("#id").val(npp.id);
                $("#idNPP-edit").val(npp.Ma_NPP);
                $("#tenNPP-edit").val(npp.ten_NPP);
                $("#dcNPP-edit").val(npp.diachi_NPP);
                $("#sodtNPP-edit").val(npp.sodth_NPP);
                $("#emailNPP-edit").val(npp.email_NPP);
                $('#modal-edit-npp').modal('show');
            })
        })
        $('.js-btn-update-npp').on('click',function (e) {
            e.preventDefault();
            $.ajax({
                url: "admin/nhaphanphoi/post-sua",
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    _token: $("meta[name='csrf-token']").attr("content"),
                    id: $('#id').val(),
                    idNPP: $('#idNPP-edit').val(),
                    tenNPP: $('#tenNPP-edit').val(),
                    dcNPP: $('#dcNPP-edit').val(),
                    sodtNPP: $('#sodtNPP-edit').val(),
                    emailNPP: $('#emailNPP-edit').val(),
                }),
                success: function (response) {
                    toastr.success(response.message)
                    $('#modal-edit-npp').modal('hide');
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
                    url: "admin/loaisp/xoa/" + id,
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
                url: "admin/loaisp/post-sua",
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
    // Sửa sản phẩm
    // $(document).ready(function (){
    //     $('.js-edit-btn-sp').on('click', function() {
    //         var id = $(this).data('id');
    //         $.get('admin/sanpham/sua/' + id, function(sp, lsp, npp){
    //             $("#id").val(sp.id);
    //             $("#idLSP-edit").val(lsp.id);
    //             $("#idNPP-edit").val(npp.id);
    //             $("#idSP-edit").val(sp.Ma_SP);
    //             $("#tenSP-edit").val(sp.ten_SP);
    //             $("#xuatxu-edit").val(sp.xuatxu);
    //             $("#trluong-edit").val(sp.trongluong);
    //             $("#giagoc-edit").val(sp.giagoc);
    //             $("#giamgia-edit").val(sp.giamgia);
    //             $("#slton-edit").val(sp.soluongton);
    //             $("#hsh-edit").val(sp.hansudung_thang);
    //             $("#gthieu-edit").val(sp.gioithieu);
    //             $("#sosao-edit").val(sp.sosao);
    //             $("#noibat-edit").val(sp.noibat);
    //             $("#hinh_anh-edit").val(sp.hinhanhgoc);
    //             $('#modal-edit-lsp').modal('show');
    //         })
    //     })
    //     $('.js-btn-update-sp').on('click',function (e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: "admin/sanpham/post-sua",
    //             method: 'post',
    //             headers: {
    //                 'Content-Type': 'application/json'
    //             },
    //             data: JSON.stringify({
    //                 _token: $("meta[name='csrf-token']").attr("content"),
    //                 id: $('#id').val(),
    //                 idLSP: $('#idLSP-edit').val(),
    //                 tenLSP: $('#tenLSP-edit').val(),
    //             }),
    //             success: function (response) {
    //                 toastr.success(response.message)
    //                 $('#modal-edit-lsp').modal('hide');
    //                 console.log(response)
    //                 location.reload();
    //             },
    //             error: function (jqXHR, textStatus, errorThrown) {
    //                 //xử lý lỗi tại đây
    //             }
    //         })
    //     })
    // })
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
                url: "admin/sanpham/xoa/" + id,
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
    });
</script>
</body>

</html>
