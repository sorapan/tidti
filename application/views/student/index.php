<!DOCTYPE html>
<html lang="en">
<?=header_url()?>
</html>
<body>
<div class="contain col-xs-12 nopad">
    <div class="login user-page col-md-offset-2 col-xs-12 col-sm-12 col-md-8 nopad">
        <div class="_1 col-xs-12 col-sm-4">
            <div class="head">
                <h2 class="thaisans">นักศึกษา</h2>
            </div>
            <div class="content thaisans">

                <div class="name"><?=prefix_name_id($this->session->userdata('prefix_name_id'))?> <?= $this->session->userdata('firstname')?> <?= $this->session->userdata('lastname')?></div>
                <div class="epassport">รหัส <?= $this->session->userdata('id')?></div>
                 <?php //fac_id($this->session->userdata('fac_id'))?>
                <div class="faculty">คณะ <?=$this->session->userdata('fac')?></div>
                <?php //program_id($this->session->userdata('program_id'))?>
                <div class="major">สาขา <?=$this->session->userdata('program')?></div> 
                <div class="major">สาขา <?=$this->session->userdata('citizen_id')?></div> 
                <div class="email">อีเมลล์ <?=$this->session->userdata('email')?></div> 
                <div class="tel">โทร <?=$this->session->userdata('tel')?></div> 
                <a href="student/signout" class="signout"><i class="fa fa-sign-out" title="ออกจากระบบ" aria-hidden="true"></i>&nbspออกจากระบบ</a>
            </div>
            <div class="footer">
                <h2 class="thaisans">มีปัญหาติดต่อ งานวิศวกรรมเครือข่าย สำนักวิทยบริการฯ่อ</h2>
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


                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">คอมพิวเตอร์/โน็ตบุ๊ค</h3>

                            <?php
                                $data_exists = false;
                                foreach($mac_data as $data){
                                    if($data->device=='comp')
                                    {
                                        $data_exists = true;
                                        break;
                                    }
                                }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->mac?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="laptop" class="laptop"><i class="fa fa-laptop active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->mac?>">
                                </form>

                            <?php
                                }else{
                            ?>

                                <form method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" placeholder="mac-address" name="mac" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="laptop" class="laptop"><i class="fa fa-laptop"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="comp">
                                </form>

                            <?php
                                }

                            ?>

                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">โทรศัพท์</h3>

                            <?php
                            $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='phone')
                                {
                                    $data_exists = true;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->mac?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="mobile" class="mobile"><i class="fa fa-mobile active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->mac?>">
                                </form>

                            <?php

                                }else{
                            ?>

                                <form method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile" class="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="phone">
                                </form>

                            <?php
                                }

                            ?>

                                <!--<form method="POST">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac_mobile" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                </form>-->

                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">แท็ปเล็ต</h3>

                            <?php
                                    $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='tablet')
                                {
                                    $data_exists = true;
                                    $data_mac = $data->mac;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>


                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->mac?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="tablet" class="tablet"><i class="fa fa-tablet active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->mac?>">
                                </form>

                            <?php
                                }else{
                            ?>

                                <form method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="tablet" class="tablet"><i class="fa fa-tablet"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="tablet">
                                </form>
                            <?php
                                }
                            ?>
                        </div>

                    </div>


        </div>


    </div>
</div>
</body>
</html>

