function deleteSubCart(e){
    e.preventDefault();
    let url = $('.subcart').data('url');
    let id = $(this).data('id');
    $.ajax({
        type:"GET",
        url:url,
        data:{id:id},
        success:function (data){
            if(data.code===200){
                $('.cart_wrapper').html(data.cartPartials)
                $('.cart_sub_partials').html(data.sub_carts);
                $('.soluong-cart').text(data.total_sp)
            }
        },
        error:function (){

        }
    })
}

$(function (){
    $(document).on('click','.delete-subcart',deleteSubCart)
})
