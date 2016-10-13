<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

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
                      <div class="col-sm-12 text-left">
                        <h2 style="font-weight: 400; background: transparent;">ระบบสมัครฝึกงานภาคฤดูร้อน <small>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></h2>
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

                <li class="nav-item ">
                    <a href="./" style="font-weight: 300;"><i class="ion-ios-speedometer-outline"></i> ใบสมัครฝึกงาน</a>
                </li>

                <li class="nav-item active">
                    <a href="./question/" style="font-weight: 300;"><i class="ion-android-person"></i> แบบสอบถามวิชาฝึกงาน</a>
                </li>

                <li class="nav-item">
                    <a href="./useraccount/" style="font-weight: 300;"><i class="ion-android-person"></i> ยืนยันข้อมูล</a>
                </li>

                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">อื่นๆ</li>

                <li class="nav-item">
                    <a href="../signout.php" style="font-weight: 300;"><i class="ion-android-exit"></i> ออกจากระบบ</a>
                </li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-9" style="padding-top: 20px;" id="loginPane">
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-blue bg-inverse">
                    <h4 style="background: transparent; font-weight: 400;">รายการผู้ยื่นคำขอ</h4>
                </div>
                <div class="card-block">
                  <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>รหัสนักศึกษา</th>
                            <th class="hidden-xs">ชื่อ-สกุล</th>
                            <th class="hidden-xs w-20">ปีการศึกษา</th>
                            <th class="text-center" style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $strSQL = "SELECT * FROM trs3_registration WHERE confirm_status = ? ORDER BY registration_id ";
                      $result = $db->select($strSQL, array("N"));
                      if($result){
                        // $row = $result->fetch();
                        $c = 1;
                        foreach ($result as $value) {
                          // $row = $value->fetch();
                          ?>
                          <tr>
                              <td class="text-center"><?php echo $c; $c++; ?></td>
                              <td class="font-500"><?php echo $value['std_id']; ?></td>
                              <td class="hidden-xs"><?php echo $value['std_fullname_th']; ?></td>
                              <td class="hidden-xs"><?php echo $value['reg_year']; ?></td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button class="btn btn-xs btn-app-blue" type="button" data-toggle="tooltip" title="ดูข้อมูล" onclick="redirect('../applicationinfo/?pid=<?php echo $value['registration_id']; ?>')"><i class="fa fa-search"></i></button>
                                      <button class="btn btn-xs btn-app-red" type="button" data-toggle="tooltip" title="ลบรายการ" onclick="redirect_conf('../../controller/delete_register.php?pid=<?php echo $value['registration_id']; ?>')"><i class="fa fa-trash"></i></button>
                                  </div>
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
