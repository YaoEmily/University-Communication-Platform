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
	if(isset($_GET["bid"])&&isset($_GET["cid"]))
	{
		if($_GET["bid"]==1)
		DeleteSendcard("study_specialty",$_GET["cid"]);
		else if($_GET["bid"]==2)
		DeleteSendcard("studycom_highgrade",$_GET["cid"]);
		else if($_GET["bid"]==3)
		DeleteSendcard("recreation_society",$_GET["cid"]);
		else if($_GET["bid"]==4)
		DeleteSendcard("recreation_water",$_GET["cid"]);
		else if($_GET["bid"]==5)
		DeleteSendcard("recruit_share",$_GET["cid"]);
		else if($_GET["bid"]==6)
		DeleteSendcard("project_business",$_GET["cid"]);
		else if($_GET["bid"]==7)
		DeleteSendcard("project_share",$_GET["cid"]);
		else if($_GET["bid"]==8)
		DeleteSendcard("project_help",$_GET["cid"]);
		 echo"<script language=\"javascript\" type=\"text/javascript\">
           window.location.href=\"wdzy.html?sid=".$_GET["sid"]."\"; 
    </script>";

	}
}
else
{
	$account="images";
	header("location:login.html");
}
?>