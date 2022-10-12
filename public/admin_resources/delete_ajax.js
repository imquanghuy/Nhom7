function myFunctionDelete (event){
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Bạn có muốn xóa ?',
        text: "Bạn sẽ không thể khôi phục lại nó !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận xóa!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type:'GET',
                url: urlRequest,
                success : function (data){
                    if (data.code==200){
                        that.parent().parent().remove();
                    }
                    Swal.fire(
                        'Đã xóa!',
                        'Thành công'
                    )
                },
                error : function (){

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
    $(document).on('click','.action_delete',myFunctionDelete)
});
