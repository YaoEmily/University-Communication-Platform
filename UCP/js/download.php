<?php


	session_start();
	$name=$_SESSION['account'];
$point=$_SESSION['POINT'];
$file=$_SESSION['FILE'];
$cname=$_SESSION['NAME'];
$sid=$_SESSION['SID'];


	@ $db=mysqli_connect('localhost','root','hhh19950129');	
	if(!$db)
	{
		die('could not connect : ' . mysqli_connect_error());
	}

	mysqli_select_db($db,"uni_com_platform");
	mysqli_query($db,"set names utf8");
	
	$sql="select user_point from users where user_account='".$name."'";
	$result=mysqli_query($db,$sql);
	$row =  mysqli_fetch_array($result);
	$tmpPoint=$row[0];
	if($tmpPoint>=$point||$name==$file)
	{
	

	$sql="update users set user_point=user_point+".$point." where user_account='".$file."'";
	 	if(!mysqli_query($db,$sql))
		 	die('Error : ' );

	$sql="update users set user_point=user_point-".$point." where user_account='".$name."'";
		 if(!mysqli_query($db,$sql))
		 	die('Error : ' );
		 echo "下载成功";

 	header('content-disposition:attachment;filename='.basename($file."/".$cname));
 	header('content-length:'.filesize($file."/".$cname));
	readfile($file."/".$cname);
	}
	else
	{
		echo "<script>alert('积分不足下载失败');</script>";
		echo "下载失败.<br>";
	}

?>

