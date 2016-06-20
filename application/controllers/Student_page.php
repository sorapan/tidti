<?php

class Student_page extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("Asia/Bangkok");
		parent::__construct();

		if(!$this->session->userdata('login')||$this->session->userdata('id')==null){
			@header('Location: ' . base_url());
		}

		$this->load->model('E_passModel');
		$this->load->model('Uoc_stdModel');
		$this->load->model('MacModel');
		$this->load->model('RadAccountModel');
		$this->load->model('RadDeviceModel');
		$this->load->model('RadOnlineProfileModel');
		$this->load->model('RadRegisterOnlineModel');
		$this->load->model('LogModel');

	}

	public function index()
	{

		$mac_registered_num = $this->MacModel->CountDataOnStdId($this->session->userdata('id'));
		//$macdata = $this->MacModel->FetchDataWithSTDID($this->session->userdata('id'));
		//$macdata = $this->RadOnlineProfileModel->getDataByStudentID($this->session->userdata('id'));
		$macdata = $this->RadRegisterOnlineModel->GetDataByEpass('s'.$this->session->userdata('id'));
		foreach($macdata as $key=>$val)
		{
			$macdata[$key]->device = $this->RadDeviceModel->GetDataByMac($val->macaddress)[0]->dev_type;
		}
		$this->load->view('student/index',array(
			'mac_data' => $macdata,
			'mac_num' => $mac_registered_num,
			'rad_test' => $this->RadAccountModel->login()
		));

	}

	public function submit_location()
	{
		if(isset($_POST['location']))
		{
			$this->session->set_userdata('location',$_POST['location']);
			@header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	public function add_mac()
	{
		if(ctype_space($_POST['mac']) == false && $_POST['mac'] != "")
		{
			if($this->session->userdata('location') )
			{

			// $this->MacModel->AddData($this->session->userdata('id'),$_POST['device'],$_POST['mac']);
			// AddLog(	$this->session->userdata('id')." is adding mac address" );
			// @header('Location: ' . $_SERVER['HTTP_REFERER']);

			$epass = 's'.$this->session->userdata('id');
			$checkprofileexist = $this->RadOnlineProfileModel->CheckExistDataByStudentID($this->session->userdata('id'));
			$profile_data = array();

			if(!$checkprofileexist)
			{
				$profile_data = array(
					'username' => $epass,
					//'password' => null,
					'pname' => $this->session->userdata('prefix_name_id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'idcard' => $this->session->userdata('id'),
					'mailaddr' => $this->session->userdata('email'),
					'discipline' => '',
					'department' => '',
					'year' => '-',
					'dateregis' => date('Y-m-d H:i:s',time()),
					'status' => 'นักศึกษา',
					'location_id' => $this->session->userdata('location')
				);
			}
			else
			{
				$profile_data = null;
			}


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

			$this->RadOnlineProfileModel->AddData(
			$profile_data,
			array(
				'UserName' => $_POST['mac'],
				'dev_type' => $_POST['device'],
				'dev_net_type' => "Wireless"
			),
			array(
				'username' => $epass,
				'macaddress' => $_POST['mac'],
				'status_on' => 'staff'
			));

			@header('Location: ' . $_SERVER['HTTP_REFERER']);

			}else{
				echo 'กรุณากรอกข้อมูลวิทยาเขต<br>';
				echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
			}

		}else{

			echo 'กรุณากรอก Mac Address<br>';
			echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';

		}

   	}

	public function delete_mac()
	{
		//$this->RadAccountModel->DeleteDataByIDCard($this->session->userdata('id'),$_POST['del']);
		//$this->RadRegisterOnlineModel->DeleteDataByStudentID($this->session->userdata('id'));
		$this->RadDeviceModel->DeleteDataByUsername($_POST['del']);
		$this->RadRegisterOnlineModel->DeleteDataByMac($_POST['del']);

		// $device_data = $this->RadRegisterOnlineModel->GetDataByEpass('s'.$this->session->userdata('id'));

		// if($device_data == null)$this->RadOnlineProfileModel->DeleteDataByStudentID($this->session->userdata('id'));

		AddLog(	$this->session->userdata('id')." was deleting his/her registered mac address" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function signout()
	{
		// $this->LogModel->AddEventLog(array(
		// 		'USERNAME'=>$this->session->userdata('username'),
		// 		'STATUS'=>$this->session->userdata('status'),
		// 		'LOCATION'=>$this->session->userdata('location_id'),
		// 		'EVENT' => 'ได้ทำการออกจากระบบ',
		// 		'DATE'=>date('Y-m-d'),
		// 		'TIME'=>date('H:i:s')
		// 	));
		$this->session->sess_destroy();
		AddLog(	$this->session->userdata('id')." was logging out" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}
