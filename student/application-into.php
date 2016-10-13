<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(!isset($_GET['pid'])){

}

$strSQL = "SELECT * FROM trs3_registration WHERE registration_id = ? AND confirm_status = ? ORDER BY registration_id ";
$result = $db->select($strSQL, array($_GET['pid'], "N"));

if(!$result){
  header('Location: ../error/?type=1'); die();
}

$row = $result->fetch();

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

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400,500" rel="stylesheet">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="../../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="../../assets/js/plugins/select2/select2.min.css" />
    <link rel="stylesheet" href="../../assets/js/plugins/dropzonejs/dropzone.min.css" />
    <link rel="stylesheet" href="../../assets/js/plugins/select2/select2-bootstrap.css" />
    <link rel="stylesheet" href="../../assets/js/plugins/datatables/jquery.dataTables.min.css" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="../../assets/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="../../assets/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="../../assets/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="../../assets/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="../../assets/css/app-custom.css" />


    <!-- End Stylesheets -->
  </head>
  <body>
    <!-- Header -->
                <header class="app-layout-header" style="background: #021148; color: #fff;">
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
                                <span class="navbar-page-title">
                                  ยินดีต้อนรับสู่ Co-ed system
                        				</span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->
                                <form class="navbar-form navbar-left app-search-form" role="search">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="search" id="search-input" placeholder="ค้นหาด้วยรหัสนักศึกษา ..." />
                                            <span class="input-group-btn">
                              								<button class="btn" type="button" style="color: #000;"><i class="ion-ios-search-strong"></i></button>
                              							</span>
                                        </div>
                                    </div>
                                </form>



                                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">
                                    <li style="padding-top: 10px;">
                                      <button type="button" name="button" class="btn btn-app-red" id="btnSignout_sub">ออกจากระบบ</button>
                                    </li>
                                </ul>
                                <!-- .navbar-right -->
                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

    <div class="" style="background: #f7f9fa; padding: 0px 0px 10px 0px; margin-bottom: 20px; -moz-box-shadow: 0 0 5px #888;
-webkit-box-shadow: 0 0 5px#888;
box-shadow: 0 0 5px #888;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-9 text-left">
            <h2 style="font-weight: 400; background: transparent;">ระบบสมัครฝึกงานภาคฤดูร้อน <small>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></h2>
          </div>
          <div class="col-sm-3 text-right">

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">

      <div class="row" style="padding-top: 0px; margin-top: 0px;">
        <div class="col-sm-3">
          <nav class="drawer-main">
            <ul class="nav nav-drawer" >
                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">เมนู</li>

                <li class="nav-item">
                    <a href="../" style="font-weight: 300;"><i class="ion-ios-speedometer-outline"></i> หน้าแรก</a>
                </li>

                <!-- <li class="nav-item ">
                    <a href="../participant/" style="font-weight: 300;"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                </li> -->

                <li class="nav-item nav-item-has-subnav active">
                  <a href="javascript:void(0)" style="font-weight: 300;"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                  <ul class="nav nav-subnav">

                      <li>
                          <a href="../participant/" style="font-weight: 300;"><i class="ion-android-list"></i> ผู้สมัครที่ทำการยื่นขอ</a>
                      </li>

                      <li>
                          <a href="../participant/" style="font-weight: 300;"><i class="ion-android-done-all"></i> ผู้สมัครที่ผ่านการดำเนินการแล้ว</a>
                      </li>

                  </ul>
                </li>

                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">การจัดการ</li>

                <li class="nav-item">
                    <a href="../useraccount/" style="font-weight: 300;"><i class="ion-android-person"></i> บัญชีผู้ใช้งาน</a>
                </li>

                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">อื่นๆ</li>

                <li class="nav-item">
                    <a href="../../signout.php" style="font-weight: 300;"><i class="ion-android-exit"></i> ออกจากระบบ</a>
                </li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-9" style="" id="loginPane">
          <div class="row">
            <div class="col-sm-2">
              <button type="button" name="button" class="btn btn-app-light"  onclick="window.history.back();"><i class="fa fa-chevron-left"></i> ย้อนกลับ</button>
            </div>
            <div class="col-sm-10 text-right">
              <button type="button" name="button" class="btn btn-app-red"><i class="fa fa-check-square-o"></i> ยืนยันการตรวจสอบ</button> <button type="button" name="button" class="btn btn-app-blue" ><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
          <div class="row" style="padding-top: 20px;">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-blue bg-inverse">
                  <h4 style="background: transparent; font-weight: 400;">ข้อมูลการสมัครลำดับที่ <?php echo $_GET['pid']; ?></h4>
                  <ul class="card-actions">
                    <li>
                        <!-- To toggle card fullscreen, add the following properties to your button: data-toggle="card-action" data-action="fullscreen_toggle" -->
                        <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                    </li>
                  </ul>
                </div>
                <div class="card-block">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="text-center">
                        <h3 style="font-weight: 400;">ใบสมัครฝึกงานภาคฤดูร้อน ปีการศึกษา <?php echo $row['reg_year']; ?></h3>
                        <h4 style="font-weight: 400;">ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="text-right">
                        <strong>วันที่</strong> <?php echo $row['reg_date']; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 20px;">
                    <div class="col-sm-1">
                      (1)
                    </div>
                    <div class="col-sm-11">
                      <strong>ชื่อ - สกุล (ภาษาไทย)</strong> <?php echo $row['std_fullname_th']; ?> <br>
                      <strong>ชื่อ - สกุล (ภาษาอังกฤษ)</strong> <?php echo $row['std_fullname_en']; ?><br>
                      <strong>รหัสนักศึกษา</strong> <?php echo $row['std_id']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (2)
                    </div>
                    <div class="col-sm-6">
                      <strong>วัน/เดือน/ปีเกิด</strong> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?> <br>

                    </div>
                    <div class="col-sm-5">
                      <strong>อายุ</strong> <?php echo $row['age']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-3 col-sm-offset-1">
                      <strong>ศาสนา</strong> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?> <br>
                    </div>
                    <div class="col-sm-3">
                      <strong>สัญชาติ</strong> <?php echo $row['nation']; ?>
                    </div>
                    <div class="col-sm-3">
                      <strong>เชื้อชาติ</strong> <?php echo $row['race']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <strong>โรคประจำตัว</strong><br>
                      <?php
                      $strSQL = "SELECT * FROM trs3_disease WHERE di_regid = ?  ";
                      $result2 = $db->select($strSQL, array($_GET['pid']));

                      if($result2){
                        $c = 1;
                        foreach ($result2 as $value) {
                          echo $c;
                          echo ') ';
                          echo $value['di_desc']."<br>";
                          $c++;
                        }
                      }else{
                        print "-";
                      }
                      ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-1">
                      <strong>โทรศัพท์</strong> <?php echo $row['phone']; ?>
                    </div>
                    <div class="col-sm-5">
                      <strong>email</strong> <?php echo $row['email']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (3)
                    </div>
                    <div class="col-sm-11">
                      <strong>ที่อยู่ปัจจุบัน</strong> <?php echo $row['address']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (4)
                    </div>
                    <div class="col-sm-11">
                      <strong>ประวัติการศึกษา เกรดเฉลี่ย</strong> <?php echo $row['gpa']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (5)
                    </div>
                    <div class="col-sm-11">
                      <strong>บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน</strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <strong>ชื่อ - สกุล</strong> <?php echo $row['ergen_person']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6 col-sm-offset-1">
                      <strong>เกี่ยวข้องเป็น</strong> <?php echo $row['ergen_relation']; ?>
                    </div>
                    <div class="col-sm-5">
                      <strong>หมายเลขโทรศัพท์</strong> <?php echo $row['ergen_phone']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (6)
                    </div>
                    <div class="col-sm-6">
                      <strong>ระยะเวลาฝึกงานตั้งแต่วันที่</strong> <?php echo $row['train_start']; ?>
                    </div>
                    <div class="col-sm-5">
                      <strong>ถึงวันที่</strong> <?php echo $row['train_end']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <strong>ลักษณะงาน</strong> <?php echo $row['job_attr']; ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <strong>ประเภทงาน</strong> <?php echo $row['job_type']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (7)
                    </div>
                    <div class="col-sm-11">
                      <strong>การมีส่วนร่วมในกิจกรรม ทั้งในและนอกมหาวิทยาลัย นอกเนือจากการเรียนปกติ</strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <?php if($row['act_1']!=''){ echo '1) '; echo $row['act_1']; } ?><br>
                      <?php if($row['act_2']!=''){ echo '2) '; echo $row['act_2']; } ?><br>
                      <?php if($row['act_3']!=''){ echo '3) '; echo $row['act_3']; } ?><br>
                      <?php if($row['act_4']!=''){ echo '4) '; echo $row['act_4']; } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-1">
                      (8)
                    </div>
                    <div class="col-sm-11">
                      <strong>ความสามารถทางด้านภาษา</strong>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <strong>ทักษะการสื่อสารภาษาอังกฤษ </strong>
                      <?php
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
                      (9)
                    </div>
                    <div class="col-sm-11">
                      <strong>ความสามารถด้านคอมพิวเตอร์</strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-1">
                      <?php if($row['com_skill_1']!=''){ echo '1) '; echo $row['com_skill_1']; } ?><br>
                      <?php if($row['com_skill_2']!=''){ echo '2) '; echo $row['com_skill_2']; } ?><br>
                      <?php if($row['com_skill_3']!=''){ echo '3) '; echo $row['com_skill_3']; } ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <button type="button" name="button" class="btn btn-app-red" style="margin-top: 24px;"><i class="fa fa-check-square-o"></i> ยืนยันการตรวจสอบ</button> <button type="button" name="button" class="btn btn-app-blue" style="margin-top: 24px;"><i class="fa fa-print"></i> Print</button>
                    </div>
                  </div>
                </div>
              </div>
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
    <!-- Page JS Plugins -->
    <script src="../../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- Page JS Code -->
    <script src="../../assets/js/pages/base_tables_datatables.js"></script>

    <!-- Include JS custom code -->
    <script src="../../dist/page/administrator/index.js"></script>
    <!-- <script src="../../dist/page/signup/forms_validation.js"></script> -->
    <!-- Page JS Code -->

  </body>
</html>
