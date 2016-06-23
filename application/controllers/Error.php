<?php

class Error extends CI_Controller {

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
            $this->load->view('error/error_page',array(
                    'text' => 'ไม่มีค่า error'
                ));
        }

        public function show_error($data){
            $this->load->view('error/error_page',array(
                    'text' => $data
                ));
        }

}