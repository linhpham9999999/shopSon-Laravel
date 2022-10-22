$(document).ready(function (){
    //Them SP yeu thich
    $('.add-wish-list-to-btn').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id = $(this).closest('.product-item').find('.product_id_wish').val();
        $.ajax({
            method: "POST",
            url: "khach_hang/wishlist/add",
            data: {'product_id': product_id, },
            success:function (response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        })
    });
    // xóa sp yêu thích
    $('.delete-wish-list-to-btn').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // alert('xóa th');
        var product_id = $(this).closest('.wishlist-table').find('.product_id_wish_delete').val();
        $.ajax({
            method: "POST",
            url: "khach_hang/wishlist/delete",
            data: {'product_id': product_id, },
            success:function (response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    });

    // xóa sp trong cart
    $('.delete-cart-to-btn').click(function (e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_color_id = $(this).closest('.cart-table').find('.product_id_cart_delete').val();
        $.ajax({
            method: "POST",
            url: "khach_hang/cart/delete",
            data: {'product_color_id': product_color_id, },
            success:function (response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        }).done(function() {
            window.location.reload();
        });
    });
});
