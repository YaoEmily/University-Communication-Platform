<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录？</title>
</head>
<body>
	<?php
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	include("connect.php");
	include("newFolder.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$nickname = $_POST['nickname'];
	$age = $_POST['age'];
	$sex = $_POST['sex'];
	$province = $_POST['province'];
	$school = $_POST['school'];
	$specialty = $_POST['specialty'];
	$grade = $_POST['grade'];
	$point = 20;
	$check = $_POST['check'];

	if(isset($_POST['username']) &&
		isset($_POST['password']) &&
		isset($_POST['name']) &&
		isset($_POST['nickname']) &&
		isset($_POST['age']) &&
		isset($_POST['sex']) &&
		isset($_POST['province']) &&
		isset($_POST['school']) &&
		isset($_POST['specialty']) &&
		isset($_POST['grade']) &&
		isset($_POST['check']))
	{
		$res = GetUsername($username);
		echo $res;
		if($res)
		{
			echo "<script type=\"text/javascript\">alert(\"该账户已存在，不可再次注册！\")</script>";
		}
		else if($check == "selse")
		{
			$IsSeccess = Register($username,$password,$school,$name,$nickname,$age,$sex,$province,$province,$specialty,$grade,$point);
			if($IsSeccess)
			{
				$res = GetUsername($username);
				createFolder($res);
				copy("images/headImg.jpg",$res."/headImg.jpg");
				SetHeadimg($IsSeccess);
				session_start();
				$_SESSION["account"]=$res;
				$session_id=session_id();
				header("Location:homepage.html?sid=".$session_id);
				exit;
			}
			else echo"<script type=\"text/javascript\">alert(\"未知错误！\")</script>";
		}	
		else
		{
			echo"<script type=\"text/javascript\">alert(\"验证码错误！\")</script>";
		}

	}
	else
	{
		echo "请重新输入";
	}
	?>
</body>
</html>