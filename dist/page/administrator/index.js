$(function(){
  $('#btnSignout').click(function(){
      window.location = '../signout.php';
  });

  $('#btnSignout_sub').click(function(){
      window.location = '../../signout.php';
  });

  $('#txt-response').focus(function(){
    $('#a').removeClass('has-error');
  });

  $('.responseForm').submit(function(){
    $check = 'Waiting';
    $check = $("input[name='radio-group5']:checked").val();
    $('#a').removeClass('has-error');
    if($check=='Waiting'){
      swal("ไม่สามารถดำเนินการได้!", "กรุณาเลือกความเห็นของอาจารย์ผู้รับผิดชอบ!", "warning");
      return false;
    }else{
      if($check=='Otheragree'){
        if($('#txt-response').val()==''){
          $('#a').addClass('has-error');
          swal("ไม่สามารถดำเนินการได้!", "กรุณากรอกความเห็นเพิ่มเติม!", "warning");
          return false;
        }else{
          return true;
        }
      }else{
        return true;
      }
    }


  });
});

function redirect(url){
  window.location = url;
}

function redirect_conf(url){
  swal({   title: "คุณแน่ใจหรือไม่?",   text: "รายการนี้จะไม่สามารถกู้คืนได้หลังลบข้อมูลแล้ว!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ตกลง!",   cancelButtonText: "ยกเลิก!",   closeOnConfirm: false }, function(){ window.location = url; });
}

function redirect_conf3(url){
  swal({   title: "ยืนยันการแก้ไขสถานะ?",   text: "คุณยืนยันที่จะปรับแก้สถานะการใช้งานบัญชีผู้ใช้หรือไม่!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ตกลง!",   cancelButtonText: "ยกเลิก!",   closeOnConfirm: false }, function(){ window.location = url; });
}
