$(document).ready(function () {

  $('#search-icon').click(function () {
    $(this).toggleClass('fa-times');
    $('#search-box').toggleClass('active');
  });

  $('#menu').click(function () {
    $(this).toggleClass('fa-times');
    $('.nav-bar').toggleClass('nav-toggle');
  });

  $(window).on('scroll load', function () {

    $('#search-icon').removeClass('fa-times');
    $('#search-box').removeClass('active');

    $('#menu').removeClass('fa-times');
    $('.nav-bar').removeClass('nav-toggle');

    if ($(window).scrollTop() > 0) {
      $('.header-navbar').addClass('sticky');
    } else {
      $('.header-navbar').removeClass('sticky');
    }

  });



});




$(document).on('click', '.price-surface-btn', function () {
  $('.price-surface').addClass('surface')
});

$(document).on('click', '.price-surface-cancel', function () {
  $('.price-surface').removeClass('surface')
});

  



$(document).on('click', '.click-btn-booking', function () {
  $('.price-surface1').addClass('surface')
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


// =======================================================
let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
  searchForm.classList.toggle('active');
  shoppingCart.classList.remove('active');
  loginForm.classList.remove('active');
  navbar.classList.remove('active');
}

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () => {
  shoppingCart.classList.toggle('active');
  searchForm.classList.remove('active');
  loginForm.classList.remove('active');
  navbar.classList.remove('active');
}

let loginForm = document.querySelector('.btn-login-form');

document.querySelector('#login-btn').onclick = () => {
  loginForm.classList.toggle('active');
  searchForm.classList.remove('active');
  shoppingCart.classList.remove('active');
  navbar.classList.remove('active');
}

let navbar = document.querySelector('.nav-bar');

document.querySelector('#menu-btn').onclick = () => {
  navbar.classList.toggle('active');
  searchForm.classList.remove('active');
  shoppingCart.classList.remove('active');
  loginForm.classList.remove('active');
}

window.onscroll = () => {
  searchForm.classList.remove('active');
  shoppingCart.classList.remove('active');
  loginForm.classList.remove('active');
  navbar.classList.remove('active');
}

