<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_SESSION[$sprefix.'ID'])){
  if($_SESSION[$sprefix.'ID']==session_id()){
    if(isset($_SESSION[$sprefix.'Username'])){
      $strSQL = "DELETE FROM trs3_registration WHERE std_id = ? ";
      $result = $db->delete($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "DELETE FROM trs3_questioniar WHERE qn_studentid = ? ";
      $result = $db->delete($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "DELETE FROM trs3_department_temporary WHERE tmp_std_id = ? ";
      $result = $db->delete($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "DELETE FROM trs3_department WHERE tmp_std_id = ? ";
      $result = $db->delete($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "DELETE FROM trs3_userinfo WHERE userinfo_username = ? ";
      $result = $db->delete($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "DELETE FROM trs3_user WHERE username = ? ";
      $result = $db->delete($strSQL, array($_SESSION[$sprefix.'Username']));

      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ลบรายการสมัคร', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

      header('Location: ../');
      die();

    }else{
      header('Location: ../');
      die();
    }

  }else{
    header('Location: ../');
    die();
  }
}else{
  header('Location: ../');
  die();
}

session_destroy();
$db->disconnect();




?>
