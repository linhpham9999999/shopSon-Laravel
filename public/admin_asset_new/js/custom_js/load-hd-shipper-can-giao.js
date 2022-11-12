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
            url: "nguoi-giao-hang/hoadon/load-count-order-shipper",
            success:function (response){
                $('.hd-can-giao').html('');
                $('.hd-can-giao').html(response.count);
            }
        })
    }
});
