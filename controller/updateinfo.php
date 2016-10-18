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

if(isset($_POST['val-username'])){

  $strSQL = "SELECT * FROM trs3_user a inner join trs3_userinfo b on a.username = b.userinfo_username WHERE a.username = ? ";
  $result_account = $db->select($strSQL, array($_POST['val-username']));

  if($result_account){
    $strSQL = "UPDATE trs3_user
              SET email = ?
              WHERE username = ? ";
    $resultUpdate1 = $db->update($strSQL, array($_POST['val-email'], $_POST['val-username']));

    $strSQL = "UPDATE trs3_userinfo
              SET
                userinfo_prefix = ?,
                userinfo_fname = ?,
              	userinfo_lname = ?,
                userinfo_phone = ?
              WHERE	userinfo_username = ? ";
    $resultUpdate2 = $db->update($strSQL,
                    array(
                      $_POST['val-prefix'],
                      $_POST['val-fname'],
                      $_POST['val-lname'],
                      $_POST['val-phone'],
                      $_POST['val-username']
                    ));

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'แก้ไขข้อมูลส่วนตัว', 'Success', $_POST['val-username'], $_SESSION[$sprefix.'Username']));

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'แก้ไขข้อมูลส่วนตัว - '.$_POST['val-username'], 'Success', $_SESSION[$sprefix.'Username'], $_SESSION[$sprefix.'Username']));

                    ?>
                    <script type="text/javascript">
                      swal({
                        title: "ปรับปรุงข้อมูลเรียบร้อย",
                        text: "ข้อมุลดังกล่าวได้รับการปรับปรุงเรียบร้อยแล้ว!",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "rgb(34, 117, 204)",
                        confirmButtonText: "ตกลง!",
                        closeOnConfirm: false
                      }, function(){
                        window.history.back();
                      });
                    </script>
                    <?php

  }else{
    ?>
    <script type="text/javascript">
      swal({
        title: "ไม่สามารถแก้ไขข้อมูลได้",
        text: "ไม่มีข้อมูลผู้ใช้ดังกล่าวในระบบ!",
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
  ?>
  <script type="text/javascript">
    swal({
      title: "ไม่สามารถแก้ไขข้อมูลได้",
      text: "ไม่มีข้อมูลผู้ใช้ดังกล่าวในระบบ!",
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
