<?php

class Professor_page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

		if(!$this->session->userdata('login')){
			@header('Location: ' . base_url());
		}

        $this->load->model('RadOnlineProfileModel');
        $this->load->model('RadSKOModel');

    }

    public function index()
    {
        $this->load->view('professor/index',
        array(
            'fac_data' => $this->RadSKOModel->getFacData(),
            'program_data' => $this->RadSKOModel->getProgramData(),
            'group_data' => $this->RadSKOModel->getGroupsData(),
            'location_data' => $this->RadSKOModel->getLocationData()
        ));
    }

    public function submit_detail()
    {
        // {
        // $_POST['pname'];
        // $_POST['firstname'];
        // $_POST['lastname'];
        // $_POST['email'];
        // $_POST['citizen_id'];
        // $_POST['department'];
        // $_POST['branch'];
        // $_POST['group'];
        // $_POST['location'];
        // }

        $data_insert = array(
            'username' => $this->session->userdata('username'),
            'pname' => isset($_POST['pname'])?$_POST['pname']:null,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'discipline' => isset($_POST['group'])?$_POST['group']:null,
            'mailaddr' => $_POST['email'],
            'status' => 'อาจารย์',
            'idcard' => $_POST['citizen_id'],
            'location_id' => $_POST['location'],
            'department' => isset($_POST['department'])?$_POST['department']:null,
            'prof_department' => isset($_POST['department'])?$_POST['department']:null,
            'prof_branch' => isset($_POST['branch'])?$_POST['branch']:null,
            'staff_group' => isset($_POST['group'])?$_POST['group']:null
        );

        if(!in_array(null,$data_insert) || !in_array("",$data_insert))
        {
            $this->RadOnlineProfileModel->AddSingleData($data_insert);

            $stf_data = $this->RadOnlineProfileModel->getDataByUsername($this->session->userdata('username'));

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
                }

            @header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else
        {
            var_dump($data_insert);
            echo 'กรุณากรอกข้อมูลให้ครบ<br>';
            echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
        }
        
    }

    public function addmac()
    {
        if($this->session->userdata('detail_exists') == true)
        {
            if(ctype_space($_POST['mac']) == false && $_POST['mac'] != "")
            {
                // var_dump($_POST);
                // var_dump(ctype_space($_POST['mac']) == false);
                $this->RadOnlineProfileModel->AddDataWithoutProfile(
                array(
                    'UserName' => $_POST['mac'],
                    'dev_type' => $_POST['device'],
                    'dev_net_type' => "Wireless"
                ),
                array(
                    'username' => $this->session->userdata('username'),
                    'macaddress' => $_POST['mac'],
                    'status_on' => 'staff'
                ));
                
                @header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            else
            {
                echo 'กรุณากรอก Mac Address<br>';
                echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
            }
        }
        else
        {
            echo 'กรุณากรอกข้อมูลส่วนตัว<br>';
            echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        AddLog(	$this->session->userdata('id')." was logging out" );
        @header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
