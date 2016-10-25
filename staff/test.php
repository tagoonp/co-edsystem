<div class="row">
                        <div class="col-sm-12">
                          <div class="text-center">
                            <h4 style="background: transparent; font-weight: bold; font-size: 34px; color: teal;">ใบสมัครฝึกงานภาคฤดูร้อน ปีการศึกษา <?php echo $row['reg_year']; ?><br>
                              ภาควิชาฟิสิกส์ คณะวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์<br>
                              <span style="font-size: 26px;">รายการเลขที่ <?php echo $row['registration_id']; ?> วันที่ <?php echo $row['reg_date']; ?></span>
                            </h4>
                          </div>
                        </div>
                        </div>


                      <div class="row" style="font-size: 24px;">
                        <div class="col-sm-12" style="font-size: 24px;">
                          <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                              <?php
                              if($row['std_profilepic']!=''){
                                ?>
                                <img src="../../img/<?php print $row['std_profilepic'];?>" alt="" class="img-responsive" />
                                <?php
                              }
                              ?>
                            </div>
                          </div>

                        <div class="row" style="padding-top: 20px;">
                          <div class="col-sm-1">
                            <span class="cont-title2">(1)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">ชื่อ - สกุล (ภาษาไทย)</span> <?php echo $row['std_fullname_th']; ?> <br>
                            <span class="cont-title2">ชื่อ - สกุล (ภาษาอังกฤษ)</span> <?php echo $row['std_fullname_en']; ?><br>
                            <span class="cont-title2">รหัสนักศึกษา</span> <?php echo $row['std_id']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(2)</span>
                          </div>
                          <div class="col-sm-6">
                            <span class="cont-title2">วัน/เดือน/ปีเกิด</span> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?> <br>

                          </div>
                          <div class="col-sm-5">
                            <span class="cont-title2">อายุ</span> <?php echo $row['age']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-1">
                            <span class="cont-title2">ศาสนา</span> <?php $b = explode('-', $row['dob']); echo $b[2] . "/" . $b[1] . "/" . (intval($b[0]) + 543);?> <br>
                          </div>
                          <div class="col-sm-3">
                            <span class="cont-title2">สัญชาติ</span> <?php echo $row['nation']; ?>
                          </div>
                          <div class="col-sm-3">
                            <span class="cont-title2">เชื้อชาติ</span> <?php echo $row['race']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-11 col-sm-offset-1">
                            <span class="cont-title2">โรคประจำตัว</span><br>
                            <?php
                            $strSQL = "SELECT * FROM trs3_disease WHERE di_regid = ?  ";
                            $result2d = $db->select($strSQL, array($row['registration_id']));

                            if($result2d){
                              $c = 1;
                              if(sizeof($result2d)>1){
                                foreach ($result2d as $value) {
                                  echo $c;
                                  echo ') ';
                                  echo $value['di_desc']."<br>";
                                  $c++;
                                }
                              }else if(sizeof($result2d)==1){
                                $rowd = $result2d->fetch();
                                if($rowd['di_desc']==''){
                                  echo "ไม่มี";
                                }else{
                                  echo "1) ". $rowd['di_desc'];
                                }
                              }

                            }else{
                              print "-";
                            }
                            ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-1">
                            <span class="cont-title2">โทรศัพท์</span> <?php echo $row['phone']; ?>
                          </div>
                          <div class="col-sm-5">
                            <span class="cont-title2">email</span> <?php echo $row['email']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(3)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">ที่อยู่ปัจจุบัน</span> <?php echo $row['address']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(4)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">ประวัติการศึกษา เกรดเฉลี่ย</span> <?php echo $row['gpa']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(5)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน</span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-11 col-sm-offset-1">
                            <span class="cont-title2">ชื่อ - สกุล</span> <?php echo $row['ergen_person']; ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-1">
                            <span class="cont-title2">เกี่ยวข้องเป็น</span> <?php echo $row['ergen_relation']; ?>
                          </div>
                          <div class="col-sm-5">
                            <span class="cont-title2">หมายเลขโทรศัพท์</span> <?php echo $row['ergen_phone']; ?>
                          </div>
                        </div>



                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(6)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">ลักษณะงาน</span>  <?php if($row['job_attr']!=''){ echo $row['job_attr']; }else{ echo "-"; } ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-11 col-sm-offset-1">
                            <span class="cont-title2">ประเภทงาน</span> <?php if($row['job_type']!=''){ echo $row['job_type']; }else{ echo "-"; } ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(7)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">การมีส่วนร่วมในกิจกรรม ทั้งในและนอกมหาวิทยาลัย นอกเนือจากการเรียนปกติ</span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-11 col-sm-offset-1">
                            <?php
                            if(($row['act_1']=='') && ($row['act_2']=='') && ($row['act_3']=='') && ($row['act_4']=='')){
                              print "ไม่ระบุ";
                            }else{
                              if($row['act_1']!=''){ echo '1) '; echo $row['act_1']."<br>"; }
                              if($row['act_2']!=''){ echo '2) '; echo $row['act_2']."<br>"; }
                              if($row['act_3']!=''){ echo '3) '; echo $row['act_3']."<br>"; }
                              if($row['act_4']!=''){ echo '4) '; echo $row['act_4']; }
                            }
                            ?>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(8)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">ความสามารถทางด้านภาษา ทักษะการสื่อสารภาษาอังกฤษ</span> <?php
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
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-sm-1">
                            <span class="cont-title2">(9)</span>
                          </div>
                          <div class="col-sm-11">
                            <span class="cont-title2">ความสามารถด้านคอมพิวเตอร์</span>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-11 col-sm-offset-1">
                            <?php
                            if(($row['com_skill_1']=='') && ($row['com_skill_2']=='') && ($row['com_skill_3']=='')){
                              print "ไม่ระบุ";
                            }else{
                              if($row['com_skill_1']!=''){ echo '1) '; echo $row['com_skill_1']."<br>"; }
                              if($row['com_skill_2']!=''){ echo '2) '; echo $row['com_skill_2']."<br>";  }
                              if($row['com_skill_3']!=''){ echo '3) '; echo $row['com_skill_3']; }
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      </div>
