$(document).ready(function (){
    loadcart2();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function loadcart2(){
        $.ajax({
            type: 'GET',
            url: "admin/duyetHD/load-count-order2",
            success:function (response){
                $('.hd-chua-duyet').html('');
                $('.hd-chua-duyet').html(response.count);
            }
        })
    }
});
