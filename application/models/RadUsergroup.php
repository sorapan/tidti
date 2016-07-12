<?php

class RadUsergroup extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function insertUsergroups($data){
        $this->db->db_select('radius');
        $this->db->insert('usergroup',$data);
    }

}
