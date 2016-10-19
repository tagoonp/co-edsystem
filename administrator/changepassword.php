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
  header('Location: ../error/?type=1'); die();
  die();
}

$row = $result->fetch();

// if(!$result){
//   header('Location: ../error/?type=1'); die();
// }

// $row = $result->fetch();
// $rowQn = $resultQn->fetch();
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

    <div class="container" style="background: #f1f1f1;">

      <div class="row">
        <div class="col-sm-12">
          <div style="padding: 20px 0px 0px 0px;">
            <div class="text-left">
              <button type="button" name="button" class="btn btn-app-teal" style="font-size: 20px;" onclick="redirect('../../administrator/')"><i class="fa fa-home"></i> กลับสู่หน้าหลัก</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="padding-top: 0px; margin-top: 0px;">
        <div class="col-sm-12" style="padding-top: 20px;" id="loginPane">

          <div class="card">
            <div class="card-header bg-blue bg-inverse">
                <h4>เปลี่ยนรหัสผ่าน</h4>
            </div>
            <div class="card-block">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-3" style="padding: 30px;">
                  <form class="changepwdform form-horizontal m-t-sm" action="base_forms_samples.html" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="email" id="register2-email" name="register2-email" placeholder="Enter email..." />
                                <label for="register2-email">อีเมลที่ได้ลงทะเบียนกับระบบไว้ <span class="text-red">**</span></label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="password" id="register2-password" name="register2-password" placeholder="Enter password..." />
                                <label for="register2-password">รหัสผ่านเดิม <span class="text-red">**</span></label>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="password" id="register2-password2" name="register2-password2" placeholder="New password..." />
                                <label for="register2-password2">รหัสผ่านใหม่ <span class="text-red">**</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material">
                                <input class="form-control" type="password" id="register2-password3" name="register2-password3" placeholder="Confirm new password..." />
                                <label for="register2-password2">ยืนยันรหัสผ่านใหม่ <span class="text-red">**</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-xs-12">
                            <button class="btn btn-app btn-block" type="submit">ยืนยัน</button>
                        </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


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
    <script src="../../assets/js/core/jquery.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="../../assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="../../assets/js/core/jquery.placeholder.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/app-custom.js"></script>
    <script src="../../ext-lib/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../ext-lib/sweetalert-master/dist/sweetalert.css">
    <script src="../../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="../../dist/page/changepassword/forms_validation.js"></script>
    <!-- Include JS custom code -->
    <script src="../../dist/page/student/index.js"></script>
  </body>
</html>
