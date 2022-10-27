$(document).ready(function (){

    //them khuyến mãi
    $('.apply-promotion-code').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var maKM = $(this).closest('.apply-coupon-wrapper').find('.promotion_code').val();
        $.ajax({
            method: "POST",
            url: "khach_hang/cart/app-promotion",
            data: {'maKM': maKM, },
            success:function (response){
                alertify.set('notifier','position','top-right');
                if(response.status != null){
                    alertify.success(response.status);
                    location.reload();
                }else{
                    alertify.error(response.error);
                }
            }
        })
    });
    // xóa mã khuyến mãi
    $('.delete-promotion-code').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "khach_hang/cart/delete-promotion",
            success:function (response){
                alertify.set('notifier','position','top-right');
                if(response.status != null){
                    alertify.success(response.status);
                    location.reload();
                }else{
                    alertify.error(response.error);
                }
            }
        })
    });
});
