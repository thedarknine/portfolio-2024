/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import './bootstrap.js';

// any CSS you import will output into a single css file (app.css in this case)
import '@fortawesome/fontawesome-free/css/all.css';
import './vendor/@fontsource/oxygen/index.css';
import './vendor/@fontsource/oxygen/300.css';
import './vendor/@fontsource/oxygen/700.css';
import './vendor/@fontsource-variable/league-spartan/index.css';
import './vendor/aos/dist/aos.css';
import './vendor/glightbox/dist/css/glightbox.min.css';
import './styles/app.css';

import AOS from './vendor/aos/dist/aos.js';
import GLightbox from './vendor/glightbox/dist/js/glightbox.min.js';
// import Swiper from './vendor/swiper/swiper.min.js';

// create $ and jQuery variables
import jquery from './vendor/jquery/dist/jquery.min.js';
const $ = jquery;
window.$ = window.jQuery = $;

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
        } else {
            header.addClass('stick');
        }
    });

    /*------ AOS ----*/
    // You get the current window width
    var width = window.innerWidth;

    //Than you define the AOS settings for different widths
    if (width <= 600) { // For example, this can be for mobile devices
        AOS.init({disable: 'mobile'});
    } else if (width > 600 && width <= 900) { // And you make a condition for tablets too
        AOS.init({
            offset: 300,
            duration: 1200
        });
    } else { // Else for just, you know, desktops
        AOS.init({
            offset: 50,
            duration: 1200,
            // easing: 'ease-out-cubic',
        });
    }
})(jQuery);

// Burger menus
document.addEventListener('DOMContentLoaded', function() {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var it = 0; it < close.length; it++) {
            close[it].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var k = 0; k < backdrop.length; k++) {
            backdrop[k].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // Swiper 
   /* const swiper = new Swiper('.skills-carousel', {
        spaceBetween: 64,
        centeredSlides: true,
        loop: true,
        speed: 5000,
        noSwiping: true,
    });*/

    // Lightbox
    const myLightbox = function () {
        // GLightbox
        const lightbox_class = document.querySelector(".glightbox9");
        if ( lightbox_class != null) {
            const lightbox = GLightbox({
                selector: '.glightbox9',
                touchNavigation: true,
                loop: true
            });
        }
    }
    myLightbox();
});