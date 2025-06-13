/*
onLoad  / scroll other page
********************************************/

if ( window.location.hash ) scroll(0,0);
setTimeout( function() { scroll(0,0); }, 1);

$(function() {

		var w = $(window).width();
	    var x = 740;
	    if (w <= x) {
	        var offsetY = 110;
	    } else {
	        var offsetY = 70;
	    }


    // your current click function
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - offsetY
        }, 1000);
    });



    // *only* if we have anchor on the url
    if(window.location.hash) {
	    $('body,html').stop().scrollTop(0);
        // smooth scroll to the anchor id
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top - offsetY
        }, 1000);
    }

});




$(window).on('load', function() {

    setTimeout(function(){
        $("header").addClass('on');
    },1000);

});







$(function(){

	objectFitImages('img.object-fit');


	$(window).on('load', function() {

	    setTimeout(function(){
	        $("header").addClass('on');
	    },1000);

/*
	    setTimeout(function(){
	        $(".swiper-wrapper").addClass('on');
	    },1000);
*/

	});


/*
scroll animation
********************************************/

function animation(){
	$('.animation').each(function(){
		var target = $(this).offset().top + 200;
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height();
		if (scroll > target - windowHeight){
			$(this).addClass('active');
		}
	});
}
	animation();

$(window).scroll(function (){
	animation();
	});


/*
nav
********************************************/


$(function() {
  $(".trigger").on('click mouseover', function(){
	$(this).children('.submenu').toggleClass('active');
  }).mouseout(function(){
	  $(this).children('.submenu').removeClass('active');
  });
});




$(window).scroll(function () {
	$('.submenu').removeClass('active');
	$('#submenu_bg').removeClass('active');
});



/*
toggle
********************************************/

    var toggleList = '.toggle';

    $(toggleList).on("click", function() {
        $(this).next().slideToggle('fast');
        $(this).toggleClass('on');
        return false;
    });



/*
slide
********************************************/

    function menuOpen(){
        $('#spmenu').addClass('slide-open');
        $('header').addClass('slide-open');
        $("#slidemenuBtn").addClass('slide-open');

    }


    function menuClose(){
        $('#spmenu').removeClass('slide-open');
        $('header').removeClass('slide-open');
        $("#slidemenuBtn").removeClass('slide-open');
    }


   $("#slidemenuBtn").on('click touchstart',function() {

      if ($("body").css("overflow") != "hidden") {

            $("body").css({overflow: 'hidden'});

            menuOpen();

      }


       else {

            $("body").attr( { style: '' } );

            menuClose();

      }

      return false;
   });





/*
pageTop
********************************************/


    $(window).scroll(function () {
        //100pxスクロールしたら
        if ($(this).scrollTop() > 600) {
            //フェードインで表示
            $('.pageTop').addClass("on");

        } else {
            $('.pageTop').removeClass("on");
        }

        if ($(this).scrollTop() > 600) {
            //フェードインで表示
            $('header').addClass("on_scroll");

        } else {
            $('header').removeClass("on_scroll");
        }


    });



    //ここからクリックイベント
    $('#pageTop,.pageTop a').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });


    $(window).scroll(function () {
        //100pxスクロールしたら
        if ($(this).scrollTop() > 300) {
            //フェードインで表示
            $('#fixed_header').addClass("on");

        } else {
            $('#fixed_header').removeClass("on");
        }
    });







/********************************************/

});




