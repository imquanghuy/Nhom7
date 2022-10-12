
function category_responsive(){
    if ($('.navbar_responsive').hasClass('d-none'))
    {
        $('.navbar_responsive').removeClass('d-none');
    } else {
        $('.navbar_responsive').addClass('d-none');
    }
}
$(function (){
    $(document).on('click','.btn_category',category_responsive)
})
