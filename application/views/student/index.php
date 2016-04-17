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
