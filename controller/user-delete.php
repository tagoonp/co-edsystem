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

if(isset($_GET['username'])){
  $strSQL = "DELETE FROM trs3_user WHERE username = ? ";
  $result_account_delete = $db->select($strSQL, array($_GET['username']));

  $strSQL = "DELETE FROM trs3_userinfo WHERE userinfo_username = ? ";
  $result_accountinfo_delete = $db->select($strSQL, array($_GET['username']));

  $strSQL = "UPDATE trs3_questioniar SET 	qn_adviceby = ? WHERE qn_adviceby = ?";
  $result_accountinfo_delete = $db->select($strSQL, array($_SESSION[$sprefix.'Username']."-del-".date('Y-m-d'), $_SESSION[$sprefix.'Username']));

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ลบบัญชีผู้ใช้', 'Success', $_SESSION[$sprefix.'Username'], $_GET['username']));
  ?>
  <script type="text/javascript">
    swal({
      title: "ลบข้อมูลเรียบร้อย",
      // text: "ไม่สามารถลบบัญชีผู้ใช้ได้",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "rgb(193, 33, 100)",
      confirmButtonText: "ตกลง!",
      closeOnConfirm: false
    }, function(){
      window.location = '../administrator/useraccount/';
    });
  </script>
  <?php

}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "เกิดข้อผิดพลาด",
      text: "ไม่สามารถลบบัญชีผู้ใช้ได้",
      type: "error",
      showCancelButton: false,
      confirmButtonColor: "rgb(193, 33, 100)",
      confirmButtonText: "ตกลง!",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
}
?>
