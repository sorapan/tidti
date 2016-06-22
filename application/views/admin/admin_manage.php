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
    <?=headerOfAdmin($this->session->userdata('status'))?>
    <div class="sidebar ">

        <div class="content">
            <ul class="menus thaisans">
                <a href="<?=base_url().'admin/manage'?>"><li class="manage active"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span> เพิ่มอุปกรณ์ผู้ใช้ </li></a>
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac-address </li></a>
                <!-- <a href="<?=base_url().'admin/macmanual'?>"><li class="manuallist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac manual </li></a> -->
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log'?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
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
                if(!empty($this->session->flashdata('alert'))){
            ?>
            <span class="managealert" style="padding: 5px 50px;font-size: 1.2em; background-color: #c4ffd3;display: inline-block;"><?=$this->session->flashdata('alert');?></span>
            <?php
                }
            ?>

            <!-- นักศึกษา -->
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade form  active in" id="student">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">นักศึกษา</h3>
                    <label>ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="text" name="idcard" class="form-control" id="exampleInputEmail1" placeholder="รหัสนักศึกษา">
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
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
                <div class="form-group">
                    <select class="form-control fac_select" name="department">
                        <option value="" disabled selected>*คณะ</option>

                    <?php
                    foreach($fac_data as $fd)
                    {
                    ?>
                        <option value="<?=$fd->FAC_ID?>"><?=$fd->FAC_NAME?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control program_select" name="discipline">
                            <option value="" disabled selected>*สาขา</option>

                        <!-- <?php
                        foreach($program_data as $pd)
                        {
                        ?>
                            <option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>
                        <?php
                        }
                        ?> -->

                        </select>
                </div>
                <div class="form-group">
                    <select name="location_id" class="form-control">
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
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" name="macaddress" placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="dev_type" class="form-control">
                        <option label="อุปกรณ์" value="-" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

            <!-- อาจารย์ -->
            <div role="tabpanel" class="tab-pane fade form" id="professor">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">อาจารย์</h3>
                    <label>ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="text" name="idcard" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
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
                <div class="form-group">
                    <select class="form-control fac_select2" name="department">
                        <option value="" disabled selected>*คณะ</option>

                    <?php
                    foreach($fac_data as $fd)
                    {
                    ?>
                        <option value="<?=$fd->FAC_ID?>"><?=$fd->FAC_NAME?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control program_select2" name="discipline">
                            <option value="" disabled selected>*สาขา</option>

                       <!--  <?php
                        foreach($program_data as $pd)
                        {
                        ?>
                            <option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>
                        <?php
                        }
                        ?> -->

                        </select>
                </div>
                <div class="form-group">
                    <select name="location_id" class="form-control">
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
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" name="macaddress" placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="dev_type" class="form-control">
                        <option label="อุปกรณ์" value="-" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                        <option value="Other">อื่นๆ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

             <!-- บุคลากร -->
            <div role="tabpanel" class="tab-pane fade form" id="staff">
                <form method="post" action="AddManualUser">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">บุคลากร</h3>
                    <label for="exampleInputEmail1">ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="personid" name="idcard" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
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
                <div class="form-group">
                    <select class="form-control" name="department">
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
                    <select name="location_id" class="form-control">
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
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" name="macaddress" class="form-control" required pattern="^([0-9A-Fa-f]{2}[-]){5}([0-9A-Fa-f]{2})$" maxlength="17"  placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="dev_type" class="form-control" required>
                        <option label="อุปกรณ์" value="-" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                        <option value="Other">อื่นๆ</option>
                    </select>
                </div>
                <input type="text" hidden="" name="discipline" value="-">
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

            <!-- พิเศษ -->
            <div role="tabpanel" class="tab-pane fade form" id="special">
                <form method="post" action="admin/submitdevice/special">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">ผู้ใช้พิเศษ</h3>
                    <label for="exampleInputEmail1">ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" name="firstname" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" name="lastname" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="mailaddr" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="text" name="idcard" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
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
                <div class="form-group">
                    <select class="form-control fac_select3" name="department">
                        <option value="" disabled selected>*คณะ</option>

                    <?php
                    foreach($fac_data as $fd)
                    {
                    ?>
                        <option value="<?=$fd->FAC_ID?>"><?=$fd->FAC_NAME?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control program_select3" name="discipline">
                            <option value="" disabled selected>*สาขา</option>

                       <!--  <?php
                        foreach($program_data as $pd)
                        {
                        ?>
                            <option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>
                        <?php
                        }
                        ?> -->

                        </select>
                </div>
                <div class="form-group">
                    <select name="location_id" class="form-control">
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
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" name="macaddress" placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="dev_type" class="form-control">
                        <option label="อุปกรณ์" value="-" disabled selected>อุปกรณ์</option>
                        <option value="Phone">มือถือ</option>
                        <option value="Notebook">โน๊ตบุ๊ค</option>
                        <option value="Tablet">แท็บเล็ต</option>
                        <option value="Other">อื่นๆ</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>


            </div>
        </div>
    </div>
    <div class="wrap"></div>
</div>
<script>

$(function(){

    $(document).on( "change", ".fac_select", function() {

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

                $('.program_select').html('');
                $('.program_select').append('<option value="" disabled selected>*สาขา</option>');

                $.each(d , function(i, val) {

                    $('.program_select').append(' <option value="'+d[i].PRO_ID+'">'+d[i].PRO_NAME+'</option> ');

                });

            }
        });

    });

    $(document).on( "change", ".fac_select2", function() {

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

                $('.program_select2').html('');
                $('.program_select2').append('<option value="" disabled selected>*สาขา</option>');

                $.each(d , function(i, val) {

                    $('.program_select2').append(' <option value="'+d[i].PRO_ID+'">'+d[i].PRO_NAME+'</option> ');

                });

            }
        });

    });

    $(document).on( "change", ".fac_select3", function() {

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

                $('.program_select3').html('');
                $('.program_select3').append('<option value="" disabled selected>*สาขา</option>');

                $.each(d , function(i, val) {

                    $('.program_select3').append(' <option value="'+d[i].PRO_ID+'">'+d[i].PRO_NAME+'</option> ');

                });

            }
        });

    });

});

</script>
</body>
</html>
