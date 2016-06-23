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
            <?php
            if($this->session->userdata('detail_exists') == false)
            {
            ?>

                <div class="alert">
                    คุณยังไม่ได้กรอกข้อมูลส่วนตัว
                </div>

            <?php
            }
            else
            {
            ?>

                <div class="name"><?=$this->session->userdata('prefix_name_id')?> <?= $this->session->userdata('firstname')?> <?=$this->session->userdata('lastname')?></div>
                <div class="epassport">รหัส: <?= $this->session->userdata('id')?></div>
                <div class="faculty"><?=$this->session->userdata('department')?></div>
                <div class="faculty">สาขา <?=$this->session->userdata('branch')?></div>
                <div class="faculty"><?=$this->session->userdata('location')?></div>
                <div class="faculty">อีเมลล์: <?=$this->session->userdata('email')?></div>

                <br>
            <?php
            }
            ?>
             <a href="student/signout" class="signout"><i class="fa fa-sign-out" title="ออกจากระบบ" aria-hidden="true"></i>&nbspออกจากระบบ</a>
            </div>
            <div class="footer">
                <h2 class="">มีปัญหาติดต่อ งานวิศวกรรมเครือข่าย <br>สำนักวิทยบริการฯ</h2>
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
                <div class="content col-xs-10">
                        <div class="add-device">
                            <!--<div class="alert">alert</div>-->
<?php
if($this->session->userdata('detail_exists') == false){
?>
<div class="alert alert-danger" role="alert">** กรุณากรอกข้อมูลก่อนกรอก Mac Address **

                            <h3 class="thaisans bold">ข้อมูลส่วนตัว</h3>
                            <h3 class="thaisans bold">- <?=$this->session->userdata('username');?></h3>
                             <form method="post" action="student/submit_detail" class="form-group">
                                <div class="form-group form-inline">
                                    <select class="form-control" name="pname">
                                        <option value="" disabled selected>*คำนำหน้า</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                    <input type="text" name="firstname" class="form-control" id="exampleInputEmail3" placeholder="ชื่อ">
                                    <input type="text" name="lastname" class="form-control" id="exampleInputPassword3" placeholder="นามสกุล">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                 </div>
                                <div class="form-group">
                                    <input type="text" name="citizen_id" class="form-control" id="exampleInputEmail1" placeholder="รหัสนักศึกษา">
                                </div>
                                <div class="form-group ">
                                    <select class="form-control" name="group">
                                            <option value="" disabled selected>*กลุ่ม</option>

                                    <?php
                                    foreach($group_data as $gd)
                                    {
                                    ?>
                                        <option value="<?=$gd->gdesc?>"><?=$gd->gdesc?></option>
                                    <?php
                                    }
                                    ?>

                                    </select>
                                </div>
                                <div class="form-group ">
                                    <select class="form-control fac_select" name="department">
                                        <option value="" disabled selected>*คณะ</option>

                                    <?php
                                    foreach($fac_data as $fd)
                                    {
                                    ?>
                                        <option value="<?=$fd->FAC_ID?>" class="fac_option"><?=$fd->FAC_NAME?></option>
                                    <?php
                                    }
                                    ?>

                                    </select>
                                </div>
                                <div class="form-group ">
                                    <select class="form-control program_select" name="branch">
                                        <option value="" disabled selected>*สาขา</option>

                                    <?php
                                    // foreach($program_data as $pd)
                                    // {
                                    ?>
                                        <!--<option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>-->
                                    <?php
                                    // }
                                    ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="location" class="form-control">
                                        <option value="" disabled selected>*วิทยาเขต</option>

                                    <?php
                                    foreach($location_data as $ld)
                                    {
                                    ?>
                                        <option value="<?=$ld->location_id?>"><?=$ld->location_name?></option>
                                    <?php
                                    }
                                    ?>

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">บันทึก</button>
                              </form>
</div>

<?php
}
?>

                             <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                                  วิธีดู Mac address
                                </button>
                                <br>
                            <!--/////////////////////////////////////////////////////////////////////////-->
                                <?php
                                    if(!empty($this->session->userdata('alert'))){
                                ?>
                                    <h3 style="font-size: 1.2em;
                                        background-color: #b9f9a9;display: inline-block;
                                        padding: 5px 10px;border-radius: 5px;"><?=$this->session->userdata('alert')?></h3>
                                <?php
                                }
                                ?>
                                <h3 class="thaisans bold">คอมพิวเตอร์/โน็ตบุ๊ค</h3>

                            <?php
                                $data_exists = false;
                                //var_dump($mac_data);
                                foreach($mac_data as $data){
                                    if($data->device=='Notebook')
                                    {
                                        $data_exists = true;
                                        break;
                                    }
                                }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->macaddress?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="laptop" class="laptop"><i class="fa fa-laptop active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->macaddress?>">
                                </form>

                            <?php
                                }else{
                            ?>

                                <form id="mac_submit" method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" pattern="^([0-9A-Fa-f]{2}[-]){5}([0-9A-Fa-f]{2})$" maxlength="17" placeholder="mac-address" name="mac" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="laptop" class="laptop"><i class="fa fa-laptop"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="Notebook">
                                </form>

                            <?php
                                }

                            ?>

                            <!--/////////////////////////////////////////////////////////////////////////-->

                                <h3 class="thaisans bold">โทรศัพท์</h3>

                            <?php
                            $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='Phone')
                                {
                                    $data_exists = true;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->macaddress?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="mobile" class="mobile"><i class="fa fa-mobile active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->macaddress?>">
                                </form>

                            <?php

                                }else{
                            ?>

                                <form id="mac_submit" method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" pattern="^([0-9A-Fa-f]{2}[-]){5}([0-9A-Fa-f]{2})$" maxlength="17" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile" class="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="Phone">
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
                                if($data->device=='Tablet')
                                {
                                    $data_exists = true;
                                    $data_mac = $data->macaddress;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>

                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->macaddress?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="tablet" class="tablet"><i class="fa fa-tablet active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->macaddress?>">
                                </form>

                            <?php
                                }else{
                            ?>

                                <form id="mac_submit" method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" pattern="^([0-9A-Fa-f]{2}[-]){5}([0-9A-Fa-f]{2})$" maxlength="17" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="tablet" class="tablet"><i class="fa fa-tablet"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="Tablet">
                                </form>
                            <?php
                                }
                            ?>



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

<script>

$(function(){

    $(document).on( "change", ".fac_select", function() {

        var data =  $(this).val();

        $.ajax({
            method:'POST',
            url:'student/getprogramdata',
            dataType: "JSON",
            data:{
                data:data
            },
            success:function(d)
            {

                $('.program_select').html('');
                $('.program_select').append('<option value="" disabled selected>*สาขา</option>');

                $.each(d , function(i, val) {

                    $('.program_select').append(' <option value="'+d[i].PRO_ID+'">'+d[i].PRO_NAME+'</option> ');

                });

            }
        });

    });

});

</script>

</body>
</html>

