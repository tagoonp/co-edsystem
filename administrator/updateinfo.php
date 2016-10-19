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

$strSQL = "SELECT * FROM trs3_user a INNER JOIN trs3_userinfo b on a.username = b.userinfo_username WHERE a.username = ? AND a.active_status = 'Y'  ";
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
                                    <li><a href="./changepassword/">เปลี่ยนรหัสผ่าน</a></li>
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
                              <a href="./participant/" style="font-weight: 300;"><i class="ion-android-done-all"></i> ผู้สมัครที่ผ่านการดำเนินการแล้ว</a>
                          </li>

                      </ul>
                    </li>

                    <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">การจัดการ</li>

                    <li class="nav-item active">
                        <a href="../useraccount/" style="font-weight: 300;"><i class="ion-android-person"></i> บัญชีผู้ใช้งาน</a>
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
              <a href="../userinfo/?username=<?php echo $rowinfo['username']; ?>" class="btn btn-app-teal btn-custom" style="font-size: 22px; padding: 5px 10px 0px 10px;">ย้อนกลับ</a>
              <!-- <button type="button" name="button" class="btn btn-app-teal btn-custom" style="font-size: 22px; padding: 5px 10px 0px 10px;"></button> -->
              

            </div>
            <div class="col-sm-6 text-right">


            </div>
          </div>
          <div class="row" style="margin-top: 20px; font-size: 0.8em;">
            <div class="col-sm-12">
              <div class="card">
                                    <div class="card-header">
                                        <h4>แก้ไขข้อมูลส่วนตัว</h4>
                                    </div>
                                    <div class="card-block">
                                        <!-- jQuery Validation (.js-validation-material class is initialized in js/pages/base_forms_validation.js) -->
                                        <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-material form-horizontal m-t-sm" action="../../controller/updateinfo.php" method="post">
                                          <div class="form-group">
                                              <div class="col-sm-12">
                                                  <div class="form-material">
                                                      <input class="form-control" type="text" id="val-username" name="val-username" placeholder="กรอกชื่อจริง ..." readonly value="<?php print $rowinfo['username']; ?>" />
                                                      <label for="val-username2">Username (Readonly) <span style="color: red;">**</span></label>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="col-sm-12">
                                                  <div class="form-material">
                                                      <select class="form-control" id="val-prefix" name="val-prefix">
                                                        <option value="">----- เลือกคำนำหน้าชื่อ -----</option>
                                                        <option value="นาย" <?php if($rowinfo['userinfo_prefix']=="นาย"){ echo "selected"; } ?>>นาย</option>
                                                        <option value="นาง" <?php if($rowinfo['userinfo_prefix']=="นาง"){ echo "selected"; } ?>>นาง</option>
                                                        <option value="นางสาว" <?php if($rowinfo['userinfo_prefix']=="นางสาว"){ echo "selected"; } ?>>นางสาว</option>
                                                        <option value="รศ." <?php if($rowinfo['userinfo_prefix']=="รศ."){ echo "selected"; } ?>>รศ.</option>
                                                        <option value="ผศ." <?php if($rowinfo['userinfo_prefix']=="ผศ."){ echo "selected"; } ?>>ผศ.</option>
                                                        <option value="ศ." <?php if($rowinfo['userinfo_prefix']=="ศ."){ echo "selected"; } ?>>ศ.</option>
                                                        <option value="Mr." <?php if($rowinfo['userinfo_prefix']=="Mr."){ echo "selected"; } ?>>Mr.</option>
                                                        <option value="Ms." <?php if($rowinfo['userinfo_prefix']=="Ms."){ echo "selected"; } ?>>Ms.</option>
                                                        <option value="Mrs." <?php if($rowinfo['userinfo_prefix']=="Mrs."){ echo "selected"; } ?>>Mrs.</option>
                                                        <option value="Dr." <?php if($rowinfo['userinfo_prefix']=="Dr."){ echo "selected"; } ?>>Dr.</option>
                                                        <option value="Assoc. Prof." <?php if($rowinfo['userinfo_prefix']=="Assoc. Prof."){ echo "selected"; } ?>>Assoc. Prof.</option>
                                                        <option value="Assist. Prof." <?php if($rowinfo['userinfo_prefix']=="Assist. Prof."){ echo "selected"; } ?>>Assist. Prof.</option>
                                                        <option value="Prof." <?php if($rowinfo['userinfo_prefix']=="Prof."){ echo "selected"; } ?>>Prof.</option>
                                                      </select>
                                                      <label for="val-skill2">คำนำหน้าชื่อ <span style="color: red;">**</span></label>
                                                  </div>
                                              </div>
                                          </div>

                                            <div class="row">



                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="form-material">
                                                            <input class="form-control" type="text" id="val-fname" name="val-fname" placeholder="กรอกชื่อจริง ..." value="<?php print $rowinfo['userinfo_fname']; ?>" />
                                                            <label for="val-username2">ชื่อ <span style="color: red;">**</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>

                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <div class="form-material">
                                                            <input class="form-control" type="text" id="val-lname" name="val-lname" placeholder="กรอกนามสกุล ..." value="<?php print $rowinfo['userinfo_lname']; ?>" />
                                                            <label for="val-username2">นามสกุล <span style="color: red;">**</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="val-phone" name="val-phone" placeholder="กรอกหมายเลขโทรศัพท์ ..." value="<?php print $rowinfo['userinfo_phone']; ?>" />
                                                        <label for="val-username2">หมายเลขโทรศัพท์</label>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="val-email" name="val-email" placeholder="กรอกอีเมลแอดเดรส..."  value="<?php print $rowinfo['email']; ?>" />
                                                        <label for="val-email2">Email <span style="color: red;">**</span></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-b-0">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-app" type="submit">บันทึกข้อมูล</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- .card-block -->
                                </div>
                                <!-- .card -->
                                <!-- End Material Forms Validation -->

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
    <script src="../../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="../../dist/page/administrator/forms_validation.js"></script>

    <!-- Include JS custom code -->
    <script src="../../dist/page/administrator/index.js"></script>

  </body>
</html>
