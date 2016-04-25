<?php

class RefModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function fetchFacNameByID($id)
    {
        $this->db->select('*');
        $this->db->where('FAC_ID',$id);
        return $this->db->get('ref_fac')->result()[0]->FAC_NAME;
    }
    
    function fetchProgramNameByID($id)
    {
        $this->db->select('*');
        $this->db->where('PROGRAM_ID',$id);
        return $this->db->get('ref_program')->result()[0]->PROGRAM_NAME;
    }

   

}
