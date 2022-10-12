function addToCart(e){
    e.preventDefault();
    let url = $(this).data('url');
    let sl = $(this).parent().find('input.soluong-sp').val();
    let dg = $(this).parent().parent().find('h3.dongia-sp').data('dg');
    if (dg==null){
        dg = $(this).parent().parent().parent().find('h3.dongia-sp').data('dg');
    }
    let soluong = 1;
    if(sl) {
        soluong = parseInt(sl);
    }
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Thêm vào giỏ hàng thành công!',
        showConfirmButton: false,
        timer: 1500
    })
    $.ajax({
        type:"GET",
        url:url,
        data:{soluong :soluong,dongia:dg },
        dataType: 'json',
        success:function (data){
            if(data.code===200){
                $('.cart_sub_partials').html(data.sub_carts);
                $('.soluong-cart').text(data.total_sp)
            }
        },
        error:function (){

        }
    })
}
function updateCart(e){
    e.preventDefault();
    let urlUpdate = $('.update-cart-url').data('url');
    let id = $(this).data('id');
    let soluong = $(this).parents('tr').find('input.soluong').val();
    if (soluong<0){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Số lượng phải lớn hơn 0',
            showConfirmButton: false,
            timer: 1500
        })
        $(this).parents('tr').find('input.soluong').focus();
    } else {
        $.ajax({
            type:"GET",
            url:urlUpdate,
            data: {id:id,soluong:soluong},
            success: function (data){
                if(data.code===200){
                    $('.cart_wrapper').html(data.cartPartials)
                    $('.cart_sub_partials').html(data.sub_carts);
                    $('.soluong-cart').text(data.total_sp)
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cập nhập giỏ hàng thành công!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            },
            error:function (){

            }
        })
    }
}
function deleteCart(e){
    e.preventDefault();
    let urlDelete = $('.cart').data('url');
    let id = $(this).data('id');
    Swal.fire({
        title: 'Bạn có muốn xóa?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận xóa!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:"GET",
                url:urlDelete,
                data:{id:id},
                success:function (data){
                    if(data.code===200) {
                        $('.cart_wrapper').html(data.cartPartials)
                        $('.cart_sub_partials').html(data.sub_carts);
                        $('.soluong-cart').text(data.total_sp)
                        Swal.fire(
                            'Đã xóa!',
                            'Sản phẩm này đã được xóa!',
                            'success'
                        )
                    }
                },
                error:function (){
                }

            })
        }
    })
    const btn_cancel = $(".swal2-cancel.swal2-styled.swal2-default-outline").text('Hủy');
    btn_cancel.removeAttr('style')
    btn_cancel.removeClass('swal2-styled');
    btn_cancel.removeClass('swal2-default-outline');
    btn_cancel.addClass('btn');
    btn_cancel.addClass('btn-danger')
    btn_cancel.addClass('btn-lg')
    btn_cancel.addClass('m-2')
    const btn_success = $(".swal2-confirm.swal2-styled.swal2-default-outline").text('Xác nhận xóa');
    btn_success.removeAttr('style')
    btn_success.removeClass('swal2-styled');
    btn_success.removeClass('swal2-default-outline');
    btn_success.addClass('btn');
    btn_success.addClass('btn-success')
    btn_success.addClass('btn-lg')
    btn_success.addClass('m-2')
}
$(function (){
    $(document).on('click','.update-cart',updateCart)
    $(document).on('click','.btn-add-cart',addToCart)
    $(document).on('click','.delete-cart',deleteCart)
})
