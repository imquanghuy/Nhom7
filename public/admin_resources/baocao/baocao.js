function onChangeDate(){
    let dateStart = $('#date_start').val();
    let dateEnd = $('#date_end').val();
    if (dateEnd < dateStart){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        let url = $(this).parent().parent().data('url');
        $.ajax({
            type:"GET",
            url:url,
            data:{'dateStart':dateStart,'dateEnd':dateEnd},
            success:function (data) {
                if (data.code===200){
                    $('.data-table').html(data.tableData)
                    $('.load_js').html(data.load_js)
                }
            }

        });
        let timerInterval
        Swal.fire({
            title: '',
            // html: 'I will close in <b></b> milliseconds.',
            timer: 2000,
            timerProgressBar: false,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    }
}
$(function () {


    $(document).on('change','#date_start',onChangeDate)
    $(document).on('change','#date_end',onChangeDate)
});
