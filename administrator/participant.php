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
                    <li class="nav-item nav-item-has-subnav active">
                      <a href="javascript:void(0)" style="font-weight: 300;" id="asd"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                      <ul class="nav nav-subnav">

                          <li>
                              <a href="../participant/" style="font-weight: 300;"><i class="ion-android-list"></i> ผู้สมัครที่ทำการยื่นขอ</a>
                          </li>

                          <li>
                              <a href="../participant-all/" style="font-weight: 300;"><i class="ion-android-done-all"></i> ผู้สมัครที่ผ่านการดำเนินการแล้ว</a>
                          </li>

                      </ul>
                    </li>

                    <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">การจัดการ</li>

                    <li class="nav-item ">
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

          <div class="row" style="margin-top: 0px;">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header bg-blue bg-inverse">
                    <h4 style="background: transparent; font-weight: bold;">รายการผู้ยื่นคำขอ</h4>
                </div>
                <div class="card-block">
                  <table class="table table-bordered table-striped table-vcenter js-dataTable-full table-header-bg">
                    <thead>
                        <tr>
                            <th  style="font-weight: bold; padding: 10px; font-size: 26px;"></th>
                            <th style="font-weight: bold; padding: 10px; font-size: 26px;">ชื่อบัญชีผู้ใช้</th>
                            <th  style="font-weight: bold; padding: 10px; font-size: 26px;">ชื่อ-สกุล</th>
                            <th  style="font-weight: bold; padding: 10px; font-size: 26px;">ประเภท</th>
                            <th  style="font-weight: bold; padding: 10px; font-size: 26px;">สถานะ</th>
                            <th style="width: 20%;" ></th>
                        </tr>
                    </thead>
                    <tbody class="wizardTbd">
                      <?php
                      $strSQL = "SELECT * FROM trs3_registration a inner join trs3_questioniar b on a.std_id = b.qn_studentid WHERE b.qn_advicestatus = 'Waiting' AND a.confirm_status = 'Y' ORDER BY a.registration_id LIMIT 0, 1000";
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
                              <td>
                                <?php
                                echo $value['qn_advicestatus'];
                                ?>
                              </td>
                              <td class="text-center">
                                  <div class="btn-group">
                                      <button class="btn btn-xs btn-app-blue btn-custom" type="button" data-toggle="tooltip" title="ดูข้อมูล" onclick="redirect('../applicationinfo/?pid=<?php echo $value['registration_id']; ?>')"><i class="fa fa-search"></i></button>
                                      <button class="btn btn-xs btn-app-red btn-custom" type="button" data-toggle="tooltip" title="ลบรายการ" onclick="redirect_conf('../../controller/delete-registration.php?pid=<?php echo $value['registration_id']; ?>')" ><i class="fa fa-trash"></i></button>
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

    <!-- Page JS Plugins -->
    <script src="../../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- Page JS Code -->
    <script src="../../assets/js/pages/base_tables_datatables.js"></script>

    <!-- Include JS custom code -->
    <script src="../../dist/page/administrator/index.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#asd').trigger('click');
      });
    </script>
  </body>
</html>
