jQuery(function ($) {
  "use strict";

  if (window.console && window.console.warn) {
    var origWarn = window.console.warn;
    window.console.warn = function (msg) {
      if (typeof msg === 'string' && msg.indexOf('JQMIGRATE: Migrate is installed') !== -1) return;
      origWarn.apply(window.console, arguments);
    };
  }

  $('.accordion> .toggle').children('.toggle-content').hide();
  $('.toggle-title').on('click', function (e) {
    e.preventDefault();
    var $this = $(this);
    $this.closest('.accordion').find('.toggle .toggle-title a').removeClass('active');
    var content = $this.next();
    if (content.hasClass('show')) {
      content.removeClass('show').slideUp('easeInExpo');
    } else {
      $this.closest('.accordion').find('.toggle-content').removeClass('show').slideUp('easeInExpo');
      content.addClass('show').slideDown('easeInExpo');
      $this.find('a').addClass('active');
    }
  });

  $('.menu').on('mouseenter', '.mega-menu-item:not(:first-child)', function () {
    $(this).children('a').addClass('highlight-color');
  }).on('mouseleave', '.mega-menu-item:not(:first-child)', function () {
    $(this).children('a').removeClass('highlight-color');
  });

  $('#totop').hide();
  $(window).on("scroll", function () {
    if ($(this).scrollTop() >= 500) {
      $('#totop').fadeIn(200).addClass('top-visible');
    } else {
      $('#totop').fadeOut(200).removeClass('top-visible');
    }
  });
  $('#totop').on("click", function () {
    $('body,html').animate({ scrollTop: 0 }, 500);
    return false;
  });

  $("[data-appear-animation]").each(function () {
    var self = $(this);
    if ($(window).width() > 300) {
      self.html('0');
      self.waypoint(function () {
        if (!self.hasClass('completed')) {
          self.numinate({
            format: '%counter%',
            from: self.data('from'),
            to: self.data('to'),
            runningInterval: 2000,
            stepUnit: self.data('interval'),
            onComplete: function () {
              self.addClass('completed');
            }
          });
        }
      }, { offset: '90%' });
    }
  });

  if (window.innerWidth > 1024 && typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    $(".title").each(function () {
      var title = $(this);
      var lines = title.find(".line");
      if (lines.length) {
        gsap.to(lines, {
          scrollTrigger: { trigger: title[0], start: "top 95%" },
          y: 0, opacity: 1, duration: 2, stagger: 0.3, ease: "expo.out"
        });
        gsap.from(title[0], {
          scrollTrigger: { trigger: title[0], start: "top 95%" },
          y: 0, duration: 0.8, ease: "power3.out"
        });
      }
    });
  }

  if ($.fn.slick) {
    $(".slick_slider").slick({ speed: 1000, infinite: true, arrows: false, dots: false, autoplay: false });
    $('.testimonial-slider').slick({ dots: false, infinite: true, slidesToShow: 4, slidesToScroll: 4, autoplay: true, autoplaySpeed: 3000 });
    $(".slick_slider-clients").slick({ infinite: true, arrows: false, dots: false, autoplay: true, speed: 5000, cssEase: "linear", slidesToShow: 4 });
  }

  $(".side-menu-container").on("click", ".side-menu > a", function (e) {
    e.preventDefault();
    $(".side-overlay").toggleClass("on");
    $("body").toggleClass("on-side");
  });
  $(".side .close-side").on("click", function (e) {
    e.preventDefault();
    $(".side-overlay").removeClass("on");
    $("body").removeClass("on-side");
  });

  $(".floating_btn").on("click", function (e) {
    e.preventDefault();
    $(".floating_menu_content").toggleClass("on");
  });
  $(".floating_menu_content_inner .close_btn").on("click", function (e) {
    e.preventDefault();
    $(".floating_menu_content").removeClass("on");
  });

  $('.btn-show-menu-mobile').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-active');
    $('.menu-mobile').toggleClass('show');
  });
  $(document).on('click', '.menu-mobile a', function () {
    $('.btn-show-menu-mobile').removeClass('is-active');
    $('.menu-mobile').removeClass('show');
  });

  var menu = {
    initialize: function () {
      this.Menuhover();
    },
    Menuhover: function () {
      if (matchMedia('only screen and (max-width: 1200px)').matches) {
        $("a.mega-menu-link").on('click', function (e) {
          var t = $(this);
          var hasSubmenu = t.next('ul').length > 0;
          if (hasSubmenu) {
            e.preventDefault();
            t.toggleClass('active').next('ul').toggleClass('active');
          }
        });
      }
    }
  };
  menu.initialize();

  $(".menu-content").hide();
  $(".menu-toggle").css({ 'transform': 'rotate(0deg)' });
  $(".menu-header").on('click', function () {
    var $this = $(this);
    var $content = $this.next(".menu-content");
    var $arrow = $this.find(".menu-toggle");
    $content.slideToggle("slow");
    var currentRotation = $arrow.css('transform');
    var angle = (currentRotation === 'none' || currentRotation === 'matrix(1, 0, 0, 1, 0, 0)') ? 180 : 0;
    $arrow.css({ 'transform': 'rotate(' + angle + 'deg)' });
  });

  $('.open-sidebar').click(function (e) {
    e.preventDefault();
    $('#top-sidebar').removeClass('hidden').addClass('visible');
  });
  $('.close-sidebar').click(function () {
    $('#top-sidebar').removeClass('visible').addClass('hidden');
  });

  document.documentElement.style.setProperty('color', 'transparent');
  $('#agree-checkbox').change(function () {
    document.documentElement.style.setProperty('color', $(this).is(':checked') ? 'blue' : 'transparent');
  });
  $('#policy-text').click(function () {
    $('#agree-checkbox').prop('checked', function (i, val) { return !val; }).change();
  });

  $('.service-toggle-btn').on('click', function () {
    var $item = $(this).closest('.featured-post-item');
    var $details = $item.find('.service-details');
    var $icon = $(this).find('i');
    $details.slideToggle(200);
    $icon.toggleClass('rotated');
  });

  

  $(window).on("load", function () {
    $(".loader-blob").fadeOut();
    $("#preloader").delay(300).fadeOut("slow", function () {
      $(this).remove();

      if (!document.cookie.includes('cookie_consent=1')) {
        var popup = $('<div id="cookie-popup" style="position:fixed;bottom:0;left:0;width:100%;background:#222;color:#fff;padding:1rem;z-index:9999;display:flex;justify-content:space-between;align-items:center;">' +
          '<span>Цей сайт використовує cookies для покращення роботи. <a href="cookie-policy.html" style="text-decoration:underline;color:#99ccff;">Детальніше</a></span>' +
          '<button id="cookie-accept" style="margin-left:1rem;padding:0.5rem 1rem;background:#007bff;color:#fff;border:none;border-radius:4px;">Прийняти</button>' +
          '</div>');
        $('body').append(popup);
        $('#cookie-accept').on('click', function () {
          var d = new Date();
          d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
          document.cookie = 'cookie_consent=1; expires=' + d.toUTCString() + '; path=/';
          $('#cookie-popup').fadeOut(200, function () { $(this).remove(); });
        });
      }
    });
  });
});
