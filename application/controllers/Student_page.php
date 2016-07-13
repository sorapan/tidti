<?php

class Student_page extends CI_Controller {

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        parent::__construct();

        if(!$this->session->userdata('login')){
            @header('Location: ' . base_url());
        }

        $this->load->model('E_passModel');
        // $this->load->model('Uoc_stdModel');
        $this->load->model('MacModel');
        $this->load->model('RadAccountModel');
        $this->load->model('RadDeviceModel');
        $this->load->model('RadOnlineProfileModel');
        $this->load->model('RadRegisterOnlineModel');
        $this->load->model('RadSKOModel');
        $this->load->model('LogModel');
        $this->load->model('RadReplyCheckModel');
        $this->load->model('ManualUserModel');
        $this->load->model('RadUsergroupModel');


    }

    public function index()
    {

        $macdata = $this->RadRegisterOnlineModel->GetDataByEpass($this->session->userdata('username'));
        foreach($macdata as $key=>$val)
        {
            $macdata[$key]->device = $this->RadDeviceModel->GetDataByMac($val->macaddress)[0]->dev_type;
        }
        $this->load->view('student/index',array(
            'mac_data' => $macdata,
            'fac_data' => $this->RadSKOModel->getFacData(),
            'program_data' => $this->RadSKOModel->getProgramData(),
            'group_data' => $this->RadSKOModel->getGroupsData(),
            'location_data' => $this->RadSKOModel->getLocationData()
        ));

    }

    public function submit_detail()
    {

        $data_insert = array(
            'username' => strtolower($this->session->userdata('username')),
            'password' => '-',
            'pname' => isset($_POST['pname'])?$_POST['pname']:null,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'discipline' => isset($_POST['branch'])?$_POST['branch']:null,
            'mailaddr' => $_POST['email'],
            'status' => $_POST['group'],
            'idcard' => $_POST['citizen_id'],
            'location_id' => isset($_POST['location'])?$_POST['location']:null,
            'department' => isset($_POST['department'])?$_POST['department']:null,
			'dateregis' => date('Y-m-d H:i:s'),
            'encryption' => '-',
            'year'=>$_POST['year']
        );


        if(!in_array(null,$data_insert) || !in_array("",$data_insert))
        {


            $this->RadOnlineProfileModel->AddSingleData($data_insert);

            $where = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'idcard' => $_POST['citizen_id']
                );
            $this->moveDataManualToOnline($where,$_POST['location']);

            //add log
            $this->LogModel->AddEventLog(array(
                'USERNAME'=>$this->session->userdata('username'),
                'STATUS'=>'user',
                'LOCATION'=> $_POST['location'],
                'EVENT' => 'ได้เพิ่มข้อมูลส่วนตัว',
                'DATE'=>date('Y-m-d'),
                'TIME'=>date('H:i:s')
                    ));

            $stf_data = $this->RadOnlineProfileModel->getDataByUsername($this->session->userdata('username'));

                if(!empty($stf_data))
                {
                    foreach($stf_data as $sd)
                    {
                        $this->session->set_userdata('login',true);
                        $this->session->set_userdata('detail_exists',true);
                        $this->session->set_userdata('id',$sd->idcard);
                        $this->session->set_userdata('username',$sd->username);
                        $this->session->set_userdata('prefix_name_id',$sd->pname);
                        $this->session->set_userdata('firstname',$sd->firstname);
                        $this->session->set_userdata('lastname',$sd->lastname);
                        $this->session->set_userdata('email',$sd->mailaddr);
                        $this->session->set_userdata('status',$sd->status);
                        $this->session->set_userdata('location',$this->RadSKOModel->getLocationDataByLocationID($sd->location_id)[0]->location_name);
                        $this->session->set_userdata('location_id',$sd->location_id);
                        $this->session->set_userdata('discipline',$sd->discipline);
                        $this->session->set_userdata('department',$this->RadSKOModel->getFacDataByFacID($sd->department)[0]->FAC_NAME);
                        $this->session->set_userdata('branch',$this->RadSKOModel->getProgramDataByProgramID($sd->discipline)[0]->PRO_NAME);
                        $this->session->set_userdata('group_id',$this->RadSKOModel->getWhereGroupsData($sd->status)[0]->gname);
                    }

                }

            @header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else
        {
            // var_dump($data_insert);
            $this->session->set_flashdata('alert','กรุณากรอกข้อมูลให้ครบ');
            $this->session->set_flashdata('type','alert-danger');
            @header('Location: ' . $_SERVER['HTTP_REFERER']);
            // echo 'กรุณากรอกข้อมูลให้ครบ<br>';
            // echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
        }

    }

    public function moveDataManualToOnline($where,$location){
        $count = $this->ManualUserModel->GetDataManualUserByWhere($where);
        // var_dump( $count);
        if(!empty($count)){
            $register_data = array(
                    'username' => $this->session->userdata('username'),
                    'macaddress' => $count[0]->username,
                    'addtime' => $count[0]->dateregis,
                    'updatetime' => '',
                    'status_on' => 'student'
                );
            $this->RadOnlineProfileModel->AddRegisterProfile($register_data);
            $this->ManualUserModel->DeleteManual($count[0]->username);
            // echo $count[0]->username;
            // var_dump($count);

            $this->LogModel->AddEventLog(array(
                'USERNAME'=>$this->session->userdata('username'),
                'STATUS'=>'user',
                'LOCATION'=> $_POST['location'],
                'EVENT' => 'ได้ยืนยัน macaddress ด้วย e-pass หมายเลขอุปกรณ์:'.$count[0]->username,
                'DATE'=>date('Y-m-d'),
                'TIME'=>date('H:i:s')
                    ));
        }else{
            return FALSE;
        }
    }


    public function getprogram()
    {

        $data = $this->RadSKOModel->getProgramDataByFac($_POST['data']);
        echo json_encode($data);

    }
    public function getLocationFacData(){
        $data = $this->RadSKOModel->getLocationFacData($_POST['data']);
        // var_dump($data);
        // $this->output->enable_profiler(TRUE);
        echo json_encode($data);
    }

    public function getLocationGroupData(){
        $data = $this->RadSKOModel->getGroupsDataByLocation($_POST['data'],$_POST['group']);
        // var_dump($data);
        // $this->output->enable_profiler(TRUE);
        echo json_encode($data);
    }

    public function getLocationStaffData(){
        $data = $this->RadSKOModel->getStaffDataByLocation($_POST['data']);
        // var_dump($data);
        // $this->output->enable_profiler(TRUE);
        echo json_encode($data);
    }


    public function add_mac()
    {
        if($this->session->userdata('detail_exists'))
        {

            if(ctype_space($_POST['mac']) == false && $_POST['mac'] != "")
            {
                    $_POST['mac'] = str_replace(':','-',strtoupper($_POST['mac']));


                    $count_mac = $this->RadRegisterOnlineModel->DuplicateCheck($_POST['mac']);
                    if($count_mac<=0){

                        $this->RadOnlineProfileModel->AddDataWithoutProfile(
                        array(
                            'UserName' => $_POST['mac'],
                            'dev_type' => $_POST['device'],
                            'dev_net_type' => "Wireless"
                        ),
                        array(
                            'username' => $this->session->userdata('username'),
                            'macaddress' => $_POST['mac'],
                            'status_on' => 'student'
                        ));


                        //เพิ่ม กลุ่มใน usergroup
                        $this->RadUsergroupModel->insertUsergroups(array(
                                'UserName' => $_POST['mac'],
                                'GroupName' => $this->session->userdata("group_id"),
                                'priority' => 0
                            ));

                        if($this->session->userdata('discipline')!=='-'){
                            $radvalue = date('Y-m-d',strtotime('+1 years')).'T'.date('H:i:s');
                        }else{
                            $radvalue = '';
                        }

                        $this->RadReplyCheckModel->AddRadReply(array(
                                // รับค่าจาก POST
                                'username' => $_POST['mac'],
                                // ส่วนที่แก้ไข
                                'attribute' => 'WISPr-Session-Terminate-Time',
                                // ส่วนที่แก้ไข
                                'op' => ':=',
                                // ส่วนที่แก้ไข
                                'value'=> $radvalue
                            ));

                        // อาจจะมีการแก้ไขในภายหน้า
                        $this->RadReplyCheckModel->AddRadCheck(array(
                                // รับค่าจาก POST
                                'username' => $_POST['mac'],
                                // ส่วนที่แก้ไข
                                'attribute' => 'Cleartext-Password',
                                // ส่วนที่แก้ไข
                                'op' => ':=',
                                // ส่วนที่แก้ไข
                                'value'=> 'Liu;b=yp;kpakp'
                            ));


                        $this->LogModel->AddEventLog(array(
                            'USERNAME'=>$this->session->userdata('username'),
                            'STATUS'=>'user',
                            'LOCATION'=> $this->session->userdata('location'),
                            'EVENT' => 'ได้เพิ่มอุปกรณ์หมายเลข:'.$_POST['mac'],
                            'DATE'=>date('Y-m-d'),
                            'TIME'=>date('H:i:s')
                                ));
                        $this->session->set_flashdata('alert','เพิ่มอุปกรณ์สำเร็จ :'.strtoupper($_POST['mac']));
                        $this->session->set_flashdata('type','alert-success');
                        @header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }else{
                        $this->session->set_flashdata('alert','รหัสอุปกรณ์ซ้ำ :'.strtoupper($_POST['mac']));
                        $this->session->set_flashdata('type','alert-danger');
                        @header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }

            }else{

                $this->session->set_flashdata('alert','กรุณากรอก Mac Address');
                $this->session->set_flashdata('type','alert-warning');
                @header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

        }else{
            $this->session->set_flashdata('alert','กรุณากรอกข้อมูลส่วนตัว');
            $this->session->set_flashdata('type','alert-danger');
            @header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }


    public function delete_mac()
    {
        $this->RadDeviceModel->DeleteDataByUsername($_POST['del']);
        $this->RadRegisterOnlineModel->DeleteDataByMac($_POST['del']);
        $this->RadReplyCheckModel->DeleteRad($_POST['del']);
        //ลบ mac ใน usergroup
        $this->RadUsergroupModel->deleteUsergroups($_POST['del']);
        $this->LogModel->AddEventLog(array(
            'USERNAME'=>$this->session->userdata('username'),
            'STATUS'=>'user',
            'LOCATION'=> $this->session->userdata('location'),
            'EVENT' => 'ได้ลบอุปกรณ์หมายเลข:'.$_POST['del'],
            'DATE'=>date('Y-m-d'),
            'TIME'=>date('H:i:s')
                ));
        $this->session->set_flashdata('alert','ลบอุปกรณ์เรียบร้อย :'.strtoupper($_POST['del']));
        $this->session->set_flashdata('type','alert-info');
        @header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function signout()
    {
        // var_dump($this->session);
        $this->LogModel->AddEventLog(array(
            'USERNAME'=>$this->session->userdata('username'),
            'STATUS'=>'user',
            'LOCATION'=> null!==$this->session->userdata('location_id')?$this->session->userdata('location_id'):"-",
            'EVENT' => 'ออกจากระบบ',
            'DATE'=>date('Y-m-d'),
            'TIME'=>date('H:i:s')
                ));

        $this->session->sess_destroy();
        @header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}