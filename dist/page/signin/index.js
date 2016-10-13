$(document).ready(function(){
  $cYear = new Date().getFullYear();
  $budYear = $cYear + 543;
  $stdYearStart = $budYear - 2;
  $budYear += 1;
});

$(function(){
  $('#btnSignup').click(function(){
      window.location = '../';
  });
});
