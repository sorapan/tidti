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
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac-address </li></a>
                <a href="<?=base_url().'admin/history'?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
                <a href="<?=base_url().'admin/user'?>"><li class="user active"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a>
            </ul>

        </div>
    </div>
    <div class="content user">
        <div class="_1">
            <div class="search">
                <input type="text" class="" name="search" placeholder="..." id="search">
                <button class="button"><i class="fa fa-search"></i></button>
            </div>
            <div class="faculty">
                <select>
                    <option>คณะ</option>
                </select>
                <select >
                    <option>สาขา</option>
                </select>
            </div>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>รหัสนักศึกษา</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>คณะ</th>
                    <th>สาขา</th>
                    <th>...</th>
                </thead>
                <tr class="center">
                    <td>#</td>
                    <td >xxxxxxxxxxx</td>
                    <td>Akka Yon</td>
                    <td>xxxxx</td>
                    <td>xxxxx</td>
                </tr>
            </table>
        </div>
        <div class="_2">

        </div>
    </div>
    <div class="wrap"></div>
</div>
</body>
</html>
