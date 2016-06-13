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

       function getFacDataByFacID($facid)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('FAC_ID',$facid);
        return $this->db->get('sko_fac')->result();
    }

    function getProgramData()
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        return $this->db->get('sko_program')->result();
    }

    function getProgramDataByProgramID($programid)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('PRO_ID',$programid);
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

    function getLocationDataByLocationID($locationid)
    {
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('location_id',$locationid);
        return $this->db->get('location_peple')->result();
    }

    
}