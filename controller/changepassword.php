<?php session_start(); ?>
<?php

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();
$salt = $db->getSaltkey();

if(isset($_SESSION[$sprefix.'ID'])){

  if($_SESSION[$sprefix.'ID']==session_id()){

    // $hashPWD = hash_hmac('md5', $_POST['oldpwd'], $salt);

    $strSQL = "SELECT * FROM trs3_user a inner join trs3_userinfo b on a.username = b.userinfo_username WHERE a.username = ? AND a.email = ?";
    $result_account = $db->select($strSQL, array($_SESSION[$sprefix.'Username'], $_POST['email']));

    if($result_account){

      $newhashPWD = hash_hmac('md5', $_POST['newpwd'], $salt);

      $strSQL = "UPDATE trs3_user SET password = ? WHERE username = ? ";
      $result_update = $db->update($strSQL, array($newhashPWD, $_SESSION[$sprefix.'Username']));

      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เปลี่ยนรหัสผ่าน', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

      echo 'Y';
      $db->disconnect();
    }else{
      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เปลี่ยนรหัสผ่าน', 'Fail', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

      echo 'ไม่พบข้อมูลผู้ใช้';
      $db->disconnect();
    }
  }else{
    echo 'Session timeout!';
    $db->disconnect();
  }
}else{
  echo 'Session timeout!';
  $db->disconnect();
}
?>
