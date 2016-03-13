<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录？</title>
</head>
<body>
	<?php
	echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	include("connect.php");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$check = $_POST['check'];
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['check']))
	{
		$res = Identify($_POST["username"],$_POST["password"]);
		//echo $res;
		if($res == false)
		{
			echo"<script type=\"text/javascript\">alert(\"用户名或密码错误！\")</script>";
		}
		else if($check == "selse")
		{
			session_start();
			$_SESSION["account"]=$res;
			// //echo $_SESSION["name"];
			// global $session_id;
			$session_id=session_id();
			header("Location:homepage.html?sid=".$session_id);
			exit;
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