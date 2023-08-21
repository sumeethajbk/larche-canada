jQuery(document).ready(function () {
  /* Career Slider */
  jQuery('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    dots: false,
    asNavFor: '.slider-nav',
  });
  jQuery('.slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow flex flex-center"></span>',
    responsive: [

      {
        breakpoint: 1024,
        settings: {
          arrows: false,
        }
      },

    ]
  });

  /* Default Slider */
  jQuery('.default-slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    dots: false,
    asNavFor: '.default-slider-nav',
  });
  jQuery('.default-slider-nav').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.default-slider-for',
    dots: true,
    arrows: false,

  });


  /* Succes Slider */
  jQuery('.success-slider-nav').slick({
    slidesToShow: 1,
    arrows: false,
    fade: true,
    asNavFor: '.success-slider-for',
    responsive: [

      {
        breakpoint: 1024,
        settings: {
          dots: true,
        }
      },

    ]
  });
  jQuery('.success-slider-for').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.success-slider-nav',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    variableWidth: true,
    responsive: [

      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },

    ]
  });


  jQuery('.home-featured-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    speed: 1000,
    dots: false,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-regular fa-angle-left flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-regular fa-angle-right flex flex-center"></span>',
    responsive: [{
      breakpoint: 767,
      settings: {
        infinite: true,
        autoplay: false,
        autoplaySpeed: 1000,
        arrows: false,
        dots: true,
      }
    }, ]
  });
  jQuery('.featured-videos-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-regular fa-angle-left flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-regular fa-angle-right flex flex-center"></span>',
    responsive: [{
        breakpoint: 1299,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: false,
          dots: true,
        }
      },
    ]
  });

  jQuery('.department-staff-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-regular fa-angle-left flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-regular fa-angle-right flex flex-center"></span>',
    responsive: [{
        breakpoint: 1299,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 1023,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: false,
          dots: true,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: false,
          dots: true,
        }
      },
    ]
  });

  jQuery('.gallery-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    speed: 1000,
    dots: false,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-regular fa-angle-left flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-regular fa-angle-right flex flex-center"></span>',
    responsive: [{
        breakpoint: 1299,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          autoplay: false,
          autoplaySpeed: 1000,
          arrows: false,
          dots: true,
        }
      },
    ]
  });


  jQuery('.media-news-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    variableWidth: true,
    speed: 1000,
    dots: false,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-regular fa-angle-left flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-regular fa-angle-right flex flex-center"></span>',

  });

  jQuery('.team-members-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    variableWidth: true,
    speed: 1000,
    dots: false,
    arrows: true,
    prevArrow: '<span class="slick-arrow prev-arrow fa-regular fa-angle-left flex flex-center"></span>',
    nextArrow: '<span class="slick-arrow next-arrow fa-regular fa-angle-right flex flex-center"></span>',

  });


  jQuery('.full_slider').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
	  fade:true,
  });


});
