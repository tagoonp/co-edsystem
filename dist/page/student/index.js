$(document).ready(function(){
  $cYear = new Date().getFullYear();
  $budYear = $cYear + 543;
  $stdYearStart = $budYear - 2;
  $budYear += 1;

  // $('#btnRecommand').trigger('click');
});

$(function(){
  $('#btnSignout').click(function(){
      window.location = '../signout.php';
  });

  $('#btnSignout_sub').click(function(){
      window.location = '../../signout.php';
  });

  $('.changepwdform').submit(function(){
    if(($('#register2-email').val()!='')  && ($('#register2-password2').val()!='') && ($('#register2-password3').val()!='')){
      var jqxhr = $.post( "../../controller/changepassword.php", { email: $('#register2-email').val(), newpwd:$('#register2-password2').val(), newpwd2: $('#register2-password3').val()});
      jqxhr.always(function(data){
        if(data=='Y'){
          swal({
            title: "เปลี่ยนรหัสผ่านเรียบร้อย",
            text: 'กด "ตกลง" เพื่อกลับสู่หน้าหลัก!',
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ตกลง",
            closeOnConfirm: false
          }, function(){
            window.location = '../../student/';
          });
        }else if(data=='Session timeout!'){
          swal({
            title: "Session timeout!",
            text: "กรุณาลองใหม่!",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
          }, function(){
            window.location = '../../signout.php';
          });
        }else{
          swal({
            title: "เกิดข้อผิดพลาด!",
            text: "ข้อมูลไม่ถูกต้อง!",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "ตกลง!",
            closeOnConfirm: false
          }, function(){
            window.location = '../../student/';
          });
        }
      });
    }
  });
});

function redirect(url){
  window.location = url;
}

function redirect_conf(url){
  swal({   title: "คุณแน่ใจหรือไม่?",   text: "รายการนี้จะไม่สามารถกู้คืนได้หลังลบข้อมูลแล้ว!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ตกลง!",   cancelButtonText: "ยกเลิก!",   closeOnConfirm: false }, function(){ window.location = url; });
}

function redirect_conf_del(url){
  swal({   title: "คุณแน่ใจหรือไม่?",   text: "รายการนี้จะไม่สามารถกู้คืนได้หลังลบข้อมูลแล้ว และคุณต้องทำการเพิ่มข้อมูลใหม่ทั้งหมด!",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ตกลง!",   cancelButtonText: "ยกเลิก!",   closeOnConfirm: false }, function(){ window.location = url; });
}

function redirect_conf_confirm(url){
  swal({   title: "คุณแน่ใจหรือไม่?",   text: "เมื่อคุณยืนยันแล้ว การแจ้งสมัครฝึกงานจะไม่สามารถแก้ไขได้อีกจนกว่าจะมีผลตอบรับจากอาจารย์ที่ปรึกษารายวิชาฝึกงาน",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ตกลง!",   cancelButtonText: "ยกเลิก!",   closeOnConfirm: false }, function(){ window.location = url; });
}
