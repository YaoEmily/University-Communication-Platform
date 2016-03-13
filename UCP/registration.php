<?php
if(isset($_GET['sid']))
{
	session_id($_GET['sid']);
	session_start();
	if(!isset($_SESSION["account"]))
	{
		echo"会话建立失败<br/>";
		echo"请点击<a href=\"login.html\">这里</a>重新登录";
		exit;
	}
	$account=$_SESSION["account"];
	include("wdzy.php");
	Registration($account);
	echo"<script language=\"javascript\" type=\"text/javascript\">
           window.location.href=\"wdzy.html?sid=".$_GET["sid"]."\"; 
    </script>";
}
else
{
	$nickname="未登录";
	$account="images";
	header("location:login.html");
}
?>