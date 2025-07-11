/** ==========================================================================================

  Project :  ailabflow - Responsive Multi-purpose HTML5 Template
  Author :    Preyantechnosys

========================================================================================== */

/** ===============
 .. Back to top 
 .. highlight nav link while hover submenu
 .. Number rotator 
 .. text reveal animation
 .. Accordion
 .. side menu
 .. floating side menu
 .. Preloader
 .. floating_menu
 .. Menu
 .. Basic slick slider
 .. click to check checkbox 
 .. Skillbar
 .. Header dropdown
 .. Slick_slider
 .. highlight nav libk while hover submenu 
 
 =============== */


jQuery(function ($) {

  "use strict";

    
  /*------------------------------------------------------------------------------*/
  /* Accordion
  /*------------------------------------------------------------------------------*/

    var allPanels = $('.accordion> .toggle').children('.toggle-content').hide();

    $('.toggle-title').on('click',function(e) {

        e.preventDefault();
        var $this = $(this);
            $this.parent().parent().find('.toggle .toggle-title a').removeClass('active');

        if ($this.next().hasClass('show')) {

            $this.next().removeClass('show');   
            $this.next().slideUp('easeInExpo');

        } else {
            $this.parent().parent().find('.toggle .toggle-content').removeClass('show');
            $this.parent().parent().find('.toggle .toggle-content').slideUp('easeInExpo');
            $this.next().toggleClass('show');
            $this.next().removeClass('show');
            $this.next().slideToggle('easeInExpo');
           $this.next().parent().children().children().addClass('active');

        }

    });


  /*------------------------------------------------------------------------------*/
  /* highlight nav link while hover submenu 
  /*------------------------------------------------------------------------------*/
  
$(document).ready(function () {
  $('.menu').on('mouseenter', '.mega-menu-item:not(:first-child)', function () {
    $(this).children('a').addClass('highlight-color');
  });

  $('.menu').on('mouseleave', '.mega-menu-item:not(:first-child)', function () {
    $(this).children('a').removeClass('highlight-color');
  });
});



  /*------------------------------------------------------------------------------*/
  /* Back to top
  /*------------------------------------------------------------------------------*/

  // ===== Scroll to Top ==== 
  jQuery('#totop').hide();

  $(window).on("scroll", function () {
    if (jQuery(this).scrollTop() >= 500) {        // If page is scrolled more than 50px
      jQuery('#totop').fadeIn(200);    // Fade in the arrow
      jQuery('#totop').addClass('top-visible');
    } else {
      jQuery('#totop').fadeOut(200);   // Else fade out the arrow
      jQuery('#totop').removeClass('top-visible');
    }
  });

  jQuery('#totop').on("click", function () {      // When arrow is clicked
    jQuery('body,html').animate({
      scrollTop: 0                       // Scroll to top of body
    }, 500);
    return false;
  });


  /*------------------------------------------------------------------------------*/
  /* Animation on scroll: Number rotator
  /*------------------------------------------------------------------------------*/

  $("[data-appear-animation]").each(function () {
    var self = $(this);
    var animation = self.data("appear-animation");
    var delay = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);

    if ($(window).width() > 300) {
      self.html('0');
      self.waypoint(function (direction) {
        if (!self.hasClass('completed')) {
          var from = self.data('from');
          var to = self.data('to');
          var interval = self.data('interval');
          self.numinate({
            format: '%counter%',
            from: from,
            to: to,
            runningInterval: 2000,
            stepUnit: interval,
            onComplete: function (elem) {
              self.addClass('completed');
            }
          });
        }
      }, { offset: '90%' });
    } else {
      if (animation == 'animateWidth') {
        self.css('width', self.data("width"));
      }
    }
  });


/*------------------------------------------------------------------------------*/
/*  text reveal animation
/*------------------------------------------------------------------------------*/

    // Check if the screen width is 1024px or less
    if (window.innerWidth > 1024) {
        $(".title").each(function () {
            const title = $(this);
            const lines = title.find(".line");

            // Animate lines
            gsap.to(lines, {
                scrollTrigger: {
                    trigger: title[0],
                    start: "top 95%",
                    toggleActions: "restart restart restart restart"
                },
                y: 0,
                opacity: 1,
                duration: 2,
                stagger: 0.3,
                ease: "expo.out"
            });

            // Animate title container
            gsap.from(title[0], {
                scrollTrigger: {
                    trigger: title[0],
                    start: "top 95%",
                    toggleActions: "restart restart restart restart"
                },
                y: 0,
                duration: 0.8,
                ease: "power3.out"
            });
        });
    }


 /*------------------------------------------------------------------------------*/
  /* Basic slick slider
  /*------------------------------------------------------------------------------*/

  $(".slick_slider").slick({
    speed: 1000,
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: false,
    centerMode: false,

    responsive: [{

      breakpoint: 1360,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 680,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  $('.testimonial-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 3000,
    centerMode: false,
    focusOnSelect: false,
    arrows: false,
    responsive: [
      {
        breakpoint: 1501,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 645,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });


  /*------------------------------------------------------------------------------*/
  /*side menu
  /*------------------------------------------------------------------------------*/

  /* side-menu */
  $(".side-menu-container").each(function () {
    $(".side-menu > a", this).on("click", function (e) {
      e.preventDefault();
      $(".side-overlay").toggleClass("on");
      $("body").toggleClass("on-side");
    });
  });
  $(".side .close-side").on("click", function (e) {
    e.preventDefault();
    $(".side-overlay").removeClass("on");
    $("body").removeClass("on-side");
  });


  /*------------------------------------------------------------------------------*/
  /* Preloader
  /*------------------------------------------------------------------------------*/
  // makes sure the whole site is loaded
  $(window).on("load", function () {
    $(".loader-blob").fadeOut(), $("#preloader").delay(300).fadeOut("slow", function () { $(this).remove() });

  })

  /*------------------------------------------------------------------------------*/
  /* floating_menu
  /*------------------------------------------------------------------------------*/

  $(".floating_menu").each(function () {
    $(".floating_btn", this).on("click", function (e) {
      e.preventDefault();
      $(".floating_menu_content").toggleClass("on");
    });

    $(".floating_menu_content_inner .close_btn").on("click", function (e) {
      e.preventDefault();
      $(".floating_menu_content").removeClass("on");
    });
  });


  /*------------------------------------------------------------------------------*/
  /* Menu
  /*------------------------------------------------------------------------------*/

  var menu = {
    initialize: function() {
        this.Menuhover();
    },

    Menuhover : function(){
        var getNav = $("nav.main-menu"),
            getWindow = $(window).width(),
            getHeight = $(window).height(),
            getIn = getNav.find("ul.menu").data("in"),
            getOut = getNav.find("ul.menu").data("out");
        
        if ( matchMedia( 'only screen and (max-width: 1200px)' ).matches ) {
                                                 
            // Enable click event
            $("nav.main-menu ul.menu").each(function(){
                
                // Dropdown Fade Toggle
                $("a.mega-menu-link", this).on('click', function (e) {
                    var t = $(this);
                    var hasSubmenu = t.next('ul').length > 0;
                    
                    if (hasSubmenu) {
                        e.preventDefault();
                        t.toggleClass('active').next('ul').toggleClass('active');
                    }
                });   

                // Megamenu style
                $(".megamenu-fw", this).each(function(){
                    $(".col-menu", this).each(function(){
                        $(".title", this).off("click");
                        $(".title", this).on("click", function(){
                            $(this).closest(".col-menu").find(".content").stop().toggleClass('active');
                            $(this).closest(".col-menu").toggleClass("active");
                            return false;
                            e.preventDefault();
                            
                        });

                    });
                });  
                
            }); 
        }
    },
};


$('.btn-show-menu-mobile').on('click', function(e){
    $(this).toggleClass('is-active'); 
    $('.menu-mobile').toggleClass('show'); 
    e.preventDefault();
    return false;
});

// Close mobile menu when clicking on a link
$(document).on('click', '.menu-mobile a', function(e){
    $('.btn-show-menu-mobile').removeClass('is-active'); 
    $('.menu-mobile').removeClass('show'); 
});

// Initialize
$(document).ready(function(){
    menu.initialize();

});

  var $bannerSlider = jQuery('.banner_slider');
  var $bannerFirstSlide = $('div.slide:first-child');

  $bannerSlider.on('init', function (e, slick) {
    var $firstAnimatingElements = $bannerFirstSlide.find('[data-animation]');
    slideanimate($firstAnimatingElements);
  });
  $bannerSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
    var $animatingElements = $('div.slick-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
    slideanimate($animatingElements);
  });
  $bannerSlider.slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    dots: false,
    swipe: true,
    adaptiveHeight: true,
    responsive: [

      {
        breakpoint: 1200,
        settings: {
          arrows: false
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          autoplay: false,
          autoplaySpeed: 4000,
          swipe: true
        }
      }]
  });

  function slideanimate(elements) {
    var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    elements.each(function () {
      var $this = $(this);
      var $animationDelay = $this.data('delay');
      var $animationType = 'animated ' + $this.data('animation');
      $this.css({
        'animation-delay': $animationDelay,
        '-webkit-animation-delay': $animationDelay
      });

      $this.addClass($animationType).one(animationEndEvents, function () {
        $this.removeClass($animationType);
      });
    });
  }


  /*------------------------------------------------------------------------------*/
  /* Skillbar (progressbar)
  /*------------------------------------------------------------------------------*/

  $('.prt-progress-bar').each(function () {
    $(this).find('.progress-bar').width(0);
  });

  $('.prt-progress-bar').each(function () {

    $(this).find('.progress-bar').animate({
      width: $(this).attr('data-percent')
    }, 2000);
  });


  // Part of the code responsible for loading percentages:

  $('.progress-bar-percent[data-percentage]').each(function () {

    var progress = $(this);
    var percentage = Math.ceil($(this).attr('data-percentage'));

    $({ countNum: 0 }).animate({ countNum: percentage }, {
      duration: 2000,
      easing: 'linear',
      step: function () {
        // What todo on every count
        var pct = '';
        if (percentage === "0") {
          pct = Math.floor(this.countNum) + '%';
        } else {
          pct = Math.floor(this.countNum + 1) + '%';
        }
        progress.text(pct);
      }
    });
  });


  jQuery(".prt-circle-box").each(function () {

    var circle_box = jQuery(this);
    var fill_val = circle_box.data("fill");
    var emptyFill_val = circle_box.data("emptyfill");
    var thickness_val = circle_box.data("thickness");
    var linecap_val = circle_box.data("linecap")
    var fill_gradient = circle_box.data("gradient");
    var startangle_val = (-Math.PI / 4) * 1.5;
    if (fill_gradient != "") {
      fill_gradient = fill_gradient.split("|");
      fill_val = { gradient: [fill_gradient[0], fill_gradient[1]] };
    }
    if (typeof jQuery.fn.circleProgress == "function") {
      var digit = circle_box.data("digit");
      var before = circle_box.data("before");
      var after = circle_box.data("after");
      var digit = Number(digit);
      var short_digit = digit / 100;
      var size_val = circle_box.data("size");
      jQuery(".prt-circle", circle_box)
        .circleProgress({
          value: 0, duration: 8000, size: size_val, startAngle: startangle_val,
          thickness: thickness_val, linecap: linecap_val, emptyFill: emptyFill_val, fill: fill_val
        })
        .on("circle-animation-progress", function (event, progress, stepValue) {

          circle_box.find(".prt-fid-number").html(before + Math.round(stepValue * 100) + after);
        });
    }
    circle_box.waypoint(
      function (direction) {

        if (!circle_box.hasClass("completed")) {
          if (typeof jQuery.fn.circleProgress == "function") {
            jQuery(".prt-circle", circle_box).circleProgress({ value: short_digit });
          }
          circle_box.addClass("completed");
        }
      },
      { offset: "90%" }
    );
  });


  jQuery(document).ready(function ($) { aqovo_logMarginPadding_content(); });
  function aqovo_logMarginPadding_content() {
    jQuery(".prt-expandcontent-yes").each(function () {
      var prt_column_div = '';
      var scrren_size = jQuery(window).width();
      var box_size = jQuery(this).parent().width();
      var extra_size = (scrren_size - box_size) / 3;

      if (jQuery(this).hasClass('prt-right-span')) {
        prt_column_div = ', .prt-expandcontent_column > .prt-expandcontent_wrapper ';
        jQuery('.prt-expandcontent_column > div' + prt_column_div, jQuery(this)).css('margin-right', '-' + extra_size + 'px');
      } else if (jQuery(this).hasClass('prt-left-span')) {
        prt_column_div = ', .prt-expandcontent_column > .prt-expandcontent_wrapper ';
        jQuery('.prt-expandcontent_column > div' + prt_column_div, jQuery(this)).css('margin-left', '-' + extra_size + 'px');
      }

    });
  } jQuery(window).resize(function () { aqovo_logMarginPadding_content(); });


  /*------------------------------------------------------------------------------*/
  /* Header dropdown
  /*------------------------------------------------------------------------------*/


  $(document).ready(function () {

    $(".menu-content").hide();
    $(".menu-toggle").css({ 'transform': 'rotate(0deg)' });
    $(".menu-header").on('click',function () {
      var $this = $(this);
      var $content = $this.next(".menu-content");
      var $arrow = $this.find(".menu-toggle");

      $content.slideToggle("slow");

      var currentRotation = $arrow.css('transform');
      var rotationAngle = currentRotation === 'none' || currentRotation === 'matrix(1, 0, 0, 1, 0, 0)' ? 180 : 0;

      $arrow.css({
        'transform': 'rotate(' + rotationAngle + 'deg)'
      });
    });
  });

  $(document).ready(function () {
    $(".mobile-nav-toggle").click(function () {
      var $contentNav = $(".mobile-menu");

      // Toggle the visibility of the menu
      if ($contentNav.css('display') === 'none') {
        $contentNav.css('display', 'block');
      } else {
        $contentNav.css('display', 'none');
      }
    });
  });

  /*------------------------------------------------------------------------------*/
  /* Slick_slider
  /*------------------------------------------------------------------------------*/

  /*-----------------------------------------------------------------------------*/
  /* Slick_slider-clients
  /*------------------------------------------------------------------------------*/
  $(".slick_slider-clients").slick({
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: true,
    centerMode: false,
    autoplaySpeed: 0,
    speed: 5000,
    cssEase: "linear",
    pauseOnHover: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    centerPadding: '30px',

    responsive: [{

      breakpoint: 1360,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 3
      }
    },
    {

      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {

      breakpoint: 680,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  $(".slick_slider_rtl").slick({
    infinite: true,
    arrows: false,
    dots: false,
    autoplay: true,
    centerMode: false,
    rtl: true,
    autoplaySpeed: 0,
    speed: 5000,
    cssEase: "linear",
    pauseOnHover: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    centerPadding: '30px',

    responsive: [{

      breakpoint: 1860,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {

      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {

      breakpoint: 680,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });

  // slick_slider_center


  $('.slick_slider_center').slick({
    centerMode: true,
    arrows: true,
    autoplay: true,
    slidesToShow: 5,
    responsive: [
      {
        breakpoint: 1870,
        settings: {
          arrows: false,
          autoplay: true,
          centerMode: true,
          slidesToShow: 5
        }
      },
      {
        breakpoint: 992,
        settings: {
          arrows: false,
          autoplay: true,
          centerMode: true,
          slidesToShow: 3
        }
      },
      {
        breakpoint: 481,
        settings: {
          arrows: false,
          autoplay: true,
          centerMode: true,
          slidesToShow: 1
        }
      }
    ]
  });
  /*------------------------------------------------------------------------------*/
  /*  testimonial vertical slider
  /*------------------------------------------------------------------------------*/
  $('.vertical_slider.testimonial').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    vertical: true,
    verticalSwiping: true
  });


  /*------------------------------------------------------------------------------*/
  /*top-sidebar */
  /*------------------------------------------------------------------------------*/

  // Open the sidebar when the search icon is clicked
  $('.open-sidebar').click(function (e) {
    e.preventDefault(); // Prevent default link behavior
    $('#top-sidebar').removeClass('hidden').addClass('visible'); // Remove hidden class, add visible class
  });

  // Close the sidebar when the close button is clicked
  $('.close-sidebar').click(function () {
    $('#top-sidebar').removeClass('visible').addClass('hidden'); // Remove visible class, add hidden class
  });


  /*------------------------------------------------------------------------------*/
  /*click to check checkbox */
  /*------------------------------------------------------------------------------*/

  $(document).ready(function () {

    document.documentElement.style.setProperty('color', 'transparent');


    $('#agree-checkbox').change(function () {
      if ($(this).is(':checked')) {

        document.documentElement.style.setProperty('color', 'blue');
      } else {

        document.documentElement.style.setProperty('color', 'transparent');
      }
    });


    $('#policy-text').click(function () {
      $('#agree-checkbox').prop('checked', function (i, val) {
        return !val;
      }).change();
    });
  });

  





});



