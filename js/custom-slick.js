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
      breakpoint: 767,
      settings: {        
        arrows: false,
        dots: true,
      }
    }, ]
  });
  

});
