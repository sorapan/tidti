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
                <!-- <a href="<?=base_url().'admin/macmanual'?>"><li class="manuallist active"><span><i class="fa fa-list-ul" aria-hidden="true"></i></span> รายการ mac manual </li></a> -->
                <!-- <a href="<?=base_url().'admin/user'?>"><li class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span> รายชื่อผู้ใช้ </li></a> -->
                <a href="<?=base_url().'admin/log'?>"><li class="history "><span><i class="fa fa-history" aria-hidden="true"></i></span> ความเคลื่อนไหว </li></a>
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
                <form method="get" action="macmanual">
                <input type="text" class="input thaisans" name="search" value="<?=$search?>" placeholder="ค้นหา" id="search">
                <button class="button" type="submit"><i class="fa fa-search"></i></button>
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
                    <th>วันที่</th>
                    <th>วิทยาเขต</th>
                    <th class="center">
                        ...
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
                    <td ><?=$val->username?></td>
                    <td><?=$val->username?></td>
                    <td><?=$val->firstname.' '.$val->lastname?></td>
                    <td><?=$val->dateregis?></td>
                    <td><?=location_id($val->location_id)?></td>
                    <td>
                        <!-- <button title="บล็อค"><i class="fa fa-lock" aria-hidden="true"></i></button> -->
                        <form method="post" action="deleteMacManual" onsubmit="return confirm('คุณต้องการที่จะลบใช่หรือไม่')">
                            <input type="text" name="mac" hidden value="<?=$val->username?>">
                            <button title="ลบ"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        <form method="get" action="editMacManual">
                            <input type="text" name="mac" hidden value="<?=$val->username?>">
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
<script type="text/javascript">

// alert('s');

        function DeleteMac(mac){
            var check = confirm('คุณต้องการที่จะลบใช่หรือไม่');
            if(check){
                window.location='<?=base_url().'admin/deleteMac/'?>'+mac;
            }

        }

</script>
</html>
