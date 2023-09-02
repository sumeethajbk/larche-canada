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


  /* Menu */

  if (jQuery(window).width() <= 1023) {
    jQuery('.toggle_button').on("click", function (event) {
      event.preventDefault();
      jQuery(this).toggleClass("active");
      jQuery(".mobile_menu").toggleClass("navOpen");
      jQuery(".main_header").toggleClass("menu-open");
    });

    jQuery("ul.main_menu > li.menu-item-has-children > a").on("click", function (event) {
      event.preventDefault();
      jQuery('ul.main_menu > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
      jQuery(this).toggleClass("active");
      jQuery(this).siblings('ul.sub-menu').slideToggle('900');
      var topParent = jQuery(this).parents('ul.main_menu > li').attr('id');
      var topChildParent = jQuery(this).parent('li').attr('id');
      jQuery('ul.main_menu ul.sub-menu').each(function () {
        if (jQuery(this).parents('ul.main_menu > li').attr('id') !== topParent) {
          jQuery(this).slideUp('700');
        } else {
          if (jQuery(this).find('li.menu-item-has-children').length) {
            getChild(jQuery(this).find('li.menu-item-has-children'), topChildParent);
          }
        }
      });
    });

    function getChild(obj, topChildParent) {
      obj.each(function () {
        if (jQuery(this).attr('id') !== topChildParent) {
          jQuery(this).find('ul.sub-menu').slideUp('700');
        }
      });
    }
  }

  if (jQuery(window).width() <= 767) {
    jQuery(".footer-menu .menu-list > li > a").on("click", function (event) {
      event.preventDefault();
      jQuery('.menu-list > li > a').not(jQuery(this)).removeClass('active');
      jQuery(this).toggleClass("active");
      jQuery(this).siblings('ul').slideToggle('1500');
      var topParent = jQuery(this).parents('.menu-list > li > a').attr('id');
      var topChildParent = jQuery(this).parent('li').attr('id');
      jQuery('.menu-list').each(function () {
        if (jQuery(this).parents('.menu-list > li > a').attr('id') !== topParent) {
          jQuery(this).slideUp('1500');
        } else {
          if (jQuery(this).find('li.menu-item-has-children').length) {
            getChild(jQuery(this).find('li.menu-item-has-children'), topChildParent);
          }
        }
      });
    });
  }

  function getChild(obj, topChildParent) {
    obj.each(function () {
      if (jQuery(this).attr('id') !== topChildParent) {
        jQuery(this).find('ul').slideUp('1500');
      }
    });
  }


  


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




  jQuery('select').selectBox({
    keepInViewport: false,
    menuSpeed: 'slow',
    mobile: true,
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

 
  jQuery(".directors-name").on('click', function (e) {
    e.preventDefault();
    jQuery(this).parents().siblings('.directors-item').find(".directors-name").removeClass("active");
    jQuery(this).toggleClass("active");
    jQuery(this).parents().siblings('.directors-item').find(".directors-details").removeClass("expand");
    jQuery(this).parent('.directors-details').toggleClass("expand");   

  });

});
