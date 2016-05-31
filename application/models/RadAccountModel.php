<?php

class RadAccountModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function Login()
    {   
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('account')->result();
    }
    
    function AddData($account_data,$device_data)
    {
        $this->db->db_select('radius');
        $this->db->insert('account', $account_data); 
        $this->db->insert('device', $device_data);   
    }
    
    function GetDataByStudentId($studentid)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('idcard',$studentid);
        return $this->db->get('account')->result();
    }
    
    function GetLocationDataByStudentId($studentid)
    {
        $this->db->db_select('radius');
        $this->db->select('location_id');
        $this->db->where('idcard',$studentid);
        return $this->db->get('account')->result();
    }
    
    function getDataByFirstAndLastName($firstname,$lastname)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('firstname',$firstname);
        $this->db->where('lastname',$lastname);
        return $this->db->get('account')->result();
    }

    function DeleteDataByIDCard($idcard,$username)
    {
        $this->db->db_select('radius');
        $this->db->delete('account', array(
            'idcard' => $idcard,
            'username' => $username
        )); 

    }

}
