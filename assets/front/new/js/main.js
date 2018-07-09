/*

Page: main JS
Author: Surjith S M
URI: http://surjithctly.in/
Version: 1.0

*/

(function($) {
    "use strict";


    /* ============= Preloader Close on Click ============= */

    if ($('.loader-wrapper').length) {
        $('.loader-wrapper').on('click', function() {
            $(this).fadeOut();
        });
    }

    /* ============= Homepage Slider ============= */
    if ($('.flexslider').length) {
        $('.flexslider').flexslider({
            animation: "fade"
        });
    }
    /* ============= Partner Logo Carousel ============= */
    if ($('.logo-slides').length) {
        $(".logo-slides").owlCarousel({
            autoplay: true,
            autoplayTimeout: 3000,
            loop: true,
            margin: 10,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                767: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1199: {
                    items: 5
                }
            }

        });
    }

    /* ============= Percentage Slider ============= */

    if ($('#skills').length) {

        var skillsDiv = $('#skills');

        $(window).on('scroll', function() {
            var winT = $(window).scrollTop(),
                winH = $(window).height(),
                skillsT = skillsDiv.offset().top;
            if (winT + winH > skillsT) {
                $('.skillbar').each(function() {
                    $(this).find('.skillbar-bar').animate({
                        width: $(this).attr('data-percent')
                    }, 2000);
                });
            }
        });

    }

    /* ============= Service Slider ============= */

    if ($('.service-slider').length) {
        $('.service-slider').flexslider({
            animation: "slide",
            controlNav: false,
            directionNav: true,
            touch: true
        });
    }
    /* ============= Blog Slider ============= */
    if ($('.blog-slide').length) {
        $('.blog-slide').flexslider({
            controlNav: false,
            animation: "slide"
        });
    }

    /* ============= Stats Counter ============= */
    if ($('.counter').length) {
        $('.counter').counterUp({
            delay: 10,
            time: 1500
        });
    }


    $(window).load(function() {

        /* ============= Preloader ============= */

        if ($('.loader-wrapper').length) {
            $('.loader-wrapper').fadeOut();
        }


    }); // End Window.Load

})(jQuery);

function _editors() {

    var _container_1 = jQuery('textarea.summernote');
    
    if(_container_1.length > 0) {
        
        if(jQuery().summernote) {

            _container_1.each(function() {

                var _lang = jQuery(this).attr('data-lang') || 'en-US';

                if(_lang != 'en-US') { // Language!
                alert(_lang);
                    loadScript(plugin_path + 'editor.summernote/lang/summernote-'+_lang+'.js');
                }

                jQuery(this).summernote({
                    height: jQuery(this).attr('data-height') || 200,
                    lang: 	jQuery(this).attr('data-lang') || 'en-US', // default: 'en-US'
                    toolbar: [
                    /*	[groupname, 	[button list]]	*/
                        ['style', 		['style']],
                        ['fontsize', 	['fontsize']],
                        ['style', 		['bold', 'italic', 'underline','strikethrough', 'clear']],
                        ['color', 		['color']],
                        ['para', 		['ul', 'ol', 'paragraph']],
                        ['table', 		['table']],
                        ['media', 		['link', 'picture', 'video']],
                        ['misc', 		['codeview', 'fullscreen', 'help']]
                    ]
                });
            });

        }
        
    }
}
