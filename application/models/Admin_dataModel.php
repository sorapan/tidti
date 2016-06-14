<?php

class Admin_dataModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function Login($user, $pass){

    }

    function GetDataToMange($where){
        // return $where;
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('register_online');
        $this->db->join('device','device.username = register_online.macaddress');
        $this->db->join('online_profile','online_profile.username = register_online.username');
        // $this->db->where('')
        $this->db->like('register_online.username',$where);
        $this->db->or_like('register_online.macaddress',$where);
        $this->db->or_like('online_profile.firstname',$where);
        $this->db->or_like('online_profile.lastname',$where);
        return $this->db->get()->result();
    }
}
