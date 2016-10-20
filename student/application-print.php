<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";

$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(!isset($_GET['std_id'])){

}

$strSQL = "SELECT * FROM trs3_registration WHERE std_id = ?  ORDER BY registration_id ";
$result = $db->select($strSQL, array($_GET['std_id']));

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
    <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon.png" />
    <link rel="icon" href="../assets/img/favicons/favicon.ico" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400,500" rel="stylesheet">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="../assets/js/plugins/select2/select2.min.css" />
    <link rel="stylesheet" href="../assets/js/plugins/dropzonejs/dropzone.min.css" />
    <link rel="stylesheet" href="../assets/js/plugins/select2/select2-bootstrap.css" />
    <link rel="stylesheet" href="../assets/js/plugins/datatables/jquery.dataTables.min.css" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="../assets/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="../assets/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="../assets/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="../assets/css/app-custom.css" />


    <!-- End Stylesheets -->
  </head>
  <body>



    <div class="container">
      <div class="row" style="padding-top: 0px; margin-top: 0px;">
        <div class="col-sm-12" style="" id="loginPane">
          <div class="row" style="padding-top: 10px;">
            <div class="col-sm-12 text-left">
              <button type="button" name="button" class="btn btn-success" onclick="printForm('pn1')" ><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
          <div class="row" style="padding-top: 20px;" id="pn1" style="display:block; ">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-12">
                  <div class="text-center">
                    <h3 style="font-weight: 400; font-weight: bold;">ใบสมัครฝึกงานภาคฤดูร้อน ปีการศึกษา <?php echo $row['reg_year']; ?><br>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</h3>
                  </div>
                  <div class="text-right" style="font-size: 0.8em;">
                    <strong>วันที่</strong> <?php echo $row['reg_date']; ?>
                  </div>
                </div>
              </div>
              <table class="table table-condensed table-borderless" style="font-size: 0.6em;">
                <tr>
                  <td style="padding: 0px;">
                    (1)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ชื่อ - สกุล (ภาษาไทย)</strong> <?php echo $row['std_fullname_th']; ?> <br>
                    <strong style="font-weight: bold;">ชื่อ - สกุล (ภาษาอังกฤษ)</strong> <?php echo $row['std_fullname_en']; ?><br>
                    <strong style="font-weight: bold;">รหัสนักศึกษา</strong> <?php echo $row['std_id']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (2)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">วัน/เดือน/ปีเกิด</strong> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?>&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;">อายุ</strong> <?php echo $row['age']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">

                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ศาสนา</strong>&nbsp;&nbsp;&nbsp;&nbsp;
                    <strong style="font-weight: bold;">สัญชาติ</strong> <?php echo $row['nation']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;">เชื้อชาติ</strong> <?php echo $row['race']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">

                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">โรคประจำตัว</strong>
                    <?php
                    $strSQL = "SELECT * FROM trs3_disease WHERE di_regid = ?  ";
                    $result2 = $db->select($strSQL, array($row['registration_id']));

                    if($result2){
                      $c = 1;
                      $check = 0;
                      foreach ($result2 as $value) {
                        if($value['di_desc']!=''){
                          echo $c;
                          echo ') ';
                          echo $value['di_desc']."&nbsp;&nbsp;&nbsp;&nbsp;";
                          $c++;
                          $check++;
                        }
                      }

                      if($check==0){
                        print "ไม่มี";
                      }
                    }else{
                      print "-";
                    }
                    ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">

                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">โทรศัพท์</strong> <?php echo $row['phone']; ?> &nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;">email</strong> <?php echo $row['email']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (3)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ที่อยู่ปัจจุบัน</strong> <?php echo $row['address']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (4)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ประวัติการศึกษา เกรดเฉลี่ย</strong> <?php echo $row['gpa']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (5)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน</strong>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">

                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ชื่อ - สกุล</strong> <?php echo $row['ergen_person']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">

                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">เกี่ยวข้องเป็น</strong> <?php echo $row['ergen_relation']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="font-weight: bold;">หมายเลขโทรศัพท์</strong> <?php echo $row['ergen_phone']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (6)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ลักษณะงาน</strong> <?php echo $row['job_attr']; ?>
                    <br>
                    <strong style="font-weight: bold;">ประเภทงาน</strong> <?php echo $row['job_type']; ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (7)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">การมีส่วนร่วมในกิจกรรม ทั้งในและนอกมหาวิทยาลัย นอกเนือจากการเรียนปกติ</strong><br>
                    <?php if($row['act_1']!=''){ echo '1) '; echo $row['act_1']; } ?>&nbsp;&nbsp;
                    <?php if($row['act_2']!=''){ echo '2) '; echo $row['act_2']; } ?>&nbsp;&nbsp;
                    <?php if($row['act_3']!=''){ echo '3) '; echo $row['act_3']; } ?>&nbsp;&nbsp;
                    <?php if($row['act_4']!=''){ echo '4) '; echo $row['act_4']; } ?>
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (8)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ความสามารถทางด้านภาษา ทักษะการสื่อสารภาษาอังกฤษ</strong>
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
                  </td>
                </tr>

                <tr>
                  <td style="padding: 0px;">
                    (9)
                  </td>
                  <td style="padding: 0px;">
                    <strong style="font-weight: bold;">ความสามารถด้านคอมพิวเตอร์</strong><br>
                    <?php if($row['com_skill_1']!=''){ echo '1) '; echo $row['com_skill_1']; } ?>&nbsp;&nbsp;
                    <?php if($row['com_skill_2']!=''){ echo '2) '; echo $row['com_skill_2']; } ?>&nbsp;&nbsp;
                    <?php if($row['com_skill_3']!=''){ echo '3) '; echo $row['com_skill_3']; } ?>
                  </td>
                </tr>

              </table>
            </div>
          </div>
          <!-- End row -->
        </div>
        <!-- End col-sm-12 -->
      </div>
      <!-- End row -->
    </div>
    <!-- End container-fluid -->
    <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="../assets/js/core/jquery.placeholder.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/app-custom.js"></script>

    <!-- Page JS Plugins -->
    <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

    <!-- Page JS Code -->
    <script src="../assets/js/pages/base_tables_datatables.js"></script>

    <!-- Include JS custom code -->
    <script src="../dist/page/student/index.js"></script>
    <!-- Page JS Code -->

  </body>
</html>
