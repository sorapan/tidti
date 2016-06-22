<?php

class Admin extends CI_Controller {


	public function __construct()
	{
		date_default_timezone_set("Asia/Bangkok");
		parent::__construct();
		if($this->session->userdata('status')=='admin' || $this->session->userdata('status')=='staff'){

		}else{
			@header('Location: '.base_url().'admin/login');
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
		$this->load->view('admin/admin_manage',array(
							'fac_data' => $this->RadSKOModel->getFacData(),
							'program_data' => $this->RadSKOModel->getProgramData(),
							'group_data' => $this->RadSKOModel->getGroupsData(),
							'location_data' => $this->RadSKOModel->getLocationData(),
							'staff_data' => $this->RadSKOModel->getStaffData()
			));
	}

	public function searchToManageMac(){
		// var_dump($_POST);
		$search = $_POST['search'];
		$data = $this->Admin_dataModel->GetDataToMange($_POST['search']);
		$this->load->view('admin/admin_mac_list',array('data'=> $data,'search'=> $search));
	}

	public function CheckMacBeforeAdd(){

	}

	public function AddManualUser(){
		// var_dump($_POST);

			$check = $this->MacModel->CheckMac($_POST['macaddress']);

			if(empty($check)){
			// อาจจะมีการแก้ไขในภายหน้า
			$this->RadReplyCheckModel->AddRadReply(array(
					// รับค่าจาก POST
					'username' => $_POST['macaddress'],
					// ส่วนที่แก้ไข
					'attribute' => 'WISPr-Session-Terminate-Time',
					// ส่วนที่แก้ไข
					'op' => '-',
					// ส่วนที่แก้ไข
					'value'=> '-'
				));

			// อาจจะมีการแก้ไขในภายหน้า
			$this->RadReplyCheckModel->AddRadCheck(array(
					// รับค่าจาก POST
					'username' => $_POST['macaddress'],
					// ส่วนที่แก้ไข
					'attribute' => '-',
					// ส่วนที่แก้ไข
					'op' => '-',
					// ส่วนที่แก้ไข
					'value'=> '-'
				));

			$this->DeviceModel->AddDevice(array(
					'UserName' => $_POST['macaddress'],
					'dev_type' => $_POST['dev_type'],
					'dev_net_type' => 'Wireless'
				));
			$this->ManualUserModel->AddDataManualUser(array(
						'username'=>$_POST['macaddress'],
						// 'password'=>$_POST['password'],
						'pname'=>$_POST['pname'],
						'firstname'=>$_POST['firstname'],
						'lastname'=>$_POST['lastname'],
						'idcard'=>$_POST['idcard'],
						'mailaddr'=>$_POST['mailaddr'],
						'discipline'=>$_POST['discipline'],
						'department'=>$_POST['department'],
						'dateregis'=>date('Y-m-d H:i:s',time()),
						'status'=>$_POST['status'],
						'location_id'=>$_POST['location_id']
					));
			$this->session->set_flashdata('alert', 'เพิ่มข้อมูลสำเร็จ');
	        @header('Location:'.base_url().'admin/manage');
	    }else{
	    	$this->session->set_flashdata('alert', 'รหัสอุปกรณ์ หรือ macaddress ซ้ำ');
	    	@header('Location:'.base_url().'admin/manage');
	    }

	}

	public function mac()
	{
		if(empty($_GET['search'])){
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaff($this->session->userdata('location_id'),null);
				$this->checkMacSearch($data);
			}else{
				$data = $this->DeviceModel->SelectDevice(null);
				$this->checkMacSearch($data);
			}
		}else{
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaff($this->session->userdata('location_id'),$_GET['search']);
				$this->checkMacSearch($data);
			}else{
				$data = $this->DeviceModel->SelectDevice($_GET['search']);
				$this->checkMacSearch($data);
			}
		}

	}

	public function macmanual()
	{
		if(empty($_GET['search'])){
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaffManual($this->session->userdata('location_id'),null);
				$this->checkMacSearchManual($data);
			}else{
				$data = $this->DeviceModel->SelectDeviceManual(null);
				$this->checkMacSearchManual($data);
			}
		}else{
			if($this->session->userdata('status')=='staff'){
				$data = $this->DeviceModel->SelectDeviceByStaffManual($this->session->userdata('location_id'),$_GET['search']);
				$this->checkMacSearchManual($data);
			}else{
				$data = $this->DeviceModel->SelectDeviceManual($_GET['search']);
				$this->checkMacSearchManual($data);
			}
		}

	}

	private function checkMacSearch($data){
		if(empty($data)){
			$data = "ไม่มีรายการที่ค้นหา";
			$this->load->view('admin/admin_mac_list',array('data'=> $data));
		}else{
			$this->load->view('admin/admin_mac_list',array('data'=> $data));
		}
	}
	private function checkMacSearchManual($data){
		// var_dump($data);
		if(empty($data)){
			$data = "ไม่มีรายการที่ค้นหา";
			$this->load->view('admin/admin_mac_manual',array('data'=> $data));
		}else{
			$this->load->view('admin/admin_mac_manual',array('data'=> $data));
		}
	}



	public function log(){
		if($this->session->userdata('status')=='admin'){
			$alllog = $this->LogModel->GetAllLog();
			$date = $this->LogModel->GetDateAll();
		}else{
			$alllog = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
			$date = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
		}


		$this->load->view('admin/admin_log',array(
		'alllog' => $alllog,
		'date' => $date,
		'locate'=>$date
		));

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
			}else{
				$alllog = $this->LogModel->GetLogByLocation($this->session->userdata('location_id'));
				$wherelog = $this->LogModel->GetLogByWhere($date,$where,$this->session->userdata('location_id'));
			}



			if(empty($wherelog)){
				$this->load->view('admin/admin_log',array(
				'alllog' => 'ไม่พบสิ่งที่ค้นหา',
				'date' =>  $alllog,
				'locate' => $alllog
				));

			}else{

				$this->load->view('admin/admin_log',array(
				'alllog' => $wherelog,
				'date' => $alllog,
				'locate'=> $alllog
				));
			}
		}
		$this->session->set_flashdata('date',$date);


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
		$id = $_GET['mac'];
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
		$username = $_GET['mac'];
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
		$this->session->set_flashdata('alert', 'ลบอุปกรณ์เรียบร้อย');
		@header('Location: mac');
	}

	public function deleteMacManual(){

		$check = $this->DeviceModel->DeleteMacManual($_POST['mac']);
		$this->session->set_flashdata('alert', 'ลบอุปกรณ์เรียบร้อย');
		@header('Location: mac');
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

		$this->session->set_flashdata('alert','แก้ไขข้อมูลเรียบร้อย');

		@header('Location:'.base_url().'admin/editMac?mac='.$where['oid']);


	}

	public function editDataByManual($id){
		// var_dump($_POST);
		$where = array(
					'username' => $_POST['username'],
					'old_username' => $_POST['old_username']
			);
		$manual_user = array(
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

		$this->session->set_flashdata('alert','แก้ไขข้อมูลเรียบร้อย');

		@header('Location:'.base_url().'admin/editMacManual?mac='.$where['username']);


	}

	public function logout(){
		$this->session->sess_destroy();
		// AddLog(	$this->session->userdata('id')." was logging out" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}


}
