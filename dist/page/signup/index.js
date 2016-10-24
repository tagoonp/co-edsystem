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

  $('#txt-dob').blur(function(){
    // alert($('#txt-dob').val());
    var res = $('#txt-dob').val().split("-");
    // alert(res[0]);
    var y = (parseInt(res[2]) - 543);
    // alert(y);
    if((res[0]!='__') && (res[1]!='__')  && (res[2]!='____')){
      getAge(res[0], res[1], y);
    }else{
      $('#txt-age').val('') ;
    }

  });
});

function deltemp(url){
  var posting = $.post( url );

  posting.always(function( data ) {
    $('#temp_result').html(data);
  });

  $('#txt-department').val('');
  $('#txt-unit').val('');
}

function getAge(od, om, oy)
 {
	var day = od;
	var month = om;
	var year = oy;
	var d = od;
	var m = om;
	var y = oy;
	var nowdt = new Date();
	var nd = parseInt(nowdt.getDate());
	var nm = parseInt(nowdt.getMonth());
	var ny = parseInt(nowdt.getFullYear());
	// var age = document.frm.age;
	var ageYear = 0;
	var ageMonth = 0;

	if(d != "" && m != "" && y != "")
	{
		s = new Date(y, parseInt(m)-1, d);
		d = parseInt(s.getDate());
		m = parseInt(s.getMonth());
		y = parseInt(s.getFullYear());

		ageYear = ny - y;
		if(nm > m)
		{
			ageMonth = nm - m;
		}else if(nm == m){
			if(nd >= d)
			{
				ageMonth = 0;
			}else{
				ageMonth = 11;
				ageYear = ageYear - 1;
			}
		}else{
			ageMonth = m - nm;
			ageYear = ageYear - 1;
		}
		$('#txt-age').val(ageYear) ;
	}else{
		$('#txt-age').val('') ;
	}

 }
