<?php

class RadOnlineProfileModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function getDataByStudentID($studentid)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('idcard',$studentid);
        return $this->db->get('online_profile')->result();
    }
    
    /*
    Use multiple databases in this method
    */
    function AddData($profile_data,$device_data,$register_data)
    {
        $this->db->db_select('radius');
        if($profile_data!==null)$this->db->insert('online_profile', $profile_data); 
        $this->db->insert('device', $device_data); 
        $this->db->insert('register_online', $register_data); 
    }
    
    function CheckExistDataByStudentID($studentid)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('idcard',$studentid);
        $data = $this->db->get('online_profile')->result();
        $res = !empty($data)?true:false;
        return $res;
        
    }
    

}
