$(function(){
  $('#btnSignout').click(function(){
      window.location = '../signout.php';
  });

  $('#btnSignout_sub').click(function(){
      window.location = '../../signout.php';
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
