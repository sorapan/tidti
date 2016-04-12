<?php

class Uoc_stdModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();

    }

    function fetchDataById($id)
    {

      $this->db->select('*');
      $this->db->from('uoc_std');
      $this->db->where('id',$id);
      return $this->db->get()->result();

    }




}
