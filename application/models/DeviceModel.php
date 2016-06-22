<?php

class DeviceModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

       function SelectDevice($where){
        if($where==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            $this->db->where('register_online.oid',$where);
            return $this->db->get()->result();
        }

    }

    function SelectDeviceByStaff($location,$where){
        if($where==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            $this->db->where('online_profile.location_id',$location);
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            $this->db->where('online_profile.location_id',$location);
            return $this->db->get()->result();
        }
    }

    function SelectUser(){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('register_online');
        $this->db->join('device','device.username = register_online.macaddress');
        $this->db->join('online_profile','online_profile.username = register_online.username');
        // $this->db->where('register_online.oid',$where);
        // $this->db->get_where('register_online');
        return $this->db->get()->result();
    }

    function EditDataDevice($where,$online_profile,$register_online,$device){
        // var_dump($where);
        // var_dump($online_profile);
        // var_dump($register_online);
        // var_dump($device);
        $this->db->db_select('radius');

        $this->db->where('oid', intval($where['oid']));
        $this->db->update('register_online',$register_online);


        $this->db->where('username', $where['username']);
        $this->db->update('online_profile',$online_profile);

        $this->db->where('UserName', $where['old_macaddress']);
        $this->db->update('device',$device);


    }



}
