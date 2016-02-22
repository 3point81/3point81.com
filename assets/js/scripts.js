'use strict';

/*! throttle-debounce 0.1.1 - Throttle/debounce your functions. | Author: Ivan Nikolić <niksy5@gmail.com> (http://ivannikolic.com/), 2015 | License: MIT | Original author: Ben Alman (http://benalman.com) | Original license: Dual licensed under the MIT and GPL licenses */
function throttle(a, b, c, d) {
    function g() {
        function j() {
            f = Number(new Date), c.apply(g, i)
        }

        function k() {
            e = void 0
        }

        var g = this, h = Number(new Date) - f, i = arguments;
        d && !e && j(), e && clearTimeout(e), void 0 === d && h > a ? j() : b !== !0 && (e = setTimeout(d ? k : j, void 0 === d ? a - h : a))
    }

    var e, f = 0;
    return "boolean" != typeof b && (d = c, c = b, b = void 0), $ && $.guid && (g.guid = c.guid = c.guid || $.guid++), g
}

$(function () {
    var $sections = $('body > section[id]');
    var $links = $('nav li a[href^="#"]');
    var $videos = $('.bg--video video');

    var $window = $(window);

    var $offsets;
    var windowHeight;


    var updateActiveSection = function () {
        var scrollTop = $window.scrollTop();
        var threshold = $window.height() * 0.2;
        var active = 0;
        $offsets.each(function (i, offset) {
            if ((scrollTop + threshold) >= offset) {
                active = i;
            }
        });
        [$sections, $links].forEach(function (els) {
            els.not(':eq(' + active + ')').removeClass('active').find('video').each(function(){return this.pause();})
            els.eq(active).addClass('active').find('video').each(function(){return this.play(); })
        })
    };

    var updateOffsets = function () {
        $offsets = $sections.map(function () {
            return $(this).position().top;
        });
        windowHeight = $window.height();
        updateActiveSection();
    };

    var preventDefault = function (ev) {
        ev.preventDefault();
    };

    var scrollToAnchor = function () {
        var index = $links.index(this);
        var href = $(this).attr('href');
        var updateHref = function () {
            window.location.hash = href;
        };
        var scrollTop = {
            scrollTop: $offsets[index]
        };
        $('html, body').animate(scrollTop, 300, updateHref);
    };

    $window
        .on('load resize orientationchange', updateOffsets)
        .on('hashchange scroll touchmove', throttle(300, updateActiveSection));

    $links
        .on('click', preventDefault)
        .on('click', scrollToAnchor);

});