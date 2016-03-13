<?php

$file=$_GET['file'];
$name=$_GET['name'];
$sid=$_GET['sid'];
	session_start();
$point=$_GET['point'];	
	$_SESSION['SID']=$sid;
$_SESSION['POINT']=$point;
$_SESSION['FILE']=$file;
$_SESSION['NAME']=$name;


?>