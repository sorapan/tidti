<!DOCTYPE html>
<html>
<body>

<h1>Admin Page</h1>

<h2>menu</h2>
<ul>
    <li>users log</li>
    <li>mac address</li>
</ul>

<?php

$files = scandir('log_file/');
foreach($files as $file) {
    if($file == '.' || $file == '..') continue;
    echo '<a href="?log='.$file.'">'. $file . '</a><br>';
}

?>

<br>

<?php
if(!empty($_GET['log'])){
?>

<h2>ช้อมูลการใช้งาน <?=$_GET['log']?></h2><br>

<?php
echo nl2br(file_get_contents('log_file/'. $_GET['log'] ));
}
?>

</body>
</html>
