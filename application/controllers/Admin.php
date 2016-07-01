<?php

class Admin extends CI_Controller {


	public function __construct()
	{
		date_default_timezone_set("Asia/Bangkok");
		parent::__construct();
		if($this->session->userdata('status')=='admin' || $this->session->userdata('status')=='staff'){

		}else{
			@header('Location: '.base_url().'index.php/admin/login');
		}


		 $this->load->model('E_passModel');
		 $this->load->model('Uoc_stdModel');
		 $this->load->model('Admin_dataModel');
		 $this->load->model('MacModel');
		 $this->load->model('DeviceModel');
		 $this->load->model('RadSKOModel');
		 $this->load->model('RadSKOModel');
		 $this->load->model('RadReplyCheckModel');
		 $this->load->model('ManualUserModel');
		 $this->load->model('LogModel');

	}

	public function index()
	{
		@header('Location: admin/manage');
	}



	// manage page
	public function manage(){
		if($this->session->userdata('status')=="staff"){
			$location = $this->RadSKOModel->getLocationDataByLocationID($this->session->userdata('location_id'));
		}else{
			$location = $this->RadSKOModel->getLocationData();
		}

		$this->load->view('admin/admin_manage',array(
							'fac_data' => $this->RadSKOModel->getFacData(),
							'program_data' => $this->RadSKOModel->getProgramData(),
							'group_data' => $this->RadSKOModel->getGroupsData(),
							'location_data' => $location,
							'staff_data' => $this->RadSKOModel->getStaffData()
			));
	}

	public function searchToManageMac(){
		// var_dump($_POST);
		$search = $_POST['search'];
		$data = $this->Admin_dataModel->GetDataToManage($_POST['search']);
		$this->load->view('admin/admin_mac_list',array('data'=> $data,'search'=> $search));
	}

	public function CheckMacBeforeAdd(){

	}

	public function AddManualUser(){

		// ถ้าข้อมูลที่กรอกไม่ครบ ทำการย้อนกลับและแจ้งเตือน
		if(in_array(null,$_POST) || in_array("",$_POST)){
			$this->session->set_flashdata('alert','กรุณากรอกข้อมูลให้ครบ');
            $this->session->set_flashdata('type','alert-danger');
            @header('Location: ' . $_SERVER['HTTP_REFERER']);
		}else{
			// แต่ถ้า กรอกครบแล้ว
			// $check ตรวจสอบ mac ซ้ำ
			$check = $this->MacModel->CheckMac($_POST['macaddress']);
			// ถ้า mac address ตัวนี้ ซ้ำ ย้อนกลับ และแจ้งเตือน
			if(!empty($check)){
				$this->session->set_flashdata('alert', 'รหัสอุปกรณ์ หรือ macaddress ซ้ำ');
		    	$this->session->set_flashdata('type','alert-danger');
		    	@header('Location: ' . $_SERVER['HTTP_REFERER']);
		    	// @header('Location:'.base_url().'index.php/admin/manage');
			}else{
				//ถ้า mac address ไม่ซ้ำ
				//เปลี่ยน mac เป็นตัวพิมพ์ใหญ่
				$_POST['macaddress'] = str_replac(':','-',strtoupper($_POST['macaddress']));

				// เพิ่ม ข้อมูลลงใน Manualuser database
				// โดยส่งข้อมูลไปที่ Manual Model
				$manual = $this->ManualUserModel->AddDataManualUser(array(
					'username'=>$_POST['macaddress'],
					// 'password'=>$_POST['password'],
					'pname'=>$_POST['pname'],
					'firstname'=>$_POST['firstname'],
					'lastname'=>$_POST['lastname'],
					'idcard'=>$_POST['idcard'],
					'mailaddr'=>isset($_POST['mailaddr'])?$_POST['mailaddr']:'-',
					'discipline'=>isset($_POST['discipline'])?$_POST['discipline']:'-',
					'department'=>isset($_POST['department'])?$_POST['department']:'-',
					'dateregis'=>date('Y-m-d H:i:s',time()),
					'status'=>$_POST['status'],
					'location_id'=>$_POST['location_id'],
					'year' => isset($_POST['year'])?$_POST['year']:'-'
				));
				// ถ้า discipline ไม่เป็น "-" และ ค่าstatustypeไม่เป็น special
				// แสดงว่าเป็นผู้ใช้ทั่วไป นักศึกษา อาจารย์ เจ้าหน้าที่
					if($_POST['discipline']!=='-' && $_POST['statustype']!=="special"){
						$radvalue = date('Y-m-d',strtotime('+1 years')).'T'.date('H:i:s');
					}else{
						//แต่ถ้าเป็น special แสดงว่าเป็นผู้ใช้พิเศษ
						$radvalue = '0000-00-00T00:00:00';
					}
					//เพิ่ม mac ลงใน radreply
					$this->RadReplyCheckModel->AddRadReply(array(
							// รับค่าจาก POST
							'username' => $_POST['macaddress'],
							// ส่วนที่แก้ไข
							'attribute' => 'WISPr-Session-Terminate-Time',
							// ส่วนที่แก้ไข
							'op' => ':=',
							// ส่วนที่แก้ไข
						'value'=> $radvalue
					));

					//เพิ่ม mac ลงใน radrecheck
					$this->RadReplyCheckModel->AddRadCheck(array(
							// รับค่าจาก POST
							'username' => $_POST['macaddress'],
							// ส่วนที่แก้ไข
							'attribute' => 'Cleartext-Password',
							// ส่วนที่แก้ไข
							'op' => ':=',
							// ส่วนที่แก้ไข
							'value'=> 'Liu;b=yp;kpakp'
						));
					//เพิ่ม mac , device  ในตาราง device
					$this->DeviceModel->AddDevice(array(
							'UserName' => $_POST['macaddress'],
							'dev_type' => $_POST['dev_type'],
							'dev_net_type' => 'Wireless'
						));

					//ถ้าสถานะเป็น staff ให้บรรทึกโดย staff
					if($this->session->userdata('status')=='staff'){
						//add log
			            $this->LogModel->AddEventLog(array(
			                'USERNAME'=>$this->session->userdata('username'),
			                'STATUS'=>'staff',
			                'LOCATION'=> $this->session->userdata('location_id'),
			                'EVENT' => 'ได้เพิ่มอุปกรณ์หมายเลข:'.$_POST['macaddress'],
			                'DATE'=>date('Y-m-d'),
			                'TIME'=>date('H:i:s')
			                    ));
					}else{
						//ถ้าสถานะเป็น admin ให้บรรทึกโดย admin
			            $this->LogModel->AddEventLog(array(
			                'USERNAME'=>$this->session->userdata('username'),
			                'STATUS'=>'admin',
			                'LOCATION'=> '-',
			                'EVENT' => 'ได้เพิ่มอุปกรณ์หมายเลข:'.$_POST['macaddress'],
			                'DATE'=>date('Y-m-d'),
			                'TIME'=>date('H:i:s')
			                    ));
					}
					//เมื่อเพิ่มข้อมูลเสร็จ ให้ รีเฟรชหน้าแล้วแจ้งเตือน
					$this->session->set_flashdata('alert', 'เพิ่มข้อมูลสำเร็จ');
					$this->session->set_flashdata('type','alert-success');
					@header('Location: ' . $_SERVER['HTTP_REFERER']);
			        // @header('Location:'.base_url().'index.php/admin/manage');
			}

		}

	}

	public function mac()
	{
		if(empty($_GET) ){
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaff($this->session->userdata('location_id'),null,null,null);
				$this->checkMacSearch($data);
			}else{
				$data = $this->DeviceModel->SelectDevice(null,null,null,null);
				$this->checkMacSearch($data);
			}
		}else{
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaff($this->session->userdata('location_id'),$_GET['search'],$_GET['type'],$_GET['date']);
				$this->checkMacSearch($data);
			}else{
				$data = $this->DeviceModel->SelectDevice($_GET['location_id'],$_GET['search'],$_GET['type'],$_GET['date']);
				// var_dump($data);

				$this->checkMacSearch($data);
			}
		}

	}

	public function macmanual()
	{
		if(empty($_GET)){
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaffManual($this->session->userdata('location_id'),null,null,null);
				$this->checkMacSearchManual($data);
			}else{
				$data = $this->DeviceModel->SelectDeviceManual(null,null,null,null);
				$this->checkMacSearchManual($data);
			}
		}else{
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaffManual($this->session->userdata('location_id'),$_GET['search'],$_GET['type'],$_GET['date']);
				$this->checkMacSearchManual($data);
			}else{
				$data = $this->DeviceModel->SelectDeviceManual($_GET['location_id'],$_GET['search'],$_GET['type'],$_GET['date']);
				$this->checkMacSearchManual($data);
			}
		}

	}

	private function checkMacSearch($data){

		$location = $this->RadSKOModel->getLocationData();
		$date = $this->DeviceModel->SelectDateFromDevice();
		if(empty($data)){
			$data = "ไม่มีรายการที่ค้นหา";
			$this->load->view('admin/admin_mac_list',array('data'=> $data,'location'=>$location,'date'=>$date));
		}else{
			$this->load->view('admin/admin_mac_list',array('data'=> $data,'location'=>$location,'date'=>$date));
		}
	}
	private function checkMacSearchManual($data){
		// var_dump($data);
		$location = $this->RadSKOModel->getLocationData();
		$date = $this->DeviceModel->SelectDeviceManual(null,null,null,null);
		if(empty($data)){
			$data = "ไม่มีรายการที่ค้นหา";
			$this->load->view('admin/admin_mac_manual',array('data'=> $data,'location'=>$location,'date'=>$date));
		}else{
			$this->load->view('admin/admin_mac_manual',array('data'=> $data,'location'=>$location,'date'=>$date));
		}
	}



	public function log(){
		if(empty($_GET)){
			if($this->session->userdata('status')=='admin'){
				$alllog = $this->LogModel->GetAllLog();
				$date = $this->LogModel->GetDateAll();
				$location = $this->RadSKOModel->getLocationData();
			}else{
				$alllog = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
				$date = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
				$location = $this->RadSKOModel->getLocationDataByLocationID($this->session->userdata('location_id'));
			}


			$this->load->view('admin/admin_log',array(
			'alllog' => $alllog,
			'date' => $date,
			'location'=>$location
			));
		}else{
			if($this->session->userdata('status')=='admin'){
				$alllog = $this->LogModel->GetAllLog();
				$wherelog = $this->LogModel->GetLogByWhere($_GET['date'],$_GET['location'],$_GET['search'],$_GET['type'],$_GET['status']);
				$location = $this->RadSKOModel->getLocationData();
				// var_dump($wherelog);
				$this->load->view('admin/admin_log',array(
					'alllog' => $wherelog,
					'date' => $alllog,
					'location'=> $location
					));
			}else{
				$location_id = $this->session->userdata('location_id');
				$alllog = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
				$wherelog = $this->LogModel->GetLogByWhere($_GET['date'],$location_id,$_GET['search'],$_GET['type'],$_GET['status']);
				$location = $this->RadSKOModel->getLocationDataByLocationID($this->session->userdata('location_id'));

				$this->load->view('admin/admin_log',array(
					'alllog' => $wherelog,
					'date' => $alllog,
					'location'=> $location
					));
			}
		}
	}


	public function searchLog(){
		$date = $_GET['date'];
		$where = $_GET['search'];
		$location = $_GET['location'];
		// $location = $_POST['location'];


		if(empty($date)&&empty($where)&&empty($location)){
			$this->log();
		}else{
		// $this->session->set_flashdata('location',$location);

			if($this->session->userdata('status')=='admin'){
				$alllog = $this->LogModel->GetAllLog();
				$wherelog = $this->LogModel->GetLogByWhere($date,$where,$location);
				$location = $this->RadSKOModel->getLocationData();
			}else{
				$alllog = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
				$wherelog = $this->LogModel->GetLogByWhere($date,$where,$this->session->userdata('location_id'));
				$location = $this->RadSKOModel->getLocationDataByLocationID($this->session->userdata('location_id'));
			}



			if(empty($wherelog)){
				$this->load->view('admin/admin_log',array(
				'alllog' => 'ไม่พบสิ่งที่ค้นหา',
				'date' =>  $alllog,
				'location' => $location
				));

			}else{

				$this->load->view('admin/admin_log',array(
				'alllog' => $wherelog,
				'date' => $alllog,
				'location'=> $location
				));
			}
		}
	}

	public function login()
	{
		$this->load->view('admin/admin_login');
	}

	public function user()
	{
		$data = $this->DeviceModel->SelectUser();
		$this->load->view('admin/admin_user',array('data'=> $data));
	}

	function signin($user,$pass){

		$this->Admin_dataModel->Login($_POST['user'],$_POST['pass']);

	}

	public function editmac(){
		$id = strtoupper($_GET['mac']);
		$data = $this->getDataToEditById($id);
		$fac_data = $this->RadSKOModel->getFacData();
		$program_data = $this->RadSKOModel->getProgramData();
		$group_data = $this->RadSKOModel->getGroupsData();
		$location_data = $this->RadSKOModel->getLocationData();
		$this->load->view('admin/admin_edit_mac',array(
			'data'=> $data,'fac_data' => $fac_data,
							'program_data' => $program_data,
							'group_data' => $group_data,
							'location_data' => $location_data
			));
	}

	public function editmacmanual(){
		$username = strtoupper($_GET['mac']);
		$data = $this->getDataToEditByIdManual($username);
		$fac_data = $this->RadSKOModel->getFacData();
		$program_data = $this->RadSKOModel->getProgramData();
		$group_data = $this->RadSKOModel->getGroupsData();
		$location_data = $this->RadSKOModel->getLocationData();
		$this->load->view('admin/admin_edit_macmanual',array(
			'data'=> $data,'fac_data' => $fac_data,
							'program_data' => $program_data,
							'group_data' => $group_data,
							'location_data' => $location_data
			));
	}





	// manage method

	public function deleteMac(){
		$check = $this->DeviceModel->DeleteMac($_POST['mac']);

		if($this->session->userdata('status')=='staff'){
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'staff',
	                'LOCATION'=> $this->session->userdata('location_id'),
	                'EVENT' => 'ได้ลบอุปกรณ์หมายเลข:'.$_POST['mac'],
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}else{
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'admin',
	                'LOCATION'=> '-',
	                'EVENT' => 'ได้ลบอุปกรณ์หมายเลข:'.$_POST['mac'],
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}

		$this->session->set_flashdata('alert', 'ลบอุปกรณ์เรียบร้อย');
		$this->session->set_flashdata('type','alert-info');
		@header('Location: mac');
	}

	public function deleteMacManual(){

		$check = $this->DeviceModel->DeleteMacManual($_POST['mac']);
		if($this->session->userdata('status')=='staff'){
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'staff',
	                'LOCATION'=> $this->session->userdata('location_id'),
	                'EVENT' => 'ได้ลบอุปกรณ์หมายเลข:'.$_POST['mac'],
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}else{
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'admin',
	                'LOCATION'=> '-',
	                'EVENT' => 'ได้ลบอุปกรณ์หมายเลข:'.$_POST['mac'],
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}
		$this->session->set_flashdata('alert', 'ลบอุปกรณ์เรียบร้อย');
		$this->session->set_flashdata('type','alert-info');
		@header('Location: macmanual');
	}



	public function getDataToEditById($id){
		return	$this->DeviceModel->SelectForEdit($id);
	}

	public function getDataToEditByIdManual($username){
		return	$this->DeviceModel->SelectForEditManual($username);
	}


	public function editDataById($id){
		// var_dump($_POST);
		$where = array(
					'oid' => $_POST['oid'],
					'macaddress' => $_POST['macaddress'],
					'username' => $_POST['username'],
					'old_macaddress' => $_POST['old_macaddress']
			);
		$online_profile = array(
					'pname' => $_POST['pname'],
					'firstname' => $_POST['firstname'],
					'lastname' => $_POST['lastname'],
					'idcard' => $_POST['idcard']
			);
		$register_online = array(
					'macaddress' => $_POST['macaddress']
			);
		$device = array(
				'UserName' => $_POST['macaddress'],
				'dev_type' => $_POST['dev_type']
			);

		$this->DeviceModel->EditDataDevice($where,$online_profile,$register_online,$device);

		if($_POST['macaddress'] !== $_POST['old_macaddress']){
			$macedit = ' และ ได้แก้ไขหมายเลขอุปกรณ์:'.$_POST['old_macaddress'].'=> '.$_POST['macaddress'];
		}

		if($this->session->userdata('status')=='staff'){
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'staff',
	                'LOCATION'=> $this->session->userdata('location_id'),
	                'EVENT' => 'ได้แก้ไขข้อมูลบางส่วน'.$macedit,
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}else{
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'admin',
	                'LOCATION'=> '-',
	                'EVENT' => 'ได้แก้ไขข้อมูลบางส่วน'.$macedit,
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}

		$this->session->set_flashdata('alert','แก้ไขข้อมูลเรียบร้อย');
		$this->session->set_flashdata('type','alert-info');

		@header('Location:'.base_url().'index.php/admin/editMac?mac='.$where['oid']);


	}

	public function editDataByManual($id){
		// var_dump($_POST);
		$where = array(
					'username' => $_POST['username'],
					'old_username' => $_POST['old_username']
			);
		$manual_user = array(
					'username' => $_POST['username'],
					'pname' => $_POST['pname'],
					'firstname' => $_POST['firstname'],
					'lastname' => $_POST['lastname'],
					'idcard' => $_POST['idcard']
			);
		$device = array(
				'UserName' => $_POST['username'],
				'dev_type' => $_POST['dev_type']
			);

		$this->DeviceModel->EditDataDeviceManual($where,$manual_user,$device);

		if($_POST['username'] !== $_POST['old_username']){
			$macedit = " และ ได้แก้ไขหมายเลขอุปกรณ์:".$_POST['username'].' => '.$_POST['old_username'];
		}
		if($this->session->userdata('status')=='staff'){
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'staff',
	                'LOCATION'=> $this->session->userdata('location_id'),
	                'EVENT' => 'ได้แก้ไขข้อมูลบางส่วน'.$macedit,
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}else{
				//add log
	            $this->LogModel->AddEventLog(array(
	                'USERNAME'=>$this->session->userdata('username'),
	                'STATUS'=>'admin',
	                'LOCATION'=> '-',
	                'EVENT' => 'ได้แก้ไขข้อมูลบางส่วน'.$macedit,
	                'DATE'=>date('Y-m-d'),
	                'TIME'=>date('H:i:s')
	                    ));
			}
		$this->session->set_flashdata('alert','แก้ไขข้อมูลเรียบร้อย');
		$this->session->set_flashdata('type','alert-info');

		@header('Location:'.base_url().'index.php/admin/editMacManual?mac='.$where['username']);


	}

	public function logout(){
		$this->session->sess_destroy();
		// AddLog(	$this->session->userdata('id')." was logging out" );
		@header('Location: ' . base_url().'index.php/admin/login');
	}


}
