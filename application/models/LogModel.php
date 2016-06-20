<?php

class LogModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function GetAllLog(){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('log');
        $this->db->order_by("DATE", "desc");
        $this->db->order_by("TIME", "desc");
        return $this->db->get()->result();
    }

    function GetLogByLocation($location){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('LOCATION',$location);
        return $this->db->get('log')->result();
    }

    function AddEventLog($data){

        $this->db->db_select('radius');
        $this->db->insert('log',$data);
    }


}
