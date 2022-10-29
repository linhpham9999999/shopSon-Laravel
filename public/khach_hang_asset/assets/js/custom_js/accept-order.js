$(document).ready(function (){
    $('.accept-receive-order').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var idHD = $(this).closest('.data-order').find('.order-id').val();
        $.ajax({
            method: "POST",
            url: "khach_hang/accept-order",
            data: {'idHD': idHD},
            success:function (response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    });
});
