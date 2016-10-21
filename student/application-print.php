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

$strSQL = "SELECT * FROM trs3_questioniar WHERE qn_studentid = ?";
$resultQn = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

if(!$result){
  header('Location: ../error/?type=1'); die();
}

$row = $result->fetch();
$rowQn = $resultQn->fetch();

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
    <!-- <link href="https://fonts.googleapis.com/css?family=Kanit:200,300,400,500" rel="stylesheet"> -->

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
            <div class="col-sm-12 text">
              <div class="row">
                <div class="col-sm-12">
                  <div class="text-center">
                    <h3 style="font-size: 22px" class="th-font-bold">ใบสมัครฝึกงานภาคฤดูร้อน ปีการศึกษา <?php echo $row['reg_year']; ?><br>ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์</h3>
                  </div>
                  <div class="text-right" style="font-size: 16px;">
                    <strong>วันที่สมัคร</strong> <?php echo $row['reg_date']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>วันที่พิมพ์</strong> <?php echo date('Y-m-d'); ?>
                  </div>
                </div>
              </div>
              <div class="th-font-bold" style="font-size: 20px; border: solid; border-width: 0px 0px 2px 0px; margin-bottom: 20px;">
                ส่วนที่ 1 ใบสมัคร
              </div>
              <table class="table table-condensed table-borderless" id="pTable" style="font-size: 18px;">
                <tr>
                  <td style="width: 10%;">
                    (1)
                  </td>
                  <td style="width: 30%;">
                    <strong class="th-font-bold fx18">ชื่อ - สกุล (ภาษาไทย)</strong>
                  </td>
                  <td >
                    <?php echo $row['std_fullname_th']; ?>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td ><strong class="th-font-bold fx18">ชื่อ - สกุล (ภาษาอังกฤษ)</strong></td>
                  <td><?php echo $row['std_fullname_en']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">รหัสนักศึกษา</strong></td>
                  <td><?php echo $row['std_id']; ?></td>
                </tr>

                <tr>
                  <td>
                    (2)
                  </td>
                  <td>
                    <strong class="th-font-bold fx18">วัน/เดือน/ปีเกิด</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                  </td>
                  <td>
                    <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">อายุ</strong></td>
                  <td><?php echo $row['age']; ?> ปี</td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">ศาสนา</strong></td>
                  <td>
                    <?php
                    switch ($row['rel']) {
                      case '1':
                        echo "พุทธ";
                        break;
                        case '2':
                          echo "คริส";
                          break;
                          case '3':
                            echo "อิสลาม";
                            break;
                            case '4':
                              echo "ฮินดู";
                              break;

                      default:
                        echo "อื่นๆ";
                        break;
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">สัญชาติ</strong></td>
                  <td><?php echo $row['nation']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">เชื้อชาติ</strong></td>
                  <td><?php echo $row['race']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">โรคประจำตัว</strong></td>
                  <td><?php
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
                  ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td>
                    <strong class="th-font-bold fx18">โทรศัพท์</strong>
                  </td>
                  <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">email</strong></td>
                  <td>
                     <?php echo $row['email']; ?>
                  </td>
                </tr>

                <tr>
                  <td>(3)</td>
                  <td><strong class="th-font-bold fx18">ที่อยู่ปัจจุบัน</strong></td>
                  <td><?php echo $row['address']; ?></td>
                </tr>

                <tr>
                  <td>(4)</td>
                  <td><strong class="th-font-bold fx18">ประวัติการศึกษา เกรดเฉลี่ย</strong></td>
                  <td><?php echo $row['gpa']; ?></td>
                </tr>

                <tr>
                  <td>(5)</td>
                  <td><strong class="th-font-bold fx18">บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน</strong></td>
                  <td><?php echo $row['ergen_person']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">เกี่ยวข้องเป็น</strong></td>
                  <td><?php echo $row['ergen_relation']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">หมายเลขโทรศัพท์</strong></td>
                  <td><?php echo $row['ergen_phone']; ?></td>
                </tr>

                <tr>
                  <td>(6)</td>
                  <td><strong class="th-font-bold fx18">ลักษณะงาน</strong></td>
                  <td><?php echo $row['job_attr']; ?></td>
                </tr>

                <tr>
                  <td></td>
                  <td><strong class="th-font-bold fx18">ประเภทงาน</strong></td>
                  <td><?php echo $row['job_type']; ?></td>
                </tr>

                <tr>
                  <td>(7)</td>
                  <td><strong class="th-font-bold fx18">การมีส่วนร่วมในกิจกรรมทั้งในและนอกมหาวิทยาลัย นอกเนือจากการเรียนปกติ</strong></td>
                  <td>
                  <?php if(($row['act_1']=='') && ($row['act_2']=='') && ($row['act_3']=='') && ($row['act_4']=='')){ echo "ไม่ระบุ"; } ?>
                  <?php if($row['act_1']!=''){ echo '1) '; echo $row['act_1']; } ?>&nbsp;&nbsp;
                  <?php if($row['act_2']!=''){ echo '2) '; echo $row['act_2']; } ?>&nbsp;&nbsp;
                  <?php if($row['act_3']!=''){ echo '3) '; echo $row['act_3']; } ?>&nbsp;&nbsp;
                  <?php if($row['act_4']!=''){ echo '4) '; echo $row['act_4']; } ?></td>
                </tr>

                <tr>
                  <td>(8)</td>
                  <td><strong class="th-font-bold fx18">ความสามารถทางด้านภาษา ทักษะการสื่อสารภาษาอังกฤษ</strong></td>
                  <td><?php
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
                    }?></td>
                </tr>

                <tr>
                  <td>(9)</td>
                  <td><strong class="th-font-bold fx18">ความสามารถด้านคอมพิวเตอร์</strong></td>
                  <td>
                  <?php if(($row['com_skill_1']=='') && ($row['com_skill_2']=='') && ($row['com_skill_3']=='')){ echo "ไม่ระบุ"; } ?>
                  <?php if($row['com_skill_1']!=''){ echo '1) '; echo $row['com_skill_1']; } ?>&nbsp;&nbsp;
                  <?php if($row['com_skill_2']!=''){ echo '2) '; echo $row['com_skill_2']; } ?>&nbsp;&nbsp;
                  <?php if($row['com_skill_3']!=''){ echo '3) '; echo $row['com_skill_3']; } ?></td>
                </tr>

              </table>

              <div class="th-font-bold" style="font-size: 20px; border: solid; border-width: 0px 0px 2px 0px; margin-bottom: 20px;">
                ส่วนที่ 2 แบบสอบถามรายวิชาฝึกงาน
              </div>
              <?php
              $strSQL = "SELECT * FROM trs3_department WHERE tmp_std_id = ?";
              $resultDept = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));
              if($resultDept){

              }
              ?>
              <table class="table table-condensed table-borderless" id="pTable" style="font-size: 18px;">
                <tr>
                  <td colspan="3">
                    <strong class="th-font-bold fx18">ข้อมูลความต้องการฝึกงาน</strong>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <table class="table table-bordered table-condensed " id="pTable" style="font-size: 18px;">
                      <thead>
                        <tr>
                          <th class="th-font-bold fx18">
                            ลำดับที่
                          </th>
                          <th class="th-font-bold fx18">
                            สาขา/ตำแหน่ง/แผนก/ฝ่าย
                          </th>
                          <th class="th-font-bold fx18">
                            หน่วยงาน/บริษัท/สถานประกอบการ
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $strSQL = "SELECT * FROM trs3_department WHERE tmp_std_id = ?";
                        $resultDept = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

                        if($resultDept){
                          $c = 1;
                          foreach ($resultDept as $value2) {
                            ?>
                            <tr>
                              <td style="padding: 5px 10px; font-size: 18px;">
                                <?php echo $c; ?>
                              </td>
                              <td style="padding: 5px 10px; font-size: 18px;">
                                <?php echo $value2['tmp_dept']; ?>
                              </td>
                              <td style="padding: 5px 10px; font-size:18px;">
                                <?php echo $value2['tmp_unit']; ?>
                              </td>
                            </tr>
                            <?php
                            $c++;
                          }
                        }
                        ?>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">
                    <strong class="th-font-bold fx18">นักศึกษาสามารถติดต่อกับหน่วยงานที่จะไปฝึกงานด้วยตัวเอง</strong> <?php
                    switch($rowQn['qn_seltcontact']){
                      case 'No': echo 'ไม่ได้'; break;
                      case 'Yes': echo 'ได้'; break;
                      default: echo 'ไม่ระบุ';
                    }
                    ?>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <strong class="th-font-bold fx18">** ส่วนนี้กรอกเฉพาะนักศึกษาที่ติดต่อหาที่ฝึกงานได้ด้วยตัวเองเท่านั้น</strong>
                  </td>
                </tr>

                <tr>
                  <td colspan="3">
                    <?php
                    if($rowQn['qn_selfcontactinfo']==''){
                      echo $rowQn['qn_selfcontactinfo'];
                    }else{
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."ไม่ระบุ";
                    }

                    ?>
                  </td>
                </tr>

              </table>

            </div>

            <div class="row">
              <div class="col-sm-12 text-right" style="font-size: 18px;">
                ลงนาม ................................................................<br>
                (.....................................................................)
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
