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
			// var_dump($this->session);
			if($this->session->userdata('status')=='admin' || $this->session->userdata('status')=='staff'){
						@header('Location:'.base_url().'admin/manage');
				}else{

					$this->load->view('admin/admin_login');
				}
		}

	public function AdminCheck(){
		$res = $this->E_passModel->AdminCheckLogin($_POST['e_pass'],$_POST['pass']);
		if(empty($res)){
			// @header('Location:'.base_url().'error/'.'ชื่อผู้ใช้หรือรหัสผิด');
			$this->session->set_flashdata('alert','ชื่อผู้ใช้หรือรหัสผิด');
			@header('Location:'.base_url().'admin/login');
		}else{
			// var_dump($res);
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('username',$res[0]->username);
			$this->session->set_userdata('status',$res[0]->status);
			$this->session->set_userdata('location_id',$res[0]->location_id);

			@header('Location:'.base_url().'admin/manage');
		}
	}

    public function LoginCheck()
    {
    	// @header("Location: student");
        //$res = $this->E_passModel->CheckLogin($_POST['e_pass'],$_POST['pass']);
		$res = $this->login($_POST['e_pass'],$_POST['pass']);
        // var_dump($res);
        // $status = $res

				//if(empty($res))
				if(!$res)
				{
					$this->session->set_flashdata('alert','ชื่อผู้ใช้หรือรหัสผิด');
					@header('Location:'.base_url());
				}
				else
				{

					if (strpos($_POST['e_pass'], ".") == false)
					{


						//var_dump($res);
						//echo $res[0]->usre."<br>";
						//echo $res[0]->pass."<br>";
						//echo explode("s",$res[0]->usre)[1];

						$std_data = $this->RadOnlineProfileModel->getDataByUsername($_POST['e_pass']);

						//var_dump($std_data);
						if(!empty($std_data))
						{
						foreach($std_data as $sd)
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
								$this->session->set_userdata('location_id',$sd->location_id);
								$this->session->set_userdata('discipline',$sd->discipline);
								$this->session->set_userdata('department',$this->RadSKOModel->getFacDataByFacID($sd->department)[0]->FAC_NAME);
								$this->session->set_userdata('branch',$this->RadSKOModel->getProgramDataByProgramID($sd->discipline)[0]->PRO_NAME);
							}

						//เพิ่มใหม่
							// $this->session->set_userdata('username',$res[0]->usre);
							// $this->session->set_userdata('status',$res[0]->status);
							// $this->session->set_userdata('location_id',$res[0]->location_id);

						}
						else{

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
						// AddLog(	$this->session->userdata('id')." is logging in" );
						@header("Location: student");

					}
					// else if($res['status'] == 'admin'){
					// 	$ad_data = $this->Admin_dataModel->Login($_POST['e_pass'],$_POST['pass']);
					// }
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
								$this->session->set_userdata('location_id',$sd->location_id);
								$this->session->set_userdata('discipline',$sd->discipline);
								$this->session->set_userdata('department',$this->RadSKOModel->getFacDataByFacID($sd->department)[0]->FAC_NAME);
								$this->session->set_userdata('branch',$this->RadSKOModel->getProgramDataByProgramID($sd->discipline)[0]->PRO_NAME);
							}

							// add log data
							$this->LogModel->AddEventLog(array(
								'USERNAME'=>$this->session->userdata('username'),
								'STATUS'=>'user',
								'LOCATION'=> $this->session->userdata('location_id'),
								'EVENT' => 'เข้าสู่ระบบ',
								'DATE'=>date('Y-m-d'),
								'TIME'=>date('H:i:s')
									));
							@header("Location: student");
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

						// AddLog(	$this->session->userdata('username')." is logging in" );
						@header("Location: professor");

					}

				}
		}



		//PRIVATE

		private function login($user,$passwd)
		{

			$ldapserver = "ldap://ldap.rmutsv.ac.th";
			//$ldapserver = "ldap://203.158.177.202"; // test ระบบ
			$ldapport = 389;
			$ldapbasedn = "dc=rmutsv,dc=ac,dc=th";
			//$ldapadmin = 'uid=arnn.l,ou=people,ou=staff,ou=arit,ou=e-passport,dc=rmutsv,dc=ac,dc=th';

			$encoding = "md5crypt";

			if(!($ds = ldap_connect($ldapserver, $ldapport)))  return FALSE;
			ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
			if(!($r=ldap_bind($ds)))  return FALSE;
			if(!($sr=ldap_search($ds, $ldapbasedn, "(uid=$user)")))  return FALSE;

			$entry_count = ldap_count_entries($ds, $sr);

			if($entry_count != 1 )  return FALSE;
			if (!($entry = ldap_first_entry($ds, $sr)))  return FALSE;
			if (!($dn = ldap_get_dn($ds, $entry)))  return FALSE;

			ldap_close($ds);

			$ds = ldap_connect($ldapserver,$ldapport);
			ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);

			if(!($b = ldap_bind($ds,$dn,$passwd)))  return FALSE;

			ldap_close($ds);

			return TRUE;
		}

}
