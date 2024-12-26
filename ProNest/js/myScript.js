//nav-toggle
$(document).ready(function() {
    // Toggle the mobile menu when the hamburger icon is clicked
    $('#mobile-menu').click(function() {
        $('ul').toggleClass('active'); // Toggle visibility of the navigation links
    });

    // Toggle the dropdown menu when clicked (for mobile)
    $('.secondary-header .dropdown').click(function(e) {
        e.stopPropagation(); // Prevent the event from propagating and triggering other clicks
        $(this).toggleClass('active'); // Toggle the active class for the dropdown
        $(this).children('.dropdown-content').slideToggle(); // Toggle the dropdown content visibility
    });

    // Close the dropdown if clicked outside
    $(document).click(function(e) {
        if (!$(e.target).closest('.dropdown').length) {
            $('.dropdown').removeClass('active'); // Remove the active class
            $('.dropdown-content').slideUp(); // Hide the dropdown content
        }
    });
});



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


//jumpto_second
//show more - show less
$(document).ready(function() {
    // Initially hide the "Show Less" button
    $('#show-less-btn').hide();

    // Click event for the "Show More" button
    $('#show-more-btn').click(function() {
        // Show additional product cards
        $('#jumpto_second .additional-cards').fadeIn(); // Smooth fade-in for additional cards

        // Hide "Show More" button and show "Show Less" button
        $(this).hide(); // Hide "Show More" button
        $('#show-less-btn').show(); // Show "Show Less" button
    });

    // Click event for the "Show Less" button
    $('#show-less-btn').click(function() {
        // Hide additional product cards
        $('#jumpto_second .additional-cards').fadeOut(); // Smooth fade-out for additional cards

        // Hide "Show Less" button and show "Show More" button
        $(this).hide(); // Hide "Show Less" button
        $('#show-more-btn').show(); // Show "Show More" button
    });
});






























    