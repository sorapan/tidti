<!DOCTYPE html>
<html>
    
<body>
    
    <form method="get">
        <input type="text" name="qry">
        <button type="submit">search</button>
    </form>
<?php
if($qry != null)
{
?>
    <table>
        <thead>
            <tr>
                <td>รหัส</td>
                <td>ชื่อ</td>
                <td>นามสกุล</td>
                <td>อุปกรณ์</td>
                <td>macaddress</td>
                <td>วันที่</td>
                <td>ลบ</td>
            </tr>
        </thead>
    
<?php

    foreach ($qry as $data)
    {
?>

    <tr>
        <td><?=$data->std_id?></td>
        <td><?=$data->STD_FNAME?></td>
        <td><?=$data->STD_LNAME?></td>
        <td><?=$data->device?></td>
        <td><?=$data->mac?></td>
        <td><?=date('d-m-Y',$data->date) ?></td>
        
        <td><form><button>ลบ</button></form></td>
    </tr>

<?php
    }

?>
    </table>
    
<?php
}
?>
</body>
</html>
