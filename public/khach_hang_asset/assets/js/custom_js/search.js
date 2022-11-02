$(document).ready(function (){

    $('#search_keywords').keyup(function(){
        var query = $(this).val();

        if(query !== ''){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "khach_hang/shop/autocomplete-ajax",
                method: "POST",
                data: {query:query, _token:_token},
                success:function(data){
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });
        }else{
            $('#search_ajax').fadeOut();
        }
    });
    $(document).on('click','.li-search-ajax',function (){
        $('#search_keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    })

});
