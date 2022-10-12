$(function (){
    $('.cauhinh ul').addClass('list-cau-hinh');
    $('.cauhinh ul li').prepend('<i class="mdi mdi-rhombus-medium-outline"></i>  ')
    $( '.btn-mota' ).click(function() {
        $('.modal-mota-sanpham').removeClass('d-none')
    });
    $('.btn-mota-close').click(function (){
        $('.modal-mota-sanpham').addClass('d-none')
    })
    $('.image-sp').hover(function (){
        $('.hinhanh-chitiet .active-sp').removeClass('active-sp')
        $(this).addClass('active-sp')
        const hinhanh = $(this).data('url');
        $('.hinhanh-chinh').attr('src',hinhanh)
    })
})
