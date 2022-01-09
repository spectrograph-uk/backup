<?php
$abs=realpath(dirname(__FILE__));
$index=$_GET['index'];
$buffer=$_GET['buffer'];
$quickStop=$_GET['quickStop'];
$waitForThisBuffer=$_GET['waitForThisBuffer'];
$video= file_get_contents('php://input');
$filePath = $abs."/image_buffer_".$buffer."_client_".$index.".webm";
$file = fopen($filePath, 'w');
fwrite($file, $video);
fclose($file);
$indices=file_get_contents($abs."/indices.txt");
$indexArray=explode(",",$indices);
$looper=$indexArray[$index];
$n=0;
while($waitForThisBuffer!="none"&&$looper!=$waitForThisBuffer&&$n<8){
$n=$n+1;
sleep(.05);
$indices=file_get_contents($abs."/indices.txt");
$indexArray=explode(",",$indices);
$looper=indexArray[$index];};
if($quickStop=="true"){$buffer=preg_replace('/buf/','end',$buffer);};
$file2=fopen($abs."/indices.txt","r+");
flock($file2,LOCK_EX);
$indices=fread($file2,filesize($abs."/indices.txt"));
$indexArray[$index]=$buffer;
$t=implode(",",$indexArray);
ftruncate($file2,0);
rewind($file2);
fwrite($file2,$t);
flock($file2,LOCK_UN);
fclose($file2);
?>