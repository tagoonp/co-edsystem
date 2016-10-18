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
$salt = $db->getSaltkey();

$strSQL = "SELECT * FROM trs3_user WHERE username = ? ";
$result_account = $db->select($strSQL, array($_POST['val-username']));

if(!$result_account){

  $strSQL = "SELECT * FROM trs3_user WHERE email = ? ";
  $result_account = $db->select($strSQL, array($_POST['val-email']));

  if(!$result_account){
    $pwd = hash_hmac('md5', $_POST['val-password'], $salt);

    $strSQL = "INSERT INTO trs3_user (username, password, email, usertype_id, active_status, reg_date)
              VALUES (?, ?, ?, ?, ?, ?)";
    $result_insert = $db->insert($strSQL, array($_POST['val-username'], $pwd, $_POST['val-email'], $_POST['val-role'], 'Y', date('Y-m-d')));

    if($result_insert){
      $strSQL = "INSERT INTO trs3_userinfo (userinfo_prefix, userinfo_fname, userinfo_lname, userinfo_phone, userinfo_username)
                VALUES (?, ?, ?, ?, ?)";
      $result_insert2 = $db->insert($strSQL, array($_POST['val-prefix'], $_POST['val-fname'], $_POST['val-lname'], $_POST['val-phone'], $_POST['val-username']));

      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เพิ่มบัญชีผู้ใช้', 'Success', $_SESSION[$sprefix.'Username'], $_POST['val-username']));

      ?>
      <script type="text/javascript">
        swal({
          title: "สร้างบัญชีผู้ใช้เรียบร้อย",
          // text: "ไม่สามารถสร้างบัญชีผู้ได้",
          type: "success",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
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
          text: "ไม่สามารถสร้างบัญชีผู้ได้",
          type: "error",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "ตกลง!",
          closeOnConfirm: false
        }, function(){
          window.history.back();
        });
      </script>
      <?php
    }
  }else{

    $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
    $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เพิ่มบัญชีผู้ใช้', 'Fail', $_SESSION[$sprefix.'Username'], $_POST['val-username']));

    ?>
    <script type="text/javascript">
      swal({
        title: "ไม่สามารถสร้างบัญชีผู้ได้",
        text: "มีอีเมลที่ใช้ในระบบแล้ว!",
        type: "error",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "ตกลง!",
        closeOnConfirm: false
      }, function(){
        window.history.back();
      });
    </script>
    <?php
  }

}else{

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เพิ่มบัญชีผู้ใช้', 'Fail', $_SESSION[$sprefix.'Username'], $_POST['val-username']));

    ?>
    <script type="text/javascript">
      swal({
        title: "ไม่สามารถสร้างบัญชีผู้ได้",
        text: "พบบัญชีผู้ใช้นี้ในระบบแล้ว!",
        type: "error",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "ตกลง!",
        closeOnConfirm: false
      }, function(){
        window.history.back();
      });
    </script>
    <?php
}

?>
