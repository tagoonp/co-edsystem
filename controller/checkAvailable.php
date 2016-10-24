<?php session_start(); ?>
<?php

include "../xplor-config.php";
include "../xplor-connect.php";
$db = new database();
$db->connect();
$sprefix = $db->getSessionPrefix();

if(isset($_SESSION[$sprefix.'ID'])){

  if($_SESSION[$sprefix.'ID']==session_id()){

    $strSQL = "SELECT * FROM trs3_registration WHERE std_id = ? ";
    $result_account = $db->select($strSQL, array($_SESSION[$sprefix.'Username']));

    if($result_account){
      $row = $result_account->fetch();
      if($row['std_profilepic']==''){
        print "Y";
      }else{
        print "N";
      }

    }
  }else{
    print "N";
  }

}else{
  print "N";
}

$db->disconnect();
?>
