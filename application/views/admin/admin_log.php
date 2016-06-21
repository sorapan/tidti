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
            <form method="post" action="searchlog">
            <select name="date" class="select">
                <option value="">วันที่</option>
                <?php
                        $i = 0;

                    foreach ($date as $var) {
                        $value[$i++] = $var->DATE;
                    }

                    foreach (array_unique($value) as $var) {
                        ?>
                        <option value="<?=$var;?>"><?=$var?></option>

                        <?php
                    }

                ?>
            </select>
            <!-- <select name="location" class="select">
                <option value="">วิทยาเขต</option>
                <?php
                    foreach ($data as $var) {
                        ?>

                        <option value="<?=$var->LOCATION?>"><?=location_id($var->LOCATION)?></option>

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

                        if(gettype($data)!='array'){

                            ?>
                            <tr>
                            <td ></td>
                            <td ></td>
                            <td><?=$data?></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <?php

                            }else{
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
