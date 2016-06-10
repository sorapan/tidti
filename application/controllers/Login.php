<?php

class Login extends CI_Controller {

	 public function __construct()
	 {

		 	parent::__construct();
		 	$this->load->model('E_passModel');
		 	$this->load->model('Uoc_stdModel');
		 	$this->load->model('RefModel');
		 	$this->load->model('RadAccountModel');
		 	$this->load->model('RadOnlineProfileModel');

	 }

		public function index()
		{

			$this->load->view('login');

		}

    public function LoginCheck()
    {
        $res = $this->E_passModel->CheckLogin($_POST['e_pass'],$_POST['pass']);

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
						
						//$std_mac_registered = $this->RadAccountModel->getDataByFirstAndLastName( $this->session->userdata('firstname'),$this->session->userdata('lastname'));
						$std_mac_registered = $this->RadOnlineProfileModel->getDataByStudentID($this->session->userdata('id'));
						
						if(!empty($std_mac_registered))
						{
							$this->session->set_userdata('location',$std_mac_registered[0]->location_id);
						}

						AddLog(	$this->session->userdata('id')." is logging in" );
						//echo $this->session->userdata('email');
						@header("Location: student");

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
								$this->session->set_userdata('location',$sd->location_id);
							}
						}
						else
						{
							$this->session->set_userdata('login',true);
							$this->session->set_userdata('username',$_POST['e_pass']);
							$this->session->set_userdata('detail_exists',false);
						}

						AddLog(	$this->session->userdata('username')." is logging in" );
						@header("Location: professor");

					}	

				}
		}
}
