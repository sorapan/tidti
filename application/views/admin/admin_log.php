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
                <a href="<?=base_url().'admin/macmanual'?>"><li class="manuallist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac manual </li></a>
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
            <form method="get" action="log">
            <input class="input" style="width:160px;font-size: 1.1em" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="1997-06-30" placeholder="1997-06-30 (ปี ค.ศ.)" type="text" name="date">
            <!-- <select name="date" class="select" style="font-size: 1em">
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
            </select> -->

            <select name="location" class="select" style="font-size: 1em">
                <!-- <option value="" selected="">วิทยาเขต -->
                    <option value="" selected>วิทยาเขต</option>
                    <?php
                    if(!$this->session->userdata('status')=='staff'){
                    ?>
                    <option value="-">-</option>
                     <?php
                        }
                    ?>
                    <optgroup label="วิทยาเขต" selected>
                    <?php
                        foreach($location as $ld)
                        {
                        ?>
                            <option value="<?=$ld->location_id?>"><?=$ld->location_name?></option>
                        <?php
                        }
                        ?>
                        </optgroup>
            </select>

            <select name="status" class="select" style="font-size: 1em">
                <!-- <option value="" selected="">วิทยาเขต -->
                    <option value="" selected>สถานะ</option>
                    <option value="user">user</option>
                    <option value="staff">staff</option>
            </select>
            <input type="text" class="input" name="search" value="<?=$search?>" placeholder="ค้นหาชื่อผู้ใช้" id="search">
            <!-- <button class="button" type="submit"><i class="fa fa-search"></i></button> -->

            <div class="btn-group">
              <button type="submit" name="type" style="margin-right: 0;border-right: 0;" class="button btn">ค้นหา</button>
              <button type="button" class="button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><button class="button" type="submit" name="type" value="username">ชื่อผู้ใช้</button></li>
                <li><button class="button" type="submit" name="type" value="event">การกระทำ</button></li>
                <li><button class="button" type="submit" name="type" value="status">สถานะ</button></li>
              </ul>
            </div>
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
                        <th style="width: 105px;" class="center">วันที่</th>
                        <th>เวลา</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>สถานะ</th>
                        <th class="center">วิทยาเขต</th>
                        <th>การกระทำ</th>
                    </thead>
                    <?php

                        if(gettype($alllog)!='array'){

                            ?>
                            <tr>
                            <td ></td>
                            <td ></td>
                            <td><?=$alllog?></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <?php

                            }else{
                             foreach($alllog as $val){


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
