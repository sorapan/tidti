<?php

class DeviceModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function SelectDevice(){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('register_online');
        $this->db->join('device','device.username = register_online.macaddress');
        $this->db->join('online_profile','online_profile.username = register_online.username');
        // $this->db->where('register_online',$search);
        return $this->db->get()->result();
    }


}
