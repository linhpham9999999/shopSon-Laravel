function remove_background(product_id){
    for(var count = 1; count <= 5; count++){
        $('#'+product_id+'-'+count).css('color','#ccc');
    }
}
// hover chuột đánh sao
$(document).on('mouseenter','.rating',function(){
    var index = $(this).data("index");
    var product_color_id = $(this).data("product_id");
    remove_background(product_color_id);
    for(var count = 1; count <= index; count++){
        $('#'+product_color_id+'-'+count).css('color','#ffcc00');
    }
});
// nhả chuột không đánh giá
$(document).on('mouseleave','.rating',function(){
    var index = $(this).data("index");
    var product_color_id = $(this).data("product_id");
    var rating = $(this).data("rating");
    remove_background(product_color_id);
    for(var count = 1; count <= rating; count++){
        $('#'+product_color_id+'-'+count).css('color','#ffcc00');
    }
});

// click chọn đánh giá sao
$(document).on('click','.rating',function(){
    var index = $(this).data("index");
    var product_color_id = $(this).data("product_id");
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: "khach_hang/insert-rating",
        method: "POST",
        data: {index:index, product_color_id:product_color_id, _token:_token},
        success:function(response){
            alertify.set('notifier','position','top-right');
            if(response.status != null){
                alertify.success(response.status);
                location.reload();
            }else{
                alertify.error(response.error);
            }
        }
    })
});
