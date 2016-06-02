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

}
