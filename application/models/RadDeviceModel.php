<?php

class RadDeviceModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function GetDataByMac($mac)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('UserName',$mac);
        return $this->db->get('device')->result();
    }

    function DeleteDataByUsername($username)
    {
        $this->db->db_select('radius');
        $this->db->delete('device', array(
            'UserName' => $username
        ));

    }


}