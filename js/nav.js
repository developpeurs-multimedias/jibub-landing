//////////////////////

/// btn nav header ///

//////////////////////
///
$(function(){
    $('#nav ul a').click(function(){

        $('#nav ul a').removeClass('active');
        $(this).addClass('active');
        var nav_attr = ($(this).html()).toLowerCase();
        $("#nav-free ul li").removeClass("btn-active");
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
        $(".target-" + nav_free_attr).toggleClass("active");
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
$('#rdw__icon').click(function(e){

    e.preventDefault();
    $('nav').toggleClass('display');

});