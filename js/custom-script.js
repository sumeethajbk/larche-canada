jQuery(document).ready(function () {

  /* Fixed Header */
  jQuery(window).on("scroll", function () {
    var scroll = jQuery(this).scrollTop();
    if (scroll >= 2) {
      jQuery(".main_header").addClass("fixed-header");
    } else {
      jQuery(".main_header").removeClass("fixed-header");
    }
  });


  /* Input Type Number */
  jQuery('<div class="alert-nav"><div class="alert-button alert-up"><i class="fa-sharp fa-solid fa-angle-up"></i></div><div class="alert-button alert-down"><i class="fa-sharp fa-solid fa-angle-down"></i></div></div>').insertAfter('.alert input');
  jQuery('.alert').each(function () {
    var spinner = jQuery(this),
      input = spinner.find('input[type="number"]'),
      btnUp = spinner.find('.alert-up'),
      btnDown = spinner.find('.alert-down'),
      min = input.attr('min'),
      max = input.attr('max');

    btnUp.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue >= max) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

    btnDown.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue <= min) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

  });

  /* Menu */

  if (jQuery(window).width() <= 1023) {
    jQuery(document).on("click", ".menu_icon", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu").toggleClass("navOpen");
      jQuery('html, body').toggleClass('model-overlay-hide');

    });
    jQuery("ul.main_menu > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery(this).parent().siblings("li").toggleClass('sib');
      jQuery('ul.main_menu > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
      jQuery(this).toggleClass("active");

      jQuery(this).siblings('ul.sub-menu').slideToggle('900');
      jQuery(this).siblings('ul.sub-menu').children().find("ul.sub-menu").slideUp();
      jQuery(this).parent().siblings('li').find("ul.sub-menu").slideUp();

    });
    jQuery("ul.main_menu ul.sub-menu > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(this).parent().siblings('li').find("a").removeClass("active");
      jQuery(this).siblings("ul").slideToggle();
      jQuery(this).parent().siblings('li').find("ul.sub-menu").slideUp();
    });
  }


  jQuery('a[href*=#]:not([href=#])').click(function () {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        jQuery('html,body').animate({
          scrollTop: target.offset().top - 131
        }, 2000);
        return false;
      }
    }
  });

  // New edit
  jQuery(".accordion-item .heading").on("click", function (e) {
    e.preventDefault();
    if (jQuery(this).closest(".accordion-item").hasClass("active")) {
      jQuery(".accordion-item").removeClass("active");
    } else {
      jQuery(".accordion-item").removeClass("active");
      jQuery(this).closest(".accordion-item").addClass("active");
    }
    var jQuerycontent = jQuery(this).next();
    jQuerycontent.slideToggle(300);
    jQuery(".accordion-item .content").not(jQuerycontent).slideUp("slow");
  });

  jQuery('.brand-title h4').on('click', function (e) {
    e.preventDefault();
    jQuery(this).toggleClass('open');
    jQuery('ul.brand-category').slideToggle(900);
  });


  jQuery('select').selectBox({
    keepInViewport: false,
    menuSpeed: 'slow',
    mobile: true,
  });


  jQuery(document).on('click', '.left-nav', function (e) {
    e.preventDefault();
    jQuery(this).toggleClass('active');
    jQuery('.left-nav .side-nav').slideToggle();
    jQuery('.investor-left').toggleClass('add-opac');
  });


  /* Bottom Video Slide*/
  jQuery('.video-thumbnail .play-btn').on('click', function (e) {
    e.preventDefault();
    jQuery('body').addClass('pull_bottom');
    jQuery('.overlay_main_sec').addClass('active');
  });
  jQuery('.pop_connect_close').on('click', function () {
    jQuery('body').removeClass('pull_bottom');
    jQuery('.overlay_main_sec').removeClass('active');
  });

	
	/* Flyout Form */
	jQuery('.request_button').on('click', function(e) {
         e.preventDefault();
         jQuery('body').addClass('pull_right');
         jQuery('.connect_overlay_bg').addClass('active');
    
     });
jQuery('.connect_close').on('click', function() {
         jQuery('body').removeClass('pull_right');
         jQuery('.connect_overlay_bg').removeClass('active');
     });
	
	
  jQuery('.skew-list').each(function () {
    jQuery('.skew-grid').on('click', function (e) {
      e.preventDefault();
      jQuery(this).parent(".skew-list").removeClass("minus-active");
      if (jQuery(this).closest(".skew-grid").hasClass("active")) {
        jQuery(".skew-grid").removeClass("active");
      } else {
        jQuery(".skew-grid").removeClass("active");
        jQuery(this).closest(".skew-grid").addClass("active");
      }

		if (jQuery(window).width() >= 1200) {
			jQuery('.skew-grid:first').addClass('active');
      if (jQuery(this).index() >= 3) {
        jQuery(this).parent('.skew-list').addClass('minus-active');
      } else {
        jQuery(this).parent('.skew-list').removeClass('minus-active');
		  
      }
 }
    });
  });


});


/*
jQuery("#datepicker_1,#datepicker_2").datepicker({
  dateFormat: 'dd M yy',
});*/
