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

	public function add_mac()
	{
		//  $mac_registered_num = $this->MacModel->CountDataOnStdId($this->session->userdata('id'));
		//  if($mac_registered_num < 3)
		//  {
		// 	 if(empty($this->MacModel->CheckMac($_POST['mac'])))
		// 	 {
		// 		 if(empty($this->MacModel->CheckDevice($_POST['device'])))
		// 		 {
		// 			 $this->MacModel->AddData($this->session->userdata('id'),$_POST['device'],$_POST['mac']);
		// 			 AddLog(	$this->session->userdata('id')." is adding mac address" );
		// 			 @header('Location: ' . $_SERVER['HTTP_REFERER']);
		// 		 }
		// 		 else
		// 		 {
		// 			 echo "คุณลงทะเบียนอุปกรณ์ซ้ำไม่ได้ ";
		// 			 @header( "Refresh:3; ". $_SERVER['HTTP_REFERER']);
		// 		 }
		// 	 }
		// 	 else
		// 	 {
		// 		 echo "คุณลงทะเบียน Mac Address ซ้ำไม่ได้ ";
		// 		 @header( "Refresh:3; ". $_SERVER['HTTP_REFERER']);
		// 	 }
		//  }
		//  else
		//  {
		// 	 echo "คุณลงทะเบียนครบแล้ว<br>";
		// 	 echo "กรุณารอสักครู่...";
		// 	 @header( "Refresh:3; ". $_SERVER['HTTP_REFERER']);
		//  }
			
		if(!ctype_space($_POST['mac'])){
			$this->MacModel->AddData($this->session->userdata('id'),$_POST['device'],$_POST['mac']);
			AddLog(	$this->session->userdata('id')." is adding mac address" );
			@header('Location: ' . $_SERVER['HTTP_REFERER']);
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
