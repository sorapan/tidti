<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?=asset_url()?>reset.css">
    <link rel="stylesheet" type="text/css" href="<?=asset_url()?>login.css">
</head> -->

<?=header_url()?>
<body>
<div class="admin wrap nopad">
    <?=headerOfAdmin($this->session->userdata('status'),$this->session->userdata('location_id'))?>
    <div class="sidebar ">

        <div class="content">
            <ul class="menus thaisans">
                <a href="<?=base_url().'index.php/admin/manage'?>"><li class="manage active"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>เพิ่มอุปกรณ์ผู้ใช้ ------</li></a>
                <a href="<?=base_url().'index.php/admin/mac'?>"><li class="maclist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span>mac ลงทะเบียนออนไลน์  </li></a>
                <a href="<?=base_url().'index.php/admin/macmanual'?>"><li class="manuallist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span>mac จุดลงทะเบียน </li></a>
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'index.php/admin/log'?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span>ประวัติการเข้าระบบ </li></a>
            </ul>
        </div>

    </div>
    <div class="content manage">
        <div class="top">
            <h3 class="thaisans bold">เพิ่มอุปกรณ์ผู้ใช้</h3>
        </div>
        <div class="mid">
            <h3 class="thaisans bold" style="font-size: 2em;margin-top:0;">เลือกประเภทผู้ใช้</h3>
            <ul role="tablist">
            <li role="presentation" class="tab active"><a href="#student" aria-controls="tabstudent" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-user" aria-hidden="true"></i><label>นักศึกษา</label></a></li>
            <li role="presentation" class="tab"><a href="#professor" aria-controls="professor" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-users" aria-hidden="true"></i></i><label>อาจารย์</label></a></li>
            <li role="presentation" class="tab"><a href="#staff" aria-controls="professor" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-user" aria-hidden="true"></i><label>บุคลากร</label></a></li>
            <li role="presentation" class="tab"><a href="#special" aria-controls="professor" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-user-secret" aria-hidden="true"></i><label>ผู้ใช้พิเศษ</label></a></li>
            </ul>
            <?php
                if(!empty($this->session->userdata('alert'))){
            ?>
                <h3 class="managealert <?=$this->session->flashdata('type')?>" style="font-size: 1.2em;
                    display: inline-block;
                    padding: 5px 10px;border-radius: 5px;"><?=$this->session->userdata('alert')?></h3>
            <?php
            }
            ?>
            <br>
            <!-- นักศึกษา -->
            <div class="tab-content">
            <input type="text" class="type_select" value="นักศึกษา" hidden="">
            <input type="text" class="type_select2" value="อาจารย์" hidden="">
            <input type="text" class="type_select3" value="เจ้าหน้าที่" hidden="">
            <input type="text" class="type_select4" value="" hidden="">

            <div role="tabpanel" class="tab-pane fade form  active in" id="student">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">นักศึกษา</h3>
                    <label>ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" required name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" required class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" required class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group form-inline">
                    <div class="form-group">
                        <input type="text" name="idcard" required class="form-control" maxlength="12" id="exampleInputEmail1" placeholder="รหัสนักศึกษา">
                    </div>
                    <div class="form-group input-group">
                      <input type="text" name="year" required class="form-control" placeholder="ปีการศึกษาที่เข้าเรียน" maxlength="4" pattern="[0-9]{4}">
                      <span class="input-group-addon" style="background-color: #ddd">ปี พ.ศ. 2559</span>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control location_select" title="วิทยาเขต" name="location_id" required >
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

                <div class="form-group">
                    <select class="form-control fac_select"  title="คณะ"  required name="department">
                        <option value="" disabled selected>*คณะ</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control program_select" required name="discipline">
                            <option value="" disabled selected>*สาขา</option>
                        </select>
                </div>

                <div class="form-group">
                    <select class="form-control group_select" required  name="status">
                            <option value="" disabled selected>*กลุ่ม</option>



                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" required pattern="^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$" maxlength="17"
                    name="macaddress" placeholder="xx-xx-xx-xx-xx-xx" data-toggle="tooltip" data-placement="bottom" title="mac-address">
                </div>
                <div class="form-group">
                    <select name="dev_type" required class="form-control">
                        <option label="อุปกรณ์" value="" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>

            <!-- อาจารย์ -->
            <div role="tabpanel" class="tab-pane fade form" id="professor">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">อาจารย์</h3>
                    <label>ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" required name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" required class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" required class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="text" name="idcard" required maxlength="13" class="form-control" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
                    <select name="location_id" required class="form-control location_select2">
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
                <div class="form-group">
                    <select class="form-control fac_select2" required name="department">
                        <option value="" disabled selected>*คณะ</option>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control program_select2" required name="discipline">
                            <option value="" disabled selected>*สาขา</option>

                        </select>
                </div>

                <div class="form-group">
                    <select class="form-control group_select2" required name="status">
                            <option value="" disabled selected>*กลุ่ม</option>



                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" required pattern="^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$"
                    maxlength="17" name="macaddress" placeholder="xx-xx-xx-xx-xx-xx" data-toggle="tooltip" data-placement="bottom" title="mac-address">
                </div>
                <div class="form-group">
                    <select name="dev_type" required class="form-control">
                        <option label="อุปกรณ์" value="" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                        <option value="Other">อื่นๆ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>

             <!-- บุคลากร -->
            <div role="tabpanel" class="tab-pane fade form" id="staff">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">บุคลากร</h3>
                    <label >ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" required name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" required class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" required class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr"  class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="personid" name="idcard" required class="form-control" id="exampleInputEmail1" maxlength="13" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
                    <select name="location_id" required class="form-control location_select3">
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

                <div class="form-group">
                    <select class="form-control" required name="department">
                        <option value="" disabled selected>*หน่วยงาน</option>

                    <?php
                    foreach($staff_data as $sd)
                    {
                    ?>
                        <option value="<?=$sd->staff_id?>"><?=$sd->staff_name?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control group_select3" required  name="status">
                            <option value="" disabled selected>*กลุ่ม</option>



                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input class="form-control" required placeholder="xx-xx-xx-xx-xx-xx" type="text" name="macaddress"
                    pattern="^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$" maxlength="17" data-toggle="tooltip" data-placement="bottom" title="mac-address">
                </div>
                <div class="form-group">
                    <select name="dev_type" required class="form-control">
                        <option label="อุปกรณ์" value="" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                        <option value="Other">อื่นๆ</option>
                    </select>
                </div>
                <input type="text" hidden="" name="discipline" value="-">
                <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>

            <!-- พิเศษ -->
            <div role="tabpanel" class="tab-pane fade form" id="special">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <input class="text" name="statustype" value="special" hidden="">
                    <h3 class="thaisans bold" style="margin-top: 0">ผู้ใช้พิเศษ</h3>
                    <label for="exampleInputEmail1">ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" required name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" required class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" required class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="text" name="idcard" required class="form-control" id="exampleInputEmail1" maxlength="13" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
                    <select name="location_id" required class="form-control location_select4">
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

                <div class="form-group">
                    <select class="form-control fac_select4" required name="department">
                        <option value="" disabled selected>*คณะ</option>


                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control program_select4" required name="discipline">
                            <option value="" disabled selected>*สาขา</option>


                        </select>
                </div>
                <div class="form-group">
                    <select class="form-control group_select4" required name="status">
                            <option value="" disabled selected>*กลุ่ม</option>



                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" required pattern="^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$"
                    maxlength="17" name="macaddress" placeholder="xx-xx-xx-xx-xx-xx" data-toggle="tooltip" data-placement="bottom" title="mac-address">
                </div>
                <div class="form-group">
                    <select name="dev_type" required class="form-control">
                        <option label="อุปกรณ์" value="-" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                        <option value="Other">อื่นๆ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">บันทึก</button>
                </form>
            </div>


            </div>
        </div>
    </div>
    <div class="wrap"></div>
</div>
<script>

$(function(){

    $(document).on("click",".tab",function(){
        $('.managealert').remove();
    });

    $(document).on( "change", ".location_select,.location_select2,.location_select3,.location_select4", function() {
        var location_class = $(this).attr('class').split(' ');
        var last_word = location_class[1][location_class[1].length-1];
        var group;

        if(last_word !== "t"){
            var fac_class = '.fac_select'+last_word;
            var group_class = '.group_select'+last_word;
            group = $('.type_select'+last_word).val();
        }else{
            var fac_class = '.fac_select';
            var group_class = '.group_select';
            group = $('.type_select').val();
        }
        var data =  $(this).val();
        $.ajax({
            method:'POST',
            url:'../student/getLocationFacData',
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
            url:'../student/getLocationGroupData',
            dataType: "JSON",
            data:{
                data:data,
                group:group
            },
            success:function(d)
            {

                console.log(fac_class);
                $(group_class).html('');
                $(group_class).append('<option value="" disabled selected>*กลุ่ม</option>');

                $.each(d , function(i, val) {

                    $(group_class).append(' <option value="'+d[i].gdesc+'">'+d[i].gdesc+'</option> ');

                });

            }
        });

    });

    $(document).on( "change", ".fac_select,.fac_select2,.fac_select4", function() {
        var fac_class = $(this).attr('class').split(' ');
        var last_word = fac_class[1][fac_class[1].length-1];
        if(last_word !== "t"){
            var pro_class = '.program_select'+last_word;
        }else{
            var pro_class = '.program_select';
        }
        var data =  $(this).val();

        $.ajax({
            method:'POST',
            url:'../student/getprogramdata',
            dataType: "JSON",
            data:{
                data:data
            },
            success:function(d)
            {

                $(pro_class).html('');
                $(pro_class).append('<option value="" disabled selected>*สาขา</option>');

                $.each(d , function(i, val) {

                    $(pro_class).append(' <option value="'+d[i].PRO_ID+'">'+d[i].PRO_NAME+'</option> ');

                });

            }
        });

    });


});

</script>
</body>
</html>
