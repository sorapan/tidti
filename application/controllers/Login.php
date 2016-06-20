<?php

class Login extends CI_Controller {

	 public function __construct()
	 {
	 		date_default_timezone_set("Asia/Bangkok");

		 	parent::__construct();
		 	$this->load->model('E_passModel');
		 	$this->load->model('Uoc_stdModel');
		 	$this->load->model('RefModel');
		 	$this->load->model('RadAccountModel');
		 	$this->load->model('RadOnlineProfileModel');
		 	$this->load->model('RadSKOModel');
		 	$this->load->model('LogModel');
	 }

		public function index()
		{
			$this->load->view('login');
		}

		public function adminLogin(){
			var_dump($this->session);
			$this->load->view('admin/admin_login');
		}

	public function AdminCheck(){
		$res = $this->E_passModel->AdminCheckLogin($_POST['e_pass'],$_POST['pass']);
		if(empty($res)){
			echo 'wrong';
			// var_dump($res);
			// @header('Location:'.base_url().'/admin/manage');
		}else{
			// var_dump($res);
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('username',$res[0]->username);
			$this->session->set_userdata('status',$res[0]->status);
			$this->session->set_userdata('location_id',$res[0]->location_id);

			// $this->LogModel->AddEventLog(array(
			// 	'USERNAME'=>$this->session->userdata('username'),
			// 	'STATUS'=>$this->session->userdata('status'),
			// 	'LOCATION'=>$this->session->userdata('location_id'),
			// 	'EVENT' => 'ได้เข้าสู่ระบบ',
			// 	'DATE'=>date('Y-m-d'),
			// 	'TIME'=>date('H:i:s')
			// ));

			@header('Location:'.base_url().'admin/manage');
		}
	}

    public function LoginCheck()
    {
    	// @header("Location: student");
        $res = $this->E_passModel->CheckLogin($_POST['e_pass'],$_POST['pass']);
        // var_dump($res);
        // $status = $res

				if(empty($res))
				{
					echo 'wrong';
				}
				else
				{

					if (strpos($res[0]->usre, ".") == false) {


						//var_dump($res);
						//echo $res[0]->usre."<br>";
						//echo $res[0]->pass."<br>";
						//echo explode("s",$res[0]->usre)[1];

						$std_data = $this->Uoc_stdModel->fetchDataById( explode("s",$res[0]->usre)[1] );

						//var_dump($std_data);

						foreach($std_data as $sd)
						{
							$this->session->set_userdata('login',true);
							$this->session->set_userdata('id',$sd->ID);
							$this->session->set_userdata('prefix_name_id',$sd->PREFIX_NAME_ID);
							$this->session->set_userdata('firstname',$sd->STD_FNAME);
							$this->session->set_userdata('lastname',$sd->STD_LNAME);
							$this->session->set_userdata('fac_id',$sd->FAC_ID);
							$this->session->set_userdata('fac', $this->RefModel->fetchFacNameByID($sd->FAC_ID) );
							$this->session->set_userdata('program_id',$sd->PROGRAM_ID);
							$this->session->set_userdata('program',$this->RefModel->fetchProgramNameByID($sd->PROGRAM_ID) );
							$this->session->set_userdata('email',$sd->EMAIL);
							$this->session->set_userdata('tel',$sd->TELEPHONE);
							$this->session->set_userdata('citizen_id',$sd->CITIZEN_ID);
						}

						//เพิ่มใหม่
							$this->session->set_userdata('username',$res[0]->usre);
							// $this->session->set_userdata('status',$res[0]->status);
							// $this->session->set_userdata('location_id',$res[0]->location_id);

						//$std_mac_registered = $this->RadAccountModel->getDataByFirstAndLastName( $this->session->userdata('firstname'),$this->session->userdata('lastname'));
						$std_mac_registered = $this->RadOnlineProfileModel->getDataByStudentID($this->session->userdata('id'));

						if(!empty($std_mac_registered))
						{
							$this->session->set_userdata('location',$std_mac_registered[0]->location_id);
						}

						AddLog(	$this->session->userdata('id')." is logging in" );
						// เพิ่ม event
						// $this->LogModel->AddEventLog(array(
						// 	'USERNAME'=>$this->session->userdata('username'),
						// 	'STATUS'=>$this->session->userdata('status'),
						// 	'LOCATION'=>$this->session->userdata('location_id'),
						// 	'EVENT' => 'ได้เข้าสู่ระบบ',
						// 	'DATE'=>date('Y-m-d'),
						// 	'TIME'=>date('H:i:s')
						// ));


						@header("Location: student");

					}
					else if($res['status'] == 'admin'){
						$ad_data = $this->Admin_dataModel->Login($_POST['e_pass'],$_POST['pass']);
					}
					else
					{
						$stf_data = $this->RadOnlineProfileModel->getDataByUsername($_POST['e_pass']);

						if(!empty($stf_data))
						{
							foreach($stf_data as $sd)
							{
								$this->session->set_userdata('login',true);
								$this->session->set_userdata('detail_exists',true);
								$this->session->set_userdata('id',$sd->idcard);
								$this->session->set_userdata('username',$sd->username);
								$this->session->set_userdata('prefix_name_id',$sd->pname);
								$this->session->set_userdata('firstname',$sd->firstname);
								$this->session->set_userdata('lastname',$sd->lastname);
								$this->session->set_userdata('email',$sd->mailaddr);
								$this->session->set_userdata('status',$sd->status);
								$this->session->set_userdata('location',$this->RadSKOModel->getLocationDataByLocationID($sd->location_id)[0]->location_name);
								$this->session->set_userdata('discipline',$sd->discipline);
								$this->session->set_userdata('department',$this->RadSKOModel->getFacDataByFacID($sd->department)[0]->FAC_NAME);
								$this->session->set_userdata('branch',$this->RadSKOModel->getProgramDataByProgramID($sd->prof_branch)[0]->PRO_NAME);
							}

							// add log data
							$this->LogModel->AddEventLog(array(
								'USERNAME'=>$this->session->userdata('username'),
								'STATUS'=>'user',
								'LOCATION'=> $this->session->userdata('location'),
								'EVENT' => 'เข้าสู่ระบบ )',
								'DATE'=>date('Y-m-d'),
								'TIME'=>date('H:i:s')
									));

						}
						else
						{
							$this->session->set_userdata('login',true);
							$this->session->set_userdata('username',$_POST['e_pass']);
							$this->session->set_userdata('detail_exists',false);

							// add log data
							$this->LogModel->AddEventLog(array(
								'USERNAME'=>$this->session->userdata('username'),
								'STATUS'=>'user',
								'LOCATION'=>'-',
								'EVENT' => 'เข้าสู่ระบบ (ไม่ได้ยืนยันข้อมูล)',
								'DATE'=>date('Y-m-d'),
								'TIME'=>date('H:i:s')
									));
						}

						AddLog(	$this->session->userdata('username')." is logging in" );
						@header("Location: professor");

					}

				}
		}

}
