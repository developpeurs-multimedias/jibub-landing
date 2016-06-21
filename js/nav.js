//////////////////////

/// btn nav header ///

//////////////////////
///
$(function(){
    $('#nav ul a').click(function(){

        var _that = this;
        $('#nav ul li a').removeClass('btn-active');
        var nav_attr = _that.classList[0];
        $(_that).addClass("btn-active");
        $("." + nav_attr).toggleClass("btn-active");
    });
    return false;
});

$('#nav a').click(function(){

    //$('#nav a').css('class', 'active');
    //$('#nav ul li a').removeClass('active');

});


//////////////////////

/// btn nav bottom ///

//////////////////////
///
$(function(){
    $("#nav-free a").click(function(){

        $("#nav-free ul li").removeClass('btn-active');
        var nav_free_attr = ($(this).html()).toLowerCase();
        $("." + nav_free_attr).addClass('btn-active');
        $('#nav ul a').removeClass('active');
        $("." + nav_free_attr).toggleClass("active");
    });
    return false;
});


$('#nav-free a').click(function(){

    //$('#nav-free li').css('class', 'btn-active');
    //$('#nav-free li').removeClass('btn-active');

});


///////////////

/// btn rwd ///

///////////////
///
$('#rdw__icon').click(function(){

    $('nav').toggleClass('display');

});


///////////////

/// smooth scroll ///

///////////////
///

$('#nav ul a').click(function(){

    var _that = this;
    var the_hash = _that.classList[0];

    elements = document.querySelectorAll('#navi a');

    for(var i = 0 ; i < elements.length; i++ )
        {
            //console.log("n° " + elements[i]  + '  top a ' +$("#"+elements[i].classList[0]).offset().top)
        }


        $('#landing-page').animate({
            scrollTop: $("#" +the_hash).offset().top - 80
        }, 1000);
    return false;




});
