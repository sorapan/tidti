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
