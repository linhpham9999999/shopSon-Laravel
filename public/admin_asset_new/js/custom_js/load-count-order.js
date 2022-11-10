$(document).ready(function (){
    loadcart();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loadcart(){
        $.ajax({
            type: 'GET',
            url: "admin/duyetHD/load-count-order",
            success:function (response){
                $('.hd-cho-duyet').html('');
                $('.hd-cho-duyet').html(response.count);
            }
        })
    }
});

