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

    function GetLogByWhere($date,$where,$location){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('log');

        if(!empty($date)&&!empty($location)){
            $this->db->where('DATE',$date);
            $this->db->where('LOCATION',$location);
        }else{
            if(empty($date)&&empty($location)){
                $this->db->like('USERNAME',$where);
            }
            elseif(empty($date)){
                $this->db->where('LOCATION',$location);
            }else{
                $this->db->where('DATE',$date);
            }
        }
        $this->db->like('USERNAME',$where);


        // ในกรณีต้องการค้นหา event ด้วย

        // if(!empty($date)&&!empty($where)){
        //     $this->db->like('USERNAME',$where);
        //     // $this->db->or_like('EVENT',$where);
        // }else{
        //     if(!empty($where)){
        //     //     // $this->db->or_like('USERNAME',$where);
        //         $this->db->like('USERNAME',$where);
        //         $this->db->or_like('EVENT',$where);
        //     }else{
        //         $this->db->like('USERNAME',$where);
        //         $this->db->or_like('EVENT',$where);
        //     }

        // }

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
