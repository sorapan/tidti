<?php

function test_method($var = '')
{

  return 'ddddd'.$var;

}

function AddLog($mes)
{
  $filename = date('d-m-Y', time());
  $file_exist = file_exists("log_file/". $filename .".txt");
  if(!$file_exist)fopen("log_file/". $filename .".txt", "w");

   $myfile = file_put_contents("log_file/". $filename .".txt", date('d-m-Y H:i -- ', time()).$mes." \r\n" , FILE_APPEND);

}

//////////////ID DECODE
function location_id($id){
     switch ($id) {
            case 'sk':
                echo "สงขลา";
                break;
            case 'sai':
                echo "ไสใหญ่";
                break;
            case 'tho':
                echo "ทุ่งใหญ่";
                break;
            case 'ka':
                echo "ขนอม";
                break;
            case 'tr':
                echo "ตรัง";
                break;
            case 'rat':
                echo "วิทยาลัยรัตภูมิ";
                break;

        }
}
function prefix_name_id($id)
{

    switch ($id)
    {
        case '003':
            return 'นาย';
            break;

        case '004':
            return 'นางสาว';
            break;
    }

}

function fac_id($id)
{
    switch ($id)
    {
        case '00004':
            return 'วิศวกรรมศาสตร์';
            break;
        case '00014':
            return 'ครุศาสตร์';
            break;
        case '00001':
            return 'ศิลปศาสตร์';
            break;
        case '00010':
            return 'สถาปัตย์';
            break;
        case '00005':
            return 'บริหารธุรกิจ';
            break;
    }
}

function program_id($id)
{
    switch ($id)
    {
        case '000014':
            return 'วิศวกรรมคอมพิวเตอร์';
            break;
        case '000013':
            return 'วิศวกรรมไฟฟ้า';
            break;
        case '000071':
            return 'วิศวกรรมโทรคมนาคม';
            break;
        case '000017':
            return 'วิศวกรรมเครื่องกล';
            break;
        case '000019':
            return 'วิศวกรรมเครื่องนุ่งห่ม';
            break;
        case '000023':
            return 'เทคโนโลยีอุตสาหกรรม';
            break;
        case '000022':
            return 'เทคโนโลยีเครื่องกล';
            break;
        case '000016':
            return 'วิศวกรรมสำรวจ';
            break;
        case '000018':
            return 'วิศวกรรมอุตสาหการ';
            break;
        case '000081':
            return 'วิศวกรรมการผลิต';
            break;
        case '000015':
            return 'วิศวกรรมอิเล็กทรอนิกส์';
            break;
    }
}

//////////////FRONT END

function asset_url()
{
   return base_url().'asset/';
}

function header_url()
{
    return '<head>
    <meta charset="UTF-8">
    <title>Document</title>
        <link rel="stylesheet" href="'.asset_url().'sass/reset.css">
        <link rel="stylesheet" type="text/css" href="'.asset_url().'sass/font.css">
        <link rel="stylesheet" type="text/css" href="'.asset_url().'font-awesome/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="'.asset_url().'bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="'.asset_url().'sass/admin_page.css">
        <link rel="stylesheet" type="text/css" href="'.asset_url().'sass/login.css">
        <link rel="stylesheet" type="text/css" href="'.asset_url().'sass/user_page.css">



        <script type="text/javascript" src="'.asset_url().'js/jquery.js"></script>
        <script type="text/javascript" src="'.asset_url().'bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="'.asset_url().'js/script.js"></script>
    </head>';
}

////////////// switch case show device icon
function switchIcon($dev){
    switch ($dev) {
        case 'Phone':
            return 'mobile';
            break;
        case 'Notebook':
            return 'laptop';
            break;
        case 'Tablet':
            return 'tablet';
            break;
        case 'phone':
            return 'mobile';
            break;
        case 'laptop':
            return 'laptop';
            break;
        case 'tablet':
            return 'tablet';
            break;
        case 'Other':
            return 'question';
            break;
        case 'other':
            return 'question';
            break;

        default:
            return false;
            break;
    }
}

function selectLocation($locate){
    $arr = array(
                "sk" => " ",
                "sai" => " ",
                "tho" => " ",
                "ka" => " ",
                "tr" => " ",
                "rat" => " "
            );
    foreach ($arr as $key => $value) {
        if($locate == $key){
            $arr[$key] = "selected";
            break;
        }
    }

    echo '
        <option value="-" disabled >วิทยาเขต</option>
        <option value="sk" '.$arr["sk"].'>สงขลา</option>
        <option value="sai" '.$arr["sai"].'>ไสใหญ่</option>
        <option value="tho" '.$arr["tho"].'>ทุ่งใหญ่</option>
        <option value="ka" '.$arr["ka"].'>ขนอม</option>
        <option value="tr" '.$arr["tr"].'>ตรัง</option>
        <option value="rat" '.$arr["rat"].'>วิทยาลัยรัตภูมิ</option>';
}

function selectDevice($dev){
    $arr = array(
                "Notebook" => " ",
                "Phone" => " ",
                "Tablet" => " ",
                "Other" => " "
            );
    foreach ($arr as $key => $value) {
        if($dev == $key){
            $arr[$key] = "selected";
            break;
        }
    }

    echo '
        <option value="-" disabled >วิทยาเขต</option>
        <option value="Phone" '.$arr["Phone"].'>มือถือ</option>
        <option value="Notebook" '.$arr["Notebook"].'>โน๊ตบุ๊ค</option>
        <option value="Tablet" '.$arr["Tablet"].'>แท็บเล็ต</option>
        <option value="Other" '.$arr["Other"].'>อื่นๆ</option>';
}

function headerOfAdmin($status){
    switch ($status) {
        case 'admin':
            $name = 'ผู้ดูแล';
            break;
        case 'staff':
            $name = 'เจ้าหน้าที่';
            break;
        default:
            return false;
            break;
    }

    echo '<div class="nav">
        <!-- <span class="secret"><i class="fa fa-user-secret" aria-hidden="true"></i></span> -->
        <span class="username thaisans">'.$name.'</span>
        <button class="logout" onclick="window.location=\''.base_url().'admin/logout\'" title="ออกระบบ"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
        </div>';


}