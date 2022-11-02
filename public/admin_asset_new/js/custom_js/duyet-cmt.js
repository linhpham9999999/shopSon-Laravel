$(document).ready(function (){
    $('.duyet-binh-luan').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var idCMT = $(this).closest('.data-comment').find('.id-comment').val();
        $.ajax({
            method: "POST",
            url: "admin/binh-luan/duyet",
            data: {'idCMT': idCMT},
            success:function (response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    });
});
