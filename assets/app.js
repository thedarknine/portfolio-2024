/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import 'animate.css';
const WOW = require('wowjs');
import Swiper from 'swiper';
import GLightbox from 'glightbox';

// create global $ and jQuery variables
global.$ = global.jQuery = $;

(function ($) {
    "use strict";

    /*------ Wow Active ----*/
    window.wow = new WOW.WOW({ live: false });
    window.wow.init();
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
    const swiper = new Swiper('.skills-carousel', {
        spaceBetween: 64,
        centeredSlides: true,
        loop: true,
        speed: 5000,
        noSwiping: true,
    });

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