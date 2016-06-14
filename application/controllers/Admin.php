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
		 $this->load->model('RadSKOModel');

	}

	public function index()
	{
		echo test_method('Hello World');
		$this->load->view('admin/index');
	}

	public function manage(){
		$fac_data = $this->RadSKOModel->getFacData();
		$program_data = $this->RadSKOModel->getProgramData();
		$group_data = $this->RadSKOModel->getGroupsData();
		$location_data = $this->RadSKOModel->getLocationData();
		$this->load->view('admin/admin_manage',array(
							'fac_data' => $fac_data,
							'program_data' => $program_data,
							'group_data' => $group_data,
							'location_data' => $location_data
			));
	}

	public function searchToManageMac(){
		// var_dump($_POST);
		$search = $_POST['search'];
		$data = $this->Admin_dataModel->GetDataToMange($_POST['search']);
		$this->load->view('admin/admin_mac_list',array('data'=> $data,'search'=> $search));
	}

	public function adduser($user){
		$data = '';
		$this->load->view('admin/admin_manage',array("data"=>$data));
	}

	public function mac()
	{

		$data = $this->DeviceModel->SelectDevice(null);
		// $data= '';
		$this->load->view('admin/admin_mac_list',array('data'=> $data));
	}

	public function log(){
		$this->load->view('admin/admin_log');
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

	public function getDataToEditById($id){
		return	$this->DeviceModel->SelectDevice($id);
	}

	public function setDataToEditById($id){
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
		@header('Location:'.base_url().'/admin/mac/'.$where['oid'].'?stt=1');


	}

	public function submitdevice($person){

		var_dump($this->session);

		// if($person == 'student'){

		// }elseif($person == 'professor'){

		// }elseif ($person == 'staff') {
		// 	# code...
		// }elseif ($person == 'special') {
		// 	# code...
		// }
	}

}
