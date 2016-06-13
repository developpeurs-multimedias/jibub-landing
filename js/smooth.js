$( document ).ready(function() {

    var waypoint = new Waypoint({
        element: document.getElementsByTagName('section'),
        handler: function(){
            change();
        },
        offset: 0
    });
    console.log(waypoint.element)
   // console.log(waypoint)


    $("#landing-page section").waypoint(function (direction) {
        if (direction === 'down') {
            //console.log($("#landing-page section").waypoint);
            $('nav #navi a').removeClass('active');
            currentSectiona = this.element.id;

            stateObj = {foo: currentSectiona, key: currentSectiona};
            window.history.pushState(stateObj, 'index.php#', 'index.php#' + currentSectiona);

            $('.' + currentSectiona).addClass('active');
            select = this.element.id;
        }
    }, {offset: '80px'});

    $("#landing-page section").waypoint(function (direction) {
        if (direction === 'up') {
            console.log('up');
            $('nav #navi a').removeClass('active');
            currentSection = this.element.id;

            stateObj = {foo: currentSection, key: currentSection};
            window.history.pushState(stateObj, 'index.php#', 'index.php#' + currentSection);

            $('.' + currentSection).addClass('active');

        }
    }, {offset: '-45%'});


    function change($section) {
        $('nav #navi a').removeClass('active');
        currentSection = $section.attr('id');
        $('.' + currentSection).addClass('active');
    };


    $('nav #navi a').click(function () {

    });


    $(window).on('debouncedresize', function () {
        currentSection = $section.attr('id');
        $('html, body').animate({
            scrollTop: $("#" + currentSection).offset().top
        }, 500);
    });


    var continuousElements = document.getElementsByTagName('section');
    for (var i = 0; i < continuousElements.length; i++) {
        new Waypoint({
            element: continuousElements[i],
            handler: function () {
                var previousWaypoint = this.previous();
                console.log(previousWaypoint['element'].id);
            }
        })
    };
});
