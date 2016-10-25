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

if(isset($_POST['val-stdid'])){

  $strSQL = "UPDATE trs3_questioniar
            SET
              qn_advicestatus = ?,
              qn_advicestatusinfo = ?,
              qn_adviceby = ?,
              qn_advicedate = ?
            WHERE
              qn_studentid = ? ";
  $result_account_delete = $db->UPDATE($strSQL, array(
                                                  $_POST['radio-group5'],
                                                  $_POST['txt-response'],
                                                  $_SESSION[$sprefix.'Username'], //by
                                                  date('Y-m-d'),
                                                  $_POST['val-stdid']
                                                ));

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ตอบรับความเห็น - '.$_POST['radio-group5'], 'Success', $_SESSION[$sprefix.'Username'], $_POST['val-stdid']));


  $response = 'รอการตอบรับ';
  if($_POST['radio-group5']=='Agree'){
    $response = 'เห็นสมควร';
  }else if($_POST['radio-group5']=='Otheragree'){
    $response = 'ความเห็นอื่นๆ';
  }else{
    $response = 'รอการตอบรับ';
  }

  $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
  $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'ตอบรับความเห็น - '.$response, 'Success', $_POST['val-stdid'], $_POST['val-stdid']));

  ?>
  <script type="text/javascript">
    swal({
      title: "ยืนยันข้อมูลเรียบร้อย",
      // text: "ไม่สามารถลบบัญชีผู้ใช้ได้",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "rgb(193, 33, 100)",
      confirmButtonText: "ตกลง!",
      closeOnConfirm: false
    }, function(){
      window.location = '../officer/participant/';
    });
  </script>
  <?php

}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "ไม่สามารถดำเนินการได้",
      text: "ไม่พบรหัสนักศึกษาดังกล่าวในระบบ",
      type: "error",
      showCancelButton: false,
      confirmButtonColor: "rgb(193, 33, 100)",
      confirmButtonText: "ตกลง!",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
}
?>
