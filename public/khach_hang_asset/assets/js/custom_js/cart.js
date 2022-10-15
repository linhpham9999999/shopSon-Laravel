$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.dec').on('click', function () {
        const input = $(this).parent().find('.cart-plus-minus-box');
        let productIdInput = $(this).parent().find('.js-product-id');
        const oldQuantity = parseInt(input.attr('value'));
        const productId = productIdInput.attr('value');
        if (oldQuantity === 1) {
            return;
        }
        const newQuantity = oldQuantity - 1;
        input.attr('value', newQuantity)
        $.ajax({
            type: 'POST',
            url: "khach_hang/buy-products/api/update-cart",
            data: {productId, quantity: newQuantity}
        }).done(function() {
            window.location.reload();
        });
    })

    $('.inc').on('click', function () {
        const input = $(this).parent().find('.cart-plus-minus-box');
        let productIdInput = $(this).parent().find('.js-product-id');
        const oldQuantity = parseInt(input.attr('value'));
        const productId = productIdInput.attr('value');
        const newQuantity = oldQuantity + 1;
        input.attr('value', newQuantity)
        $.ajax({
            type: 'POST',
            url: "khach_hang/buy-products/api/update-cart",
            data: {productId, quantity: newQuantity}
        }).done(function() {
            window.location.reload();
        });
    })

})
