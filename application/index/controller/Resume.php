<?php
namespace app\index\controller;

class Resume extends Common
{
    public static $nm = 1;

    public function index()
    {
        
        return view();
    }
    
    public function download(){
//echo __FILE__;'<br/>';
$counter=1;
if(file_exists("mycounter.txt")){
$fp=fopen("mycounter.txt","r");
$counter=fgets($fp,9);
$counter++;
fclose($fp);
}
$fp=fopen("mycounter.txt","w");
fputs($fp,$counter);
fclose($fp);
//echo "<h1>您是第".$counter."次访问本页面！<h1>";


$filename=realpath(__DIR__.'/chenxiangyu.doc'); //文件名
//var_dump($filename);die;

 Header( "Content-type:  application/octet-stream "); 
 Header( "Accept-Ranges:  bytes "); 
Header( "Accept-Length: " .filesize($filename));
 header( "Content-Disposition:  attachment;  filename= 您是第{$counter}位下载我的简历.doc"); 
 echo file_get_contents($filename);
 readfile($filename); 
 //downfile();
}



}