import Typed from 'typed.js';

// create global $ and jQuery variables
global.$ = global.jQuery = $;

(function ($) {
    "use strict";

    /*-----------------
        Menu Stick
    -----------------*/
    var header = $('.sticky-bar');
    var win = $(window);
    win.on('scroll', function () {
        var scroll = win.scrollTop();
        if (scroll < 40) {
            header.removeClass('stick');
            // document.getElementById("logo").src = "https://medias.carolinenoyer.fr/images/logo-cnoyer-full-250-white.svg";
        } else {
            header.addClass('stick');
            // document.getElementById("logo").src = "https://medias.carolinenoyer.fr/images/logo-cnoyer-full-250.svg";
        }
    });

    /*------ Typed text ----*/
    const typed = new Typed('#typedtext', {
        strings: ['Product Owner', 'UX Design', 'Développement web'],
        startDelay: 500,
        typeSpeed: 50,
        backSpeed: 20,
        backDelay: 1000,
        loop: true,
    });
})(jQuery);