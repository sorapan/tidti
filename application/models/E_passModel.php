<?php

class E_passModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
// login check admin from admin_data table
    function AdminCheckLogin($user, $pass){
        $this->db->select('*');
        $this->db->from('admin_data');
        $this->db->where('username',$user)->where('password',$pass);
        return $this->db->get()->result();
    }


// login check uesr from e_pass table
    function CheckLogin($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('e_pass');
        $this->db->where('usre',$user)->where('pass',$pass);
        return $this->db->get()->result();
    }


}
