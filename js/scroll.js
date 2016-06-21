$(document).ready(function() {

    $goScroll = $('#nav').find('a');
    $goScroll.click(function (e) {
        console.log($goScroll);
        var h = $(this).attr('href'),
            target;
        console.log(h);

        if (h.charAt(0) == '#' && h.length > 1 && (target = $(h)).length > 0) {
            var pos = Math.max(target.offset().top, - 120);
            console.log(pos);
            e.preventDefault();
            $('body,html').animate({
                scrollTop: pos
            }, 1400, 'swing');
        }
    });
});