
function edit_user(e){
    e.preventDefault();
    let url = $(this).data('url');
    $.ajax({
        type:"GET",
        url:url,
        success:function (data){
            if (data.code===200){
                $('.info_user').html(data.edit_info)
            }
        }
    });
}
$(function (){
    $(document).on('click','.btn_edit_user',edit_user)
})

