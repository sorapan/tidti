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
    <div class="nav">
        <!-- <span class="secret"><i class="fa fa-user-secret" aria-hidden="true"></i></span> -->
        <span class="username thaisans">ผู้ดูแล</span>
        <button class="logout" title="ออกระบบ"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
    </div>
    <div class="sidebar ">

        <div class="content">
            <ul class="menus thaisans">
                <a href="<?=base_url().'admin/manage'?>"><li class="manage"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span> เพิ่มอุปกรณ์ผู้ใช้ </li></a>
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist active"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac-address </li></a>
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log?log='?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
            </ul>
        </div>

    </div>
    <div class="content mac_list maclistedit">
        <div class="_1">
        <?php
                    if($_GET['stt'] == 1){
                ?>
            <div class="showalert thaisans">


                   แก้ไขเสร็จสิ้น


            </div>
            <?php
                }
                ?>
            <div class="cancle">
                <button class="button thaisans" onclick="location.href = 'admin/mac'">กลับ</button>
            </div>

            <table class="table table-hover">
                <thead>
                    <th class="center">#</th>
                    <th class="center">หมายเลข mac</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่ลงทะเบียน</th>
                    <th class="center">
                        ...
                    </th>
                </thead>
                <?php

                     foreach($data as $val){

                 ?>
                <tr>
                    <td><i class="fa fa-<?=switchIcon($val->dev_type);?>" title="phone" aria-hidden="true"></i></td>
                    <td ><?=$val->macaddress?></td>
                    <td><?=$val->username?></td>
                    <td><?=$val->pname." ".$val->firstname." ".$val->lastname?></td>
                    <td><?=$val->addtime?></td>
                    <td>
                        <h3>ข้อมูลเดิม</h3>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </table>
            <div class="mid" >
                <div class="head"><i class="fa fa-gears"></i> <span class="thaisans bold" style="margin-top: 0">แก้ไข</span></div>
                <div class="form">
                    <form method="post" action="setDataToEditById/<?=$val->oid?>">
                    <div class="form-group">

                        <label>ข้อมูลส่วนตัว</label>
                        <div>
                            <?php
                                switch ($val->pname) {
                                    case 'นาย':
                                        $a = "selected";
                                        $b = "";
                                        $c = "";
                                        break;
                                    case 'นาง':
                                        $a = "";
                                        $b = "selected";
                                        $c = "";
                                        break;
                                    case 'นางสาว':
                                        $a = "";
                                        $b = "";
                                        $c = "selected";
                                        break;
                                    default:
                                        return " ";
                                        break;
                                }
                            ?>
                            <select class="form-control pname" name="pname">
                                <option value="" disabled selected>คำนำหน้า</option>
                                <option value="นาย" <?=$a?> >นาย</option>
                                <option value="นางสาว" <?=$b?>>นางสาว</option>
                                <option value="นาง" <?=$c?>>นาง</option>
                            </select>
                            <input type="text" class="form-control fname" name="firstname" placeholder="ชื่อ" value="<?=$val->firstname?>">
                            <input type="text" class="form-control lname" name="lastname" placeholder="สกุล" value="<?=$val->lastname?>">
                        </div>
                    </div>

                    <!-- อีเมลล์ -->
                    <!-- <div class="form-group">
                    <label>อีเมลล์</label>
                        <input type="text" class="form-control" id="" placeholder="อีเมล์" value="<?=$val->mailaddr?>">
                    </div> -->


                    <div class="form-group">
                        <label>รหัสนักศึกษา / รหัสบัตรประชาชน</label>
                        <input type="text" class="form-control" name="idcard" placeholder="รหัสนักศึกษา" value="<?=$val->idcard?>">
                    </div>

                    <!-- กลุ่ม -->
                    <!-- <div class="form-group">
                        <input type="personid" class="form-control" id="exampleInputEmail1" placeholder="กลุ่ม">
                    </div> -->

                    <!-- คณะ -->
                    <!-- <div class="form-group">
                        <select class="form-control" name="department">
                            <option value="" disabled selected>คณะ</option>

                        <?php
                        foreach($fac_data as $fd)
                        {
                            // if($fd->FAC_NAME = $val->)
                        ?>
                            <option value="<?=$fd->FAC_ID?>"><?=$fd->FAC_NAME?></option>
                        <?php
                        }
                        ?>

                        </select>
                    </div> -->

                    <!-- สาขา -->
                    <!-- <div class="form-group">
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
                    </div> -->

                    <!-- สาขา -->
                    <!-- <div class="form-group">
                        <select name="location" class="form-control" >
                            <?=selectLocation($val->location_id);?>
                        </select>

                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">รหัสอุปกรณ์ Mac Address</label>
                        <input type="text" class="form-control" name="macaddress" placeholder="xx-xx-xx-xx-xx-xx" value="<?=$val->macaddress?>">
                    </div>
                    <div class="form-group">
                        <select name="dev_type" class="form-control">
                            <?=selectDevice($val->dev_type);?>
                        </select>
                    </div>
                    <input type="text" hidden="" name="username" value="<?=$val->username?>">
                    <input type="text" hidden="" name="oid" value="<?=$val->oid?>">.
                    <input type="text" hidden="" name="old_macaddress" value="<?=$val->macaddress?>">
                    <button type="submit" class="btn btn-success">ตกลง</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap"></div>
</div>
</body>
</html>
