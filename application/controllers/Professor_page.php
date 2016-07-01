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

        $data_insert = array(
            'username' => $this->session->userdata('username'),
            'password' => '-',
            'pname' => isset($_POST['pname'])?$_POST['pname']:null,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'discipline' => isset($_POST['branch'])?$_POST['branch']:'-',
            'mailaddr' => isset($_POST['email'])?$_POST['email']:'-',
            'status' => $_POST['group'],
            'idcard' => $_POST['citizen_id'],
            'location_id' => $_POST['location'],
            'department' => isset($_POST['department'])?$_POST['department']:'-',
            'dateregis' => date('Y-m-d H:i:s'),
            'encryption' => '-',
            'year'=>'-'
        );


        if(!in_array(null,$data_insert) || !in_array("",$data_insert))
        {
            $this->RadOnlineProfileModel->AddSingleData($data_insert);

            $where = array(
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'idcard' => $_POST['citizen_id'],
                'status_on' => $_POST['type']
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
            $this->session->set_flashdata('alert','กรุณากรอกข้อมูลให้ครบ');
            $this->session->set_flashdata('type','alert-danger');
            @header('Location: ' . $_SERVER['HTTP_REFERER']);
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
                    'status_on' => $where->status_on
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

                        $status_on = $this->session->userdata('discipline')!=='-'?'teacher':'staff';
                        $this->RadOnlineProfileModel->AddDataWithoutProfile(
                        array(
                            'UserName' => $_POST['mac'],
                            'dev_type' => $_POST['device'],
                            'dev_net_type' => "Wireless"
                        ),
                        array(
                            'username' => $this->session->userdata('username'),
                            'macaddress' => $_POST['mac'],
                            'status_on' =>  $status_on
                        ));


                        if($this->session->userdata('discipline')!=='-'){
                            $radvalue = date('Y-m-d',strtotime('+1 years')).'T'.date('H:i:s');
                        }else{
                            $radvalue = date('Y-m-d',strtotime('+1 years')).'T'.date('H:i:s');
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
                            'LOCATION'=> $this->session->userdata('location_id'),
                            'EVENT' => 'ได้เพิ่มอุปกรณ์:'.$_POST['mac'],
                            'DATE'=>date('Y-m-d'),
                            'TIME'=>date('H:i:s')
                                ));
                         $this->session->set_flashdata("alert",'เพิ่มอุปกรณ์เรียบร้อย');
                         $this->session->set_flashdata('type','alert-success');

                        @header('Location: ' . $_SERVER['HTTP_REFERER']);
                    }else{
                        $this->session->set_flashdata("alert",'หมายเลขอุปกรณ์ซ้ำ');
                        $this->session->set_flashdata('type','alert-danger');
                        // echo 'หมายเลขอุปกรณ์ซ้ำ <br>';
                        @header('Location: ' . $_SERVER['HTTP_REFERER']);
                        // @header('Location: '.base_url().'professor');
                    }
                }
                else
                {
                    $this->session->set_flashdata('alert','กรอกข้อมูลได้เพียง 7 อุปกรณ์เท่านั้น');
                    $this->session->set_flashdata('type','alert-warning');
                    @header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
            }
            else
            {
                $this->session->set_flashdata('alert','กรุณากรอก Mac Address');
                $this->session->set_flashdata('type','alert-warning');
                @header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
        else
        {
            $this->session->set_flashdata('alert','กรุณากรอกข้อมูลส่วนตัว');
            $this->session->set_flashdata('type','alert-warning');
            @header('Location: ' . $_SERVER['HTTP_REFERER']);
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
        $this->session->set_flashdata('type','alert-info');
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
        // AddLog(	$this->session->userdata('id')." was logging out" );
        @header('Location: ' . $_SERVER['HTTP_REFERER']);
    }




}
