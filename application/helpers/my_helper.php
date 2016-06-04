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

        default:
            return false;
            break;
    }
}