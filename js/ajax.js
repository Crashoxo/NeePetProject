
$('.qa-booking-btn a').on('click', function (e) {
  e.preventDefault();
  var url = this.href;

  $('.qa-booking-btn a.current').removeClass('current');
  $(this).addClass('current');

  $('#container').remove();
  $('#qa-content').load(url + ' #qa-content').hide().fadeIn('slow');
});