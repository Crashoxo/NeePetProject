
$(document).on('click', '.user', function () {
    $('.form1').addClass('login-active').removeClass('sign-up-active')
  });
  
  $(document).on('click', '.sign-up-btn', function () {
    $('.form1').addClass('sign-up-active').removeClass('login-active')
  });
  
  $(document).on('click', '.form1-cancel', function () {
    $('.form1').removeClass('login-active').removeClass('sign-up-active')
  });
  
  
  