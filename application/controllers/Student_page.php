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

	}

	public function index()
	{

		$mac_registered_num = $this->MacModel->CountDataOnStdId($this->session->userdata('username'));
		//$macdata = $this->MacModel->FetchDataWithSTDID($this->session->userdata('id'));
		//$macdata = $this->RadOnlineProfileModel->getDataByStudentID($this->session->userdata('id'));
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
            'username' => $this->session->userdata('username'),
            'password' => '-',
            'pname' => isset($_POST['pname'])?$_POST['pname']:null,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'discipline' => isset($_POST['branch'])?$_POST['branch']:null,
            'mailaddr' => $_POST['email'],
            'status' => 'อาจารย์',
            'idcard' => $_POST['citizen_id'],
            'location_id' => $_POST['location'],
            'department' => isset($_POST['department'])?$_POST['department']:null,
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
        var_dump( $count);
        if(!empty($count)){
            $register_data = array(
                    'username' => $this->session->userdata('username'),
                    'macaddress' => $count[0]->username,
                    'addtime' => $count[0]->dateregis,
                    'updatetime' => '',
                    'status_on' => 'staff'
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
        $data = $this->RadSKOModel->getGroupsDataByLocation($_POST['data']);
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
		if(ctype_space($_POST['mac']) == false && $_POST['mac'] != "")
		{
            $_POST['mac'] = strtoupper($_POST['mac']);
			if($this->session->userdata('location') )
			{

			// $this->MacModel->AddData($this->session->userdata('id'),$_POST['device'],$_POST['mac']);
			// AddLog(	$this->session->userdata('id')." is adding mac address" );
			// @header('Location: ' . $_SERVER['HTTP_REFERER']);

			$epass = $this->session->userdata('username');
			$checkprofileexist = $this->RadOnlineProfileModel->CheckExistDataByStudentID($this->session->userdata('id'));
			$profile_data = array();

			if(!$checkprofileexist)
			{
				$profile_data = array(
					'username' => $epass,
					//'password' => null,
					'pname' => $this->session->userdata('prefix_name_id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'idcard' => $this->session->userdata('id'),
					'mailaddr' => $this->session->userdata('email'),
					'discipline' => '',
					'department' => '',
					'year' => '-',
					'dateregis' => date('Y-m-d H:i:s',time()),
					'status' => 'นักศึกษา',
					'location_id' => $this->session->userdata('location')
				);
			}
			else
			{
				$profile_data = null;
			}


                $count_mac = $this->RadRegisterOnlineModel->DuplicateCheck($_POST['mac']);
                if($count_mac<=0){



                    //ของเดิม
        			// $this->RadReplyCheckModel->AddRadReply(array(
        			// 		// รับค่าจาก POST
        			// 		'username' => $_POST['mac'],
        			// 		// ส่วนที่แก้ไข
        			// 		'attribute' => 'WISPr-Session-Terminate-Time',
        			// 		// ส่วนที่แก้ไข
        			// 		'op' => '-',
        			// 		// ส่วนที่แก้ไข
        			// 		'value'=> '-'
        			// 	));

        			// // อาจจะมีการแก้ไขในภายหน้า
        			// $this->RadReplyCheckModel->AddRadCheck(array(
        			// 		// รับค่าจาก POST
        			// 		'username' => $_POST['mac'],
        			// 		// ส่วนที่แก้ไข
        			// 		'attribute' => '-',
        			// 		// ส่วนที่แก้ไข
        			// 		'op' => '-',
        			// 		// ส่วนที่แก้ไข
        			// 		'value'=> '-'
        			// 	));

        			$this->RadOnlineProfileModel->AddData(
        			$profile_data,
        			array(
        				'UserName' => $_POST['mac'],
        				'dev_type' => $_POST['device'],
        				'dev_net_type' => "Wireless"
        			),
        			array(
        				'username' => $epass,
        				'macaddress' => $_POST['mac'],
        				'status_on' => 'user'
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
                $this->session->set_flashdata('alert','กรุณากรอกข้อมูล');
                $this->session->set_flashdata('type','alert-warning');
                @header('Location: ' . $_SERVER['HTTP_REFERER']);
			}

		}else{

            $this->session->set_flashdata('alert','กรุณากรอก Mac Address');
            $this->session->set_flashdata('type','alert-warning');
            @header('Location: ' . $_SERVER['HTTP_REFERER']);
			// echo 'กรุณากรอก Mac Address<br>';
			// echo '<button onclick="history.go(-1);">ย้อนกลับ </button>';

		}

   	}

	public function delete_mac()
	{
		//$this->RadAccountModel->DeleteDataByIDCard($this->session->userdata('id'),$_POST['del']);
		//$this->RadRegisterOnlineModel->DeleteDataByStudentID($this->session->userdata('id'));
		$this->RadDeviceModel->DeleteDataByUsername($_POST['del']);
		$this->RadRegisterOnlineModel->DeleteDataByMac($_POST['del']);

		// $device_data = $this->RadRegisterOnlineModel->GetDataByEpass('s'.$this->session->userdata('id'));

		// if($device_data == null)$this->RadOnlineProfileModel->DeleteDataByStudentID($this->session->userdata('id'));
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
		// AddLog(	$this->session->userdata('id')." was deleting his/her registered mac address" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function signout()
	{
        var_dump($this->session);
        // $location = $this->session->userdata('location_id');
		$this->LogModel->AddEventLog(array(
            'USERNAME'=>$this->session->userdata('username'),
            'STATUS'=>'user',
            'LOCATION'=> null!==$this->session->userdata('location_id')?$this->session->userdata('location_id'):"-",
            'EVENT' => 'ออกจากระบบ',
            'DATE'=>date('Y-m-d'),
            'TIME'=>date('H:i:s')
                ));

		$this->session->sess_destroy();
		// AddLog(	$this->session->userdata('id')." was logging out" );
		@header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

}
