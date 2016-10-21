<?php
session_start();
?>
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

$strSQL = "SELECT registration_id FROM trs3_registration WHERE std_id = ? ORDER BY registration_id DESC LIMIT 0, 1 ";
$result_id = $db->select($strSQL, array($_POST['txt-stdid']));
if($result_id){
  print $_POST['txt-stdid'];
  ?>
  <script type="text/javascript">
    swal({
      title: "มีข้อมูลรหัสนักศึกษานี้ในระบบแล้ว",
      text: "กรุณาลบข้อมูลชุดเก่าก่อนการเพิ่มข้อมูลใหม่!",
      type: "error",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "กลับหน้าใบสมัคร!",
      closeOnConfirm: false
    }, function(){
      window.location = '../';
    });
  </script>
  <?php
  exit();
}

$dob = '';
if(isset($_POST['txt-dob'])){
  $dob_arr = explode("-", $_POST['txt-dob']);
  $dob = (intval($dob_arr[2]) - 543) . "-" . $dob_arr[1] . "-". $dob_arr[0];
}

$tstart = '';
if(isset($_POST['txt-startdate'])){
  $tstart_arr = explode("-", $_POST['txt-startdate']);
  $tstart = (intval($tstart_arr[2]) - 543) . "-" . $tstart_arr[1] . "-". $tstart_arr[0];
}

$tend = '';
if(isset($_POST['txt-enddate'])){
  $tend_arr = explode("-", $_POST['txt-enddate']);
  $tend = (intval($tend_arr[2]) - 543) . "-" . $tend_arr[1] . "-". $tend_arr[0];
}

$strSQL = "INSERT INTO trs3_registration VALUES (?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$result = $db->insert($strSQL, array(
            "",
            $_POST['txt-studyyear'],
            $_POST['txt-stdid'],
            $_POST['txt-name-th'],
            $_POST['txt-name-eng'],
            // $_POST[''], //Profle picture
            "",
            $dob,
            $_POST['txt-age'],
            $_POST['txt-rel'],
            $_POST['txt-race'],
            $_POST['txt-nation'],
            $_POST['txt-phone'],
            $_POST['txt-email'],
            $_POST['txt-address'],
            $_POST['txt-gpa'],
            $_POST['txt-ptherperson'],
            $_POST['txt-relation'],
            $_POST['txt-ptherperson-phone'],
            $tstart,
            $tend,
            $_POST['txt-jobtype'],
            $_POST['txt-jobcat'],
            $_POST['val-activity1'],
            $_POST['val-activity2'],
            $_POST['val-activity3'],
            $_POST['val-activity4'],
            $_POST['radio-group5'],
            $_POST['val-com1'],
            $_POST['val-com2'],
            $_POST['val-com3'],
            date('Y-m-d H:i:s'),
            "N"
          ));
  if($result){
    // print "Y";



    $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
    $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'สมัครฝึกงานภาคฤดูร้อน', 'Success', $_POST['txt-stdid'], $_POST['txt-stdid']));

    $strSQL = "SELECT * FROM trs3_user WHERE username = ? ";
    $result_account = $db->select($strSQL, array($_POST['txt-stdid']));

    if(!$result_account){
      // print "Y1";
      // $salt = 'W54mnFMEVPcHLiDQwbwG44#is0Sr*dkxX';
      $salt = $db->getSaltkey();
      $pwd = hash_hmac('md5', $_POST['txt-stdid'], $salt);

      $strSQL = "INSERT INTO trs3_user VALUES (?, ?, ?, ?, ?, ?)";
      $result_insert = $db->select($strSQL, array($_POST['txt-stdid'], $pwd, $_POST['txt-email'], '4', 'Y', date('Y-m-d')));

      $b2 = explode(" ", $_POST['txt-name-eng']);
      $strSQL = "INSERT INTO trs3_userinfo VALUES (?, ?, ?, ?, ?, ?)";
      if(sizeof($b2)>1){
        $result_insert = $db->select($strSQL, array('', "", $b2[0], $b2[1], $_POST['txt-phone'], $_POST['txt-stdid']));
      }else{
        $result_insert = $db->select($strSQL, array('', "", $b2[0], "", $_POST['txt-phone'], $_POST['txt-stdid']));
      }

      $strSQL = "INSERT INTO trs3_usertransection (t_date, 	t_time, t_desc,		t_status, t_username, t_relateuser) VALUES (?, ?, ?, ?, ?, ?)";
      $result_dept = $db->insert($strSQL, array( date('Y-m-d'), date('H:i:s'), 'สร้างบัญชีผู้ใช้งาน', 'Success', $_POST['txt-stdid'], $_POST['txt-stdid']));
    }

    $tstart = '';
    if(isset($_POST['txt-startdate2'])){
      $tstart_arr = explode("-", $_POST['txt-startdate2']);
      $tstart = (intval($tstart_arr[2]) - 543) . "-" . $tstart_arr[1] . "-". $tstart_arr[0];
    }

    $tend = '';
    if(isset($_POST['txt-enddate2'])){
      $tend_arr = explode("-", $_POST['txt-enddate2']);
      $tend = (intval($tend_arr[2]) - 543) . "-" . $tend_arr[1] . "-". $tend_arr[0];
    }

    $strSQL = "INSERT INTO trs3_questioniar (qn_start, qn_end, qn_seltcontact, qn_selfcontactinfo, qn_applydate, qn_studentid) VALUES (?, ?, ?, ?, ?, ?)";
    $result_questionaire = $db->insert($strSQL, array( $tstart, $tend, $_POST['radio-groupContact'], $_POST['txt-contactp'], date('Y-m-d'), $_POST['txt-stdid']));

    $strSQL = "INSERT INTO trs3_department (tmp_dept, tmp_unit, tmp_sessid,	tmp_std_id, tmp_date) SELECT tmp_dept, tmp_unit, tmp_sessid,	tmp_std_id, tmp_date FROM trs3_department_temporary WHERE tmp_std_id = ? AND 	tmp_sessid = ?";
    $result_dept = $db->insert($strSQL, array( $_POST['txt-stdid'], session_id()));

    $strSQL = "DELETE FROM trs3_department_temporary WHERE tmp_std_id = ? AND 	tmp_sessid = ?";
    $result_dept = $db->delete($strSQL, array( $_POST['txt-stdid'], session_id()));

    $strSQL = "SELECT registration_id FROM trs3_registration WHERE std_id = ? ORDER BY registration_id DESC LIMIT 0, 1 ";
    $result_id = $db->select($strSQL, array($_POST['txt-stdid']));

    if($result_id){
      $row = $result_id->fetch();
      if(isset($_POST['val-disease'])){
        $disease_arr = explode(",", $_POST['val-disease']);
        if(sizeof($disease_arr)>0){
          foreach ($disease_arr as $value) {
            $strSQL = "INSERT INTO trs3_disease (di_desc, di_regid) VALUES (?, ?)";
            $result_inst = $db->insert($strSQL, array($value, $row['registration_id']));
          }
        }
      }
    }

    $_SESSION[$sprefix.'ID'] = session_id();
    $_SESSION[$sprefix.'Username'] = $_POST['txt-stdid'];
    $_SESSION[$sprefix.'Utype'] = '4';
    session_write_close();

    ?>
    <script type="text/javascript">
      swal({
        title: "เพิ่มข้อมูลเรียบร้อย",
        text: 'กด "ตกลง" เพื่อเข้าสู่ระบบ!',
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "ตกลง",
        closeOnConfirm: false
      }, function(){
        window.location = '../controller/create-session.php';
      });
    </script>
    <?php


  }else{
    ?>
    <script type="text/javascript">
      swal({
        title: "ไม่สามารถเพิ่มข้อมูลได้",
        text: "กรุณาลองใหม่ หรือติดต่อผู้ดูแลระบบ!",
        type: "error",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
      }, function(){
        window.location = '../';
      });
    </script>
    <?php
  }
?>
