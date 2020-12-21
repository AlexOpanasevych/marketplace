$(document).ready(function($) {
    $('.categories_popup_btn').click(function() {
        $('.categories_popup_fade').fadeIn();
        return false;
    });

    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            $('.categories_popup_fade').fadeOut();
        }
    });

    $('.categories_popup_fade').click(function(e) {
        if ($(e.target).closest('.categories_popup').length == 0) {
            $(this).fadeOut();
        }
    });
    $(".owl-carousel").owlCarousel({
        autoWidth: true,
        dots: true,
        nav:false,
        margin: 50,
    });
});
