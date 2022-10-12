function delete_binhluan(e){
    e.preventDefault();
    let id = $(this).data('id');
    let url = $(this).data('url');
    Swal.fire({
        title: 'Đây là bình luận của khách hàng!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
              type:"GET",
              url:url,
              data:{'id':id},
              success:function (data){
                  if (data.code===200){
                      $('.dashboard-binhluan').html(data.partials_binhluan);
                  }
              }
            })
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đã xóa',
                showConfirmButton: false,
                timer: 1000
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
    $(document).on('click','.btn-delete-bt',delete_binhluan)
})
