<?php

class RadAccountModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function Login(){
        
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('account')->result();
        
    }
    
    function AddData($data){
        $this->db->db_select('radius');
        $this->db->insert('account', $data); 
    }
    
    function GetLocationDataByStudentId($studentid)
    {
        $this->db->db_select('radius');
        $this->db->select('location_id');
        $this->db->where('idcard',$studentid);
        return $this->db->get('account')->result();
    }


}
