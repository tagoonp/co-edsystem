<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_SESSION[$sprefix.'Username'])){
  switch($_SESSION[$sprefix.'Utype']){
    case '1': header('Location: ../administrator/'); break;
    case '2': header('Location: ../viewer/'); break;
    case '4': header('Location: ../student/'); break;
    default: header('Location: ../');
    exit();
  }
}else{
  header('Location: ../index.html');
  exit();
}
?>
