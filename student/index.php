<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

$strSQL = "SELECT * FROM trs3_registration WHERE std_id = ?  ORDER BY registration_id ";
$result = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

$strSQL = "SELECT * FROM trs3_department WHERE tmp_std_id = ?";
$resultDept = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

$strSQL = "SELECT * FROM trs3_questioniar WHERE qn_studentid = ?";
$resultQn = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

if(!$result){
  header('Location: ../error/?type=1'); die();
}

$row = $result->fetch();
$rowQn = $resultQn->fetch();
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
    <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" href="../assets/img/favicons/favicon.ico" />

    <!-- Google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400,500" rel="stylesheet"> -->

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="../assets/js/plugins/select2/select2.min.css" />
    <link rel="stylesheet" href="../assets/js/plugins/dropzonejs/dropzone.min.css" />
    <link rel="stylesheet" href="../assets/js/plugins/select2/select2-bootstrap.css" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="../assets/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="../assets/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="../assets/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="../assets/css/app-custom.css" />


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
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="color: #fff;"><?php echo $row['std_fullname_en']; ?> <span class="caret"></span></a>
                                  <ul class="dropdown-menu" style="font-size: 20px;">
                                    <li><a href="./changepassword/">เปลี่ยนรหัสผ่าน</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../signout.php">ออกจากระบบ</a></li>
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

    <div class="container" style="background: #f1f1f1;">

      <div class="row">
        <div class="col-sm-12">
          <div style="padding: 20px 0px 0px 0px;">
            <div class="text-left">
              <?php
              if($row['confirm_status']=='N'){
                ?>
                <button type="button" name="button" class="btn btn-app-red" style="font-size: 20px;" onclick="redirect_conf_del('../controller/delete-application.php')"><i class="fa fa-trash"></i> ลบข้อมูลชุดนี้</button>
                <button type="button" name="button" class="btn btn-app-teal" style="font-size: 20px;" onclick="redirect_conf_confirm('../controller/confirm_registration.php')"><i class="fa fa-check-square-o"></i> ยืนยันข้อมูลนี้</button>
                <?php
              }
              ?>
              <a href="./application-print.php?std_id=<?php print $_SESSION[$sprefix.'Username']; ?>" class="btn btn-app-blue" style="font-size: 20px;" target="_blank"><i class="fa fa-print"></i> ตัวอย่างก่อนพิมพ์</a>
              <!-- <button type="button" name="button" class="btn btn-app-blue"  style="font-size: 20px;" onclick="redirect_conf('#')"><i class="fa fa-print"></i> Print</button> -->
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="padding-top: 0px; margin-top: 0px;">
        <!-- <div class="col-sm-3">
          <nav class="drawer-main">
            <ul class="nav nav-drawer" >
                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">เมนู</li>

                <li class="nav-item active">
                    <a href="./" style="font-weight: 300;"><i class="fa fa-file-text-o"></i> ใบสมัครฝึกงาน</a>
                </li>

                <li class="nav-item">
                    <a href="./question/" style="font-weight: 300;"><i class="fa fa-file-text-o"></i> แบบสอบถามวิชาฝึกงาน</a>
                </li>

                <li class="nav-item">
                    <a href="./useraccount/" style="font-weight: 300;"><i class="ion-android-checkbox-outline"></i> สถานะการสมัคร</a>
                </li>

                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">อื่นๆ</li>

                <li class="nav-item">
                    <a href="../signout.php" style="font-weight: 300;"><i class="ion-android-exit"></i> ออกจากระบบ</a>
                </li>
            </ul>
          </nav>
        </div> -->


        <div class="col-sm-12" style="padding-top: 20px;" id="loginPane">

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-teal bg-inverse">
                    <h4>สถานะการตอบกลับจากอาจารย์ผู้ดูแลรายวิชา</h4>
                </div>
                <div class="card-block">
                    <p style="font-size: 0.8em;">
                      <span style="font-weight: bold;">ความเห็นอาจารย์ผู้รับผิดชอบนึกศึกษาฝึกงานของภาควิชา :</span>
                      <?php
                      if($rowQn['qn_advicestatus']=='Waiting'){
                        echo '<span style="color: rgb(156, 156, 156);">รอการตอบรับ</span>';
                      }else if($rowQn['qn_advicestatus']=='Agree'){
                        echo '<span style="color: rgb(7, 140, 104);">เห็นสมควร</span>';
                      }else if($rowQn['qn_advicestatus']=='Otheragree'){
                        echo '<span style="color: rgb(255, 115, 0);">ความเห็นอื่นๆ</span>';
                      }else{
                        echo "ไม่อนุมัติ";
                      }
                      ?>
                      <br>
                      <span style="font-weight: bold;">รายละเอียด :</span> <?php
                      if($rowQn['qn_advicestatusinfo']==""){
                        echo "ไม่ระบุ";
                      }else{
                        echo $rowQn['qn_advicestatusinfo'];
                      }
                      ?>
                    </p>
                </div>
              </div>
            </div>
          </div>

          <div class="card">

                                  <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs">
                                      <li class="active">
                                          <a href="#btabs-alt-static-home">ใบสมัครฝึกงานภาคฤดูร้อน</a>
                                      </li>
                                      <li>
                                          <a href="#btabs-alt-static-profile">แบบสอบถามรายวิชาฝึกงาน</a>
                                      </li>
                                      <li class="pull-right">
                                          <a href="#btabs-alt-static-settings" data-toggle="tooltip" title="Settings"><i class="fa fa-gear"></i> Logs</a>
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
                                            <div class="col-sm-11">
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
                                                  $resultDept = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

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

                                        </div>

                                      </div>
                                      <div class="tab-pane" id="btabs-alt-static-settings">
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <table class="table table-striped table-header-bg">
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
                                                    โดย
                                                  </th>
                                                  <th style="font-weight: bold; padding: 10px; font-size: 26px;">
                                                    วันที่ปรับปรุงข้อมูล
                                                  </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                $strSQL = "SELECT * FROM trs3_usertransection WHERE	t_username = ? ";
                                                $resultTransection = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

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
                                                }
                                                ?>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- End Card Tabs Alternative Style -->
                          </div>
                          <!-- .col-md-12 -->
                      </div>
                      <!-- .row -->
                      <!-- End Card Tabs -->

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
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="../assets/js/core/jquery.placeholder.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/app-custom.js"></script>
    <script src="../ext-lib/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../ext-lib/sweetalert-master/dist/sweetalert.css">

    <!-- Page JS Plugins -->
    <script src="../assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>

    <!-- Include JS custom code -->
    <script src="../dist/page/student/index.js"></script>
  </body>
</html>
