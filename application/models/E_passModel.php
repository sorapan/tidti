<?php

class E_passModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function AdminCheckLogin($user, $pass){
        if($user == 'admin'){
            $this->db->select('*');
            $this->db->from('admin_data');
            $this->db->where('username',$user)->where('password',$pass)->where('status','admin');
            return $this->db->get()->result();
          }else{
            $this->db->select('*');
            $this->db->from('e_pass');
            $this->db->where('usre',$user)->where('pass',$pass)->where('status','staff');
            return $this->db->get()->result();
          }
    }


    function CheckLogin($user, $pass)
    {
        $this->db->select('*');
        $this->db->from('e_pass');
        $this->db->where('usre',$user)->where('pass',$pass);
        return $this->db->get()->result();
    }


}
