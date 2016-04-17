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

//////////////FRONT END

function asset_url(){
   return base_url().'asset/';
}

function header_url(){
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
