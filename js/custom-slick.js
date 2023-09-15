jQuery(document).ready(function () {
  

  jQuery('.fnews-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	variableWidth:true,
	  draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [{
      breakpoint: 768,
      settings: {        
        arrows: false,
        dots: true,
      }
    }, ]
  });

  jQuery('.rp-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	variableWidth:true,
	  draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [{
      breakpoint: 768,
      settings: {        
        arrows: false,
        dots: true,
      }
    }, ]
  });
	
  // jQuery('.event-slider').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   infinite: false,
  //   speed: 1000,
  //   dots: false,
  //   arrows: true,
	// variableWidth:true,
	//   draggable: true,
  //   touchThreshold: 200,
  //   swipeToSlide: true,
  //   prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
  //   nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
  //   responsive: [{
  //     breakpoint: 768,
  //     settings: {        
  //       arrows: false,
  //       dots: true,
  //     }
  //   }, ]
  // });


  var dslider = jQuery('.event-slider');
    dslider.slick({
    autoplay: false,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    draggable: true,
    touchThreshold: 200,
    variableWidth:true,
    appendArrows: jQuery('.custom_arrows_default'),
    prevArrow: '<div class="custom_arrow custom_arrow_dir_left"></div>',
    nextArrow: '<div class="custom_arrow custom_arrow_dir_right"></div>',
    appendDots: jQuery('.custom_dots_default'),
    customPaging: function (dslider, i) {
      var thumb = jQuery(dslider.$slides[i]).data();

      return '0' + (i + 1);
    },
    dotsClass: 'custom_dots_list',
  });


  function slideGos(dir) {
    var dslider = jQuery('.event-slider');
    if (dir === "+") {
      dslider.slick('slickNext');
    } else if (dir === "-") {
      dslider.slick('slickPrev');
    }
  }
  jQuery('.career-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	variableWidth:true,
	  draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [{
      breakpoint: 768,
      settings: {        
        arrows: false,
        dots: true,
      }
    }, ]
  });
  jQuery('.video-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	  draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [{
      breakpoint: 1024,
      settings: {        
        arrows: false,
        dots: false,
      }
    }, ]
  });

  

	/* Tiled Module */
	if(jQuery(window).width() <= 1023){
    jQuery('.tiled-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false,
      speed: 1000,
      dots: true,
      arrows: false,
      variableWidth:true,
	  draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    });
  }
	
	/* Larche communities */
	if(jQuery(window).width() <= 1023){
    jQuery('.larche-community-lists').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false,
      speed: 1000,
      dots: true,
      arrows: false,
      variableWidth:true,
	  draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    });
  }
	
  
  if(jQuery(window).width() < 1024){
    jQuery('.directors-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: false,
      speed: 1000,
      dots: true,
      arrows: false,
      variableWidth:true,
    });
  }

  jQuery('.community-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	  variableWidth:true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      },
      {
      breakpoint: 768,
      settings: {       
        slidesToShow: 1,
        slidesToScroll: 1, 
        arrows: false,
        dots: true,
      }
    }, ]
  });
  if(jQuery(window).width() <= 767){
    jQuery(".community-row").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      variableWidth: true,
    })

  }

  jQuery('.resource-slider').on('init', function (event, slick, direction) {
    if (!(jQuery('.resource-slider .slick-slide').length > 4)) {

      jQuery('.slick-arrow').hide();

  }
  });
  
 var sliderRes =  jQuery('.resource-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	  variableWidth:true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      },
      {
      breakpoint: 768,
      settings: {       
        slidesToShow: 1,
        slidesToScroll: 1, 
        arrows: false,
        dots: true,
      }
    }, ]
  });




  jQuery('.testimonial-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
	  variableWidth:true,
    draggable: true,
    touchThreshold: 200,
    swipeToSlide: true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          dots: true,
        }
      },
      {
      breakpoint: 768,
      settings: {   
        slidesToShow: 2,
        slidesToScroll: 1,     
        arrows: false,
        dots: true,
      }
    }, ]
  });

  
});


