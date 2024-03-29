/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

import Typed from 'typed.js';
import 'animate.css';
const WOW = require('wowjs');

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
            document.getElementById("logo").src = "https://medias.carolinenoyer.fr/images/logo-cnoyer-full-250-white.svg";
        } else {
            header.addClass('stick');
            document.getElementById("logo").src = "https://medias.carolinenoyer.fr/images/logo-cnoyer-full-250.svg";
        }
    });

    /*------ Wow Active ----*/
    window.wow = new WOW.WOW({ live: false });
    window.wow.init();

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
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function() {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});