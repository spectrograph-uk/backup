<?php
$abs=realpath(dirname(__FILE__));
$filePath = $abs.'/ips.txt';
$file=fopen($filePath,"w");
fwrite($file,null);
fclose($file);
?>