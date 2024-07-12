/****************************** Preloader *********************************/

$(window).on("load" , function () {
  $("#preloader").delay(100).fadeOut("slow");
});

/************************ Back To Top Scroll ***************************/

$(window).scroll(function () {
  if ($(this).scrollTop() > 20) {
    $('#back-to-top').css({
      display: "inline",
    });
  } else {
    $('#back-to-top').css({
      display: "none",
    });
  }
});
jQuery(document).ready(function ($) {
  $('#back-to-top').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 0);
    return false;
  });

});


/************************ Sticky Header ***************************/

$(window).scroll(function(){
  if ($(window).scrollTop() >= 20) {
    $('#header').addClass('fixed-header');
    $('body').addClass('m-top');
  }
  else {
    $('#header').removeClass('fixed-header');
    $('body').removeClass('m-top');
  }
});

/****************************** navbar js *********************************/

jQuery(document).ready(function ($) {
  $(".main-navbar li").each(function () {
    let text = $(this).find("a:eq(0)").text();
    $(this).find("a:eq(0)").empty();
    $(this).find("a:eq(0)").prepend("<span>" + text + "</span>");
    if ($(this).hasClass("menu-item-has-children")) {
      $(this).find("a:eq(0)").addClass("flex");
      $('<i class="ri-arrow-down-s-line"></i>').insertAfter($(this).find("a:eq(0) span"));
    }
  });

  $(".ri-menu-3-line").on("click", () => {
    $(".main-navbar").addClass("show");
    $(".nav-overlay-panel").css({
      "background-color": "rgba(0,0,0,0.5)",
      display: "block",
    });
  });

  $(".ri-close-fill").on("click", () => {
    $(".main-navbar").removeClass("show");
    $(".nav-overlay-panel").css({
      display: "none",
    });
  });

  $(".nav-overlay-panel").on("click", function () {
    $(".main-navbar").removeClass("show");
    $(".nav-overlay-panel").css({
      display: "none",
    });
  });

  $(".sub-menu").parent("li").on("click", function (e) {
    $(this).children("ul").toggle();
    $(this).siblings("li").find("ul").hide();

    e.stopPropagation();
  });

  $(".menu-item-has-children").hover( 
    function () {
      $(this).children("ul").stop(true, true).slideDown();
    },
    function () {
      $(this).children("ul").stop(true, true).slideUp();
    }
    );



  $(".header3_main_navbar li").each(function () {
    let text = $(this).find("a:eq(0)").text();
    $(this).find("a:eq(0)").empty();
    $(this).find("a:eq(0)").prepend("<span>" + text + "</span>");

    if ($(this).hasClass("menu-item-has-children")) {
      $(this).find("a:eq(0)").addClass("flex");
      // $('<i class="ri-arrow-down-s-line"></i>').insertAfter($(this).find("a:eq(0) span"));
    }
  });

  $(".ri-menu-3-line").on("click", () => {
    $(".header3_main_navbar").addClass("show");
    $(".nav-overlay-panel").css({
      "background-color": "rgba(0,0,0,0.5)",
      display: "block",
    });
  });

  $(".ri-close-fill").on("click", () => {
    $(".header3_main_navbar").removeClass("show");
    $(".nav-overlay-panel").css({
      display: "none",
    });
  });

  $(".nav-overlay-panel").on("click", function () {
    $(".header3_main_navbar").removeClass("show");
    $(".nav-overlay-panel").css({
      display: "none",
    });
  });

  $('.hamburger').click(function() {
    $( this ).toggleClass( "active" );
    $('.navigation__background').toggleClass('open_background');
    $('.header3_main_navbar').toggleClass('navbar_open');

    if($('.navigation__background').hasClass('open_background')){
      $('body').css('overflow', 'hidden');
    } else {
      $('body').css('overflow', 'unset');
    }
  });

  $(window).scroll(function(){
    if ($(window).scrollTop() >= 20) {
      $('#header3').addClass('fixed');
    }
    else {
      $('#header3').removeClass('fixed');
    }
  });


  $('.home6_hamburger').on('click',function(){
    $('.home_page_six_right_bg').toggleClass('home_page_six_right_bg_active');
    $('.six_header').toggleClass('six_header_active');
  });

  $('.six_header .ri-close-fill').on('click',function(){
    $('.home_page_six_right_bg').toggleClass('home_page_six_right_bg_active');
    $('.six_header').toggleClass('six_header_active');
  });

});

jQuery(document).ready(function ($) {
  $(".marquee_slider").slick({
    speed: 1000,
    centerPadding: "0px",
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: "linear",
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
  });

  $(".testimonial").slick({
    dots: false,
    infinite: false,
    arrows: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".single_service_slider").slick({
    dots: false,
    infinite: true,
    arrows: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
  });

  $(".case-categories").slick({
    dots: false,
    infinite: false,
    arrows: true,
    variableWidth: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
  });


  $(".Attorneys_slider").slick({
    dots: true,
    infinite: false,
    arrows: false,
    variableWidth: true,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
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


  $('.slider-v3').slick({
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: 1,
    responsive: [
    {
      breakpoint: 768,
      settings: {
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    }
    ]
  });

});

// faq
let questions = document.querySelectorAll(".faq_question");

questions.forEach((question) => {
  let icon = question.querySelector(".icon-shape");

  question.addEventListener("click", (event) => {
    const active = document.querySelector(".faq_question.active");
    const activeIcon = document.querySelector(".icon-shape.active");

    if (active && active !== question) {
      active.classList.toggle("active");
      activeIcon.classList.toggle("active");
      active.nextElementSibling.style.maxHeight = 0;
    }

    question.classList.toggle("active");
    icon.classList.toggle("active");

    const answer = question.nextElementSibling;

    if (question.classList.contains("active")) {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } else {
      answer.style.maxHeight = 0;
    }
  });
});

// video play btn

$('#play-video,.main_video_blog_top #play-video').on('click', function(e){
  e.preventDefault();
  let video_overlay = $(this).parent();  
  video_overlay.find('#video-overlay').addClass('open');
  var link =  video_overlay.find('#video-overlay').data('id');
  video_overlay.find("#video-overlay").append('<iframe width="960" height="450" src="' + link + '" frameborder="0" allowfullscreen></iframe>');
});

$('.video-overlay, .video-overlay-close').on('click', function(e){
  e.preventDefault();
  close_video();
});

$(document).keyup(function(e){
  if(e.keyCode === 27) { close_video(); }
});

function close_video() {
  $('.video-overlay.open').removeClass('open').find('iframe').remove();
};

/* contact page form focus js */

var $inputElement = $('.main_contact_form_design .sub_contact_page_form p .wpcf7-form-control');
var $labelElement = $inputElement.parent().parent().find('label');

$inputElement.on('focus', function(elem) {
  $(this).parent().parent().find('label').css({
    top: '-14px',
    fontSize: '16px',
  });
});

$inputElement.on('blur', function() {
  if (!$(this).val()) {
    $(this).parent().parent().find('label').css({
      top: '0', 
      fontSize: '18px',
    });
  }
});

$inputElement.on('input', function() {
  if ($(this).val()) {
    $(this).parent().parent().find('label').css({
      top: '-14px',
      fontSize: '16px',
    });
  } else {
    $(this).parent().parent().find('label').css({
      top: '0',
      fontSize: '18px', 
    });
  }
});

// horizantal scroll
gsap.registerPlugin(ScrollTrigger);

function setupHorizontalScroll() {
  let horizontalSection = document.querySelector('.horizontal');

  gsap.to('.horizontal', {
    x: () => horizontalSection.scrollWidth * -1,
    xPercent: 100,
    scrollTrigger: {
      trigger: '.horizontal',
      start: 'center center',
      end: '+=2000px',
      pin: '#horizontal-scoll',
      scrub: true,
      invalidateOnRefresh: true
    }
  });
}

function removeHorizontalScroll() {
  ScrollTrigger.getAll().forEach(trigger => {
    trigger.kill(); 
  });
}


function checkScreenWidthAndSetupScroll() {
  if (window.innerWidth >= 600) {
    setupHorizontalScroll();
  } else {
    removeHorizontalScroll();
  }
}

checkScreenWidthAndSetupScroll();

window.addEventListener('resize', () => {
  checkScreenWidthAndSetupScroll();
});


document.addEventListener('DOMContentLoaded', function() {
  const cases = document.querySelectorAll('.sub_our_feature_case');
  const images = document.querySelectorAll('.sub_case_img');

    // Set the first image as active initially
  if (images.length > 0) {
    images[0].classList.add('active');
  }

  cases.forEach(caseElement => {
    caseElement.addEventListener('mouseenter', function() {
            const id = this.id.split('-')[1]; // Extract the ID from the case element's ID
            images.forEach(img => {
              if (img.id === 'img-' + id) {
                img.classList.add('active');
              } else {
                img.classList.remove('active');
              }
            });
          });

    caseElement.addEventListener('mouseleave', function() {
            // Optionally, you can add functionality here to reset to the first image or maintain the current state
    });
  });
});

/************************ Timeline ***************************/
(function () {
  const timeline = document.querySelector(".timeline ol"),
  elH = document.querySelectorAll(".timeline li > .main_timeline-height"),
  arrows = document.querySelectorAll(".timeline .arrows .arrow"),
  arrowPrev = document.querySelector(".timeline .arrows .arrow__prev"),
  arrowNext = document.querySelector(".timeline .arrows .arrow__next"),
  firstItem = document.querySelector(".timeline li:first-child"),
  lastItem = document.querySelector(".timeline li:last-child"),
  xScrolling = 410,
  disabledClass = "disabled";

  window.addEventListener("load", init);

  function init() {
    setEqualHeights(elH);
    animateTl(xScrolling, arrows, timeline);
    setSwipeFn(timeline, arrowPrev, arrowNext);
    setKeyboardFn(arrowPrev, arrowNext);
  }

  function setEqualHeights(el) {
    let counter = 0;
    for (let i = 0; i < el.length; i++) {
      const singleHeight = el[i].offsetHeight;

      if (counter < singleHeight) {
        counter = singleHeight;
      }
    }

    for (let i = 0; i < el.length; i++) {
      el[i].style.height = `${counter}px`;
    }
  }

  function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
  }

  function setBtnState(el, flag = true) {
    if (flag) {
      el.classList.add(disabledClass);
    } else {
      if (el.classList.contains(disabledClass)) {
        el.classList.remove(disabledClass);
      }
      el.disabled = false;
    }
  }

  function animateTl(scrolling, el, tl) {
    let counter = 0;
    for (let i = 0; i < el.length; i++) {
      el[i].addEventListener("click", function () {
        if (!arrowPrev.disabled) {
          arrowPrev.disabled = true;
        }
        if (!arrowNext.disabled) {
          arrowNext.disabled = true;
        }
        const sign = this.classList.contains("arrow__prev") ? "" : "-";
        if (counter === 0) {
          tl.style.transform = `translateX(-${scrolling}px)`;
        } else {
          const tlStyle = getComputedStyle(tl);
          // add more browser prefixes if needed here
          const tlTransform =
          tlStyle.getPropertyValue("-webkit-transform") ||
          tlStyle.getPropertyValue("transform");
          const values =
          parseInt(tlTransform.split(",")[4]) +
          parseInt(`${sign}${scrolling}`);
          tl.style.transform = `translateX(${values}px)`;
        }

        setTimeout(() => {
          isElementInViewport(firstItem)
          ? setBtnState(arrowPrev)
          : setBtnState(arrowPrev, false);
          isElementInViewport(lastItem)
          ? setBtnState(arrowNext)
          : setBtnState(arrowNext, false);
        }, 1100);

        counter++;
      });
    }
  }

  function setSwipeFn(tl, prev, next) {
    if (tl && prev && next) {
      const hammer = new Hammer(tl);
      hammer.on("swipeleft", () => next.click());
      hammer.on("swiperight", () => prev.click());
    }
  }

  function setKeyboardFn(prev, next) {
    document.addEventListener("keydown", (e) => {
      if (e.which === 37 || e.which === 39) {
        const timelineOfTop = timeline.offsetTop;
        const y = window.pageYOffset;
        if (timelineOfTop !== y) {
          window.scrollTo(0, timelineOfTop);
        }
        if (e.which === 37) {
          prev.click();
        } else if (e.which === 39) {
          next.click();
        }
      }
    });
  }
})();

// tabination
jQuery(document).ready(function($) {
  $('.tab-content2').not(':first').hide();

  $('.tab-title:first a').addClass('active');
  $('.tab-content2:first').addClass('active').slideDown();

  $('.tab-title a').click(function(e) {
    e.preventDefault();

    var $this = $(this);
    var tabId = $this.attr('href');

    if ($this.hasClass('active')) {
      return false;
    }

    $('.tab-title a').removeClass('active');
    $('.tab-content2').removeClass('active').slideUp();

    $(this).addClass('active');
    $(tabId).addClass('active').slideDown();
  });
});

jQuery(document).ready(function ($) {
  $('.marquee-container').slick({
    speed: 2000,
    centerPadding: "0px",
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: "linear",
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
  });
});

jQuery(document).ready(function ($) {
  var sliderElements = $('.slider--el');
  var sliderElements2 = $('.slider--el2');

  sliderElements.each(function() {
    var sliderElement = $(this);
    var bgImage = sliderElement.data('bg-image');
    var parts = sliderElement.find('.part');
    parts.each(function() {
      var part = $(this);
      part.css('--bg-image', 'url(' + bgImage + ')');
    });
  });

  sliderElements2.each(function() {
    var sliderElement2 = $(this);
    var bgImage = sliderElement2.data('bg-image');
    var parts = sliderElement2.find('.bg_slider_image');
    parts.each(function() {
      var part = $(this);
      part.css('--bg-image', 'url(' + bgImage + ')');
    });
  });
});


$(document).ready(function() {  
  var sliding = false,
  curSlide = 1,
  numOfSlides = $(".slider--el").length;
  
  $(document).on("click", ".slider--control", function() {
    if (sliding) return;
    sliding = true;
    $(".slider--el").show();
    $(".slider--el").css("top");
    $(".slider--el.active").addClass("removed");
    ($(this).hasClass("right")) ? curSlide++ : curSlide--;
    if (curSlide < 1) curSlide = numOfSlides;
    if (curSlide > numOfSlides) curSlide = 1;
    $(".slider--el-" + curSlide).addClass("next");
    
    setTimeout(function() {
      $(".slider--el.removed").hide();
      $(".slider--el").removeClass("active next removed");
      $(".slider--el-" + curSlide).addClass("active");
      sliding = false;
    }, 1800);
  }); 
});