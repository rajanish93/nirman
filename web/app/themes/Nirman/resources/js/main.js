(function ($) {
    "use strict";
    
// JavaScript code to handle dropdown menus
document.addEventListener("DOMContentLoaded", function() {
    var menuItems = document.querySelectorAll('.menu-item');

    // Loop through each menu item
    menuItems.forEach(function(item) {
        // Add event listener for mouseenter to show sub-menu
        item.addEventListener('mouseenter', function() {
            var subMenu = this.querySelector('.sub-menu');
            if (subMenu) {
                subMenu.style.display = 'block';
            }
        });

        // Add event listener for mouseleave to hide sub-menu
        item.addEventListener('mouseleave', function() {
            var subMenu = this.querySelector('.sub-menu');
            if (subMenu) {
                subMenu.style.display = 'none';
            }
        });
    });
});
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
    

     // Testimonials carousel
     $(".testimonial-carousel1").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });
})(jQuery);


$(document).ready(function() {

    $('.counter').each(function () {
    $(this).prop('Counter',0).animate({
    Counter: $(this).text()
    }, {
    duration: 4000,
    easing: 'swing',
    step: function (now) {
    $(this).text(Math.ceil(now));
    }
    });
    });
    
    });



