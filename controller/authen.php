<?php
session_start();
?>
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
$hashPWD = hash_hmac('md5', $_POST['txt-password'], $salt);
$ip = $_SERVER['REMOTE_ADDR'];

// print $hashPWD;
// exit();
$strSQL = "SELECT * FROM trs3_user a INNER JOIN trs3_userinfo b ON a.username = b.userinfo_username WHERE a.username = ? AND a.password = ? AND a.active_status = ? ";
$result = $db->select($strSQL, array($_POST['txt-username'], $hashPWD, 'Y'));

// print $hashPWD;
if($result){
  $row = $result->fetch();

  $_SESSION[$sprefix.'ID'] = session_id();
  $_SESSION[$sprefix.'Username'] = $row['username'];
  $_SESSION[$sprefix.'Utype'] = $row['usertype_id'];
  session_write_close();

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เข้าใช้งานระบบ', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

  header('Location: redirect.php');
  exit();

}else{

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เข้าใช้งานระบบ', 'Fail', $_POST['txt-username'], $_POST['txt-username']));
  // print $strSQL;
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "บัญชีผู้ใช้ผิดพลาด",
      text: 'กรุณากรอกข้อมูลให้ถูกต้อง!',
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

$db->disconnect();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Co-ed in process...</title>
  </head>
  <body>

  </body>
</html>
