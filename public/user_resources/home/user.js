// $(function (){
//     $('.btn-user').click(function (e){
//         e.preventDefault();
//
//     })
// })
$(document).on('click', function (e) {
    if ($(e.target).parent().hasClass('sub_user') || $(e.target).parent().hasClass('sub_user_header')) {

    }
    else
    if ($(e.target).hasClass('btn-user')) {
        if ($('.sub_user').hasClass('show-user')){
            $('.sub_user').removeClass('show-user')
        }  else {
            $('.sub_user').addClass('show-user')
        }
    }
    else
    {
        $('.sub_user').removeClass('show-user')
    }
});
