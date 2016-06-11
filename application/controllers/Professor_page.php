<?php

class Professor_page extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view('professor/index');
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
        // $_POST['location'];
    }

}
