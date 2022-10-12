
function myFunctionActive (event){
    let urlRequest = $(this).data('url');
    let id = $(this).data('id');
    $.ajax({
        type:"GET",
        url: urlRequest,
        data:{'id':id}
    })
}
$(function (){
    $(document).on('click','.active_user',myFunctionActive)
});

