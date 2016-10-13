<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

$strSQL = "SELECT * FROM trs3_registration WHERE std_id = ? AND confirm_status = ? ORDER BY registration_id ";
$result = $db->select($strSQL, array($_SESSION[$sprefix.'Username'], "N"));

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
                <header class="app-layout-header"  style="background: #021148; color: #fff;">
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
      <!-- <div class="row">
        <div class="col-sm-12 text-left">
          <h2 style="font-weight: 400;">ระบบสมัครฝึกงานภาคฤดูร้อน<br><small>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></h2>
        </div>
      </div> -->
      <div class="row" style="padding-top: 0px; margin-top: 0px;">
        <div class="col-sm-3">
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
                    <a href="../../signout.php" style="font-weight: 300;"><i class="ion-android-exit"></i> ออกจากระบบ</a>
                </li>
            </ul>
          </nav>
        </div>
        <div class="col-sm-9" style="padding-top: 20px;" id="loginPane">

            <div class="row">
              <!-- <div class="col-sm-2">
                <button type="button" name="button" class="btn btn-app-light"  onclick="window.history.back();"><i class="fa fa-chevron-left"></i> ย้อนกลับ</button>
              </div> -->
              <div class="col-sm-12 text-right">
                <button type="button" name="button" class="btn btn-app-red"><i class="fa fa-trash"></i> ลบข้อมูลนี้</button>
                <button type="button" name="button" class="btn btn-app-red"><i class="fa fa-trash"></i> แก้ไข</button>
                <button type="button" name="button" class="btn btn-app-teal"><i class="fa fa-check-square-o"></i> ยืนยันข้อมูลนี้</button> <button type="button" name="button" class="btn btn-app-blue" ><i class="fa fa-print"></i> Print</button>
              </div>
            </div>
            <div class="row" style="padding-top: 20px;">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <h1>ระบบสมัครฝึกงานภาคฤดูร้อน</h1>
                    <h3>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</h3>
                  </div>
                  <div class="col-sm-12" style="padding-top: 20px;" id="loginPane">
                    <div class="row">
                      <div class="col-sm-10 col-sm-offset-1">
                        <form class="js-validation-material form-horizontal" action="controller/register.php" method="post" >

                          <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-studyyear" maxlength="4"  name="txt-studyyear" placeholder="กรอกปีการศึกษา (ปี พ.ศ. ตัวเลข 4 หลัก)..." />
                                    <label for="val-username2">ปีการศึกษา <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-stdid"  maxlength="10" name="txt-stdid" placeholder="กรอกรหัสนักศึกษา (ตัวเลข 10 หลัก) ..." />
                                    <label for="val-username2">รหัสนักศึกษา <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-xs-12" for="example-file-input">รูปประจำตัว  <span class="text-red">**</span></label>
                            <div class="col-xs-12">
                                <input type="file" id="txt-photo" name="txt-photo">
                                <p style="font-size: 0.8em;">
                                  <strong><u><i>คำแนะนำ</i></u></strong> เลือกรูปกว้าง 100 pixel และสูง 150 pixel นามสกุล jpeg, jpg หรือ png
                                </p>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-name-th" name="txt-name-th" placeholder="กรอกชื่อ - นามสกุล (ภาษาไทย) ..." />
                                    <label for="val-username2">ชื่อ - สกุล (ภาษาไทย) <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-name-eng" name="txt-name-eng" placeholder="กรอกชื่อ - นามสกุล (ภาษาอังกฤษ) ..." />
                                    <label for="val-username2">ชื่อ - สกุล (ภาษาอังกฤษ) <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-8" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <div class="form-material">
                                    <input class="js-masked-date-dash form-control" type="text" id="txt-dob" name="txt-dob" placeholder="วว-ดด-ปปปป" />
                                    <label for="example-masked2-date2">วัน/เดือน/ปีเกิด (พ.ศ.) <span class="text-red">**</span></label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-4" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-age" name="txt-age" placeholder="กรอกอายุ ... ปี (เฉพาะตัวเลข)" />
                                        <label for="val-username2">อายุ <span class="text-red">**</span> </label>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-4" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                      <select class="form-control" id="txt-rel" name="txt-rel" style="width: 100%;" >
                                        <option value="" selected="">เลือกศาสนา ... </option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                        <option value="1">พุทธ</option>
                                        <option value="2">คริส</option>
                                        <option value="3">อิสลาม</option>
                                        <option value="4">ฮินดู</option>
                                        <option value="99">อื่นๆ</option>
                                      </select>
                                      <label for="example2-select2">ศาสนา <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-4" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-nation" name="txt-nation" placeholder="กรอกสัญชาติ ..." />
                                        <label for="val-username2">สัญชาติ <span class="text-red">**</span> </label>
                                    </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-4" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                      <input class="form-control" type="text" id="txt-race" name="txt-race" placeholder="กรอกเชื้อชาติ ..." />
                                      <label for="val-username2">เชื้อชาติ <span class="text-red">**</span> </label>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="val-disease" name="val-disease" placeholder="กรอกโรคประจำตัว ..." />
                                    <label for="val-username2">โรคประจำตัว</label>
                                </div>
                                <p style="font-size: 0.8em;">
                                  <strong><u><i>คำแนะนำ</i></u></strong> หากมีหลายโรค ให้คั่นด้วยเครื่องหมาย , <u>ตัวอย่างเช่น</u> โรคภูมิแพ้, โรคหวัด
                                </p>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-6" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-phone" maxlength="10" name="txt-phone" placeholder="การอกหมายเลขโทรศัพท์ (เฉพาะตัวเลข) ..." />
                                        <label for="val-username2">โทรศัพท์ <span class="text-red">**</span> </label>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-email" name="txt-email" placeholder="กรอกอีเมลแอดเดรส ..." />
                                        <label for="val-username2">Email <span class="text-red">**</span> </label>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <textarea class="form-control" id="txt-address" name="txt-address" rows="3" placeholder="กรอกที่อยู่ปัจจุบัน ..."></textarea>
                                    <label for="val-suggestions2">ที่อยู่ปัจจุบัน <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-gpa" name="txt-gpa" maxlength="4" placeholder="กรอกเกรดเฉลี่ย (ทศนิยม)..." />
                                    <label for="val-username2">ประวัติการศึกษา เกรดเฉลี่ย <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-ptherperson" name="txt-ptherperson"  placeholder="ชื่อ-สกุล บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน" />
                                    <label for="val-username2">ชื่อ-สกุล บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน <span class="text-red">**</span></label>
                                </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-6" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-relation" name="txt-relation" placeholder="กรอกความเกี่ยวข้อง..." />
                                        <label for="val-username2">เกี่ยวข้องเป็น <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-sm-6" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-ptherperson-phone" name="txt-ptherperson-phone" maxlength="10" placeholder="กรอกเกรดเฉลี่ย (ทศนิยม)..." />
                                        <label for="val-username2">หมายเลขโทรศัพท์ <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-6" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                      <input class="js-masked-date-dash form-control" type="text" id="txt-startdate" name="txt-startdate" placeholder="วว-ดด-ปปปป" />
                                      <label for="example-masked2-date2">ระยะวลาฝึกงาน ตั้งแต่วันที่ (ปี พ.ศ.) <span class="text-red">**</span></label>
                                    </div>
                                    <!-- <div class="form-material">
                                        <input class="form-control" type="text" id="val-username2" name="val-username2" placeholder="Choose a nice username..." />
                                        <label for="val-username2">ระยะวลาฝึกงาน ตั้งแต่วันที่ <span class="text-red">**</span> </label>
                                    </div> -->
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-6" style="padding-top: 10px;">
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <div class="form-material">
                                    <input class="js-masked-date-dash form-control" type="text" id="txt-enddate" name="txt-enddate" placeholder="วว-ดด-ปปปป" />
                                    <label for="example-masked2-date2">ถึงวันที่ (ปี พ.ศ.)<span class="text-red">**</span></label>
                                  </div>
                                    <!-- <div class="form-material">
                                        <input class="form-control" type="text" id="val-username2" name="val-username2" placeholder="Choose a nice username..." />
                                        <label for="val-username2">ถึงวันที่ <span class="text-red">**</span> </label>
                                    </div> -->
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-jobtype" name="txt-jobtype" placeholder="กรอกลักษณะงาน ..." />
                                    <label for="val-username2">ลักษณะงาน</label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="txt-jobcat" name="txt-jobcat" placeholder="กรอกประเภทงาน ..." />
                                    <label for="val-username2">ประเภทงาน</label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="val-activity1" name="val-activity1" placeholder="1) ... " />
                                    <input class="form-control" type="text" id="val-activity2" name="val-activity2" placeholder="2) ... " />
                                    <input class="form-control" type="text" id="val-activity3" name="val-activity3" placeholder="3) ... " />
                                    <input class="form-control" type="text" id="val-activity4" name="val-activity4" placeholder="4) ... " />
                                    <label for="val-username2">การมีส่วนร่วมในกิจกรรม ทั้งในและนอกมหาวิทยาลัย นอกเหนือจาการเรียนปกติ</label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-xs-12 text-left">
                                <label for="val-username2">ความสามารถด้านภาษา ทักษาการสื่อสารภาษาอังกฤษ <span class="text-red"></span></label>
                                <label class="css-input css-radio css-radio-danger m-r-sm" style="display:none;">
                  								<input type="radio" name="radio-group5" value="0" checked /><span></span> NA
                  							</label>
                                <label class="css-input css-radio css-radio-danger m-r-sm">
                  								<input type="radio" name="radio-group5" value="1" /><span></span> ดี
                  							</label>
                                <label class="css-input css-radio css-radio-danger">
                  								<input type="radio" name="radio-group5" value="2" /><span></span> ปานกลาง
                  							</label>
                                <label class="css-input css-radio css-radio-danger">
                  								<input type="radio" name="radio-group5" value="3" /><span></span> พอใช้
                  							</label>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12" style="padding-top: 10px;">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="val-com1" name="val-com1" placeholder="1) ... " />
                                    <input class="form-control" type="text" id="val-com2" name="val-com2" placeholder="2) ... " />
                                    <input class="form-control" type="text" id="val-com3" name="val-com3" placeholder="3) ... " />
                                    <label for="val-username2">ความสามารถด้านคอมพิวเตอร์</label>
                                </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2 text-center">
                              <div class="form-material text-center">
                                <label class="css-input css-checkbox css-checkbox-default text-center " for="val-terms2">
                                  <input type="checkbox" id="val-terms2" name="val-terms2" value="1"  style="padding-bottom: 20px;" /><span></span> ข้าพเจ้าขอรับรองว่าข้อมูลข้างต้นเป็นความจริงทุกประการ <span class="text-red">**</span>
                                </label>
                              </div>
                            </div>
                          </div>

                          <div class="form-group m-b-0" style="padding-top: 30px;">
                            <div class="col-xs-12 text-center">
                                <button class="btn btn-app" type="submit">บันทึกข้อมูล</button>
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
            </div>
            <!-- End row -->
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
    <script src="../../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="../../assets/js/plugins/dropzonejs/dropzone.min.js"></script>
    <script src="../../assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>

    <!-- Include JS custom code -->
    <script src="../../dist/page/student/index.js"></script>
    <script src="../../dist/page/student/forms_validation.js"></script>
    <script>
        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker', 'select2', 'masked-inputs']);
        });
    </script>
  </body>
</html>
