<?php
$abs=realpath(dirname(__FILE__));
$indices=file_get_contents($abs."/indices.txt");
echo $indices;
?>