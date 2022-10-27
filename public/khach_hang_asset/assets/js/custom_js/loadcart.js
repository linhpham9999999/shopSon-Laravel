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
            url: "khach_hang/cart/load-cart-data",
            success:function (response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        })
    }
});
