<<<<<<< HEAD
=======
<?php

class LogModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function GetAllLog(){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('log');
        $this->db->order_by("DATE", "desc");
        $this->db->order_by("TIME", "desc");

        // $this->db->group_by("DATE","TIME");
        return $this->db->get()->result();
    }

    function GetDateAll(){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('log');
        // $this->db->where('DATE',date('Y-m-d'));
        $this->db->order_by("DATE", "desc");
        $this->db->order_by("TIME", "desc");

        // $this->db->group_by("DATE","TIME");
        return $this->db->get()->result();
    }

    function GetLogByWhere($date,$where){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('log');

        if(!empty($date)&&!empty($where)){
            $this->db->where('DATE',$date);
            $this->db->like('USERNAME',$where);
            $this->db->or_like('EVENT',$where);
        }else{
            $this->db->where('DATE',$date);
            if(!empty($where)){
                $this->db->or_like('USERNAME',$where);
                $this->db->or_like('EVENT',$where);
            }

        }

        $this->db->order_by("DATE", "desc");
        $this->db->order_by("TIME", "desc");
        return $this->db->get()->result();

    }

    function GetLogByLocation($location){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('LOCATION',$location);
        return $this->db->get('log')->result();
    }

    function AddEventLog($data){

        $this->db->db_select('radius');
        $this->db->insert('log',$data);
    }


}
>>>>>>> refs/remotes/origin/bestzaba
