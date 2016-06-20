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
    <div class="content mac_list">
        <div class="_1">
            <div class="search">
            <?php
                if(empty($search)){
                    $search = "";
                }
            ?>
                <form method="post" action="search">
                <input type="text" class="input thaisans" name="search" value="<?=$search?>" placeholder="ค้นหา" id="search">
                <button class="button" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <th class="center">#</th>
                    <th class="center">mac address</th>
                    <th>username</th>
                    <th>name</th>
                    <th>date</th>
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
                    <td><?=$val->firstname.' '.$val->lastname?></td>
                    <td><?=$val->addtime?></td>
                    <td>
                        <button title="ลบ"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <button title="บล็อค"><i class="fa fa-lock" aria-hidden="true"></i></button>
                        <button title="แก้ไข" onclick="window.location='<?=base_url().'admin/mac/'.$val->oid.'?stt='?>'"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    </td>
                </tr>

                <?php
                    }
                ?>
            </table>
        </div>
        <div class="_2">

        </div>
    </div>
    <div class="wrap"></div>
</div>
</body>
</html>
