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
    <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400,500" rel="stylesheet">

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
                <header class="app-layout-header">
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
                              								<button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
                              							</span>
                                        </div>
                                    </div>
                                </form>



                                <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">
                                    <li style="padding-top: 10px;">
                                      <button type="button" name="button" class="btn btn-app-red" id="btnSignout">ออกจากระบบ</button>
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 text-left">
          <h2 style="font-weight: 400;">ระบบสมัครฝึกงานภาคฤดูร้อน<br><small>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></h2>
        </div>
      </div>
      <div class="row" style="padding-top: 0px; margin-top: 0px;">
        <div class="col-sm-3">
          <nav class="drawer-main">
            <ul class="nav nav-drawer" >
                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">เมนู</li>

                <li class="nav-item active">
                    <a href="./" style="font-weight: 300;"><i class="ion-ios-speedometer-outline"></i> หน้าแรก</a>
                </li>

                <!-- <li class="nav-item">
                    <a href="./participant/" style="font-weight: 300;"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                </li> -->
                <li class="nav-item nav-item-has-subnav">
                  <a href="javascript:void(0)" style="font-weight: 300;"><i class="ion-ios-monitor-outline"></i> รายการผู้สมัคร</a>
                  <ul class="nav nav-subnav">

                      <li>
                          <a href="./participant/" style="font-weight: 300;"><i class="ion-android-list"></i> ผู้สมัครที่ทำการยื่นขอ</a>
                      </li>

                      <li>
                          <a href="./participant/" style="font-weight: 300;"><i class="ion-android-done-all"></i> ผู้สมัครที่ผ่านการดำเนินการแล้ว</a>
                      </li>

                  </ul>
                </li>

                <li class="nav-item nav-drawer-header" style="font-weight: 500; color: teal;">การจัดการ</li>

                <li class="nav-item">
                    <a href="./useraccount/" style="font-weight: 300;"><i class="ion-android-person"></i> บัญชีผู้ใช้งาน</a>
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
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="../assets/js/core/jquery.placeholder.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/app-custom.js"></script>

    <!-- Page JS Plugins -->
    <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="../assets/js/plugins/dropzonejs/dropzone.min.js"></script>
    <script src="../assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>

    <!-- Include JS custom code -->
    <script src="../dist/page/administrator/index.js"></script>
    <!-- <script src="../dist/page/administrator/forms_validation.js"></script> -->
    <!-- Page JS Code -->
    <script>
        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker', 'select2', 'masked-inputs']);
        });
    </script>
  </body>
</html>
