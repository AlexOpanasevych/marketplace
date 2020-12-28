$(document).ready(function($) {
    $(".owl-carousel").owlCarousel({
        autoWidth: true,
        dots: true,
        nav:false,
        margin: 50,
    });
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
    $("#btn_add_photo").click(function(){
        $(this).val('Фото збережено');
        $(this).css('background-color', '#4F7CAC');
        $(this).css('color', 'white');
        $(this).css('border', 'none');
        $("#file").click();
    });
    function getTopOffset(e) {
        var y = 0;
        do { y += e.offsetTop; } while (e = e.offsetParent);
        return y;
    };
    var block = document.getElementById('fixblock');
    if ( null != block ) {
        var topPos = getTopOffset( block );
        window.onscroll = function() {
            var newcss = (topPos - 100 < window.pageYOffset) ?
                'top:100px; position: fixed;' : 'position:static;';
            block.setAttribute( 'style', newcss );
        }
    };
});
