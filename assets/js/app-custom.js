function changepage(url){
  window.location = url;
}

function changepage_confirm(url){
  swal({
    title: "Are you sure?",
     text: "You will not be able to recover this imaginary file!",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Yes, delete it!",
     closeOnConfirm: false
   }, function(){
     window.location = url;
   });
}

$(function(){
  $('#tcondition0').click(function(){
    $('#traning-condition').hide();
    $('#txt-contactp').val('');
  });

  $('#tcondition1').click(function(){
    $('#traning-condition').show();
  });

  $('#btnaddrequirement').click(function(){
    if(($('#txt-department').val()=='') || ($('#txt-unit').val()=='')){
      swal('กรุณากรอกสาขา/ตำแหน่ง/แผนก/ฝ่าย และหน่วยงาน/บริษัท/สถานประกอบการ');
      swal("คำเตือน!", "กรุณากรอกสาขา/ตำแหน่ง/แผนก/ฝ่าย และหน่วยงาน/บริษัท/สถานประกอบการ!", "warning");
    }else{
      var posting = $.post( 'controller/temporary_departmant.php', { department: $('#txt-department').val(), unit: $('#txt-unit').val(), std_id: $('#txt-stdid').val() }, function(){});

      posting.always(function( data ) {
        $('#temp_result').html(data);
      });

      $('#txt-department').val('');
      $('#txt-unit').val('');
    }
  });
});
