<?php

class ManualUserModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    public function GetDataManualUser(){
        //  does not use yet
        // $this->db->db_select('radius');
        // $this->db->select('*');
    }

    public function GetWhereDataManualUser($where){

    }

    public function AddDataManualUser($data){
        $this->db->db_select('radius');
        $this->db->insert('manual_user',$data);
        // $this->session->set_flashdata('alert', 'เพิ่มข้อมูลสำเร็จ');
        @header('Location:'.base_url().'/admin');
        // return $this->output->enable_profiler(TRUE);
    }

}
