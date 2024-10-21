/**
* Template Name: Yummy - v1.3.0
* Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
document.addEventListener('DOMContentLoaded', () => {
  "use strict";

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Sticky header on scroll
   */
  const selectHeader = document.querySelector('#header');
  if (selectHeader) {
    document.addEventListener('scroll', () => {
      window.scrollY > 100 ? selectHeader.classList.add('sticked') : selectHeader.classList.remove('sticked');
    });
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = document.querySelectorAll('#navbar a');

  function navbarlinksActive() {
    navbarlinks.forEach(navbarlink => {

      if (!navbarlink.hash) return;

      let section = document.querySelector(navbarlink.hash);
      if (!section) return;

      let position = window.scrollY + 200;

      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active');
      } else {
        navbarlink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navbarlinksActive);
  document.addEventListener('scroll', navbarlinksActive);

  /**
   * Mobile nav toggle
   */
  const mobileNavShow = document.querySelector('.mobile-nav-show');
  const mobileNavHide = document.querySelector('.mobile-nav-hide');

  document.querySelectorAll('.mobile-nav-toggle').forEach(el => {
    el.addEventListener('click', function(event) {
      event.preventDefault();
      mobileNavToogle();
    })
  });

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavShow.classList.toggle('d-none');
    mobileNavHide.classList.toggle('d-none');
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navbar a').forEach(navbarlink => {

    if (!navbarlink.hash) return;

    let section = document.querySelector(navbarlink.hash);
    if (!section) return;

    navbarlink.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  const navDropdowns = document.querySelectorAll('.navbar .dropdown > a');

  navDropdowns.forEach(el => {
    el.addEventListener('click', function(event) {
      if (document.querySelector('.mobile-nav-active')) {
        event.preventDefault();
        this.classList.toggle('active');
        this.nextElementSibling.classList.toggle('dropdown-active');

        let dropDownIndicator = this.querySelector('.dropdown-indicator');
        dropDownIndicator.classList.toggle('bi-chevron-up');
        dropDownIndicator.classList.toggle('bi-chevron-down');
      }
    })
  });

  /**
   * Scroll top button
   */
  const scrollTop = document.querySelector('.scroll-top');
  if (scrollTop) {
    const togglescrollTop = function() {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
    window.addEventListener('load', togglescrollTop);
    document.addEventListener('scroll', togglescrollTop);
    scrollTop.addEventListener('click', window.scrollTo({
      top: 0,
      behavior: 'smooth'
    }));
  }

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Initiate pURE cOUNTER
   */
  new PureCounter();

  /**
   * Init swiper slider with 1 slide at once in desktop view
   */
  new Swiper('.slides-1', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });

  /**
   * Init swiper slider with 3 slides at once in desktop view
   */
  new Swiper('.slides-2', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },

      1200: {
        slidesPerView: 3,
      }
    }
  });
/**
   * Init swiper slider with 3 slides at once in desktop view
   */
new Swiper('.slides-3', {
  effect: "cube",
      grabCursor: true,
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      pagination: {
        el: ".swiper-pagination",
      },
});

/**
   * Init swiper slider with 1 slide at once in desktop view
   */
new Swiper('.slides-4', {
  slidesPerView: 1,
      spaceBetween: 30,
      keyboard: {
        enabled: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
});

/**
   * Init swiper slider with 1 slide at once in desktop view
   */
new Swiper('.slides-5', {
  effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
});


/**
   * Init swiper slider with 3 slides at once in desktop view
   */
new Swiper('.slides-6', {
  speed: 600,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false
  },
  slidesPerView: 'auto',
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 40
    },

    1200: {
      slidesPerView: 3,
    }
  }
});



  /**
   * Gallery Slider
   */
  new Swiper('.gallery-slider', {
    speed: 400,
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 20
      },
      640: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      992: {
        slidesPerView: 5,
        spaceBetween: 20
      }
    }
  });

  /**
   * Animation on scroll function and init
   */
  function aos_init() {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', () => {
    aos_init();
  });

});

let heroCarouselIndicators = select("#home-carousel-indicators")
let heroCarouselItems = select('#home-carousel .carousel-item', true)

heroCarouselItems.forEach((item, index) => {
  (index === 0) ?
  heroCarouselIndicators.innerHTML += "<li data-bs-target='#home-carousel' data-bs-slide-to='" + index + "' class='active'></li>":
    heroCarouselIndicators.innerHTML += "<li data-bs-target='#home-carousel' data-bs-slide-to='" + index + "'></li>"
});


(function ($) {
  "use strict";

  /*[ Load page ]
  ===========================================================*/
  $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 1500,
      outDuration: 800,
      linkElement: '.animsition-link',
      loading: true,
      loadingParentElement: 'html',
      loadingClass: 'animsition-loading-1',
      loadingInner: '<div class="loader05"></div>',
      timeout: false,
      timeoutCountdown: 5000,
      onLoadEvent: true,
      browser: [ 'animation-duration', '-webkit-animation-duration'],
      overlay : false,
      overlayClass : 'animsition-overlay-slide',
      overlayParentElement : 'html',
      transition: function(url){ window.location.href = url; }
  });
  
  /*[ Back to top ]
  ===========================================================*/
  var windowH = $(window).height()/2;

  $(window).on('scroll',function(){
      if ($(this).scrollTop() > windowH) {
          $("#myBtn").css('display','flex');
      } else {
          $("#myBtn").css('display','none');
      }
  });

  $('#myBtn').on("click", function(){
      $('html, body').animate({scrollTop: 0}, 300);
  });


  /*==================================================================
  [ Fixed Header ]*/
  var headerDesktop = $('.container-menu-desktop');
  var wrapMenu = $('.wrap-menu-desktop');

  if($('.top-bar').length > 0) {
      var posWrapHeader = $('.top-bar').height();
  }
  else {
      var posWrapHeader = 0;
  }
  

  if($(window).scrollTop() > posWrapHeader) {
      $(headerDesktop).addClass('fix-menu-desktop');
      $(wrapMenu).css('top',0); 
  }  
  else {
      $(headerDesktop).removeClass('fix-menu-desktop');
      $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
  }

  $(window).on('scroll',function(){
      if($(this).scrollTop() > posWrapHeader) {
          $(headerDesktop).addClass('fix-menu-desktop');
          $(wrapMenu).css('top',0); 
      }  
      else {
          $(headerDesktop).removeClass('fix-menu-desktop');
          $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
      } 
  });


  /*==================================================================
  [ Menu mobile ]*/
  $('.btn-show-menu-mobile').on('click', function(){
      $(this).toggleClass('is-active');
      $('.menu-mobile').slideToggle();
  });

  var arrowMainMenu = $('.arrow-main-menu-m');

  for(var i=0; i<arrowMainMenu.length; i++){
      $(arrowMainMenu[i]).on('click', function(){
          $(this).parent().find('.sub-menu-m').slideToggle();
          $(this).toggleClass('turn-arrow-main-menu-m');
      })
  }

  $(window).resize(function(){
      if($(window).width() >= 992){
          if($('.menu-mobile').css('display') == 'block') {
              $('.menu-mobile').css('display','none');
              $('.btn-show-menu-mobile').toggleClass('is-active');
          }

          $('.sub-menu-m').each(function(){
              if($(this).css('display') == 'block') { console.log('hello');
                  $(this).css('display','none');
                  $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
              }
          });
              
      }
  });


  /*==================================================================
  [ Show / hide modal search ]*/
  $('.js-show-modal-search').on('click', function(){
      $('.modal-search-header').addClass('show-modal-search');
      $(this).css('opacity','0');
  });

  $('.js-hide-modal-search').on('click', function(){
      $('.modal-search-header').removeClass('show-modal-search');
      $('.js-show-modal-search').css('opacity','1');
  });

  $('.container-search-header').on('click', function(e){
      e.stopPropagation();
  });


  /*==================================================================
  [ Isotope ]*/
  var $topeContainer = $('.isotope-grid');
  var $filter = $('.filter-tope-group');

  // filter items on button click
  $filter.each(function () {
      $filter.on('click', 'button', function () {
          var filterValue = $(this).attr('data-filter');
          $topeContainer.isotope({filter: filterValue});
      });
      
  });

  // init Isotope
  $(window).on('load', function () {
      var $grid = $topeContainer.each(function () {
          $(this).isotope({
              itemSelector: '.isotope-item',
              layoutMode: 'fitRows',
              percentPosition: true,
              animationEngine : 'best-available',
              masonry: {
                  columnWidth: '.isotope-item'
              }
          });
      });
  });

  var isotopeButton = $('.filter-tope-group button');

  $(isotopeButton).each(function(){
      $(this).on('click', function(){
          for(var i=0; i<isotopeButton.length; i++) {
              $(isotopeButton[i]).removeClass('how-active1');
          }

          $(this).addClass('how-active1');
      });
  });

  /*==================================================================
  [ Filter / Search product ]*/
  $('.js-show-filter').on('click',function(){
      $(this).toggleClass('show-filter');
      $('.panel-filter').slideToggle(400);

      if($('.js-show-search').hasClass('show-search')) {
          $('.js-show-search').removeClass('show-search');
          $('.panel-search').slideUp(400);
      }    
  });

  $('.js-show-search').on('click',function(){
      $(this).toggleClass('show-search');
      $('.panel-search').slideToggle(400);

      if($('.js-show-filter').hasClass('show-filter')) {
          $('.js-show-filter').removeClass('show-filter');
          $('.panel-filter').slideUp(400);
      }    
  });




  /*==================================================================
  [ Cart ]*/
  $('.js-show-cart').on('click',function(){
      $('.js-panel-cart').addClass('show-header-cart');
  });

  $('.js-hide-cart').on('click',function(){
      $('.js-panel-cart').removeClass('show-header-cart');
  });

  /*==================================================================
  [ Cart ]*/
  $('.js-show-sidebar').on('click',function(){
      $('.js-sidebar').addClass('show-sidebar');
  });

  $('.js-hide-sidebar').on('click',function(){
      $('.js-sidebar').removeClass('show-sidebar');
  });

  /*==================================================================
  [ +/- num product ]*/
  $('.btn-num-product-down').on('click', function(){
      var numProduct = Number($(this).next().val());
      if(numProduct > 0) $(this).next().val(numProduct - 1);
  });

  $('.btn-num-product-up').on('click', function(){
      var numProduct = Number($(this).prev().val());
      $(this).prev().val(numProduct + 1);
  });

  /*==================================================================
  [ Rating ]*/
  $('.wrap-rating').each(function(){
      var item = $(this).find('.item-rating');
      var rated = -1;
      var input = $(this).find('input');
      $(input).val(0);

      $(item).on('mouseenter', function(){
          var index = item.index(this);
          var i = 0;
          for(i=0; i<=index; i++) {
              $(item[i]).removeClass('zmdi-star-outline');
              $(item[i]).addClass('zmdi-star');
          }

          for(var j=i; j<item.length; j++) {
              $(item[j]).addClass('zmdi-star-outline');
              $(item[j]).removeClass('zmdi-star');
          }
      });

      $(item).on('click', function(){
          var index = item.index(this);
          rated = index;
          $(input).val(index+1);
      });

      $(this).on('mouseleave', function(){
          var i = 0;
          for(i=0; i<=rated; i++) {
              $(item[i]).removeClass('zmdi-star-outline');
              $(item[i]).addClass('zmdi-star');
          }

          for(var j=i; j<item.length; j++) {
              $(item[j]).addClass('zmdi-star-outline');
              $(item[j]).removeClass('zmdi-star');
          }
      });
  });
  
  /*==================================================================
  [ Show modal1 ]*/
  $('.js-show-modal1').on('click',function(e){
      e.preventDefault();
      $('.js-modal1').addClass('show-modal1');
  });

  $('.js-hide-modal1').on('click',function(){
      $('.js-modal1').removeClass('show-modal1');
  });



})(jQuery);

