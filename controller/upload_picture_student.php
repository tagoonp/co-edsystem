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

      if (!empty($_FILES)) {

          $tempFile = $_FILES['file']['tmp_name'];
          $targetPath = '../img/';  //4
          $filename = 'profile-'.date('Y-m-d-H-i-s').$_FILES['file']['name'];
          $targetFile =  $targetPath. $filename;  //5
          move_uploaded_file($tempFile,$targetFile); //6

          $strSQL = "UPDATE trs3_registration SET std_profilepic = '".$filename."' WHERE std_id = ? ";
          $result_update = $db->update($strSQL, array($_SESSION[$sprefix.'Username']));

          $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
          $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'อัพโหลดรูปประจำตัว', 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));
      }

    }
  }else{

  }

}else{

}
?>
