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
