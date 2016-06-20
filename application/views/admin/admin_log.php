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
        <button class="logout" onclick="window.location='<?=base_url().'admin/logout'?>'" title="ออกระบบ"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
    </div>
    <div class="sidebar ">

        <div class="content">
            <ul class="menus thaisans">
                <a href="<?=base_url().'admin/manage'?>"><li class="manage"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span> เพิ่มอุปกรณ์ผู้ใช้ </li></a>
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac-address </li></a>
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log'?>"><li class="history active"><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
            </ul>
        </div>

    </div>
    <div class="content log">


        <div class="board">
        <h2 class="thaisans bold">ช้อมูลการใช้งาน</h2>
        <div class="search">
        <?php
            if(empty($search)){
                $search = "";
            }
        ?>
            <form method="post" action="search">
           <!--  <select class="select">
                <option disabled selected>วันที่</option>
                <?php
                    foreach ($data as $var) {
                        ?>

                        <option value="<?=$var?>"></option>

                        <?php
                    }
                ?>
            </select> -->
            <input type="text" class="input thaisans" name="search" value="<?=$search?>" placeholder="ค้นหา" id="search">
            <button class="button" type="submit"><i class="fa fa-search"></i></button>
            <?php
                if(!empty($this->session->userdata('alert'))){
            ?>
                <span class="myalert"><?=$this->session->userdata('alert');?></span>
            <?php }?>
            </form>
        </div>


            <div class="content">
                <table class="table table-hover ">
                    <thead>
                        <th class="center">วันที่</th>
                        <th>เวลา</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>สถานะ</th>
                        <th class="center">วิทยาเขต</th>
                        <th>การกระทำ</th>
                    </thead>
                    <?php

                             foreach($data as $val){

                         ?>
                         <tr>
                            <td ><?=$val->DATE?></td>
                            <td ><?=$val->TIME?></td>
                            <td><?=$val->USERNAME?></td>
                            <td><?=$val->STATUS?></td>
                            <td><?=location_id($val->LOCATION)?></td>
                            <td><?=$val->EVENT?></td>

                        </tr>

                        <?php
                            }
                        ?>
                </table>
            </div>

            <!-- <div class="content">
            <?php
            if(!empty($_GET['log'])){
            ?>



            <?php
            echo nl2br(file_get_contents('log_file/'. $_GET['log'] ));
            }
            ?>
            </div> -->
        </div>
        <!-- <div class="list">

            <h3 class="thaisans bold" style="font-size: 2em">ค้นหา</h3>
            <div class="content">
                <!-- <?php

                    $files = scandir('log_file/');
                    foreach($files as $file) {
                        if($file == '.' || $file == '..') continue;
                        echo '<a href="?log='.$file.'">'. $file . '</a><br>';
                    }

                ?>
            </div>
        </div>-->
    </div>
</div>
</body>
</html>
