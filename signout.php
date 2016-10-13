<?php
session_start();

include "xplor-config.php";
include "xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_SESSION[$sprefix.'ID'])){
  if($_SESSION[$sprefix.'ID']==session_id()){
    if(isset($_SESSION[$sprefix.'Username'])){
      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ออกจากระบบ', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));
    }
  }
}

session_destroy();
header('Location: ./');
exit();
?>
