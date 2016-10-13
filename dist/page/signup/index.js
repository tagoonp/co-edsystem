$(document).ready(function(){
  $cYear = new Date().getFullYear();
  $budYear = $cYear + 543;
  $stdYearStart = $budYear - 2;
  $budYear += 1;

  $('#btnRecommand').trigger('click');
});

$(function(){
  $('#btnSignin').click(function(){
    window.location = 'signin/';
  });
});
