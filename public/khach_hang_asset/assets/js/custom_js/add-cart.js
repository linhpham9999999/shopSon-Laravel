$(document).ready(function (){
    //Them san pham vao cart
    $('.add-product-cart').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var productIdColor = $(this).closest('.product-data-add-cart').find('.cart_product_id_color').val();
        var number = $(this).closest('.product-data-add-cart').find('.number_product').val();
        $.ajax({
            method: "POST",
            url: "khach_hang/cart/add",
            data: {'productIdColor': productIdColor, 'number':number},
            success:function (response){
                alertify.set('notifier','position','top-right');
                if(response.status != null){
                    alertify.success(response.status);
                }else{
                    alertify.set('notifier','position','top-right');
                    alertify.error(response.error);
                }
            }
        })
    });
});
