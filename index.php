<?php
session_start();
session_regenerate_id();
?>
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
    <link rel="apple-touch-icon" href="assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" href="assets/img/favicons/favicon.ico" />

    <!-- Google fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400,500" rel="stylesheet"> -->

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="assets/js/plugins/select2/select2.min.css" />
    <link rel="stylesheet" href="assets/js/plugins/dropzonejs/dropzone.min.css" />
    <link rel="stylesheet" href="assets/js/plugins/select2/select2-bootstrap.css" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="assets/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="assets/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="assets/css/app-custom.css" />

    <style media="screen">


    </style>
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
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

                <div class="" style="background: #f3f3f3; padding: 10px 0px 10px 0px; margin-bottom: 20px; -moz-box-shadow: 0 0 5px #888;
                          -webkit-box-shadow: 0 0 5px#888;
                          box-shadow: 0 0 5px #888;">
                                <div class="container-fluid">
                                  <div class="row">
                                    <div class="col-sm-12 text-left">
                                      <button class="btn btn-app" id="btnRecommand" data-toggle="modal" data-target="#modal-large" type="button">ขั้นตอนการเข้าใช้ระบบ</button>
                                      <button type="button" name="button" class="btn btn-app-red" id="btnSignin">เข้าสู่ระบบ</button>
                                    </div>
                                  </div>
                                </div>
                  </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Validation Wizard (.js-wizard-validation class is initialized in js/pages/base_forms_wizard.js) -->
          <!-- For more examples please check http://vadimg.com/twitter-bootstrap-wizard-example/ -->
          <div class="card js-wizard-validation">
              <!-- Step Tabs -->
              <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                  <li class="active">
                      <a class="inactive" href="#validation-step1" data-toggle="tab">แบบฟอร์มสมัครฝึกงานภาคฤดูร้อน</a>
                  </li>
                  <!-- <li>
                      <a class="inactive" href="#validation-step2" data-toggle="tab">อัพโหลดรูปภาพ</a>
                  </li> -->
                  <li>
                      <a class="inactive" href="#validation-step2" data-toggle="tab">แบบสอบถามรายวิชาฝึกงาน</a>
                  </li>
              </ul>
              <!-- End Step Tabs -->

              <!-- Form -->
              <!-- jQuery Validation (.js-form2 class is initialized in js/pages/base_forms_wizard.js) -->
              <!-- For more examples please check https://github.com/jzaefferer/jquery-validation -->
              <form class="js-form2 form-horizontal" action="controller/register.php" method="post" autocomplete="off">
                <!-- <form class="js-validation-material form-horizontal" action="controller/register.php" method="post" > -->
                  <!-- Steps Content -->
                  <div class="card-block tab-content">
                      <!-- Step 1 -->
                      <div class="tab-pane fade fade-right in m-t-md m-b-lg active" id="validation-step1">
                        <h1 class="text-center" style="color: teal;">แบบฟอร์มสำหรับสมัครฝึกงานภาคฤดูร้อน<br><small style="font-weight: bold;">ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></h1>
                          <div class="row">
                            <div class="col-sm-5 col-sm-offset-1">
                              <h3 style="color: orange;">ข้อมูลทั่วไป</h3>
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

                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-phone" maxlength="10" name="txt-phone" placeholder="กรอกหมายเลขโทรศัพท์ (เฉพาะตัวเลข) ..." />
                                        <label for="val-username2">โทรศัพท์ <span class="text-red">**</span> </label>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-email" name="txt-email" placeholder="กรอกอีเมลแอดเดรส ..." />
                                        <label for="val-username2">Email <span class="text-red">**</span> </label>
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
                            </div>
                            <!-- End col-sm-5 offet-1 -->

                            <div class="col-sm-5">
                              <h3 style="color: orange;">ข้อมูลการติดต่อฉุกเฉิน</h3>

                              <div class="form-group">
                                <div class="col-sm-12" style="padding-top: 10px;">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-ptherperson" name="txt-ptherperson"  placeholder="ชื่อ-สกุล บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน" />
                                        <label for="val-username2">ชื่อ-สกุล บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>


                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-relation" name="txt-relation" placeholder="กรอกความเกี่ยวข้อง..." />
                                        <label for="val-username2">เกี่ยวข้องเป็น <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                        <input class="form-control" type="text" id="txt-ptherperson-phone" name="txt-ptherperson-phone" maxlength="10" placeholder="กรอกหมายเลขโทรศัพท์ (เฉพาะตัวเลข) ..." />
                                        <label for="val-username2">หมายเลขโทรศัพท์ <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>

                              <h3 style="color: orange;">ข้อมูลการสมัครฝึกงาน</h3>
                              <div class="form-group" style="display:none;">
                                <div class="col-sm-12">
                                    <div class="form-material">
                                      <input class="js-masked-date-dash form-control" type="text" id="txt-startdate" name="txt-startdate" placeholder="วว-ดด-ปปปป" value="00-00-0000" />
                                      <label for="example-masked2-date2">ระยะวลาฝึกงาน ตั้งแต่วันที่ (ปี พ.ศ.) <span class="text-red">**</span></label>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group" style="display:none;">
                                <div class="col-sm-12">
                                  <div class="form-material">
                                    <input class="js-masked-date-dash form-control" type="text" id="txt-enddate" name="txt-enddate" placeholder="วว-ดด-ปปปป" value="00-00-0000" />
                                    <label for="example-masked2-date2">ถึงวันที่ (ปี พ.ศ.) <span class="text-red">**</span></label>
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
                                        <label for="val-username2"><div>การมีส่วนร่วมในกิจกรรม ทั้งในและนอกมหาวิทยาลัย </div></label>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-xs-12 text-left">
                                    <label for="val-username2" style="font-weight: bold;">ความสามารถด้านภาษา ทักษาการสื่อสารภาษาอังกฤษ <span class="text-red"></span></label><br>
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
                            </div>
                          </div>

                      </div>
                      <!-- End Step 1 -->

                      <!-- Step 2 -->
                      <div class="tab-pane fade fade-right m-t-md m-b-lg" id="validation-step2">
                        <h1 class="text-center" style="color: teal;">แบบสอบถามรายวิชาฝึกงาน<br><small style="font-weight: bold;">ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</small></h1>
                          <div class="container">
                            <h4 style="color: orange;">ข้อมูลความต้องการฝึกงาน</h4>
                            <div class="row">
                              <div class="col-sm-5">
                                <div class="form-group">
                                  <div class="col-sm-12" style="padding-top: 10px;">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-department" name="txt-department" placeholder="กรอกสาขา/ตำแหน่ง/แผนก/ฝ่าย ..." />
                                          <label for="txt-department">สาขา/ตำแหน่ง/แผนก/ฝ่าย</label>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-5">
                                <div class="form-group">
                                  <div class="col-sm-12" style="padding-top: 10px;">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-unit" name="txt-unit" placeholder="กรอกหน่วยงาน/บริษัท/สถานประกอบการ..." />
                                          <label for="txt-unit">หน่วยงาน/บริษัท/สถานประกอบการ</label>
                                      </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-2">
                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <button class="btn btn-app-teal" id="btnaddrequirement" type="button">เพิ่มข้อมูลเข้าตาราง</button>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <span id="temp_result">
                                  <table class="table table-bordered table-header-bg">
                                    <thead>
                                      <tr>
                                        <th style="font-weight: bold; padding: 10px; font-size: 26px;">ลำดับที่</th>
                                        <th style="font-weight: bold; padding: 10px; font-size: 26px;">สาขา/ตำแหน่ง/แผนก/ฝ่าย</th>
                                        <th style="font-weight: bold; padding: 10px; font-size: 26px;">หน่วยงาน/บริษัท/สถานประกอบการ</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td colspan="3" style="padding: 5px 10px; font-size: 24px">ไม่พบข้อมูล</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </span>
                              </div>
                            </div>

                            <div class="row" style="display:none;">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                        <input class="js-masked-date-dash form-control" type="text" id="txt-startdate2" name="txt-startdate2" placeholder="วว-ดด-ปปปป" value="00-00-0000" />
                                        <label for="example-masked2-date2">ระยะวลาฝึกงาน ตั้งแต่วันที่ (ปี พ.ศ.) <span class="text-red">**</span></label>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                        <input class="js-masked-date-dash form-control" type="text" id="txt-enddate2" name="txt-enddate2" placeholder="วว-ดด-ปปปป" value="00-00-0000" />
                                        <label for="example-masked2-date2">ถึงวันที่ (ปี พ.ศ.) <span class="text-red">**</span></label>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End row -->
                            <div class="row">
                              <div class="col-sm-12" style="font-size: 20px;">
                                <span style="color:red;">* </span> หากไม่ระบุวันฝึกงาน ให้ใช้วันที่ภาควิชากำหนด
                                (ภาคฤดูร้อนไม่น้อยกว่า 6 สัปดาห์ ฯ ละไม่ต่ำกว่า 25 ชั่วโมง)<br>
                                <span style="color:red;">** </span> กรณีฝึกที่เดียวกันหลายคนให้ใช้ช่วงเวลาฝึกเดียวกัน
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                  <div class="col-xs-12 text-left">
                                      <label for="val-username2" style="font-weight: bold;">นักศึกษาสามารถติดต่อกับหน่วยงานที่จะไปฝึกงานด้วยตัวเอง
                                      <label class="css-input css-radio css-radio-danger m-r-sm" >
                        								<input type="radio" name="radio-groupContact" id="tcondition0" value="No" checked /><span></span> ไม่ได้
                        							</label>
                                      <label class="css-input css-radio css-radio-danger m-r-sm">
                        								<input type="radio" name="radio-groupContact" id="tcondition1" value="Yes" /><span></span> ได้
                        							</label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row" id="traning-condition" style="display:none;">
                              <div class="col-sm-12">
                                <h4 style="color: orange;">ส่วนนี้กรอกเฉพาะนักศึกษาที่ติดต่อหาที่ฝึกงานได้ด้วยตัวเองเท่านั้น</h4>
                                <div class="form-group">
                                  <div class="col-sm-12" style="padding-top: 10px;">
                                      <div class="form-material">
                                          <textarea class="form-control" id="txt-contactp" name="txt-contactp" rows="3" placeholder="กรอกแจ้งชื่อบุคคล ตำแหน่ง สังกัด ที่อยู่ ของผู้ที่ตอบรับเข้าฝึกงาน ..."></textarea>
                                          <label for="txt-contactp">กรุณาแจ้งชื่อบุคคล ตำแหน่ง สังกัด ที่อยู่ ของผู้ที่ตอบรับเข้าฝึกงาน </label>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End container -->


                      </div>
                      <!-- End Step 3 -->
                  </div>
                  <!-- End Steps Content -->

                  <!-- Steps Navigation -->
                  <div class="card-block b-t">
                      <div class="row">
                          <div class="col-xs-6">
                              <button class="wizard-prev btn btn-default" type="button">ก่อนหน้า</button>
                          </div>
                          <div class="col-xs-6 text-right">
                              <button class="wizard-next btn btn-default" type="button">ถัดไป</button>
                              <button class="wizard-finish btn btn-app" type="submit"><i class="ion-checkmark m-r-xs"></i> บันทึกข้อมูล</button>
                          </div>
                      </div>
                  </div>
                  <!-- End Steps Navigation -->
              </form>
              <!-- End Form -->
          </div>
          <!-- .card -->
          <!-- End Validation Wizard Wizard -->
        </div>
        <!-- .col-lg-6 -->
      </div>


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

    <div class="modal fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="card-header bg-green bg-inverse">
                  <h4 style="background: transparent; font-weight: bold;">ขั้นตอนการเข้าใช้ระบบใบสมัครฝึกงานภาคฤดูร้อน</h4>
                  <ul class="card-actions">
                      <li>
                          <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                      </li>
                  </ul>
              </div>
              <div class="card-block" style="font-size: 24px;">
                <h4 style="font-weight: bold; color: teal;">ข้อตกลง</h4>
                <ol>
                  <li>นักศึกษาที่ประสงค์จะฝึกงานภาคฤดูร้อนต้องกรอกข้อมูลในระบบฯเท่านั้น และกรอกข้อมูลในช่องว่างให้ครบถ้วน หรือ กรอกข้อมูลในช่องที่มีสัญลักษณ์ <span style="color:red; font-weight: bold;">**</span></li>
                  <li>กรอกข้อมูลให้ครบถ้วน แล้วจึงทำการกดปุ่ม "บันทึกข้อมูล" หลังจากบันทึกข้อมูลแล้วข้อมูลดังกล่าวจะไม่สามารถแก้ไขได้แล้ว</li>
                  <li>หลังจำกระบบฯ เพิ่มใบสมัครเรียบร้อยแล้ว ระบบจะเข้ำสู่ระบบโดยอัตโนมัติ ให้นักศึกษาดำเนินการ<span style="color:red; font-weight: bold;">เปลี่ยนรหัสผ่านทันที</span>ซึ่งใช้ในการเข้ำสู่ระบบในครั้งถัดไป เพื่อติดตามสถานะใบสมัครฝึกงานภาคฤดูร้อนของนักศึกษาเอง</li>
                  <li>ให้นักศึกษาตรวจสอบข้อมูลอีกครั้ง แล้วทำกำรกดปุ่ม <span style="color:red; font-weight: bold;">"ยืนยันข้อมูล"</span> เพื่อส่งไปยังอาจารย์ผู้ดูแลรายวิชา</li>
                  <li>รอตรวจสอบสถานะใบสมัครจากระบบ</li>
                </ol>
                <h4 style="font-weight: bold; color: orange;">หมายเหตุ **</h4>
                <ol>
                  <li>หากนักศึกษำได้ทำการยืนยันข้อมูลในระบบแล้ว จะไม่สามารถแก้ไขข้อมูลได้อีก (ไม่ว่าในกรณีใดๆ ทั้งสิ้น)</li>
                  <li>ข้อมูลที่ทำการบันทึกข้อมูลแล้วจะไม่สามารถแก้ไขข้อมูลได้ หากมีความจำเป็นที่จะต้องแก้ไขข้อมูล กรุณากดปุ่ม <span style="color:red; font-weight: bold;">"ลบข้อมูลชุดนี้" ก่อนทำการ "ยืนยันข้อมูล"</span> และกรอกข้อมูลใหม่ทั้งหมดอีกครั้ง </li>
                </ol>
              </div>
              <div class="modal-footer">
                <button class="btn btn-sm btn-app" type="button" data-dismiss="modal"><i class="ion-checkmark"></i> ตกลง</button>
              </div>
          </div>
      </div>
    </div>
    <!-- End Large Modal -->

    <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="assets/js/core/jquery.placeholder.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/app-custom.js"></script>

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/plugins/select2/select2.full.min.js"></script>
    <script src="assets/js/plugins/dropzonejs/dropzone.min.js"></script>
    <script src="assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
    <script src="assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="ext-lib/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="ext-lib/sweetalert-master/dist/sweetalert.css">

    <!-- Include JS custom code -->
    <script src="dist/page/signup/index.js"></script>
    <!-- <script src="dist/page/signup/forms_validation.js"></script> -->
    <!-- Page JS Code -->
    <script src="assets/js/pages/base_forms_wizard.js"></script>
    <script>
        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker', 'select2', 'masked-inputs']);
        });
    </script>
  </body>
</html>
