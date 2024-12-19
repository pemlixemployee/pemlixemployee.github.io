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


document.getElementById('show-more-btn').addEventListener('click', function() {
    var additionalCards = document.querySelectorAll('.additional-cards');
    
    // Toggle the display of additional cards
    additionalCards.forEach(function(card) {
        card.style.display = card.style.display === 'none' ? 'block' : 'none';
    });

    // Update the button text
    if (this.textContent === "Show More") {
        this.textContent = "Show Less";
    } else {
        this.textContent = "Show More";
    }
});



$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop: true,           // Enable infinite loop
        margin: 10,           // Set margin between items
        nav: true,            // Enable navigation buttons
        dots: true,           // Enable dots navigation
        autoplay: true,       // Enable autoplay
        autoplayTimeout: 3000, // Timeout between slides
        responsive: {
            0: {
                items: 1 // 1 item for small screen sizes
            },
            600: {
                items: 2 // 2 items for medium screen sizes
            },
            1000: {
                items: 3 // 3 items for larger screens
            }
        }
    });
});








    