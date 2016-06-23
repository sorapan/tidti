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

    public function GetDataManualUserByWhere($where){
        $this->db->db_select('radius');
        $this->db->select('*');
        // $this->db->from('manual_user');
        $this->db->where('firstname',$where['firstname']);
        $this->db->where('lastname',$where['lastname']);
        $this->db->where('idcard',$where['idcard']);
        // $this->db->get('manual_user')->result();
        // $this->db->where($where);
        // return $this->output->enable_profiler(TRUE);
        return $this->db->get('manual_user')->result();
    }

    public function AddDataManualUser($data){
        $this->db->db_select('radius');
        $this->db->insert('manual_user',$data);
        // $this->session->set_flashdata('alert', 'เพิ่มข้อมูลสำเร็จ');
        @header('Location:'.base_url().'/admin');
        // return $this->output->enable_profiler(TRUE);
    }

    function DeleteManual($username){
        $this->db->db_select('radius');
        $this->db->delete('manual_user',array(
                'username'=>$username
            ));
    }
}
