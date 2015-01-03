$(document).ready(function() {
    $('.dropdown-menu li.dropdown').on('mouseenter', function() {
        $(this).find('.dropdown-menu').css({
            'display': 'inline-block'
        }, 'slow')
    }).on('mouseleave', function() {
        $(this).find('.dropdown-menu').css({
            'display': 'none'
        }, 'slow');
    });
});