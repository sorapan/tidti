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
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user active"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log?log='?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
            </ul>
        </div>
    </div>
    <div class="content mac_list">
        <div class="_1">
            <div class="search">
                <input type="text" class="input thaisans" name="search" placeholder="ค้นหา" id="search">
                <button class="button"><i class="fa fa-search"></i></button>
            </div>
            <table class="table table-hover">
                <thead>
                    <th class="center">#</th>
                    <th class="center">username</th>
                    <th>name</th>
                    <th>status</th>
                    <th>email</th>
                    <th>location</th>
                    <th class="center">
                        ...
                    </th>
                </thead>
                <?php
                     $i=0;
                     foreach($data as $val){

                 ?>
                <tr>
                    <td style="font-size: 1em;"><?=++$i;?></td>
                    <td ><?=$val->username?></td>
                    <td><?=$val->firstname.' '.$val->lastname?></td>
                    <td><?=$val->status?></td>
                    <td><?=$val->mailaddr?></td>
                    <td><?php
                    switch ($val->location_id) {
                        case 'sk':
                            echo "สงขลา";
                            break;
                        case 'sai':
                            echo "ไสใหญ่";
                            break;
                        case 'tho':
                            echo "ทุ่งใหญ่";
                            break;
                        case 'ka':
                            echo "ขนอม";
                            break;
                        case 'tr':
                            echo "ตรัง";
                            break;
                        case 'rat':
                            echo "วิทยาลัยรัตภูมิ";
                            break;

                    }?>

                    </td>
                    <td>
                        <button title="ลบ"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        <button title="บล็อค"><i class="fa fa-lock" aria-hidden="true"></i></button>
                        <button title="แก้ไข"><i class="fa fa-pencil" aria-hidden="true"></i></button>

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
