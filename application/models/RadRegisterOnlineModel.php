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

}