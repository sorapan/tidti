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
                <div class="faculty"><?=$this->session->userdata('branch')?></div>
                <div class="faculty"><?=$this->session->userdata('location')?></div>
                <div class="faculty">อีเมลล์: <?=$this->session->userdata('email')?></div>

                <br>
            <?php
            }
            ?>




                <a href="professor/logout" class="signout"><i class="fa fa-sign-out" title="ออกจากระบบ" aria-hidden="true"></i>&nbspออกจากระบบ</a>
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

                <?php
                    if(!empty($this->session->userdata('alert'))){
                ?>
                    <h3 class="<?=$this->session->flashdata('type')?>" style="font-size: 1.2em;
                        display: inline-block;
                        padding: 5px 10px;border-radius: 5px;margin-left: 15px"><?=$this->session->userdata('alert')?></h3>
                <?php
                }
                ?>

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
                             <form method="post" action="professor/submit_detail" class="form-group">
                                <div class="form-group form-inline">
                                    <select class="form-control" required name="pname">
                                        <option value="" disabled selected>*คำนำหน้า</option>
                                        <option value="นาย">นาย</option>
                                        <option value="นางสาว">นางสาว</option>
                                        <option value="นาง">นาง</option>
                                    </select>
                                    <input type="text" name="firstname" required class="form-control" id="exampleInputEmail3" placeholder="ชื่อ">
                                    <input type="text" name="lastname" required class="form-control" id="exampleInputPassword3" placeholder="นามสกุล">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                 </div>
                                <div class="form-group">
                                    <input type="text" name="citizen_id" required class="form-control" id="exampleInputEmail1" maxlength="13" placeholder="รหัสประจำตัวประชาชน">
                                </div>
                                <div class="form-group form-inline thaisans bold" style="font-size: 1.5em">
                                    <input type="radio" name="type" value="teacher" checked id="professor" style="margin-right: 5px"><label for="professor">อาจารย์</label>
                                    <input type="radio" name="type" value="staff"  id="staff" style="margin-right: 5px"><label for="staff">บุคลากร</label>
                                </div>

                                <div class="form-group">
                                    <select name="location" required class="form-control location_select">
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
                                <div class="form-group staffhid" style="display:none" >
                                    <select class="form-control staff_select" name="department">
                                        <option value="" disabled selected>*หน่วยงาน</option>

                                    </select>
                                </div>


                                <div class="form-group teacherhid">
                                    <select class="form-control fac_select" name="department">
                                        <option value="" disabled selected>*คณะ</option>


                                    </select>
                                </div>
                                <div class="form-group teacherhid">
                                    <select class="form-control program_select" name="branch">
                                        <option value="" disabled selected>*สาขา</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control group_select" name="group">
                                            <option value="" disabled selected>*กลุ่ม</option>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-danger">บันทึก</button>
                              </form>
</div>

<?php
}else{
?>


                             <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                                  วิธีดู Mac address
                                </button>
                                <a class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalInternet">
                                  วิธีเชื่อมต่ออินเทอร์เน็ต
                                </a>
                                <br>





                                <form id="mac_submit" method="POST" action="professor/addmac">

                                <div class="dev">
                                     <h3 class="thaisans bold">เลือกอุปกรณ์</h3>
                                    <span class="labelalert label label-danger hidden">คุณยังไม่ได้เลือกอุปกรณ์</span>
                                    <div class="select" style="margin-top:10px;">
                                        <input type="radio" class="laptop" name="device" id="laptop" value="laptop" required><label data-toggle="tooltip" data-placement="bottom" title="โน๊ตบุ๊ค" class="fa fa-laptop" for="laptop" title="โน๊ตบุ๊ค"></label>
                                        <input type="radio" class="phone" name="device" id="phone" value="phone"><label data-toggle="tooltip" data-placement="bottom" title="มือถือ" class="fa fa-mobile" for="phone" title="มือถือ"></label>
                                        <input type="radio" class="tablet" name="device" id="taplet" value="tablet"><label data-toggle="tooltip" data-placement="bottom" title="แท็บเล็ต" class="fa fa-tablet" for="taplet" title="แท็บเล็ต"></label>
                                        <input type="radio" class="other" name="device" id="other" value="other"><label data-toggle="tooltip" data-placement="bottom" title="อื่นๆ" class="fa fa-question" for="other" title="อื่นๆ"></label>
                                    </div>
                                </div>
                                  <div class="ch-device ">
                                      <input type="text" required pattern="^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$" maxlength="17" class="text opensans"
                                      placeholder="xx-xx-xx-xx-xx-xx" name="mac" id="laptop" data-toggle="tooltip" data-placement="bottom" title="mac-address">
                                      <button class="button dev-submit" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                  </div>

                                </form>


                                <h3 class="thaisans bold">อุปกรณ์ของคุณ</h3>
                                 <!-- ///////////////////// -->

                                 <?php
                                 //var_dump($mac_data);
                                 if(!empty($mac_data)){
                                 foreach($mac_data as $val)
                                 {
                                 ?>

                                    <form method="POST" action="professor/deletemac" onsubmit="return confirm('ลบอุปกรณ์หมายเลข: <?=$val->macaddress?> ?');">
                                        <div class="ch-device activated">
                                            <input type="text" class="text opensans" value="<?=$val->macaddress?>" disabled >
                                            <button class="button" type="submit"><i class="fa fa-trash-o"></i></button>
                                            <label class="<?=switchIcon($val->device)?>"><i class="fa fa-<?=switchIcon($val->device)?> active"></i></label>
                                        </div>
                                        <input type="text" name="del" hidden=""  value="<?=$val->macaddress?>">
                                    </form>

                                 <?php
                                 }
                                 }else{
                                 ?>
                                    <div>
                                        <h3 class="thaisans bold" style="color:#337ab7;font-size:1.6em;margin-left: 15px;">ไม่มีรายการอุปกรณ์</h3>
                                    </div>
                                 <?php
                                  }
                                 ?>

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
                                    <h2>Windows</h2>
                                    <div>
                                    <p>1. กด "windows + R" เพื่อเปิดหน้าต่าง Run แล้วพิมพ์ "cmd" และคลิก "OK"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/win1.jpg" align="middle" width="60%" height="auto"></div>
                                    </div>
                                    <div>
                                    <p>2. ในหน้าต่าง cmd พิมพ์ "getmac /v" แล้วกด Enter
                                "MAC addres" คือ Physical Address เลือกอันที่เป็นของอุปกรณ์ WI-FI ซึ่งจะอยู่ในรูปแบบ “C4-17-FE-FF-FF-FF″</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/win2.png" align="middle" width="90%" height="auto"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="my-modal-text">
                                    <h2>Mac OS</h2>
                                    <div>
                                    <p>1. กด Wi-Fi ไอคอน ด้านบนขวาของจอแล้วกด "Open Network References…"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/macos1.jpg" align="middle" width="60%" height="auto"></div>
                                    </div>
                                    <div>
                                    <p>2. กด "Advanced…" ในหน้าต่าง Network</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/macos2.jpg" align="middle" width="60%" height="auto"></div>
                                    </div>
                                    <div>
                                    <p>3. MAC address คือ "Wi-Fi Address"</p>
                                    <div class="img"><img src="<?=asset_url()?>/pic/macos3.jpg" align="middle" width="90%" height="auto"></div>
                                    </div>
                                </div>
                                <br>
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

                        <div class="modal fade my-modal" id="myModalInternet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog my-modal-content" role="document">
                            <div class="modal-content  my-modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title thaisans" style="font-size: 2.2em" id="myModalLabel">วิธีดู Mac address</h4>
                              </div>
                              <div class="modal-body">
                                <div class="my-modal-text">
                                    <h2>เชื่อมต่ออินเทอร์เน็ต Srivijaya Wifi</h2>
                                    <div>
                                    <p style="font-size:1.1em">1.นำเมาส์ไปคลิก เพื่อดูสัญญาณ Wifi ตัวที่จะเชื่อมต่อหรือไม่?</p>
                                    <p style="font-size:1.1em">2.นำเมาส์ไปคลิกสัญญาณ Wifi ที่มีชื่อว่า Srivijaya wifi ซึ่งเป็น wifi ของมหาลัย</p>
                                    <p style="font-size:1.1em">3.กดปุ่ม Connect เพื่อทำการเชื่อมต่อสัญญาณ</p>
                                    <p style="font-size:1em">***หมายเหตุ : การเชื่อมต่อ wifi แบบนี้จะเชื่อมต่อได้เฉพาะเครื่องที่ลงทะเบียน Mac-Address กับมหาลัยแล้วเท่านั้น</p>
                                    <div class="img"><img src="<?=asset_url()?>pic/internet.PNG" align="middle" width="100%" height="auto"></div>
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
    $(document).on('click','.dev-submit',function(){
        var check = $("input[name='device']").is(':checked');
        if(check){
            return true;
        }else{
            $('.labelalert').removeClass('hidden');
        }
    });
    // $('input[name="type"]').each(function(){
    //     if(!$(this).is(':checked')){
    //         var itclass = '.'+$(this).val()+'hid';
    //         $(''+itclass).css("display","none");
    //         console.log('.'+$(this).val()+'hid');
    //     }
    // });
    $(document).on("change","input[name='type']",function(){
         var $type = $(this).val();
         console.log($type);
        if($type == 'teacher'){
            var itclass = '.'+$type+'hid';
            $(''+itclass).css("display","");
            $('.staffhid').css("display","none");
        }else{
            var itclass = '.'+$type+'hid';
            $(''+itclass).css("display","");
            $('.teacherhid').css("display","none");
        }
    });
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

    $(document).on( "change", ".location_select", function() {
        var location_class = $(this).attr('class').split(' ');
        var last_word = location_class[1][location_class[1].length-1];
        if(last_word !== "t"){
            var fac_class = '.fac_select'+last_word;
            var group_class = '.group_select'+last_word;
        }else{
            var fac_class = '.fac_select';
            var group_class = '.group_select';
        }
        var data =  $(this).val();
        $.ajax({
            method:'POST',
            url:'student/getLocationFacData',
            dataType: "JSON",
            data:{
                data:data
            },
            success:function(d)
            {

                console.log(fac_class);
                $(fac_class).html('');
                $(fac_class).append('<option value="" disabled selected>*คณะ</option>');

                $.each(d , function(i, val) {

                    $(fac_class).append(' <option value="'+d[i].FAC_ID+'">'+d[i].FAC_NAME+'</option> ');

                });

            }
        });
        $.ajax({
            method:'POST',
            url:'student/getLocationGroupData',
            dataType: "JSON",
            data:{
                data:data
            },
            success:function(d)
            {

                console.log(fac_class);
                $(group_class).html('');
                $(group_class).append('<option value="" disabled selected>*กลุ่ม</option>');

                $.each(d , function(i, val) {

                    $(group_class).append(' <option value="'+d[i].gname+'">'+d[i].gdesc+'</option> ');

                });

            }
        });
        $.ajax({
            method:'POST',
            url:'student/getLocationStaffData',
            dataType: "JSON",
            data:{
                data:data
            },
            success:function(d)
            {

                $('.staff_select').html('');
                $('.staff_select').append('<option value="" disabled selected>*หน่วยงาน</option>');

                $.each(d , function(i, val) {

                    $('.staff_select').append(' <option value="'+d[i].staff_id+'">'+d[i].staff_name+'</option> ');

                });

            }
        });

    });

});

</script>

</body>
</html>
