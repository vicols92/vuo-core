'use strict';
import './progressbar.scss';

jQuery(document).ready(function( $ ) {

    var l = $('#progressbar2');

    if (l.length >= 1) {
    $(window).scroll(function () {
        var position = window.pageYOffset;
        if (position > 100) {
            $('#progressbar2').css('opacity', '1');
        } else {
            $('#progressbar2').css('opacity', '0');
        }

        var s = $(window).scrollTop(),
            d = $(document).height(),
            c = $(window).height();

        var scrollPercent = (s / (d - c)) * 100;
        var position = scrollPercent;

        $("#progressbar2").attr('value', position);
    });

    }

});
