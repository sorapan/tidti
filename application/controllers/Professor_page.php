<?php

class Professor_page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view('professor/index');
        $this->load->model('RadOnlineProfileModel');
    }

    public function submit_detail()
    {
        // $_POST['pname'];
        // $_POST['firstname'];
        // $_POST['lastname'];
        // $_POST['email'];
        // $_POST['citizen_id'];
        // $_POST['department'];
        // $_POST['branch'];
        // $_POST['group'];
        // $_POST['location'];

        $data_insert = array(
            'username' => $this->session->userdata('username'),
            'pname' => isset($_POST['pname'])?$_POST['pname']:null,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'mailaddr' => $_POST['email'],
            'status' => 'อาจารย์',
            'location_id' => $_POST['location'],
            'prof_department' => isset($_POST['department'])?$_POST['department']:null,
            'prof_branch' => isset($_POST['branch'])?$_POST['branch']:null,
            'staff_group' => isset($_POST['group'])?$_POST['group']:null
        );

        if(!in_array(null,$data_insert) || !in_array("",$data_insert))
        {
            $this->RadOnlineProfileModel->AddSingleData($data_insert);
        }
        else
        {
            echo 'กรุณากรอกข้อมูลให้ครบ<br>';
            echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
        }
        
    }

}
