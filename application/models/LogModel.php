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
        $this->db->limit(99);
        // $this->db->group_by("DATE","TIME");
        return $this->db->get()->result();
    }

    function GetLogByWhere($date,$location,$search,$type,$status){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('log');
        if(!empty($date)){
            $this->db->where('DATE',$date);
        }
        if(!empty($location)){
            $this->db->where('LOCATION',$location);
        }
        if(!empty($status)){
            $this->db->where('STATUS',$status);
        }
        switch ($type) {
            case 'username':
                $this->db->like('USERNAME',$search);
                break;
            case 'event':
                $this->db->like('EVENT',$search);
                break;
            case 'status':
                $this->db->like('STATUS',$search);
                break;
            default:
                $this->db->like('USERNAME',$search);
                break;
        }
        $this->db->order_by("DATE", "desc");
        $this->db->order_by("TIME", "desc");
        return $this->db->get()->result();

    }

    function GetLogByLocation($location){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('LOCATION',$location);
        $this->db->order_by("DATE", "desc");
        $this->db->order_by("TIME", "desc");
        return $this->db->get('log')->result();
    }

    function AddEventLog($data){

        $this->db->db_select('radius');
        $this->db->insert('log',$data);
    }


}
