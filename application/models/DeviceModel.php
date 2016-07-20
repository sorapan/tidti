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

    function GetDataByMac($mac)
    {
        // $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->where('UserName',$mac);
        return $this->db->get('device')->result();
    }


   function SelectDevice($location,$search,$type,$date){
        if($search==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            if(!empty($location)){
                $this->db->where('online_profile.location_id',$location);
            }
            $this->db->like('register_online.macaddress',$search);
            $this->db->like('register_online.addtime',$date);
            $this->db->order_by('register_online.addtime','desc');
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');

            if(!empty($date)){
                $this->db->like('register_online.addtime',$date);
            }
            if(!empty($location)){
                $this->db->where('online_profile.location_id',$location);
            }
            switch ($type) {
                case 'macaddress':
                    $this->db->like('register_online.macaddress',$search);
                    break;
                case 'username':
                    $this->db->like('register_online.username',$search);
                    break;
                case 'name':
                    $this->db->like('online_profile.firstname',$search);
                    $this->db->or_like('online_profile.lastname',$search);
                    $this->db->or_like('CONCAT(online_profile.firstname,\' \',online_profile.lastname)',$search);
                    break;
                default:
                    $this->db->like('register_online.addtime',$date);
                    $this->db->like('register_online.macaddress',$search);
                    break;
            }
            $this->db->order_by('register_online.addtime','desc');
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
        $this->db->from('manualuser');
        $this->db->join('device','device.username = manualuser.username');
        $this->db->where('manualuser.username',$username);
        return $this->db->get()->result();
    }

    function SelectDeviceManual($location,$search,$type,$date){
        if($search==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('manualuser');
            $this->db->join('device','device.username = manualuser.username');
            if(!empty($date)){
                $this->db->like('manualuser.dateregis',$date);
            }
            if(!empty($location)){
                $this->db->where('manualuser.location_id',$location);
            }
            $this->db->order_by('manualuser.dateregis','desc');
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('manualuser');
            $this->db->join('device','device.username = manualuser.username');
            if(!empty($date)){
                $this->db->like('manualuser.dateregis',$date);
            }
            if(!empty($location)){
                $this->db->where('manualuser.location_id',$location);
            }
            switch ($type) {
                case 'macaddress':
                    $this->db->like('manualuser.username',$search);
                    break;
                case 'username':
                    $this->db->like('manualuser.username',$search);
                    break;
                case 'name':
                    $this->db->like('manualuser.firstname',$search);
                    $this->db->or_like('manualuser.lastname',$search);
                    $this->db->or_like('CONCAT(manualuser.firstname,\' \',manualuser.lastname)',$search);
                    break;
                default:
                    $this->db->like('manualuser.dateregis',$date);
                    $this->db->like('manualuser.username',$search);
                    break;
            }
            $this->db->order_by('manualuser.dateregis','desc');
            return $this->db->get()->result();
        }

    }

    function SelectDeviceByStaff($location,$search,$type,$date){
        if($search==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            $this->db->like('register_online.macaddress',$search);
            $this->db->like('register_online.addtime',$date);
            if(!empty($location)){
                $this->db->where('online_profile.location_id',$location);
            }
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('register_online');
            $this->db->join('device','device.username = register_online.macaddress');
            $this->db->join('online_profile','online_profile.username = register_online.username');
            if(!empty($date)){
                $this->db->like('register_online.addtime',$date);
            }
            if(!empty($location)){
                $this->db->where('online_profile.location_id',$location);
            }
            switch ($type) {
                case 'macaddress':
                    $this->db->like('register_online.macaddress',$search);
                    break;
                case 'username':
                    $this->db->like('register_online.username',$search);
                    break;
                case 'name':
                    $this->db->like('online_profile.firstname',$search);
                    $this->db->or_like('online_profile.lastname',$search);
                    $this->db->or_like('CONCAT(online_profile.firstname,\' \',online_profile.lastname)',$search);
                    break;
                default:
                    $this->db->like('register_online.addtime',$date);
                    $this->db->like('register_online.macaddress',$search);
                    break;
            }
            return $this->db->get()->result();
        }
    }
    function SelectDeviceByStaffManual($location,$search,$type,$date){
        if($search==null){
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('manualuser');
            $this->db->join('device','device.username = manualuser.username');
            $this->db->where('manualuser.location_id',$location);
            $this->db->like('manualuser.dateregis',$date);
            return $this->db->get()->result();
        }else{
            $this->db->db_select('radius');
            $this->db->select('*');
            $this->db->from('manualuser');
            $this->db->join('device','device.username = manualuser.username');
            $this->db->like('manualuser.username',$search);
            if(!empty($date)){
                $this->db->like('manualuser.dateregis',$date);
            }
            if(!empty($location)){
                $this->db->where('manualuser.location_id',$location);
            }
            switch ($type) {
                case 'macaddress':
                    $this->db->like('manualuser.username',$search);
                    break;
                case 'username':
                    $this->db->like('manualuser.username',$search);
                    break;
                case 'name':
                    $this->db->like('manualuser.firstname',$search);
                    $this->db->or_like('manualuser.lastname',$search);
                    $this->db->or_like('CONCAT(manualuser.firstname,\' \',manualuser.lastname)',$search);
                    break;
                default:
                    $this->db->like('manualuser.dateregis',$date);
                    $this->db->like('manualuser.username',$search);

                    break;
            }
            return $this->db->get()->result();
        }
    }

    private function selectDeviceLike($search){
        $this->db->like('register_online.macaddress',$search);
        $this->db->or_like('register_online.username',$search);
        $this->db->or_like('online_profile.firstname',$search);
        $this->db->or_like('online_profile.lastname',$search);
    }

    function SelectDateFromDevice(){
        $status = $this->session->userdata('status');
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('register_online');
        $this->db->join('device','device.username = register_online.macaddress');
        $this->db->join('online_profile','online_profile.username = register_online.username');
        if($status == 'staff'){
            $this->db->where('online_profile.location_id',$this->session->userdata('location_id'));
        }

        $this->db->order_by('register_online.addtime','desc');
        return $this->db->get()->result();
    }

    function SelectDateFromDeviceManual(){
        $this->db->db_select('radius');
        $this->db->select('*');
        $this->db->from('manual_uesr');

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

        $usergroup = array('UserName' => $register_online['macaddress']);
        $this->db->where('UserName', $where['old_macaddress']);
        $this->db->update('usergroup',$usergroup);

    }

    function EditDataDeviceManual($where,$manualuser,$device){
        $this->db->db_select('radius');

        $this->db->where('username', $where['old_username']);
        $this->db->update('manualuser',$manualuser);


        $this->db->where('UserName', $where['old_username']);
        $this->db->update('device',$device);


        $username = array ( 'username' => $where['username']);
        $this->db->where('username', $where['old_username']);
        $this->db->update('radcheck',$username);

        $this->db->where('username', $where['old_username']);
        $this->db->update('radreply',$username);

        $usergroup = array ('UserName' => $where['username']);
        $this->db->where('UserName', $where['old_username']);
        $this->db->update('usergroup',$usergroup);

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

        $this->db->delete('usergroup',array(
                'UserName'=>$mac
            ));

    }

    function DeleteMacManual($username){
        $this->db->db_select('radius');
        $this->db->delete('device',array(
                'UserName'=>$username
            ));
        $this->db->delete('manualuser',array(
                'username'=>$username
            ));
        $this->db->delete(array(
                'radcheck','radreply'
            ),array(
                'username'=>$username
            ));

        $this->db->delete('usergroup',array(
                'UserName'=>$username
            ));

    }


}
