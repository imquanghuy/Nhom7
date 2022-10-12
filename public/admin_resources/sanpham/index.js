function myFunctionActive (event){
    let urlRequest = $(this).data('url');
    let that = $(this);
    $.ajax({
        type:'GET',
        url: urlRequest,
    })
}
$(function (){
    $(document).on('click','.active_sanpham',myFunctionActive)
});

