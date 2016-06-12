<?php

class RadSKOModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getFacData()
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('sko_fac')->result();
    }

    function getProgramData()
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('sko_program')->result();
    }

    function getGroupsData()
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('groups')->result();
    }

    function getLocationData()
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('location_peple')->result();
    }

    
}