<!DOCTYPE html>
<html lang="en">
<?=header_url()?>
</html>
<body>
<div class="contain col-xs-12 nopad">
    <div class="login user-page col-md-offset-2 col-xs-12 col-sm-12 col-md-8 nopad">
        <div class="_1 col-xs-12 col-sm-4">
            <div class="head">
                <h2 class="thaisans bold">นักศึกษา</h2>
            </div>
            <div class="content">
                <div class="name"><?= $this->session->userdata('firstname')?> <?= $this->session->userdata('lastname')?></div>
                <div class="major">XXXXX</div>
            </div>
        </div>
        <div class="_2 col-xs-12 col-sm-8">

            <div class="form col-xs-12 col-sm-offset-1 col-sm-10 col-md-offset-1 col-md-10">
                <div class="head">
                    <h2 class="thaisans bold">อุปกรณ์ / Device</h2>
                </div>
                <div class="sub-head">
                    <h2 class="thaisans">ลงทะเบียน mac-address เพื่อรับสัญญาณ Internet</h2>
                </div>
                <div class="content col-xs-10">
                        <div class="add-device">
                            <!--<div class="alert">alert</div>-->
                            <div class="device">


                            <!--/////////////////////////////////////////////////////////////////////////-->
                            
                                <h3 class="thaisans bold">คอมพิวเตอร์/โน็ตบุ๊ค</h3>
                                
                            <?php
                                $data_exists = false;
                                foreach($mac_data as $data){
                                    if($data->device=='comp')
                                    {
                                        $data_exists = true;
                                        break;
                                    }
                                }
                                if($data_exists){
                            ?>
                                
                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->mac?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="laptop"><i class="fa fa-laptop active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->mac?>">
                                </form>
                                
                            <?php
                                }else{
                            ?>
                            
                                <form method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" placeholder="mac-address" name="mac" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="laptop" class="laptop"><i class="fa fa-laptop"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="comp">
                                </form>
                                
                            <?php
                                }
                            
                            ?>
                            
                            <!--/////////////////////////////////////////////////////////////////////////-->
                                
                                <h3 class="thaisans bold">โทรศัพท์</h3>
                                
                            <?php
                            $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='phone')
                                {
                                    $data_exists = true;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>
                                
                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->mac?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="mobile"><i class="fa fa-mobile active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->mac?>">
                                </form>
                                
                            <?php
                                
                                }else{
                            ?>
                            
                                <form method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="phone">
                                </form>
                                
                            <?php
                                }
                            
                            ?>
                                
                                <!--<form method="POST">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac_mobile" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="mobile"><i class="fa fa-mobile"></i></label>
                                  </div>
                                </form>-->
                                
                            <!--/////////////////////////////////////////////////////////////////////////-->
                            
                                <h3 class="thaisans bold">แท็ปเล็ต</h3>
                                
                            <?php
                                    $data_exists = false;
                            foreach($mac_data as $data){
                                if($data->device=='tablet')
                                {
                                    $data_exists = true;
                                    $data_mac = $data->mac;
                                    break;
                                }
                            }
                                if($data_exists){
                            ?>
                            
                                                       
                                <form method="POST" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
                                    <div class="ch-device activated">
                                        <input type="text" class="text opensans" disabled name="" value="<?=$data->mac?>" id="">
                                        <button class="button"><i class="fa fa-trash-o"></i></button>
                                        <label for="tablet"><i class="fa fa-tablet active"></i></label>
                                    </div>
                                    <input type="hidden" name="del" value="<?=$data->mac?>">
                                </form>
                                
                            <?php
                                }else{
                            ?>
                                
                                <form method="POST" action="student/addmac">
                                  <div class="ch-device ">
                                      <input type="text" class="text opensans" name="mac" placeholder="mac-address" id="">
                                      <button class="button" type="submit"><i class="fa fa-plus-square-o"></i></button>
                                      <label for="tablet" class="tablet"><i class="fa fa-tablet"></i></label>
                                  </div>
                                  <input type="hidden" name="device" value="tablet">
                                </form>
                            <?php
                                }
                            ?>

                                <!--<div class="ch-device activated">
                                    <input type="text" class="text opensans" disabled name="" placeholder="mac-address" id="">
                                    <button class="button"><i class="fa fa-trash-o"></i></button>
                                    <label for="mobile"><i class="fa fa-mobile active"></i></label>
                                </div>-->
                                

                            </div>
                        </div>
                    </div>
            </div>



        </div>

    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<body>
<h1>นักศึกษา <?=$mac_num?></h1>

<a href="student/signout">ออกจากระบบ</a>

<p>รหัสนักศึกษา : <?= $this->session->userdata('id')?></p>
<p>ชื่อ : <?= $this->session->userdata('firstname')?></p>
<p>นามสกุล : <?= $this->session->userdata('lastname')?></p>

<?php
//if($mac_num < 3){
?>

<form method="POST" action="student/addmac">


<input type="radio" name="device" value="comp" checked>คอมพิวเตอร์
<input type="radio" name="device" value="phone">มือถือ
<input type="radio" name="device" value="tablet">แท็ปเล็ต<br>

<input type="text" name="mac">
<input type="submit" value="submit">

</form>


<?php
//}

if(!empty($mac_data)){
?>

<h1>Mac address ที่ลงทะเบียนแล้ว</h1>
<table>
  
<thead>
<tr>
<th>mac address</th>
<th>อุปกรณ์</th>
<th>วันที่</th>
<th>ลบข้อมูล</th>
</tr>
</thead>

<?php
foreach($mac_data as $data){
?>

<tr>
<td><?=$data->mac?></td>
<td><?php
if($data->device=='comp')echo 'คอมพิวเตอร์';
else if($data->device=='phone')echo 'มือถือ';
else if($data->device=='tablet')echo 'แท็ปเล็ต';
?></td>
<td><?=date("d/m/Y",$data->date);?></td>
<td>
  <form method="post" action="student/deletemac" onsubmit="return confirm('Are you sure you want to submit this form?');">
    <input type="hidden" name="del" value="<?=$data->mac?>">
    <button type="submit">ลบ</button>
  </form>
</td>
</tr>
<?php
}
}
?>

</table>

</body>
</html>
