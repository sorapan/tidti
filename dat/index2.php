<?php
include("include/class.mysqldb.php");
include("include/config.inc.php");

# ถ้าไม่ได้ผ่านการล็อกอินเข้ามาให้ย้อนกลับไปหน้าล็อกอินใหม่!
if(!isset($_SESSION['logined'])) {
	$username = "";
	$password = "";
	session_start();
	session_destroy();
	print "<meta http-equiv='refresh' content='0;url=index.php'>";
}

$_SESSION['name1'] = $_REQUEST['epassport'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="CCSIM Laboratory" />
	<meta name="keywords" content="CCSIM authentication system" />
	<meta name="description" content="CCSIM Authentication Project" />	
    <link href="css/main.css" type="text/css" rel="stylesheet">
    <link href="css/calendar-mos.css" type="text/css" rel="stylesheet">
    <script language="javascript" src="js/calendar.js"></script>
	<script>
		function stoperror(){
			return true
		}
		window.onerror=stoperror
	</script>
	
	<? # Java programming script language ?>
	<script language="javascript">
		function newWindow(URL) {
			window.open(URL);
		}	
	</script>

  <title>WUMS</title>
</head>
<body>
  <div id="header-logo">
    <div id="header-logoff">ยินดีต้อนรับ <?= $_SESSION['name'] ?> 
      : 
      &raquo; 
		<? /* <a href="index2.php">หน้าแรก</a> */ ?> 
		[-] 
		<a href="logoff.php">ออกจากระบบ</a>
	</div>
  </div>
  
  <div id="body">
    
    
  <h3> <strong>WUMS</strong> : <span class = "gray"> Wireless Network Users Management 
    System </span> </h3>
  

    <div id="left">
      <div id="slogan">
	  <b>
		 ระบบจัดการการพิสูจน์ตัวตนผู้ใช้งานอินเทอร์เน็ต
	  </b>
	</div>
    <? if(!isset($_REQUEST['option'])) { ?>

	<? //-------------------------------------------------------------------------------------------------------------------------------------------// 
	# ระดับสิทธิ์การใช้งาน
	$sql = "SELECT * FROM add_staff WHERE name = '".$_SESSION['name']."'";	
	$link->query($sql);
	if(mysql_fetch_object(mysql_query($sql))) {
		$index = 0;
		while($result_level = $link->getnext()) {
			$level_arry[$index] = $result_level->level;
			$index++;
		}
		// ----------------------------------------------------จบ การตรวจสอบ Staff แต่ละคน มี Level อะไรบ้าง -------------------------------------------------------
		# Data BubbleSort
		$chkloop = false;
		$temp = 0;
		while(true) {
			$num1 = $level_arry[$temp];
			$num2 = $level_arry[$temp+1];
			if($num1 > $num2) {
				$level_arry[$temp] = $num2;
				$level_arry[$temp+1] = $num1;
				$chkloop = true;
			}
			$temp++;
			if($temp == $index) {
				if($chkloop == true) {
					$temp = 0;
					$chkloop = false;
				}
				else break;
			}
		}
	}
	// -------------------------------------------------------------------------------------------------------------------------------------------
	# Loop level
	for($i=0; $i<=$index; $i++) {  //----------------------- loop การให้ใช้งานเมนู ตาม ที่ staff แต่ละคนมี (Level) --------------------------------------------
	
	?>
    <?
	//if($level_arry[$i] == ++$count_level || $_SESSION['name'] == "administrator") {
	if($level_arry[$i] == 'A' || $_SESSION['name'] == "administrator") {
	?>	
    <table width="98%" align="center" border="0" cellspacing="0" cellpadding="0" class="header">
	<tr>
		<td width="95%"></td>
		<td width="5%"></td>
	</tr>
	</table>
	<span class="normal"><b>A : หมวดสร้างบัญชีรายชื่อ แบบไม่ต้องล็อคอิน [ Mac address ]</b></span>
	&nbsp;
	<?
	}
	?>
	
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 	<a href="index2.php?option=admin_addusermac"> <img src="images/student1.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทนักศึกษา" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้นักศึกษา</span><b>MAC</b>
              	</a> 
		  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
    <?
	if($level_arry[$i] == 'A1') {
	?>	
    <div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 	<a href="index2.php?option=addusermac"> <img src="images/student1.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทนักศึกษา" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้นักศึกษา</span><b>MAC</b>
              	</a> 
		  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_peple"> <img src="images/peple1.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทอาจารย์" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้อาจารย์</span><b>MAC</b> 
              	</a> 
			</div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($_SESSION['name1'] == "people") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=online_peple&status=teacher"> <img src="images/peple1.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทอาจารย์" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้อาจารย์</span><b>MAC</b> 
              	</a> 
			</div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'A2') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=peple"> <img src="images/peple1.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทอาจารย์" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้อาจารย์</span><b>MAC</b> 
              	</a> 
			</div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>			
	<div id = "cpanel">
		<div style="float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_staff"> <img src="images/user.gif" alt="เเพิ่มผู้ใช้งานใหม่ประเภทจ้าหน้าที่" width="40" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้เจ้าหน้าที่</span><b>MAC</b> 
			  	</a> 
            </div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'A3') {
	?>			
	<div id = "cpanel">
		<div style="float:left;">
			<div class="icon"> 
				<a href="index2.php?option=staff"> <img src="images/user.gif" alt="เเพิ่มผู้ใช้งานใหม่ประเภทจ้าหน้าที่" width="40" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้เจ้าหน้าที่</span><b>MAC</b> 
			  	</a> 
            </div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($_SESSION['name1'] == "people") {
	?>			
	<div id = "cpanel">
		<div style="float:left;">
			<div class="icon"> 
				<a href="index2.php?option=online_staff&status=staff"> <img src="images/user.gif" alt="เเพิ่มผู้ใช้งานใหม่ประเภทจ้าหน้าที่" width="40" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้เจ้าหน้าที่</span><b>MAC</b> 
			  	</a> 
            </div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_addmanual"> <img src="images/images.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทใช้รหัสผ่านเข้าระบบ" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้กรณีพิเศษ</span><b>U & P</b> 
			  	</a> 
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'A4') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=addmanual"> <img src="images/images.jpg" alt="เพิ่มผู้ใช้งานใหม่ประเภทใช้รหัสผ่านเข้าระบบ" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้กรณีพิเศษ</span><b>U & P</b> 
			  	</a> 
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_add_user"> <img src="images/users-64.png" alt="เพิ่มผู้ใช้งานใหม่ประเภทสร้างรายชื่อหลายคนจากระบบ" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้บุคคลทั่วไป</span><b>U & P</b>  
              	</a>
			</div>
		</div>
	</div>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'A5') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=add_user"> <img src="images/users-64.png" alt="เพิ่มผู้ใช้งานใหม่ประเภทสร้างรายชื่อหลายคนจากระบบ" width="54" height="55" border="0" align="middle" /> 
              		<span>เพิ่มผู้ใช้บุคคลทั่วไป</span><b>U & P</b>  
              	</a>
			</div>
		</div>
	</div>
	<?
	}
	?>
	
	<?
	if($level_arry[$i] == 'B' || $_SESSION['name'] == "administrator") {
	?>
	<table width="98%" align="center" border="0" cellspacing="0" cellpadding="0" class="header">
	<tr>
		<td width="95%"></td>
		<td width="5%"></td>
	</tr>
	</table>
	<span class="normal"><b>B : หมวดการจัดการบัญชีรายชื่อผู้ใช้ และ กลุ่มผู้ใช้ [ Users & Group Managment ]</b></span>
	&nbsp;
	<?
	}
	?>
	
	<?
	if($level_arry[$i] == 'B1' || $_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
        	<div class="icon"> 
				<a href="index2.php?option=manage_user_online"><img src="images/addone.png" alt="ค้นหาและจัดการข้อมูลผู้ใช้" width="59" height="55" border="0" align="middle" /> 
          			<span>จัดการข้อมูล <br />
       			ผู้ใช้ออนไลน์ </span> 
			  </a> 
		  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'B2' || $_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
        	<div class="icon"> 
				<a href="index2.php?option=manage_user"><img src="images/user.gif" alt="ค้นหาและจัดการข้อมูลผู้ใช้" width="35" height="55" border="0" align="middle" /> 
          			<span>จัดการข้อมูล <br />ผู้ใช้ ณ จุดบริการ </span> 
				</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'B3' || $_SESSION['name'] == "administrator" ) {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
       		 <div class="icon"> 
				<a href="index2.php?option=manage_group"><img src="images/group.png" alt="สร้างและกำหนดคุณสมบัติกลุ่มผู้ใช้" width="44" height="55" border="0" align="middle" /> 
          			<span>จัดการกลุ่มผู้ใช้</span> 
		  		</a> 
		  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                   <a href="index2.php?option=admin_user_history_expri"><img src="images/user_onlineexpri.jpg" alt="ตรวจสอบรายชื่อผู้ใช้งานที่หมดอายุ" width="59" height="55" border="0" align="middle" />
                        <span>ตรวจสอบรายชื่อ </br> วันหมดอายุ</span>
                   </a>
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'B4') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                   <a href="index2.php?option=user_history_expri"><img src="images/user_onlineexpri.jpg" alt="ตรวจสอบรายชื่อผู้ใช้งานที่หมดอายุ" width="59" height="55" border="0" align="middle" />
                        <span>ตรวจสอบรายชื่อ </br> วันหมดอายุ</span>
                   </a>
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                     <a href="index2.php?option=admin_user_kick"><img src="images/kick.png" alt="ปลดล็อครายชื่อที่ถูกระงับการใช้งาน" width="57" height="55" border="0" align="middle" />
                        <span>ตรวจสอบรายชื่อ</br>ระงับการใช้งาน</span>
					</a>
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'B5') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                     <a href="index2.php?option=user_kick"><img src="images/kick.png" alt="ปลดล็อครายชื่อที่ถูกระงับการใช้งาน" width="59" height="55" border="0" align="middle" />
                        <span>ตรวจสอบรายชื่อ</br>ระงับการใช้งาน</span>
					</a>
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                   <a href="index2.php?option=admin_log_user_history_expri"><img src="images/expiredcard.png" alt="รายชื่อผู้ใช้งานที่ลบออกจากระบบ" width="59" height="55" border="0" align="middle" />
                        <span>ตรวจสอบชื่อผู้ใช้งาน</br> ลบออกจากระบบ</span>                   </a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'B6') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                   <a href="index2.php?option=log_user_history_expri"><img src="images/expiredcard.png" alt="รายชื่อผู้ใช้งานที่ลบออกจากระบบ" width="59" height="55" border="0" align="middle" />
                        <span>ตรวจสอบชื่อผู้ใช้งาน</br> ลบออกจากระบบ</span>                   </a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	
		<? //------------------------------------------------------ B --------จบ  หมวดการจัดการบัญชีรายชื่อผู้ใช้ [ Users Managment ]-------------------------------------------------------// ?>
	


		
	<?
	if($level_arry[$i] == 'C' || $_SESSION['name'] == "administrator") {
	?>
	<table width="98%" align="center" border="0" cellspacing="0" cellpadding="0" class="header">
	<tr>
		<td width="95%"></td>
		<td width="5%"></td>
	</tr>
	</table>
	<span class="normal"><b>C : หมวดรายงานการสร้างรายชื่อบัญชีผู้ใช้งาน [ Create Users Report ]</b></span>
	&nbsp;
	<?
	}
	?>
	
	<?
	if($level_arry[$i] == 'C1' ) {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=user_history_create_all" > <img src="images/add_user.png" alt="รายงานการสร้างรายชื่อทั้งหมด" width="59" height="55" border="0" align="middle" /> 
              		<span>ทั้งหมด</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_user_history_create_all" > <img src="images/add_user.png" alt="รายงานการสร้างรายชื่อทั้งหมด" width="59" height="55" border="0" align="middle" /> 
              		<span>ทั้งหมด</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_user_history_create_department" > <img src="images/add_user.png" alt="รายงานการสร้างรายชื่อแยกตามคณะวิชา" width="59" height="55" border="0" align="middle" /> 
              		<span>คณะวิชา</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C2') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=user_history_create_department" > <img src="images/add_user.png" alt="รายงานการสร้างรายชื่อแยกตามคณะวิชา" width="59" height="55" border="0" align="middle" /> 
              		<span>คณะวิชา</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_user_history_mounth_select_department"> <img src="images/help.png" alt="รายงานการสร้างรายชื่อแยกตามสาขาวิชา" width="59" height="55" border="0" align="middle" /> 
              		<span>สาขาวิชา</span>
			  	</a> 
		  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C3') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=user_history_mounth_select_department"> <img src="images/help.png" alt="รายงานการสร้างรายชื่อแยกตามสาขาวิชา" width="59" height="55" border="0" align="middle" /> 
              		<span>สาขาวิชา</span>
			  	</a> 
		  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
				<a href="index2.php?option=admin_user_history_mounth_select_discipline" ><img src="images/report.png" alt="รายงานการสร้างรายชื่อแยกตามสาขาวิชาและชั้นปี" width="59" height="55" border="0" align="middle" /> 
              		<span>สาขาวิชา + ชั้นปี</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C4') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
				<a href="index2.php?option=user_history_mounth_select_discipline" ><img src="images/report.png" alt="รายงานการสร้างรายชื่อแยกตามสาขาวิชาและชั้นปี" width="59" height="55" border="0" align="middle" /> 
              		<span>สาขาวิชา + ชั้นปี</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=admin_user_history_create_staff" > <img src="images/interfance.png" alt="รายงานการสร้างรายชื่อแยกตามหน่วยงาน" width="59" height="55" border="0" align="middle" /> 
              		<span>หน่วยงาน</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C5' ) {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon"> 
				<a href="index2.php?option=user_history_create_staff" > <img src="images/interfance.png" alt="รายงานการสร้างรายชื่อแยกตามหน่วยงาน" width="59" height="55" border="0" align="middle" /> 
              		<span>หน่วยงาน</span>
			  	</a> 
			</div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			  <div class="icon"> 
			  		<a href="index2.php?option=admin_user_history_create_peple"><img src="images/user_manage.png" alt="รายงานการสร้างรายชื่อประเภทบุคคลทั่วไป" width="59" height="55" border="0" align="middle" /> 
              			<span>บุคคลทั่วไป</span>
			  		</a> 
			  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C6') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			  <div class="icon"> 
			  		<a href="index2.php?option=user_history_create_peple"><img src="images/user_manage.png" alt="รายงานการสร้างรายชื่อประเภทบุคคลทั่วไป" width="59" height="55" border="0" align="middle" /> 
              			<span>บุคคลทั่วไป</span>
			  		</a> 
			  </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 	<a href="index2.php?option=admin_user_history_create_device"><img src="images/system.png" alt="รายงานการสร้างรายชื่อแยกตามชนิดอุปกรณ์" width="59" height="55" border="0" align="middle" /> 
          			<span>รายการอุปกรณ์</span>
			  	</a> 
			 </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C7') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 	<a href="index2.php?option=user_history_create_device"><img src="images/system.png" alt="รายงานการสร้างรายชื่อแยกตามชนิดอุปกรณ์" width="59" height="55" border="0" align="middle" /> 
          			<span>รายการอุปกรณ์</span>
			  	</a> 
			 </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>

	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 		<a href="index2.php?option=admin_user_history_create_group"> <img src="images/group_manage.png" alt="รายงานการสร้างรายชื่อแยกตามประเภทกลุ่ม" width="59" height="55" border="0" align="middle" /> 
              			<span>แยกเป็นรายกลุ่ม</span>
			  		</a> 
			 </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C8') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 		<a href="index2.php?option=user_history_create_group"> <img src="images/group_manage.png" alt="รายงานการสร้างรายชื่อแยกตามประเภทกลุ่ม" width="59" height="55" border="0" align="middle" /> 
              			<span>แยกเป็นรายกลุ่ม</span>
			  		</a> 
			 </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'C9') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			 <div class="icon"> 
			 		<a href="index2.php?option=user_history_create2"> <img src="images/group_manage.png" alt="รายงานการสร้างผู้ใช้งานตามรายชื่อบุคคล" width="59" height="55" border="0" align="middle" /> 
              			<span>แสดงรายชื่อ</span>
			  		</a> 
			 </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
		<? //-------------------------------------------------------- C --------จบ  หมวดรายงานการสร้างรายชื่อบัญชีผู้ใช้งาน [ Create Users Report ]----------------------------------------------// ?>
	

	<?
	if($level_arry[$i] == 'D' || $_SESSION['name'] == "administrator") {
	?>
	<table width="98%" align="center" border="0" cellspacing="0" cellpadding="0" class="header">
	<tr>
		<td width="95%"></td>
		<td width="5%"></td>
	</tr>
	</table>
	<span class="normal"><b>D : หมวดรายงานประวัติการใช้งาน [ History Report ]</b></span>
	&nbsp;
	<?
	}
	?>
	
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                <a href="index2.php?option=admin_user_history_time"><img src="images/user_online.png" alt="รายงานการใช้งานโดยสามารถระบุเป็นช่วงวันเวลา" width="59" height="55" border="0" align="middle" />
                     <span>การใช้งานระบุเวลา</span>
				</a>
           </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'D1') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                <a href="index2.php?option=user_history_time"><img src="images/user_online.png" alt="รายงานการใช้งานโดยสามารถระบุเป็นช่วงวันเวลา" width="59" height="55" border="0" align="middle" />
                     <span>การใช้งานระบุเวลา</span>
				</a>
           </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	
	<?
	if($level_arry[$i] == 'D2' || $_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                <a href="index2.php?option=user_statistic_graph"><img src="images/statistic-ens.png" alt="สถิติการใช้งานระบบ" width="59" height="55" border="0" align="middle" />
                       <span>กราฟ</br>การใช้งานระบบ</span>
				</a>
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
    
	 <?
	if($level_arry[$i] == 'D3'|| $_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                <a href="index2.php?option=user_history_top_detail"><img src="images/graph1.jpg" alt="สถิติการใช้งานระบบ" width="59" height="55" border="0" align="middle" />
                       <span>สถิติ</br>การใช้งานระบบ</span>				</a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	
	<?
	if($level_arry[$i] == 'D4' || $_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                    <a href="index2.php?option=user_history_top_totall"><img src="images/static2.jpg" alt="สถิติการใช้งานระบบโดยการจัดอันดับ" width="59" height="55" border="0" align="middle" />
                        <span>จัดอันดับ</br>การใช้งาน</span>
					</a>
            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'D5' || $_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                   <a href="index2.php?option=log_user_history_expri_report"><img src="images/genhour.png" alt="รายงานรายชื่อผู้ใช้งานที่หมดอายุ" width="58" height="55" border="0" align="middle" />
                        <span>รายชื่อที่</br> ลบออกจากระบบ</span>                   </a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                     <a href="index2.php?option=admin_log_ban_report"><img src="images/unusedcard.png" alt="รายงานรายชื่อที่ถูกระงับการใช้งาน" width="59" height="55" border="0" align="middle"  />
                        <span>รายชื่อ</br>ที่ระงับการใช้งาน</span>					</a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($level_arry[$i] == 'D6') {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                     <a href="index2.php?option=log_ban_report"><img src="images/unusedcard.png" alt="รายงานรายชื่อที่ถูกระงับการใช้งาน" width="59" height="55" border="0" align="middle"  />
                        <span>รายชื่อ</br>ที่ระงับการใช้งาน</span>					</a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>
	<?
	if($_SESSION['name'] == "administrator") {
	?>
	<div id = "cpanel">
		<div style = "float:left;">
			<div class="icon">
                     <a href="index2.php?option=log_login"><img src="images/addone.png" alt="ตรวจสอบการเข้าระบบ" width="59" height="55" border="0" align="middle"  />
                        <span>รายชื่อ</br>ที่เข้าระบบ</span>					</a>            </div>
		</div>
	</div>
	<b>
	</b>
	<?
	}
	?>

		<? //-------------------------------------------------------- D -----------จบ  หมวดรายงานประวัติการใช้งาน [ History Report ]-------------------------------------// ?>
	
	
	<?
	####
	# End loop for() {}
	}
	####
	?>

	<div style="clear:both;"> </div>

<?
//--------<
/*
  if(!isset($_REQUEST['option'])) {
	  ....
	  ....
*/
  } 
  else { 
    include($_REQUEST['option'] . ".php"); 
  }
//-------->
?>

  </div>
  
	<div id = "right">
	<?
	####
	# Loop2 level
	# บวกต่อยอดจากตัวแปร index
	# ที่ต้องวนลูปซ้ำอีกรอบ เนื่องจากโค้ดมันอยู่คนละ ปีกกาเปิด-ปีกกาปิด {} กัน ..
	# ในความเป็นจริงจะสิ้นเปลื่องการวนลูป แต่ข้อดีก็คือหน้าปุ่ม function ผู้ดูแลมีน้อยจึงไม่เปลื่องระบบเท่าไร
	####

	for($i=0; $i<=$index; $i++) {
		
	?>
	<? if($level_arry[$i] == 'M100' || $_SESSION['name'] == "administrator") {?>
    <h1> 
	[M100] Main menu  
	</h1>
	<? }?>
	
    <ul>
		<? if($level_arry[$i] == 'M101' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php">หน้าแรก</a></li><? }?>
		<? if($level_arry[$i] == 'M102' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=user_online">ผู้ที่กำลังใช้งานอยู่</a></li><? }?>
		<? if($level_arry[$i] == 'M103' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=check_ap">สถานะ AP</a></li><? }?>
		
	</ul>
		<? if( $_SESSION['name1'] == "student" || $_SESSION['name1'] == "teacher" || $_SESSION['name1'] == "staff") {?>
    <h1> 
	การจัดการข้อมูลส่วนตัว  
	</h1>
	<? }?>
    <ul>
		<? if($_SESSION['name1'] == "student") {?><li><a href = "index2.php?option=online_addmac&epassport=student">ตรวจสอบและลงทะเบียนอุปกรณ์</a></li><? }?>
		<? if($_SESSION['name1'] == "teacher") {?><li><a href = "index2.php?option=online_addmac_techer&status=teacher">ตรวจสอบและลงทะเบียนอุปกรณ์</a></li><? }?>
		<? if($_SESSION['name1'] == "staff") {?><li><a href = "index2.php?option=online_addmac_staff&status=staff">ตรวจสอบและลงทะเบียนอุปกรณ์</a></li><? }?>
	</ul>
    <? if($level_arry[$i] == 'M200' || $_SESSION['name'] == "administrator") {?>
    <h1> 
	[M200] Manual menu  
	</h1>
	<? }?>
	
    <ul>
		<? if($level_arry[$i] == 'M201' ) {?><li><a href = "index2.php?option=manuals">คู่มือการใช้งาน </a></li><? }?>
		<? if($level_arry[$i] == 'M202' ) {?><li><a href = "index2.php?option=manuals_staff">คู่มือการใช้งานระบบ(เจ้าหน้าที่) </a></li> <? }?>
		<? if($level_arry[$i] == 'M203' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manuals_add_macaddress">วิธีดู MAC Address</a></li><? }?>
		<? if($level_arry[$i] == 'M204' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manuals_connect_internet">วิธีเชื่อมต่อใช้งานอินเตอร์เน็ต</a></li><? }?>
		<? if($level_arry[$i] == 'M205' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manuals_repare_network">วิธีแก้ปัญหาการใช้งานเบื้องต้น</a></li><? }?>
		<? if($_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manuals_admin">คู่มือการใช้งานระบบ </a></li><? }?>
	
	</ul>
	
   <? if($level_arry[$i] == 'M300' || $_SESSION['name'] == "administrator") {?>
    <h1>
	  [M300] Utility Tool menu
    </h1>
	<? }?>
	
    <ul>
		<? if($level_arry[$i] == 'M301' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=test-user-connectivity">ทดสอบชื่อผู้ใช้งาน</a></li><? }?>
		<? if($level_arry[$i] == 'M302' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=user_housdays_kick">เคลียร์ผู้ใช้ค้างในระบบ</a></li><? }?>
	    <? if($level_arry[$i] == 'M303' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=Ymd">โปรแกรมปฏิทิน</a></li><? }?>
   		
	    
	</ul>
   <? if($level_arry[$i] == 'M400' || $_SESSION['name'] == "administrator") {?>
    <h1>
	  [M400] Static menu
    </h1>
	<? }?>
	
    <ul>
		<? if($level_arry[$i] == 'M401' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=noauthen_statistic_total">No Authen</a></li><? }?>
		<? if($level_arry[$i] == 'M402' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=user_statistic_login_total">Pass Authen</a></li><? }?>
	    
	</ul>
	
	<? if($level_arry[$i] == 'M500' || $_SESSION['name'] == "administrator") {?>
    <h1>
	  [M500] Management menu
    </h1>
	<? }?>
	
    <ul>
		<? if($level_arry[$i] == 'M501' || $_SESSION['name'] == "administrator") {?>
		<li><a href = "index2.php?option=mng-rad-nas-new">เพิ่มข้อมูลเครือข่ายการเชื่อมต่อ NAS</a></li>
		<li><a href = "index2.php?option=loguser_delect_radacct">ลบประวัติการใช้งาน radacct</a></li>
		<li><a href = "index2.php?option=loguser_delect_radpost">ลบประวัติการเชื่อมต่อระบบ radpostauth</a></li>
		<? }?>
		  		
	    
	</ul>
	<? if($level_arry[$i] == 'M600' || $_SESSION['name'] == "administrator") {?>
	<h1>
	  [M600] Webmin Administrator
    </h1>
	<? }?>
	 <ul>
		<? if($level_arry[$i] == 'M601' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manage_admin">ผู้ดูแลระบบ</a></li><? }?>
		<? if($level_arry[$i] == 'M602' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=level_staff">เจ้าหน้าที่</a></li><? }?>
	    <? if($level_arry[$i] == 'M603' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manage_config_page_location">เพิ่มข้อมูลพื้นที่  วิทยาเขต</a></li><? }?>
   		<? if($level_arry[$i] == 'M604' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manage_config_page_fac">เพิ่มข้อมูลคณะวิชา</a></li><? }?>
		<? if($level_arry[$i] == 'M605' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manage_config_page_sko">เพิ่มข้อมูลสาขาวิชา</a></li><? }?>
	    <? if($level_arry[$i] == 'M606' || $_SESSION['name'] == "administrator") {?><li><a href = "index2.php?option=manage_config_page_staff">เพิ่มข้อมูลหน่วยงาน</a></li><? }?>
    </ul>
	<?
	####
	# End loop2 for() {}
	}
	####
	$count_level = 0;
	?>
	</div>

	<div id = "footer">
		<div id="header-logo">
			<div id="header-logoff">
				<a href="http://arit.rmutsv.ac.th" target="_blank">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;WUMS&nbsp;&raquo;&nbsp;&nbsp;&raquo;&nbsp;
				พัฒนาระบบโดยทีมงาน ฝ่ายวิศวกรรมเครือข่าย 
				</a> 
			</div>
		</div>
		<b> 
		<a href = "http://arit.rmutsv.ac.th/" target="_blank">สำนักวิทยบริการและเทคโนโลยีสารสนเทศ</a>
		</b>
	</div>
  </div>
</body>
</html>
