<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="AppUI - Frontend Template & UI Framework" />
    <meta name="robots" content="noindex, nofollow" />

    <title>Co-ed system : ระบบสมัครฝึกงานภาคฤดูร้อน ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</title>

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
                      <a href="../" style="color: #fff; font-weight: bold;"><span style="font-size: 40px;">ระบบสมัครฝึกงานภาคฤดูร้อน <small style="margin-top: -20px; padding-top: 0px;">ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></span></a>
                    </span>
                </div>
            </div>
            <!-- .container-fluid -->
        </nav>
        <!-- .navbar-default -->
    </header>
    <!-- End header -->
    <div class="container-fluid">
      <div class="row" style="padding-top: 30px;">
        <div class="col-sm-12 text-center">
          <h1>ลงชื่อเข้าใช้งาน</h1>
          <!-- <h3>ระบบสมัครฝึกงานภาคฤดูร้อน</h3> -->
        </div>
        <div class="col-sm-12" style="padding-top: 40px;" id="loginPane">
          <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
              <form class="js-validation-material form-horizontal" action="../controller/authen.php" method="post" >
                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-username"  name="txt-username" placeholder="กรอกชื่อบัญชีผู้ใช้ ..." />
                          <label for="val-username2">ชื่อบัญชีผู้ใช้ หรือ อีเมลแอดเดรส <span class="text-red">**</span></label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12" style="padding-top: 10px;">
                      <div class="form-material">
                          <input class="form-control" type="password" id="txt-password"   name="txt-password" placeholder="กรอกรหัสผ่าน ..." />
                          <label for="val-username2">รหัสผ่าน <span class="text-red">**</span></label>
                      </div>
                  </div>
                </div>

                <div class="form-group m-b-0" style="padding-top: 10px;">
                  <div class="col-xs-12 text-center">
                      <button class="btn btn-app btn-block" type="submit">เข้าสู่ระบบ</button>
                  </div>
                </div>
              </form>
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
    <script src="../dist/page/signin/index.js"></script>
    <script src="../dist/page/signin/forms_validation.js"></script>
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
