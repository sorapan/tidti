<?php

class DeviceModel extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function AddDevice($data){
        $this->db->db_select('radius');
        $this->db->insert('device',$data);
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
            $this->selectDeviceLike($where);
            return $this->db->get()->result();
        }

    }

    function SelectForEdit($id){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('register_online');
        $this->db->join('device','device.username = register_online.macaddress');
        $this->db->join('online_profile','online_profile.username = register_online.username');
        $this->db->where('register_online.oid',$id);
        return $this->db->get()->result();
    }

    function SelectForEditManual($username){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('manual_user');
        $this->db->join('device','device.username = manual_user.username');
        $this->db->where('manual_user.username',$username);
        return $this->db->get()->result();
    }

    function SelectDeviceManual($where){
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
            // $this->selectDeviceLike($where);
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
            $this->selectDeviceLike($where);
            return $this->db->get()->result();
        }
    }
    function SelectDeviceByStaffManual($location,$where){
        if($where==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('manual_user');
            $this->db->join('device','device.username = manual_user.username');
            $this->db->where('manual_user.location_id',$location);
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('manual_user');
            $this->db->join('device','device.username = manual_user.username');
            $this->db->where('manual_user.location_id',$location);
            $this->db->like('manual_user.username',$where);
            return $this->db->get()->result();
        }
    }

    private function selectDeviceLike($where){
        $this->db->like('register_online.macaddress',$where);
        $this->db->or_like('register_online.username',$where);
        $this->db->or_like('online_profile.firstname',$where);
        $this->db->or_like('online_profile.lastname',$where);
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


        $username = array ( 'username' => $register_online['macaddress']);
        $this->db->where('username', $where['old_macaddress']);
        $this->db->update('radcheck',$username);

        $this->db->where('username', $where['old_macaddress']);
        $this->db->update('radreply',$username);

    }

    function EditDataDeviceManual($where,$manual_user,$device){
        // var_dump($where);
        // var_dump($online_profile);
        // var_dump($register_online);
        // var_dump($device);
        $this->db->db_select('radius');

        $this->db->where('username', $where['username']);
        $this->db->update('manual_user',$manual_user);


        $this->db->where('UserName', $where['old_username']);
        $this->db->update('device',$device);


        $username = array ( 'username' => $where['username']);
        $this->db->where('username', $where['username']);
        $this->db->update('radcheck',$username);

        $this->db->where('username', $where['username']);
        $this->db->update('radreply',$username);

    }

    function DeleteMac($mac){
        $this->db->db_select('radius');
        $this->db->delete('device',array(
                'UserName'=>$mac
            ));
        $this->db->delete('register_online',array(
                'macaddress'=>$mac
            ));
        $this->db->delete(array(
                'radcheck','radreply'
            ),array(
                'username'=>$mac
            ));
        // return  $this->db->error();
    }

    function DeleteMacManual($username){
        $this->db->db_select('radius');
        $this->db->delete('device',array(
                'UserName'=>$username
            ));
        $this->db->delete('manual_user',array(
                'username'=>$username
            ));
        $this->db->delete(array(
                'radcheck','radreply'
            ),array(
                'username'=>$username
            ));
    }


}
