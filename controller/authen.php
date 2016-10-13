<?php
session_start();

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
  print "N";
  // $strSQL = "INSERT INTO xpl_access_log (ip_address, date_time, username, status) VALUE
  //           (?, ?, ?, ?)";
  // $result = $db->insert($strSQL, array($ip, date('Y-m-d H:i:s'), $_POST['username'], 'fail'));
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
