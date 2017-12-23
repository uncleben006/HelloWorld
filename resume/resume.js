$(function() {
    $("div.menu a").click(function() {
        var $this = $(this);
        click = $this.attr('href');
        $(".content").hide();
        $(click).fadeIn();  
    });
    /*
    $("div.systemBut_frame a").on('click', function(event) {
    	var $this = $(this);
    	click = $this.attr('href');
	    $('.pageActive').removeClass('pageActive');
	    $(click).fadeIn().animate({ "left": "+=150px" });
	    pageOn();
	});
	*/

})

/*
$( "tab_side" ).on( "click", function() {
  $( this ).css( "background", "#021533" );
});
*/

/*
var linkHome = 0;
var linkPage = '';

function pageOn() {
    
    $('.menu').addClass('main-menu-pgactive');
    $('.content').addClass('section-vcardbody-pgactive');

    linkHome = 1;
}

function pageOff() {
    $('.section-page-active').removeClass('section-page-active');
    $('#main-menu').removeClass('main-menu-pgactive');
    $('#section-home').removeClass('section-vcardbody-pgactive');

    linkHome = 0;
}






$(".link-home").on('click', function(event) {
    event.preventDefault();

    if (linkHome == 0) {
        //pageOn();
    } else if (linkHome == 1) {
        $('.menuActive').removeClass('menuActive');
        $(this).addClass('menuActive');
        pageOff();
    }
});
*/