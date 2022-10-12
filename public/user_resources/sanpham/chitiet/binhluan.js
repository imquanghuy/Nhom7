$("#form-binhluan").submit(function (e){
    let url = $("#form-binhluan").attr('action')
    $.ajax({
        type:"POST",
        url:url,
        data:$("#form-binhluan").serialize(),
        dataType:"json",
        success:function (data){
            if(data.code===200){
                $('#company-list-left').html(data.binhluanPartials);
                document.getElementById('binhluan').value = "";
            }
        }
    })
    e.preventDefault()
})
function deleteBinhluan(e){
    e.preventDefault()
    let url = $(this).parent().data('url');
    let id_sanpham = $(this).parent().data('id');
    let id = $(this).data('id');
    let that = $(this);
    Swal.fire({
        title: 'Bạn có muốn xóa?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận xóa!'
    }).then((result)=>{
        if (result.isConfirmed) {
            $.ajax({
                type:"GET",
                url:url,
                data:{id:id,id_sanpham:id_sanpham},
                success:function (data){
                    if(data.code===200){
                        that.parent().parent().parent().parent().parent().parent().remove();
                    }
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
    $(document).on('click','.btn-delete-bl',deleteBinhluan)
})
