<?php

class RadUsergroupModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function insertUsergroups($data){
        $this->db->db_select('radius');
        $this->db->insert('usergroup',$data);
    }

    public function deleteUsergroups($data){
        $this->db->db_select('radius');
        $this->db->delete('usergroup',array(
                'UserName'=>$data
            ));
    }

}
