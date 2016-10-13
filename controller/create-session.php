<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_SESSION[$sprefix.'ID'])){
  if($_SESSION[$sprefix.'ID']==session_id()){
    $strSQL = "SELECT * FROM trs3_user a INNER JOIN trs3_userinfo b ON a.username = b.userinfo_username WHERE a.username = ? AND a.active_status = ? ";
    $result = $db->select($strSQL, array($_SESSION[$sprefix.'Username'], 'Y'));
    if($result){

      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เข้าใช้งานระบบ', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

      $row = $result->fetch();
      switch($row['usertype_id']){
        case "4": header('Location: ../student/'); die(); break;
        default: header('Location: ../'); die();
      }
    }
  }else{

    $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
    $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'เข้าใช้งานระบบ', 'Fail', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

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
