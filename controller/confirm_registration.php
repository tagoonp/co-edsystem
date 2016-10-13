<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Co-ed System : In progress...</title>
  </head>
  <body>
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../ext-lib/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../ext-lib/sweetalert-master/dist/sweetalert.css">
  </body>
</html>
<?php

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_SESSION[$sprefix.'ID'])){

  if($_SESSION[$sprefix.'ID']==session_id()){

    $strSQL = "SELECT * FROM trs3_registration WHERE std_id = ? ";
    $result_account = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

    if($result_account){

      $strSQL = "UPDATE trs3_registration SET confirm_status = 'Y' WHERE std_id = ? ";
      $result_update = $db->update($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ยืนยันการสมัคร', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

      ?>
      <script type="text/javascript">
        swal({
          title: "ยืนยันข้อมูลเรียบร้อย",
          text: 'กด "ตกลง" เพื่อกลับสู่หน้าหลัก!',
          type: "success",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ตกลง",
          closeOnConfirm: false
        }, function(){
          window.history.back();
        });
      </script>
      <?php
    }
  }else{

    $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
    $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ยืนยันการสมัคร', 'Fail', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

    header('Location: ../');
    die();
  }


}else{
  header('Location: ../');
  die();
}
?>
