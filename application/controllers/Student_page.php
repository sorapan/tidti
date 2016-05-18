<?php

class Student_page extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('login')||$this->session->userdata('id')==null){
			@header('Location: ' . base_url());
		}

		$this->load->model('E_passModel');
		$this->load->model('Uoc_stdModel');
		$this->load->model('MacModel');
		$this->load->model('RadAccountModel');
				
	}

	public function index()
	{
		$mac_registered_num = $this->MacModel->CountDataOnStdId($this->session->userdata('id'));
		$macdata = $this->MacModel->FetchDataWithSTDID($this->session->userdata('id'));
		$this->load->view('student/index',array(
			'mac_data' => $macdata,
			'mac_num' => $mac_registered_num,
			'rad_test' => $this->RadAccountModel->login()
		));

	}
	
	public function submit_location()
	{
		if(isset($_POST['location'])){
			$this->session->set_userdata('location',$_POST['location']);
			@header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
	}

	public function add_mac()
	{
			
		if(!ctype_space($_POST['mac'])){
			if($this->session->userdata('location') ){
			
			// $this->MacModel->AddData($this->session->userdata('id'),$_POST['device'],$_POST['mac']);
			// AddLog(	$this->session->userdata('id')." is adding mac address" );
			// @header('Location: ' . $_SERVER['HTTP_REFERER']);
			
			$this->RadAccountModel->AddData(array(
				'username' => $_POST['mac'],
				'password' => '',
				'pname' => $this->session->userdata('prefix_name_id'),
				'firstname' => $this->session->userdata('firstname'),
				'lastname' => $this->session->userdata('lastname'),
				'idcard' => $this->session->userdata('id'),
				'mailaddr' => $this->session->userdata('email'),
				'discipline' => '',
				'department' => '',
				'year' => '',
				'dateregis' => date('Y-m-d H:i:s',time()),
				'status' => 'นักศึกษา',
				'location_id' => $this->session->userdata('location')
			));
			

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
		$this->MacModel->DelData($this->session->userdata('id'),$_POST['del']);
		AddLog(	$this->session->userdata('id')." was deleting his/her registered mac address" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		AddLog(	$this->session->userdata('id')." was logging out" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}
