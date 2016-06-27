<?php

class Professor_page extends CI_Controller {

    public function __construct()
    {
        date_default_timezone_set("Asia/Bangkok");
        parent::__construct();

		if(!$this->session->userdata('login')){
			@header('Location: ' . base_url());
		}

        $this->load->model('RadOnlineProfileModel');
        $this->load->model('RadRegisterOnlineModel');
        $this->load->model('RadDeviceModel');
        $this->load->model('RadSKOModel');
        $this->load->model('LogModel');
        $this->load->model('RadReplyCheckModel');
        $this->load->model('ManualUserModel');

    }

    public function index()
    {
        $macdata = $this->RadRegisterOnlineModel->GetDataByEpass($this->session->userdata('username'));
        foreach($macdata as $key=>$val)
		{
			$macdata[$key]->device = $this->RadDeviceModel->GetDataByMac($val->macaddress)[0]->dev_type;
		}
        $this->load->view('professor/index',
        array(
            'mac_data' => $macdata,
            'fac_data' => $this->RadSKOModel->getFacData(),
            'program_data' => $this->RadSKOModel->getProgramData(),
            'group_data' => $this->RadSKOModel->getGroupsData(),
            'location_data' => $this->RadSKOModel->getLocationData(),
            'staff_data' => $this->RadSKOModel->getStaffData()
        ));
    }

    public function submit_detail()
    {
        // {
        // $_POST['pname'];
        // $_POST['firstname'];
        // $_POST['lastname'];
        // $_POST['email'];
        // $_POST['citizen_id'];
        // $_POST['department'];
        // $_POST['branch'];
        // $_POST['group'];
        // $_POST['location'];
        // }

        $data_insert = array(
            'username' => $this->session->userdata('username'),
            'password' => '-',
            'pname' => isset($_POST['pname'])?$_POST['pname']:null,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'discipline' => isset($_POST['branch'])?$_POST['branch']:'-',
            'mailaddr' => $_POST['email'],
            'status' => 'อาจารย์',
            'idcard' => $_POST['citizen_id'],
            'location_id' => $_POST['location'],
            'department' => isset($_POST['department'])?$_POST['department']:'-',
            'dateregis' => date('Y-m-d H:i:s'),
            'encryption' => '-'
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
                        // $this->session->set_userdata('discipline_name',$sd->discipline);
                        $this->session->set_userdata('department',$this->RadSKOModel->getFacDataByFacID($sd->department)[0]->FAC_NAME);
                        $this->session->set_userdata('branch',$this->RadSKOModel->getProgramDataByProgramID($sd->discipline)[0]->PRO_NAME);
                    }
                }

            @header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else
        {
            var_dump($data_insert);
            echo 'กรุณากรอกข้อมูลให้ครบ<br>';
            echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
        }

    }

    public function moveDataManualToOnline($where,$location){
        // $where = array(
        //     'firstname' => 'test3',
        //     'lastname' => 'test3',
        //     'idcard' => '2222222222211'
        //     );
        $count = $this->ManualUserModel->GetDataManualUserByWhere($where);
        if(!empty($count)){
            $device_data = null;
            $register_data = array(
                    'username' => $this->session->usesdata('username'),
                    'macaddress' => $count[0]->username,
                    'addtime' => $count[0]->dateregis,
                    'status_on' => 'staff'
                );
            $this->RadOnlineProfileModel->AddDataWithoutProfile($device_data,$register_data);
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
        }
    }

    public function addmac()
    {
        if($this->session->userdata('detail_exists') == true)
        {
            if(ctype_space($_POST['mac']) == false && $_POST['mac'] != "")
            {

                $_POST['mac'] = strtoupper($_POST['mac']);
                $count_data = $this->RadRegisterOnlineModel->GetNumberDataByEpass($this->session->userdata('username'));

                if($count_data<7)
                {
                    // var_dump($_POST);
                    // var_dump(ctype_space($_POST['mac']) == false);
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
                            'status_on' => 'staff'
                        ));


                        if($this->session->userdata('discipline')!=='-'){
                            $radvalue = '0000-00-00T00:00:00';
                        }else{
                            $radvalue = '0000-00-00T00:00:00';
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

                        // ของเก่า
                        // $this->RadReplyCheckModel->AddRadReply(array(
                        //         // รับค่าจาก POST
                        //         'username' => $_POST['mac'],
                        //         // ส่วนที่แก้ไข
                        //         'attribute' => 'WISPr-Session-Terminate-Time',
                        //         // ส่วนที่แก้ไข
                        //         'op' => '-',
                        //         // ส่วนที่แก้ไข
                        //         'value'=> '-'
                        //     ));

                        // // อาจจะมีการแก้ไขในภายหน้า
                        // $this->RadReplyCheckModel->AddRadCheck(array(
                        //         // รับค่าจาก POST
                        //         'username' => $_POST['mac'],
                        //         // ส่วนที่แก้ไข
                        //         'attribute' => '-',
                        //         // ส่วนที่แก้ไข
                        //         'op' => '-',
                        //         // ส่วนที่แก้ไข
                        //         'value'=> '-'
                        //     ));

                        $this->LogModel->AddEventLog(array(
                            'USERNAME'=>$this->session->userdata('username'),
                            'STATUS'=>'user',
                            'LOCATION'=> $this->session->userdata('location_id'),
                            'EVENT' => 'ได้เพิ่มอุปกรณ์:'.$_POST['mac'],
                            'DATE'=>date('Y-m-d'),
                            'TIME'=>date('H:i:s')
                                ));
                         $this->session->set_flashdata("alert",'เพิ่มอุปกรณ์เรียบร้อย');

                        @header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }else{
                        $this->session->set_flashdata("alert",'หมายเลขอุปกรณ์ซ้ำ');
                        echo 'หมายเลขอุปกรณ์ซ้ำ <br>';
                        @header('Location: '.base_url().'professor');
                    }
                }
                else
                {
                    echo 'กรอกข้อมูลได้เพียง 7 อุปกรณ์เท่านั้น<br>';
                    echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
                }
            }
            else
            {
                echo 'กรุณากรอก Mac Address<br>';
                echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
            }
        }
        else
        {
            echo 'กรุณากรอกข้อมูลส่วนตัว<br>';
            echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';
        }
    }

    public function deletemac()
    {
        $this->RadDeviceModel->DeleteDataByUsername($_POST['del']);
		$this->RadRegisterOnlineModel->DeleteDataByMac($_POST['del']);
        $this->RadReplyCheckModel->DeleteRad($_POST['del']);
        $this->LogModel->AddEventLog(array(
            'USERNAME'=>$this->session->userdata('username'),
            'STATUS'=>'user',
            'LOCATION'=> $this->session->userdata('location_id'),
            'EVENT' => 'ได้ลบอุปกรณ์หมายเลข:'.$_POST['del'],
            'DATE'=>date('Y-m-d'),
            'TIME'=>date('H:i:s')
                ));

        $this->session->set_flashdata("alert",'ลบอุปกรณ์เรียบร้อย');
		AddLog(	$this->session->userdata('id')." was deleting his/her registered mac address" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function logout()
    {
        // add log data
        if(empty($this->session->userdata('location_id'))){
            $location = '-';
        }else{
            $location = $this->session->userdata('location_id');
        }
        $this->LogModel->AddEventLog(array(
            'USERNAME'=>$this->session->userdata('username'),
            'STATUS'=>'user',
            'LOCATION'=> $location,
            'EVENT' => 'ออกจากระบบ',
            'DATE'=>date('Y-m-d'),
            'TIME'=>date('H:i:s')
                ));
        $this->session->sess_destroy();
        AddLog(	$this->session->userdata('id')." was logging out" );
        @header('Location: ' . $_SERVER['HTTP_REFERER']);
    }




}
