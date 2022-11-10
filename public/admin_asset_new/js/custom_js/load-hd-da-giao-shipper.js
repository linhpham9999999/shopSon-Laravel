$(document).ready(function (){
    loadcart3();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loadcart3(){
        $.ajax({
            type: 'GET',
            url: "admin/duyetHD/load-count-order3",
            success:function (response){
                $('.hd-cho-shiper-duyet').html('');
                $('.hd-cho-shiper-duyet').html(response.count);
            }
        })
    }
});
