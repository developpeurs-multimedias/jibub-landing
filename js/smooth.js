var  waypoint  =  new  Waypoint ({
    element :  document.getElementsByTagName('section'),
    handler :  function ( direction )  {
       // header();
    },
    offset : 0
});


$("#landing-page section").waypoint( function( direction ) {
    if( direction === 'down' ) {
        $('nav #navi a').removeClass('active');
        currentSectiona = this.element.id;
        $('.target-' + currentSectiona).addClass('active');
        select = this.element.id;
        //console.log('down');
    }
}, { offset: '80px' } );

$("#landing-page section").waypoint( function( direction ) {
    if( direction === 'up' ) {
        $('nav #navi a').removeClass('active');
        currentSection = this.element.id;
        $('.target-' + currentSection).addClass('active');
        //console.log('up');

    }
}, { offset: '-45%' } );




function change($section){
    $('nav #navi a').removeClass('active');
    currentSection = $section.attr('id');
    $('.target-' + currentSection).addClass('active');
};


$('nav #navi a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 500);
});


$( window ).on( 'debouncedresize', function() {
    $('html, body').animate({
        scrollTop: $("#" + currentSection).offset().top
    }, 500);
} );



var continuousElements = document.getElementsByTagName('section');
for (var i = 0; i < continuousElements.length; i++) {
    new Waypoint({
        element: continuousElements[i],
        handler: function() {
            var  previousWaypoint  =  this . previous();
            //console.log(previousWaypoint['element'].id);
        }
    })
};
