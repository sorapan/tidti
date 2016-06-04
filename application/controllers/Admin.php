<?php

class Admin extends CI_Controller {


	public function __construct()
	{

		 parent::__construct();
		 $this->load->model('E_passModel');
		 $this->load->model('Uoc_stdModel');
		 $this->load->model('Admin_dataModel');
		 $this->load->model('MacModel');
		 $this->load->model('DeviceModel');

	}

	public function index()
	{
		echo test_method('Hello World');
		$this->load->view('admin/index');
	}

	public function mac()
	{

		$data = $this->DeviceModel->SelectDevice();
		// $data= '';
		$this->load->view('admin/admin_mac_list',array('data'=> $data));
	}


	public function login()
	{
		$this->load->view('admin/admin_login');
	}

	public function user()
	{
		$this->load->view('admin/admin_user');
	}

	function signin($user,$pass){

		$this->Admin_dataModel->Login($_POST['user'],$_POST['pass']);

	}

}
