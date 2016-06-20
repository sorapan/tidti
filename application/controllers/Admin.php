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

	public function AddManualUser($user){
		// var_dump($_POST);

			$check = $this->MacModel->CheckMac($_POST['macaddress']);

			if($check <= 0){
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

		$data = $this->DeviceModel->SelectDevice(null);
		// $data= '';
		$this->load->view('admin/admin_mac_list',array('data'=> $data));
	}

	public function log(){
		if($this->session->userdata('status')=='admin'){
			$data = $this->LogModel->GetAllLog();
		}else{
			$data = $this->LogModel->GetLogByLocation($this->session->userdata('status'));
		}
		$this->load->view('admin/admin_log',array(
			'data' => $data,
			'date' => $data
			));
	}


	public function searchLog(){
		$date = $_POST['date'];
		$where = $_POST['search'];
		// $location = $_POST['location'];

		$this->session->set_flashdata('date',$date);
		// $this->session->set_flashdata('location',$location);

		if($this->session->userdata('status')=='admin'){
			$data = $this->LogModel->GetAllLog();
		}else{
			$data = $this->LogModel->GetLogByLocation($this->session->userdata('status'));
		}

		$getsearch = $this->LogModel->GetLogByWhere($date,$where);
		if(empty($getsearch)){

			$this->load->view('admin/admin_log',array(
			'data' => 'ไม่พบสิ่งที่ค้นหา',
			'date' => $data
			));

		}
		else if(empty($date)&&empty($where)){
			$this->log();
		}else{

			$this->load->view('admin/admin_log',array(
			'data' => $getsearch,
			'date' => $data
			));
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

	public function editmac($id){
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





	// manage method

	public function deleteMac($mac){

		$check = $this->DeviceModel->DeleteMac($mac);

		if(empty($check['code'])){
			$this->session->set_flashdata('alert', 'ลบอุปกรณ์เรียบร้อย');
			@header('Location: ../mac');
		}
	}

	public function getDataToEditById($id){
		return	$this->DeviceModel->SelectDevice($id);
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

		// เพิ่ม log แก้ไข event
		// $this->LogModel->AddEventLog(array(
		// 		'DATE' => date('Y-m-d H:i:s',time()),
		// 		'USERNAME' => $this->session->('username'),
		// 		'STATUS' => $this->session->('status')
		// 	));
		@header('Location:'.base_url().'/admin/mac/'.$where['oid']);


	}

	public function logout(){

		$this->LogModel->AddEventLog(array(
				'USERNAME'=>$this->session->userdata('username'),
				'STATUS'=>$this->session->userdata('status'),
				'LOCATION'=>$this->session->userdata('location_id'),
				'EVENT' => 'ได้ทำการออกจากระบบ',
				'DATE'=>date('Y-m-d'),
				'TIME'=>date('H:i:s')
			));
		$this->session->sess_destroy();
		// AddLog(	$this->session->userdata('id')." was logging out" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}


}
