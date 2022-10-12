$('#hvbtn').hover(function (){
    $('.input_search').focus();
});
let btn = $('#button-to-top');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show-btn')
        btn.removeClass('unshow-btn');
    } else {
        btn.removeClass('show-btn')
        btn.addClass('unshow-btn');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '250');
});
