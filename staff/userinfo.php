<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

$strSQL = "SELECT * FROM trs3_user a INNER JOIN trs3_userinfo b on a.username = b.userinfo_username WHERE a.username = ? AND a.usertype_id = '1' AND a.active_status = 'Y'  ";
$result = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));


if(!$result){
  // print $strSQL;
  // exit();
  header('Location: ../error/?type=1'); die();
  die();
}

$row = $result->fetch();


if(!isset($_GET['username'])){
  header('Location: ../error/?type=2'); die();
  die();
}

$strSQL = "SELECT * FROM trs3_user a INNER JOIN trs3_userinfo b on a.username = b.userinfo_username WHERE a.username = ?   ";
$resultUserinfo = $db->select($strSQL, array($_GET['username']));

$rowinfo = $resultUserinfo->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="AppUI - Frontend Template & UI Framework" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Co-ed system administrator : ระบบสมัครฝึกงานภาคฤดูร้อน ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../../assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" href="../../assets/img/favicons/favicon.ico" />


    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="../../assets/js/plugins/datatables/jquery.dataTables.min.css" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="../../assets/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="../../assets/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="../../assets/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="../../assets/css/app-custom.css" />
    <script src="../../ext-lib/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../ext-lib/sweetalert-master/dist/sweetalert.css">


    <!-- End Stylesheets -->
  </head>
  <body>
    <!-- Header -->
                <header class="app-layout-header"   style="background: #021148; color: #fff;">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
                                                        <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                                  <span class="sr-only">Toggle drawer</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
                                <span class="navbar-page-title" style="font-weight: bold;">
                                  <!-- ยินดีต้อนรับสู่ Co-ed system<br> -->
                                  <span style="font-size: 40px;">ระบบสมัครฝึกงานภาคฤดูร้อน <small style="margin-top: -20px; padding-top: 0px;">ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></span>
                                </span>
                            </div>

                            <div id="navbar" class="navbar-collapse collapse" style="margin-top: 17px;">
                              <ul class="nav navbar-nav navbar-right" >
                                <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color: #fff;"><?php echo $row['userinfo_prefix'].$row['userinfo_fname']." ".$row['userinfo_lname']; ?> <span class="caret"></span></a>
                                  <ul class="dropdown-menu" style="font-size: 20px;">
                                    <li><a href="../changepassword/">เปลี่ยนรหัสผ่าน</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../../signout.php">ออกจากระบบ</a></li>
                                  </ul>
                                </li>
                              </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->
    <div class="container-fluid">

      <div class="row" style="padding-top: 0px; margin-top: 20px;">
        <div class="col-sm-3">
          <div class="card">
            <div class="card-block">
              <nav class="drawer-main">
                <ul class="nav nav-drawer" >
                    <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">เมนู</li>

                    <li class="nav-item">
                        <a href="../" style="font-weight: 300;"><i class="ion-ios-speedometer-outline"></i> หน้าแรก</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="./participant/" style="font-weight: 300;"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                    </li> -->
                    <li class="nav-item nav-item-has-subnav">
                      <a href="javascript:void(0)" style="font-weight: 300;"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                      <ul class="nav nav-subnav">

                          <li>
                              <a href="../participant/" style="font-weight: 300;"><i class="ion-android-list"></i> ผู้สมัครที่ทำการยื่นขอ</a>
                          </li>

                          <li>
                              <a href="../participant-all/" style="font-weight: 300;"><i class="ion-android-done-all"></i> ผู้สมัครที่ผ่านการดำเนินการแล้ว</a>
                          </li>

                      </ul>
                    </li>

                    <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">อื่นๆ</li>

                    <li class="nav-item">
                        <a href="../../signout.php" style="font-weight: 300;"><i class="ion-android-exit"></i> ออกจากระบบ</a>
                    </li>
                </ul>
              </nav>
            </div>
          </div>

        </div>
        <div class="col-sm-9" style="padding-top: 0px;" id="loginPane">
          <div class="row">
            <div class="col-sm-6 text-left">
              <a href="../updateinfo/?username=<?php echo $rowinfo['username']; ?>" class="btn btn-app-teal btn-custom" style="font-size: 22px; padding: 5px 10px 0px 10px;">แก้ไขข้อมูลผู้ใช้</a>
              <?php
              if($rowinfo['active_status']=='Y'){
                ?>
                <button type="button" name="button" class="btn btn-app-teal btn-custom" <?php if($rowinfo['usertype_id']==1){ echo "disabled"; } ?> style="font-size: 22px; padding: 5px 10px 0px 10px;" onclick="redirect_conf3('../../controller/user-active.php?username=<?php echo $rowinfo['username']; ?>&to=N')">ระงับการใช้งาน</button>
                <?php
              }else{
                ?>
                <button type="button" name="button" class="btn btn-app-teal btn-custom" <?php if($rowinfo['usertype_id']==1){ echo "disabled"; } ?> style="font-size: 22px; padding: 5px 10px 0px 10px;" onclick="redirect_conf3('../../controller/user-active.php?username=<?php echo $rowinfo['username']; ?>&to=Y')">อนญาตการใช้งาน</button>
                <?php
              }
              ?>
            </div>
            <div class="col-sm-6 text-right">
              <button type="button" name="button" class="btn btn-app-red btn-custom" <?php if($rowinfo['usertype_id']==1){ echo "disabled"; } ?> style="font-size: 22px; padding: 5px 10px 0px 10px;" onclick="redirect_conf('../../controller/user-delete.php?username=<?php echo $rowinfo['username']; ?>')">ลบบัญชีผู้ใช้นี้</button>
            </div>
          </div>
          <div class="row" style="margin-top: 20px; font-size: 0.8em;">
            <div class="col-sm-12">
              <div class="card">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li class="active">
                        <a href="#btabs-static-home">ข้อมูลบัญชีผู้ใช้</a>
                    </li>
                    <li>
                        <a href="#btabs-static-profile">ข้อมูลอื่นๆ</a>
                    </li>
                    <li class="pull-right">
                        <a href="#btabs-static-settings" data-toggle="tooltip" title="Settings">Logs</a>
                    </li>
                </ul>
                <div class="card-block tab-content">
                    <div class="tab-pane active" id="btabs-static-home">
                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-1 cont-title">
                            ชื่อบัญชีผู้ใช้
                          </div>
                          <div class="col-sm-8">
                            <?php echo $rowinfo['username']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-1 cont-title">
                            ชื่อ - สกุล
                          </div>
                          <div class="col-sm-8">
                            <?php echo $rowinfo['userinfo_prefix'].$rowinfo['userinfo_fname']." ".$rowinfo['userinfo_lname']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-1 cont-title">
                            หมายเลขโทรศัพท์
                          </div>
                          <div class="col-sm-8">
                            <?php echo $rowinfo['userinfo_phone']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-1 cont-title">
                            Email
                          </div>
                          <div class="col-sm-8">
                            <?php echo $rowinfo['email']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-1 cont-title">
                            Role
                          </div>
                          <div class="col-sm-8">
                            <?php
                            switch($rowinfo['usertype_id']){
                              case 1: echo "Administrator"; break;
                              case 2: echo "Teaching staff"; break;
                              case 3: echo "Coordinator staff"; break;
                              case 4: echo "Student"; break;
                              default: echo "N/A";
                            }
                            ?>
                          </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="btabs-static-profile">
                        <?php
                        if($rowinfo['usertype_id']==4){
                          $strSQL = "SELECT * FROM trs3_registration WHERE std_id = ?  ORDER BY registration_id ";
                          $result = $db->select($strSQL, array($rowinfo['username']));

                          $strSQL = "SELECT * FROM trs3_department WHERE tmp_std_id = ?";
                          $resultDept = $db->select($strSQL, array($rowinfo['username']));

                          $strSQL = "SELECT * FROM trs3_questioniar WHERE qn_studentid = ?";
                          $resultQn = $db->select($strSQL, array($rowinfo['username']));

                          $row = $result->fetch();
                          // $rowQn = $resultQn->fetch();

                          if($result){
                            ?>
                            <div class="card">
                                                    <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                                        <li class="active">
                                                            <a href="#btabs-alt-static-home">ใบสมัครฝึกงานภาคฤดูร้อน</a>
                                                        </li>
                                                        <li>
                                                            <a href="#btabs-alt-static-profile">แบบสอบถามรายวิชาฝึกงาน</a>
                                                        </li>
                                                    </ul>
                                                    <div class="card-block tab-content">
                                                        <div class="tab-pane active" id="btabs-alt-static-home">
                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                              <div class="text-center">
                                                                <h4 style="background: transparent; font-weight: bold; font-size: 34px; color: teal;">ใบสมัครฝึกงานภาคฤดูร้อน ปีการศึกษา <?php echo $row['reg_year']; ?><br>
                                                                  ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์<br>
                                                                  <span style="font-size: 26px;">รายการเลขที่ <?php echo $row['registration_id']; ?> วันที่ <?php echo $row['reg_date']; ?></span>
                                                                </h4>
                                                              </div>
                                                            </div>
                                                          </div>


                                                          <div class="" style="font-size: 24px;">
                                                            <div class="row" style="padding-top: 20px;">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(1)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">ชื่อ - สกุล (ภาษาไทย)</span> <?php echo $row['std_fullname_th']; ?> <br>
                                                                <span class="cont-title2">ชื่อ - สกุล (ภาษาอังกฤษ)</span> <?php echo $row['std_fullname_en']; ?><br>
                                                                <span class="cont-title2">รหัสนักศึกษา</span> <?php echo $row['std_id']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(2)</span>
                                                              </div>
                                                              <div class="col-sm-6">
                                                                <span class="cont-title2">วัน/เดือน/ปีเกิด</span> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?> <br>

                                                              </div>
                                                              <div class="col-sm-5">
                                                                <span class="cont-title2">อายุ</span> <?php echo $row['age']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-3 col-sm-offset-1">
                                                                <span class="cont-title2">ศาสนา</span> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?> <br>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <span class="cont-title2">สัญชาติ</span> <?php echo $row['nation']; ?>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <span class="cont-title2">เชื้อชาติ</span> <?php echo $row['race']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-11 col-sm-offset-1">
                                                                <span class="cont-title2">โรคประจำตัว</span><br>
                                                                <?php
                                                                $strSQL = "SELECT * FROM trs3_disease WHERE di_regid = ?  ";
                                                                $result2d = $db->select($strSQL, array($row['registration_id']));

                                                                if($result2d){
                                                                  $c = 1;
                                                                  if(sizeof($result2d)>1){
                                                                    foreach ($result2d as $value) {
                                                                      echo $c;
                                                                      echo ') ';
                                                                      echo $value['di_desc']."<br>";
                                                                      $c++;
                                                                    }
                                                                  }else if(sizeof($result2d)==1){
                                                                    $rowd = $result2d->fetch();
                                                                    if($rowd['di_desc']==''){
                                                                      echo "ไม่มี";
                                                                    }else{
                                                                      echo "1) ". $rowd['di_desc'];
                                                                    }
                                                                  }

                                                                }else{
                                                                  print "-";
                                                                }
                                                                ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-6 col-sm-offset-1">
                                                                <span class="cont-title2">โทรศัพท์</span> <?php echo $row['phone']; ?>
                                                              </div>
                                                              <div class="col-sm-5">
                                                                <span class="cont-title2">email</span> <?php echo $row['email']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(3)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">ที่อยู่ปัจจุบัน</span> <?php echo $row['address']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(4)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">ประวัติการศึกษา เกรดเฉลี่ย</span> <?php echo $row['gpa']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(5)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน</span>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-11 col-sm-offset-1">
                                                                <span class="cont-title2">ชื่อ - สกุล</span> <?php echo $row['ergen_person']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-6 col-sm-offset-1">
                                                                <span class="cont-title2">เกี่ยวข้องเป็น</span> <?php echo $row['ergen_relation']; ?>
                                                              </div>
                                                              <div class="col-sm-5">
                                                                <span class="cont-title2">หมายเลขโทรศัพท์</span> <?php echo $row['ergen_phone']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(6)</span>
                                                              </div>
                                                              <div class="col-sm-6">
                                                                <span class="cont-title2">ระยะเวลาฝึกงานตั้งแต่วันที่</span> <?php echo $row['train_start']; ?>
                                                              </div>
                                                              <div class="col-sm-5">
                                                                <span class="cont-title2">ถึงวันที่</span> <?php echo $row['train_end']; ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-11 col-sm-offset-1">
                                                                <span class="cont-title2">ลักษณะงาน</span>  <?php if($row['job_attr']!=''){ echo $row['job_attr']; }else{ echo "-"; } ?>
                                                              </div>
                                                            </div>
                                                            <div class="row">
                                                              <div class="col-sm-11 col-sm-offset-1">
                                                                <span class="cont-title2">ประเภทงาน</span> <?php if($row['job_type']!=''){ echo $row['job_type']; }else{ echo "-"; } ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(7)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">การมีส่วนร่วมในกิจกรรม ทั้งในและนอกมหาวิทยาลัย นอกเนือจากการเรียนปกติ</span>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-11 col-sm-offset-1">
                                                                <?php
                                                                if(($row['act_1']=='') && ($row['act_2']=='') && ($row['act_3']=='') && ($row['act_4']=='')){
                                                                  print "ไม่ระบุ";
                                                                }else{
                                                                  if($row['act_1']!=''){ echo '1) '; echo $row['act_1']."<br>"; }
                                                                  if($row['act_2']!=''){ echo '2) '; echo $row['act_2']."<br>"; }
                                                                  if($row['act_3']!=''){ echo '3) '; echo $row['act_3']."<br>"; }
                                                                  if($row['act_4']!=''){ echo '4) '; echo $row['act_4']; }
                                                                }
                                                                ?>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(8)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">ความสามารถทางด้านภาษา ทักษะการสื่อสารภาษาอังกฤษ</span> <?php
                                                                  switch ($row['eng_skill']) {
                                                                    case '1':
                                                                      echo "ดี";
                                                                      break;
                                                                    case '2':
                                                                      echo "ปานกลาง";
                                                                      break;
                                                                    case '3':
                                                                      echo "พอใช้";
                                                                      break;
                                                                    default:
                                                                      echo "ไม่ระบุ";
                                                                      break;
                                                                  }?>
                                                              </div>
                                                            </div>


                                                            <div class="row">
                                                              <div class="col-sm-1">
                                                                <span class="cont-title2">(9)</span>
                                                              </div>
                                                              <div class="col-sm-11">
                                                                <span class="cont-title2">ความสามารถด้านคอมพิวเตอร์</span>
                                                              </div>
                                                            </div>

                                                            <div class="row">
                                                              <div class="col-sm-11 col-sm-offset-1">
                                                                <?php
                                                                if(($row['com_skill_1']=='') && ($row['com_skill_2']=='') && ($row['com_skill_3']=='')){
                                                                  print "ไม่ระบุ";
                                                                }else{
                                                                  if($row['com_skill_1']!=''){ echo '1) '; echo $row['com_skill_1']."<br>"; }
                                                                  if($row['com_skill_2']!=''){ echo '2) '; echo $row['com_skill_2']."<br>";  }
                                                                  if($row['com_skill_3']!=''){ echo '3) '; echo $row['com_skill_3']; }
                                                                }
                                                                ?>
                                                              </div>
                                                            </div>
                                                          </div>

                                                        </div>
                                                        <!-- End tab1 -->

                                                        <div class="tab-pane" id="btabs-alt-static-profile">
                                                          <div class="row">
                                                            <div class="col-sm-12">
                                                              <div class="text-center">
                                                                <h4 style="background: transparent; font-weight: bold; font-size: 34px; color: teal;">แบบสอบถามรายวิชาฝึกงาน<br>
                                                                  ประจำภาคฤดูร้อน ปีการศึกษา <?php echo $row['reg_year']; ?><br>
                                                                  <span style="font-size: 26px;">ชื่อ - สกุล <span style="color: black;"><?php echo $row['std_fullname_th']; ?></span>  รหัสนักศึกษา <span style="color: black;"><?php echo $row['std_id']; ?></span></span>
                                                                </h4>
                                                              </div>
                                                            </div>
                                                          </div>

                                                          <div class="container">
                                                            <?php
                                                            if($resultQn){
                                                              $rowQn = $resultQn->fetch();
                                                              ?>
                                                              <div class="row">
                                                                <div class="col-sm-10 col-sm-offset-1">
                                                                  <h4 style="color: orange;">ข้อมูลความต้องการฝึกงาน</h4>
                                                                  <table class="table table-bordered table-header-bg">
                                                                    <thead>
                                                                      <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                                                        ลำดับที่
                                                                      </th>
                                                                      <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                                                        สาขา/ตำแหน่ง/แผนก/ฝ่าย
                                                                      </th>
                                                                      <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                                                        หน่วยงาน/บริษัท/สถานประกอบการ
                                                                      </th>
                                                                    </thead>
                                                                    <tbody>
                                                                      <?php
                                                                      $strSQL = "SELECT * FROM trs3_department WHERE tmp_std_id = ?";
                                                                      $resultDept = $db->select($strSQL, array($rowinfo['username']));

                                                                      if($resultDept){
                                                                        $c = 1;
                                                                        foreach ($resultDept as $value2) {
                                                                          ?>
                                                                          <tr>
                                                                            <td style="padding: 5px 10px; font-size: 24px;">
                                                                              <?php echo $c; ?>
                                                                            </td>
                                                                            <td style="padding: 5px 10px; font-size: 24px;">
                                                                              <?php echo $value2['tmp_dept']; ?>
                                                                            </td>
                                                                            <td style="padding: 5px 10px; font-size: 24px;">
                                                                              <?php echo $value2['tmp_unit']; ?>
                                                                            </td>
                                                                          </tr>
                                                                          <?php
                                                                          $c++;
                                                                        }
                                                                      }
                                                                      ?>
                                                                    </tbody>
                                                                  </table>

                                                                  <div class="" style="font-size: 24px;">
                                                                    <div class="row">
                                                                      <div class="col-sm-12">
                                                                        <span class="cont-title2">ระยะเวลาฝึกงานตั้งแต่วันที่</span> <?php echo $rowQn['qn_start']; ?> <span class="cont-title2">ถึงวันที่</span> <?php echo $rowQn['qn_end']; ?>
                                                                      </div>
                                                                    </div>

                                                                    <div class="row">
                                                                      <div class="col-sm-12">
                                                                        <span style="color:red;">* </span> หากไม่ระบุวันฝึกงาน ให้ใช้วันที่ภาควิชากำหนด
                                                                        (ภาคฤดูร้อนไม่น้อยกว่า 6 สัปดาห์ ฯ ละไม่ต่ำกว่า 25 ชั่วโมง)<br>
                                                                        <span style="color:red;">** </span> กรณีฝึกที่เดียวกันหลายคนให้ใช้ช่วงเวลาฝึกเดียวกัน
                                                                      </div>
                                                                    </div>

                                                                    <hr>

                                                                    <div class="row">
                                                                      <div class="col-sm-12">
                                                                        <span class="cont-title2">นักศึกษาสามารถติดต่อกับหน่วยงานที่จะไปฝึกงานด้วยตัวเอง</span>
                                                                        <?php
                                                                        switch($rowQn['qn_seltcontact']){
                                                                          case 'No': echo 'ไม่ได้'; break;
                                                                          case 'Yes': echo 'ได้'; break;
                                                                          default: echo 'ไม่ระบุ';
                                                                        }
                                                                        ?>
                                                                      </div>
                                                                    </div>

                                                                    <div class="row" style="display: <?php if($rowQn['qn_seltcontact']=='No'){ print "none"; }?>; ">
                                                                      <div class="col-sm-12">
                                                                        <h4 style="color: orange;">ส่วนนี้กรอกเฉพาะนักศึกษาที่ติดต่อหาที่ฝึกงานได้ด้วยตัวเองเท่านั้น</h4>
                                                                        <?php
                                                                        if($rowQn['qn_selfcontactinfo']==''){
                                                                          echo $rowQn['qn_selfcontactinfo'];
                                                                        }else{
                                                                          echo "-";
                                                                        }

                                                                        ?>
                                                                      </div>
                                                                    </div>

                                                                  </div>

                                                                </div>
                                                              </div>
                                                              <?php
                                                            }else{
                                                              ?>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  ไม่มีข้อมูล
                                                                </div>
                                                              </div>
                                                              <?php
                                                            }
                                                            ?>
                                                          </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Card Tabs Alternative Style -->
                            <?php
                          }else{
                            ?>
                            <div class="row">
                              <div class="col-sm-12">
                                ไม่มีข้อมูลอื่นๆ
                              </div>
                            </div>
                            <?php
                          }
                        }else{
                          ?>
                          <div class="row">
                            <div class="col-sm-12">
                              ไม่มีข้อมูลอื่นๆ
                            </div>
                          </div>
                          <?php
                        }
                        ?>
                    </div>
                    <div class="tab-pane" id="btabs-static-settings">
                      <div class="row">
                        <div class="col-sm-12">
                          <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-header-bg">
                            <thead>
                              <tr>
                                <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                  ลำดับที่
                                </th>
                                <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                  กระบวนการ
                                </th>
                                <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                  สถานะ
                                </th>
                                <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                  Releted user
                                </th>
                                <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                  วันที่ปรับปรุงข้อมูล
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $strSQL = "SELECT * FROM trs3_usertransection WHERE	t_username = ? ";
                              $resultTransection = $db->select($strSQL, array($rowinfo['username']));
                              // echo $strSQL;
                              // echo $rowinfo['username'];
                              if($resultTransection){
                                $i = 1;
                                foreach ($resultTransection as $value3) {
                                  ?>
                                  <tr>
                                    <td style="padding: 5px 10px; font-size: 24px;">
                                      <?php echo $i; $i++; ?>
                                    </td>
                                    <td style="padding: 5px 10px; font-size: 24px;">
                                      <?php echo $value3['t_desc']; ?>
                                    </td>
                                    <td style="padding: 5px 10px; font-size: 24px;">
                                      <?php
                                        if($value3['t_status']=='Fail'){
                                          echo '<span style="color:red;">'.$value3['t_status'].'</span>';
                                        }else{
                                          echo '<span style="color:green;">'.$value3['t_status'].'</span>';
                                        }
                                      ?>
                                    </td>
                                    <td style="padding: 5px 10px; font-size: 24px;">
                                      <?php echo $value3['t_relateuser']; ?>
                                    </td>
                                    <td style="padding: 5px 10px; font-size: 24px;">
                                      <?php echo $value3['t_date']." ".$value3['t_time']; ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                              }else{
                                ?>
                                <tr>
                                  <td colspan="5">
                                    ไม่มีข้อมูล
                                  </td>
                                </tr>
                                <?php
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <!-- End Card Tabs Default Style -->

            </div>
          </div>
          <!-- End row -->
        </div>
        <!-- End col-sm-12 -->
      </div>
      <!-- End row -->
    </div>
    <!-- End container-fluid -->

    <footer style="margin-top: 30px; padding-bottom: 50px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 text-center">
            Co-ed system. Powered by Wisnior Coperation 2016
          </div>
        </div>
      </div>
    </footer>
    <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="../../assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="../../assets/js/core/jquery.placeholder.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/app-custom.js"></script>

    <!-- Page JS Plugins -->
    <script src="../../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- Page JS Code -->
    <script src="../../assets/js/pages/base_tables_datatables.js"></script>

    <!-- Include JS custom code -->
    <script src="../../dist/page/administrator/index.js"></script>

  </body>
</html>
