<!DOCTYPE html>
<html lang="en">
<?=header_url()?>
</html>
<body>
<div class="contain col-xs-12 nopad">
    <div class="professor login user-page col-md-offset-2 col-xs-12 col-sm-12 col-md-8 nopad">
        <div class="_1 col-xs-12 col-sm-4">
            <div class="head">
                <h2 class="thaisans">อาจารย์ / บุคลากร</h2>
            </div>
            <div class="content thaisans">

                <!-- /////////////////////////////////////////////////////
                ในกรณีที่ข้อมูลไม่ได้กรอก ไม่เรียบร้อย -->
                <div class="alert">
                    คุณยังไม่ได้กรอกข้อมูลส่วนตัว
                </div>


                <!-- /////////////////////////////////////////////////////
                กรอกข้อมูลแล้ว หรือ มีข้อมูลอยู่แล้ว แสดงในส่วนนี้
                <div class="name"><?=prefix_name_id($this->session->userdata('prefix_name_id'))?> <?= $this->session->userdata('firstname')?> <?= $this->session->userdata('lastname')?></div>
                <div class="epassport">รหัส <?= $this->session->userdata('id')?></div>
                 <?php //fac_id($this->session->userdata('fac_id'))?>
                <div class="faculty">คณะ <?=$this->session->userdata('fac')?></div>
                <?php //program_id($this->session->userdata('program_id'))?>
                <div class="major">สาขา <?=$this->session->userdata('program')?></div>
                <div class="major">สาขา <?=$this->session->userdata('citizen_id')?></div>
                <div class="email">อีเมลล์ <?=$this->session->userdata('email')?></div>
                <div class="tel">โทร <?=$this->session->userdata('tel')?></div>
                ///////////////////////////////////////////////////// -->

                <a href="student/signout" class="signout"><i class="fa fa-sign-out" title="ออกจากระบบ" aria-hidden="true"></i>&nbspออกจากระบบ</a>
            </div>
            <div class="footer">
                <h2 class="thaisans">มีปัญหาติดต่อ งานวิศวกรรมเครือข่าย <br>สำนักวิทยบริการฯ</h2>
                <p><i class="fa fa-phone" aria-hidden="true"></i> : 074-317100 ต่อ 1911 - 1912 </p>
                <p> <i class="fa fa-envelope-o" aria-hidden="true"></i> : noc@rmutsv.ac.th</p>
            </div>
        </div>
        <div class="_2 col-xs-12 col-sm-8">

            <div class="form col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
                <div class="head">
                    <h2 class="thaisans bold">อุปกรณ์ / Device</h2>
                </div>
                <div class="sub-head">
                    <h2 class="thaisans">ลงทะเบียน mac-address เพื่อรับสัญญาณ Internet</h2>
                </div>

                <!-- //////////////////////////////////////////////////////////// -->
                <!-- ////////////            alert                  ////////////// -->
                <div class="alert">
                    <div class="user_alert">
                        <h2 class="thaisans"></h2>
                    </div>
                </div>
                <div class="content col-xs-10">
                        <div class="add-device">
                            <!--<div class="alert">alert</div>-->
<?php
if(!$this->session->userdata('detail_exists') ){
?>
<div class="alert alert-danger" role="alert">** กรุณากรอกข้อมูลก่อนกรอก Mac Address **

                            <h3 class="thaisans bold">ข้อมูลส่วนตัว</h3>
                            <h3 class="thaisans bold">- <?=$this->session->userdata('username');?></h3>
                             <div class="form-group">
                                <div class="form-group form-inline">
                                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="ชื่อ">
                                    <input type="password" class="form-control" id="exampleInputPassword3" placeholder="นามสกุล">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                 </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                                </div>
                                <div class="form-group">
                                    <select name="location" class="form-control">
                                        <option label="วิทยาเขต">วิทยาเขต</option>
                                        <option value="sk">สงขลา</option>
                                        <option value="sai">ไสใหญ่</option>
                                        <option value="tho">ทุ่งใหญ่</option>
                                        <option value="ka">ขนอม</option>
                                        <option value="tr">ตรัง</option>
                                        <option value="rat">วิทยาลัยรัตภูมิ</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">บันทึก</button>
                              </div>
</div>

<?php
}
?>


                             <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                                  วิธีดู Mac address
                                </button>
                            <!--/////////////////////////////////////////////////////////////////////////-->



                                <form id="mac_submit" method="POST" action="student/addmac">

                                <div class="dev">
                                    <h3 class="thaisans bold">เลือกอุปกรณ์</h3>
                                    <div class="select laptop">
                                        <input type="radio" class="laptop" name="device" id="laptop"><label class="fa fa-laptop" for="laptop" title="โน๊ตบุ๊ค"></label>
                                        <input type="radio" class="phone" name="device" id="phone"><label class="fa fa-mobile" for="phone" title="มือถือ"></label>
                                        <input type="radio" class="tablet" name="device" id="taplet"><label class="fa fa-tablet" for="taplet" title="แท็บเล็ต"></label>
                                    </div>
                                </div>
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" placeholder="mac-address" name="mac" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                  </div>
                                  <input type="hidden" name="device" value="comp">
                                </form>


                                <h3 class="thaisans bold">อุปกรณ์ของคุณ</h3>
                                 <!-- ///////////////////// -->
                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="laptop" class="laptop"><i class="fa fa-laptop active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value=">">
                                </form>

                                    <!-- ///////////////////// -->
                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="phone" class="phone"><i class="fa fa-mobile active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value=">">
                                </form>

                                <!-- ///////////////////// -->
                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="tablet" class="tablet"><i class="fa fa-tablet active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value=">">
                                </form>

                        <!-- Modal -->
                        <div class="modal fade my-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog my-modal-content" role="document">
                            <div class="modal-content  my-modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title thaisans" style="font-size: 2.2em" id="myModalLabel">วิธีดู Mac address</h4>
                              </div>
                              <div class="modal-body">
                                <div class="my-modal-text">
                                    <h2>IOS</h2>
                                    <div>
                                    <p>ไปที่ "Settings" -> "General" -> "About" แล้วเลื่อนลงมา MAC address คือ "Wi-Fi Address"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_ios.png" align="middle" width="60%" height="60%"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>Android</h2>
                                    <div>
                                    <p>ไปที่ "Settings" -> "About phone" -> "Status" แล้วเลื่อนลงมา MAC address คือ "Wi-Fi MAC Address"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_android.png" width="60%" height="60%"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>Windows Phone</h2>
                                    <div>
                                    <p>ไปที่ "Settings" -> "about" -> "more info" </p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_wp.jpg" width="60%" height="60%"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>BlackBerry</h2>
                                    <div>
                                    <p>1. ไปที่ Options</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_bb1.jpg" width="60%" height="60%"></div>
                                    <p>2. เลื่อนลงไปเลือก Status </p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_bb2.jpg" width="60%" height="60%"></div>
                                    <p>3. เลื่อนลงไปดูที่ WLAN MAC</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/mac_bb3.jpg" width="60%" height="60%"></div>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>

                    </div>


        </div>


    </div>
</div>
</body>
</html>

