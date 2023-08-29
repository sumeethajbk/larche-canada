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


});
