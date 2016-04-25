<?php

class MacModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function AddData($id,$device,$mac)
    {
        $this->db->insert('mac',array(
          'std_id' => $id,
          'device' => $device,
          'mac' => $mac,
          'ID' => $this->session->userdata('id'),
          'PREFIX_NAME_ID' => $this->session->userdata('prefix_name_id'),
          'STD_FNAME' => $this->session->userdata('firstname'),
          'STD_LNAME' => $this->session->userdata('lastname'),
          'FAC_ID' => $this->session->userdata('fac_id'),
          'PROGRAM_ID' => $this->session->userdata('program_id'),
          'EMAIL' => $this->session->userdata('email'),
          'TELEPHONE' => $this->session->userdata('tel'),
          'CITIZEN_ID' => $this->session->userdata('citizen_id'),
          'date' => time()
        ));
    }

    function FetchDataWithSTDID($std_id)
    {
      $this->db->select('*');
      $this->db->where('std_id',$std_id);
      return $this->db->get('mac')->result();
    }

    function CountDataOnStdId($std_id)
    {
      $this->db->select('*');
      $this->db->where('std_id',$std_id);
      return count($this->db->get('mac')->result());
    }

    function CheckMac($mac)
    {
      $this->db->select('*');
      $this->db->where('mac',$mac);
      return count($this->db->get('mac')->result());
    }

    function CheckDevice($device)
    {
      $this->db->select('*');
      $this->db->where('device',$device);
      return count($this->db->get('mac')->result());
    }

    function DelData($std_id,$mac)
    {
      $this->db->where('std_id', $std_id)->where('mac',$mac);
      $this->db->delete('mac');
    }


}
