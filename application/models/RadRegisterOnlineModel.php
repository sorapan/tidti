<?php

class RadRegisterOnlineModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function GetDataByEpass($epass)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('username',$epass);
        return $this->db->get('register_online')->result();
    }

    function GetNumberDataByEpass($epass)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('username',$epass);
        return $this->db->count_all_results('register_online');
    }

    function DeleteDataByMac($mac)
    {
        $this->db->db_select('radius');
        $this->db->delete('register_online', array(
            'macaddress' => $mac
        ));
    }

    function DuplicateCheck($mac){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('macaddress',$mac);
        return $this->db->count_all_results('register_online');
    }

}