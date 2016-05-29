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

}
