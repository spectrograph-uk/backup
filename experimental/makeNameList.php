<?php
$abs=realpath(dirname(__FILE__));
$ip=$_GET['name'];
$ips=file_get_contents($abs."/ips.txt");
$ipArray=explode(",",$ips);
if(!in_array($ip, $ipArray)){array_push($ipArray,$ip);};
$s=implode(",",$ipArray);
file_put_contents($abs."/ips.txt", $s);
?>