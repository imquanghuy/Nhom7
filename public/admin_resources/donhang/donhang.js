function huydon(e){
    e.preventDefault();
    let url = $(this).data('url');
    let id = $(this).data('dh');
    let dh = $(this).data('value');
    $.ajax({
        type:"GET",
        url:url,
        data:{'id':id,'dh':dh},
        success:function (data){
            if (data.code==200){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đã hủy',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('.partials_view').html(data.partials_view)
                $('.table_donhang').html(data.table_donhang)
            }
        }
    })
}
function duyetdon(e){
    e.preventDefault();
    let url = $(this).data('url');
    let id = $(this).data('dh');
    let dh = $(this).data('value');
    $.ajax({
        type:"GET",
        url:url,
        data:{'id':id,'dh':dh},
        success:function (data){
            if (data.code==200){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đã duyệt đơn',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('.partials_view').html(data.partials_view)
                $('.table_donhang').html(data.table_donhang)
            }
        }
    })
}
function xacnhangiao(e){
    e.preventDefault();
    let url = $(this).data('url');
    let id = $(this).data('dh');
    let dh = $(this).data('value');
    $.ajax({
        type:"GET",
        url:url,
        data:{'id':id,'dh':dh},
        success:function (data){
            if (data.code==200){
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Đã xác nhận',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('.partials_view').html(data.partials_view)
                $('.table_donhang').html(data.table_donhang)
            }
        }
    })
}
$(function (){
    $(document).on('click','.btn-huydon',huydon);
    $(document).on('click','.btn-duyetdon',duyetdon);
    $(document).on('click','.btn-xacnhangiao',xacnhangiao);
})
