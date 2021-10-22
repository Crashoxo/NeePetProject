$(document).ready(function () {

  $('#search-icon').click(function () {
    $(this).toggleClass('fa-times');
    $('#search-box').toggleClass('active');
  });

  $('#menu').click(function () {
    $(this).toggleClass('fa-times');
    $('.navbar').toggleClass('nav-toggle');
  });

  $(window).on('scroll load', function () {

    $('#search-icon').removeClass('fa-times');
    $('#search-box').removeClass('active');

    $('#menu').removeClass('fa-times');
    $('.navbar').removeClass('nav-toggle');

    if ($(window).scrollTop() > 0) {
      $('header').addClass('sticky');
    } else {
      $('header').removeClass('sticky');
    }

  });



});




$(document).on('click', '.price-surface-btn', function () {
  $('.price-surface').addClass('surface')
});


$(document).on('click', '.price-surface-cancel', function () {
  $('.price-surface').removeClass('surface')
});










   // 人氣分類滾動視差

  //  var fooReveal = {
  //   delay    : 400,
  //   distance : '90px',
  //   easing   : 'ease-in-out',
  //   rotate   : { z: 90 },
  //   scale    : 1.1
  // };

