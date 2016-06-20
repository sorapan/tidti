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
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac-address </li></a>
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log?log='?>"><li class="history active"><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
            </ul>
        </div>

    </div>
    <div class="content log">


        <div class="board">
        <h2 class="thaisans bold">ช้อมูลการใช้งาน <?=$_GET['log']?></h2>
            <div class="content">
            <?php
            if(!empty($_GET['log'])){
            ?>



            <?php
            echo nl2br(file_get_contents('log_file/'. $_GET['log'] ));
            }
            ?>
            </div>
        </div>
        <div class="list">

            <h3 class="thaisans bold" style="font-size: 2em">ประวัติ</h3>
            <div class="content">
                <?php

                    $files = scandir('log_file/');
                    foreach($files as $file) {
                        if($file == '.' || $file == '..') continue;
                        echo '<a href="?log='.$file.'">'. $file . '</a><br>';
                    }

                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
