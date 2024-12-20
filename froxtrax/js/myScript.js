//jumpto_first
$(window).on('scroll', function() {
    // Get the position of the section relative to the viewport
    var sectionOffset = $("#jumpto_first").offset().top;
    var sectionHeight = $("#jumpto_first").outerHeight();
    var windowScrollTop = $(window).scrollTop();
    var windowHeight = $(window).height();

    // Check if the section is in the viewport
    if (windowScrollTop + windowHeight >= sectionOffset && windowScrollTop < sectionOffset + sectionHeight) {
        // Trigger the animation when the section enters the viewport
        $("#jumpto_first .left .underline").animate({ left: '10px' }, 1000);
    }
});


//jumpto_second
//zoom

$(document).ready(function() {
    // Target all the columns inside #jumpto_second
    $('#jumpto_second .col-sm-3').hover(
        function() {
            // On hover, zoom in
            $(this).css('transform', 'scale(1.1)');
            $(this).css('z-index', '10'); // Ensure it stays on top of others
        },
        function() {
            // On hover out, reset scale
            $(this).css('transform', 'scale(1)');
            $(this).css('z-index', '1');
        }
    );
});

//show more - show less





$(document).ready(function() {
    // When the hamburger menu (menu-toggle) is clicked
    $('.secondary-header #mobile-menu').click(function() {
        // Toggle the 'active' class on the <ul> to show or hide the navigation links
        $('.secondary-header ul').toggleClass('active');
    });
});














    