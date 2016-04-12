<?php

class E_passModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function CheckLogin($user, $pass)
    {

      $this->db->select('*');
      $this->db->from('e_pass');
      $this->db->where('usre',$user)->where('pass',$pass);
      return $this->db->get()->result();

    }


}
