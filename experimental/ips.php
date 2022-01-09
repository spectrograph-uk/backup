<?php
$abs=realpath(dirname(__FILE__));
$ips=file_get_contents($abs."/ips.txt");
echo $ips;
?>