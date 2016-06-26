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
    <?=headerOfAdmin($this->session->userdata('status'),$this->session->userdata('location_id'))?>
    <div class="sidebar ">

        <div class="content">
            <ul class="menus thaisans">
                <a href="<?=base_url().'admin/manage'?>"><li class="manage"><span><i class="fa fa-user-plus" aria-hidden="true"></i></span>เพิ่มอุปกรณ์ผู้ใช้ </li></a>
                <a href="<?=base_url().'admin/mac'?>"><li class="maclist active"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span>mac ลงทะเบียนออนไลน์</li></a>
                <a href="<?=base_url().'admin/macmanual'?>"><li class="manuallist"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span>mac จุดลงทะเบียน </li></a>
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log'?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span>ประวัติการเข้าระบบ </li></a>
            </ul>
        </div>

    </div>
    <div class="content mac_list">
        <div class="_1">
            <div class="search">
            <?php
                if(!empty($_GET['search'])){
                    $search = $_GET['search'];
                }else{
                    $search = '';
                }
            ?>
                <form method="get" action="mac">
                <input class="input" style="width:160px;font-size: 1.1em" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="1997-06-30" placeholder="1997-06-30 (ปี ค.ศ.)" type="text" name="date">
                <!-- <select name="date">
                    <option value="" selected="">วันที่</option>
                    <?php
                        $i=0;
                        foreach ($date as $value) {

                            $datetime[$i++] = date("Y-m-d",strtotime($value->addtime));
                            # code...array_unique
                        }
                        $date = array_unique($datetime);
                        foreach($date as $ld)
                        {
                        ?>
                            <option value="<?=$ld?>"><?=$ld?></option>
                        <?php
                        }
                        ?>
                </select> -->
                <select name="location_id">
                    <option value="" selected="">วิทยาเขต</option>
                    <?php
                    if($this->session->userdata('status')=='admin'){
                        foreach($location as $ld)
                        {

                        ?>
                            <option value="<?=$ld->location_id?>"><?=$ld->location_name?></option>
                        <?php
                        }

                        }else{
                        ?>
                        <option selected value="<?=$this->session->userdata('location_id')?>"><?=location_id($this->session->userdata('location_id'))?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="text" class="input thaisans" name="search" value="<?=$search?>" title="ค้นหารหัสอุปกรณ์" placeholder="ค้นหารหัสอุปกรณ์" id="search">
                <!-- <div class="btn-group">
                <button class="button dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   ค้นหา <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><button class="button" type="submit" name="type" value="">ค้นหา</button></li>
                    <li role="separator" class="divider"></li>
                    <li><button class="button" type="submit" name="type" value="macaddress">รหัสอุปกรณ์</button></li>
                    <li><button class="button" type="submit" name="type" value="username">ชื่อผู้ใช้</button></li>
                    <li><button class="button" type="submit" name="type" value="name">ชื่อนามสกุล</button></li>
                  </ul>
                </div> -->

                <div class="btn-group" style="float: left">
                  <button type="submit" name="type" style="margin-right: 0;border-right: 0;" class="button btn">ค้นหา</button>
                  <button type="button" class="button dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <!-- <li><button class="button" type="submit" name="type" value="">ค้นหา</button></li> -->
                    <li><button class="button" type="submit" name="type" value="username">ชื่อผู้ใช้</button></li>
                    <li><button class="button" type="submit" name="type" value="name">ชื่อนามสกุล</button></li>
                  </ul>
                </div>
                <!-- <button class="button" type="submit"><i class="fa fa-search"></i></button> -->


                <?php
                    if(!empty($this->session->userdata('alert'))){
                ?>
                    <span class="myalert"><?=$this->session->userdata('alert');?></span>

                <?php }?>
                </form>
            </div>
            <table class="table table-hover">
                <thead>
                    <th class="center">อุปกรณ์  </th>
                    <th class="center">mac address</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>วันที่ลงทะเบียน</th>
                    <th>วิทยาเขต</th>
                    <th class="center">
                        การจัดการ
                    </th>
                </thead>
                <?php
                    if(!is_array($data))
                    {
                        ?>
                        <td></td>
                        <td></td>
                        <td><?=$data?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>

                        </td>
                        <?php
                    }else{
                     foreach($data as $val){



                 ?>
                <tr>
                    <td><i class="fa fa-<?=switchIcon($val->dev_type);?>" title="<?=switchIcon($val->dev_type);?>" aria-hidden="true"></i></td>
                    <td ><?=$val->macaddress?></td>
                    <td><?=$val->username?></td>
                    <td><?=$val->firstname.' '.$val->lastname?></td>
                    <td><?=$val->addtime?></td>
                    <td><?=location_id($val->location_id)?></td>
                    <td>
                        <!-- <button title="บล็อค"><i class="fa fa-lock" aria-hidden="true"></i></button> -->
                        <form method="post" action="deleteMac" onsubmit="return confirm('คุณต้องการที่จะลบใช่หรือไม่')">
                            <input type="text" name="mac" hidden value="<?=$val->macaddress?>">
                            <button title="ลบ"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <form method="get" action="editMac">
                            <input type="text" name="mac" hidden value="<?=$val->oid?>">
                            <button title="แก้ไข"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        </form>

                    </td>
                </tr>

                <?php
                    }}
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
