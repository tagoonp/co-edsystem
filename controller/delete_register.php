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

if(isset($_GET['pid'])){
  $strSQL = "DELETE FROM trs3_registration WHERE registration_id = ?";
  $result = $db->delete($strSQL, array($_GET['pid']));
  if($result){
    ?>
    <script type="text/javascript">
      swal({
        title: "ลบข้อมูลเรียบร้อย",
        text: 'กด "ตกลง" เพื่อกลับสู่หน้าหลัก!',
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
}else{

}
?>
