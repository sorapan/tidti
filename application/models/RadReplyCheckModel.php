<?php

class RadReplyCheckModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


    function AddRadReply($data){
        $this->db->db_select('radius');
        $this->db->insert('radreply',$data);
    }

    function AddRadCheck($data){
        $this->db->db_select('radius');
        $this->db->insert('radcheck',$data);
    }

    function CheckMacRadCheck($where){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('username',$where);
        return count($this->db->get('radcheck')->result());
    }

    function DeleteRad($data){
        $this->db->db_select('radius');
        $this->db->where('username',$data);
        $this->db->delete(array('radreply','radcheck'));
    }
}
