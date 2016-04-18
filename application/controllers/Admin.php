<?php

class Admin extends CI_Controller {


	public function __construct()
	{

		 parent::__construct();
		 $this->load->model('E_passModel');
		 $this->load->model('Uoc_stdModel');
		 $this->load->model('Admin_dataModel');

	}

	public function index()
	{
		echo test_method('Hello World');
		$this->load->view('admin/index');
	}

	public function Macaddress()
	{
		$this->load->view('admin/Macaddress');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}

	function signin($user,$pass){

		$this->Admin_dataModel->Login($_POST['user'],$_POST['pass']);

	}

}
