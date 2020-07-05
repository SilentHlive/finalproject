<?php
$myfile = fopen("table.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("table.txt"));
$tablename=fread($myfile,filesize("table.txt"));
//echo $tablename;
//fclose($myfile);
?>