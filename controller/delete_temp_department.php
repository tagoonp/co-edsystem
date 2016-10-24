<?php
session_start();

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_GET['id'])){
  $strSQL = "DELETE FROM trs3_department_temporary WHERE tmp_id = ?";
  $result = $db->delete($strSQL, array($_GET['id']));
}


?>
<table class="table table-bordered table-header-bg">
  <thead>
    <tr>
      <th style="font-weight: bold; padding: 10px; font-size: 26px;">ลำดับที่</th>
      <th style="font-weight: bold; padding: 10px; font-size: 26px;">สาขา/ตำแหน่ง/แผนก/ฝ่าย</th>
      <th style="font-weight: bold; padding: 10px; font-size: 26px;">หน่วยงาน/บริษัท/สถานประกอบการ</th>
      <th>

      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    $strSQL = "SELECT * FROM trs3_department_temporary WHERE tmp_std_id= ? AND tmp_sessid = ? ";
    $result2 = $db->select($strSQL, array($_GET['std_id'], session_id()));
    if($result2){
      $c = 1;
      foreach ($result2 as $value) {
        ?>
        <tr>
          <td style="padding: 5px 10px; font-size: 24px;">
            <?php echo $c; $c++; ?>
          </td>
          <td style="padding: 5px 10px; font-size: 24px;">
            <?php echo $value['tmp_dept']; ?>
          </td>
          <td style="padding: 5px 10px; font-size: 24px;">
            <?php echo $value['tmp_unit']; ?>
          </td>
          <td class="col-sm-1" style="padding: 5px 10px; font-size: 24px;">
            <a href="Javascript: deltemp('delete_temp_department.php?id=<?php print $value['tmp_id'];?>')" class="btn btn-app-red" style="padding-bottom: 0px; font-size: 0.7em;"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td colspan="4" style="padding: 5px 10px; font-size: 24px;">ไม่พบข้อมูล</td>
      </tr>
      <?php
    }
    ?>

  </tbody>
</table>
<?php

$db->disconnect();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Co-ed in process...</title>
  </head>
  <body>

  </body>
</html>
