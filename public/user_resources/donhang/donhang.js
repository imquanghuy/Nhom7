function deleteDonHang(e){
    e.preventDefault();
    let url = $(this).attr('href');
    Swal.fire({
        title: 'Bạn có muốn hủy?',
        text: "Bạn sẽ không thể khôi phục lại nó!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Đã hủy!',
                'Đơn hàng của bạn đã bị hủy',
                'success'
            )
            window.location.href = url
        }
    })
    const btn_cancel = $(".swal2-cancel.swal2-styled.swal2-default-outline").text('Không');
    btn_cancel.removeAttr('style')
    btn_cancel.removeClass('swal2-styled');
    btn_cancel.removeClass('swal2-default-outline');
    btn_cancel.addClass('btn');
    btn_cancel.addClass('btn-danger')
    btn_cancel.addClass('btn-lg')
    btn_cancel.addClass('m-2')
    const btn_success = $(".swal2-confirm.swal2-styled.swal2-default-outline").text('Xác nhận hủy');
    btn_success.removeAttr('style')
    btn_success.removeClass('swal2-styled');
    btn_success.removeClass('swal2-default-outline');
    btn_success.addClass('btn');
    btn_success.addClass('btn-success')
    btn_success.addClass('btn-lg')
    btn_success.addClass('m-2')
}
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
$(function (){
    $(document).on('click','.btn-delete-dh',deleteDonHang)
})
