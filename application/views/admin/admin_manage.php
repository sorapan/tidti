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
<<<<<<< HEAD
    <div class="nav">
        <!-- <span class="secret"><i class="fa fa-user-secret" aria-hidden="true"></i></span> -->
        <span class="username thaisans">ผู้ดูแล</span>
        <button class="logout" title="ออกระบบ"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
    </div>
=======
    <?=headerOfAdmin($this->session->userdata('status'))?>
>>>>>>> refs/remotes/origin/bestzaba
    <div class="sidebar ">

        <div class="content">
            <ul class="menus thaisans">
                <a href="<?=base_url().'admin/manage'?>"><li class="manage active"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span> เพิ่มอุปกรณ์ผู้ใช้ </li></a>
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac-address </li></a>
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log?log='?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
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
            <li role="presentation" class="tab"><a href="#student" aria-controls="tabstudent" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-user" aria-hidden="true"></i><label>นักศึกษา</label></a></li>
            <li role="presentation" class="tab"><a href="#professor" aria-controls="professor" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-users" aria-hidden="true"></i></i><label>อาจารย์</label></a></li>
            <li role="presentation" class="tab"><a href="#staff" aria-controls="professor" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-user" aria-hidden="true"></i><label>บุคลากร</label></a></li>
            <li role="presentation" class="tab"><a href="#special" aria-controls="professor" role="tab" data-toggle="tab"><div>เพิ่มอุปกรณ์</div><i class="fa fa-user-secret" aria-hidden="true"></i><label>ผู้ใช้พิเศษ</label></a></li>
            </ul>
            <span class="managealert"><?=$this->session->flashdata('alert');?></span>
            <!-- นักศึกษา -->
            <div class="tab-content">
<<<<<<< HEAD
            <div role="tabpanel" class="tab-pane fade form" id="student">
                <form method="post" action="admin/AddManualUser/student">
=======
            <div role="tabpanel" class="tab-pane fade form  active in" id="student">
                <form method="post" action="AddManualUser">
>>>>>>> refs/remotes/origin/bestzaba
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
                    <select class="form-control" name="department">
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
                    <select class="form-control" name="discipline">
                            <option value="" disabled selected>*สาขา</option>

                        <?php
                        foreach($program_data as $pd)
                        {
                        ?>
                            <option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>
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

            <!-- อาจารย์ บุคลากร -->
            <div role="tabpanel" class="tab-pane fade form" id="professor">
                <form method="post" action="admin/submitdevice/professor">
                <div class="form-group">
                    <h3 class="thaisans bold" style="margin-top: 0">อาจารย์บุคลากร</h3>
                    <label for="exampleInputEmail1">ข้อมูลส่วนตัว</label>
                    <div>
                        <select class="form-control pname" name="pname">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                        <input type="text" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="personid" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <select class="form-control" name="department">
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
                    <select class="form-control" name="branch">
                            <option value="" disabled selected>*สาขา</option>

                        <?php
                        foreach($program_data as $pd)
                        {
                        ?>
                            <option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>
                        <?php
                        }
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
                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" id="" placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="location" class="form-control">
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
                        <input type="text" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="personid" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
<<<<<<< HEAD
                    <input type="text" class="form-control" id="" placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="location" class="form-control">
=======
                    <input type="text" name="macaddress" class="form-control" required pattern="^([0-9A-Fa-f]{2}[-]){5}([0-9A-Fa-f]{2})$" maxlength="17"  placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="dev_type" class="form-control" required>
>>>>>>> refs/remotes/origin/bestzaba
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
                        <input type="text" class="form-control fname" id="" placeholder="ชื่อ">
                        <input type="text" class="form-control lname" id="" placeholder="สกุล">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="อีเมล์">
                </div>
                <div class="form-group">
                    <input type="personid" class="form-control" id="exampleInputEmail1" placeholder="รหัสประจำตัวประชาชน">
                </div>
                <div class="form-group">
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
                <div class="form-group">
                    <select class="form-control" name="department">
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
                    <select class="form-control" name="branch">
                            <option value="" disabled selected>*สาขา</option>

                        <?php
                        foreach($program_data as $pd)
                        {
                        ?>
                            <option value="<?=$pd->PRO_ID?>"><?=$pd->PRO_NAME?></option>
                        <?php
                        }
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
                <div class="form-group">
                    <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                    <input type="text" class="form-control" id="" placeholder="xx-xx-xx-xx-xx-xx">
                </div>
                <div class="form-group">
                    <select name="location" class="form-control">
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
</body>
</html>
