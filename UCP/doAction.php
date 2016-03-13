<?php

 	static $size=0;
 	static $filename="";
	function createFolder($path)
	{
		if(!file_exists($path))
		{
			createFolder(dirname($path));
			mkdir($path,0777);
	//		echo"success<br>";
		}
	}


header('Content-type:text/html; charset=utf-8');

	
	
	
	if(isset($_POST['yes']))
	{

		$sid=$_GET['sid'];
		$title=$_POST['title'];
		$point=$_POST['point'];
		$type=$_POST['type'];
		$content=$_POST['content'];
		@ $db=mysqli_connect('localhost','root','hhh19950129');	
		session_start();
		$size=$_SESSION['size'];
		$filename=$_SESSION['name'];
		$dir = $_SESSION['account'];
		if(!$db)
		{
			die('could not connect : ' . mysqli_connect_error());
		}

		mysqli_select_db($db,"uni_com_platform");
		mysqli_query($db,"set names utf8");

		$sql="INSERT INTO source(name,type,size,title,point,content)VALUES('"
		.$filename."','"
		.$type."',"
		.$size.",'"
		.$title."',"
		.$point.",'"
		.$content."')"
		;

		if(!mysqli_query($db,$sql))
			die('Error : ' );
		$sql="select max(Id) from source";
		$result=mysqli_query($db,$sql);
		$row =  mysqli_fetch_array($result);

		$sql="INSERT INTO pocess(user,sourceID)VALUES('"
		.$dir."',"
		.$row[0].")"
		;
		 if(!mysqli_query($db,$sql))
		 	die('Error : '.mysql_errno());


		mysqli_close($db);

		header("Location: resource_share.html?sid=".$sid);

	}
	else
	{
		print_r($_FILES);
	
	 $filename=$_FILES['fileList']['name'];
	$type=$_FILES['fileList']['type'];
	$tmp_name=$_FILES['fileList']['tmp_name'];
	$size=$_FILES['fileList']['size'];
	$error=$_FILES['fileList']['error'];
	session_start();
	$_SESSION['size'] = $size;
	$_SESSION['name']=$filename;
	$dir = $_SESSION['account'];
	if(is_dir($dir))
	{
	}
	else
	{
		createFolder($dir);
	}
	echo $dir."/".$filename;
	move_uploaded_file($tmp_name,$dir."/".$filename);
	}
?>
