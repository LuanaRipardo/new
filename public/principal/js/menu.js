jQuery(document).ready(function($){
    
	// browser window scroll (in pixels) after which #phone-numbers, the "menu" link is shown
	var offset = 0;

	var navigationContainer = $('#cd-nav'),
		mainNavigation = navigationContainer.find('#cd-main-nav ul');
		mainNavigation.css('z-index', 10001);

	//hide or show the "menu" link
	checkMenu();
	$(window).scroll(function(){
		checkMenu();
	});

    $('.slider-area, #number-mobile, #phone-numbers, .overview-area, .banner-area, .product-area, .latest-product-area, .testimonial-area, .blog-area, .newsletter-area, footer').on("click", function() {
        $(this).addClass("has-menu-info");
        if($(mainNavigation).hasClass("is-visible") && $(this).hasClass("has-menu-info")) {
           $("#cd-main-nav ul").removeClass("is-visible");
        }
    });

	//open or close the menu clicking on the bottom "menu" link
	$('#trigger').on('click', function(){
		$(this).toggleClass('menu-is-open');
		//we need to remove the transitionEnd event handler (we add it when scolling up with the menu open)
		mainNavigation.off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend').toggleClass('is-visible');

	});

	function checkMenu() {
	    console.log($(window).scrollTop());
		if( $(window).scrollTop() > offset && !navigationContainer.hasClass('is-fixed')) {
			navigationContainer.addClass('is-fixed').find('.cd-nav-trigger').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
				mainNavigation.addClass('has-transitions');
			});
		} else if ($(window).scrollTop() <= offset) {
			//check if the menu is open when scrolling up
			if( mainNavigation.hasClass('is-visible')  && !$('html').hasClass('no-csstransitions') ) {
				//close the menu with animation
				mainNavigation.addClass('is-hidden').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
					//wait for the menu to be closed and do the rest
					mainNavigation.removeClass('is-visible is-hidden has-transitions');
					$('.cd-nav-trigger').removeClass('menu-is-open');
				});
			//check if the menu is open when scrolling up - fallback if transitions are not supported
			} else if( mainNavigation.hasClass('is-visible')  && $('html').hasClass('no-csstransitions') ) {
					mainNavigation.removeClass('is-visible has-transitions');
					$('.cd-nav-trigger').removeClass('menu-is-open');
			//scrolling up with menu closed
			} else {
                navigationContainer.addClass('is-fixed');
				mainNavigation.removeClass('has-transitions');
			}
		} 
	}
	
});

$('.multiple-items').slick({
    dots:true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots:true
            }
        },
        {
            breakpoint: 600,
            settings: {
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
               
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});