<?php
if(isset($_GET['sid']))
{
	session_id($_GET['sid']);
	session_start();
	if(!isset($_SESSION["account"]))
	{
		echo"会话建立失败<br/>";
		echo"请点击<a href=\"login.php\">这里</a>重新登录";
		exit;
	}
	$account=$_SESSION["account"];
	include("connect.php");
	$nickname=GetNickName($account);
	echo $nickname;
	echo "test";
}
else
{
	$nickname="未登录";
}
?>