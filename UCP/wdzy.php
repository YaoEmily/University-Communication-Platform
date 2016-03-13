<?php
function GetNickName($account)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select * from users where user_account='".$account."'";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["user_nickname"];
	}
}
function GetPoint($account)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select * from users where user_account='".$account."'";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$resultarray=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $resultarray["user_point"];
	}
}
function Registration($account)
{
	ini_set('date.timezone','Asia/Shanghai');
	$time=time();
	$date=date("Y-m-d",$time);
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="insert into registration values('".$account."','".$date."')";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		echo"<script type=\"text/javascript\">alert(\"签到成功！获得2积分\")</script>";
		$change=2;
		ChangePoint($account,$change);
	}
	else
		echo"<script type=\"text/javascript\">alert(\"今天已经签到过了！\")</script>";
}
function GetSendCard($account)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,1 
		 from study_specialty_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,2 
		 from studycom_highgrade_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,3 
		 from recreation_society_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,4 
		 from recreation_water_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,5 
		 from recruit_share_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_description,ssendcard_datetime,6 
		 from project_business_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,7 
		 from project_share_sendcard where ssendcard_users='".$account."' 
		 union select ssendcard_id,ssendcard_users,ssendcard_title,ssendcard_content,ssendcard_datetime,8 
		 from project_help_sendcard where ssendcard_users='".$account."' order by ssendcard_id DESC";
		 //echo $sql;
	$res=mysqli_query($mysqli,$sql);
	//echo "miao".$res;
	if($res)
	{
		$resultarray=array();
		$index=0;
		while($resultarray[$index]=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$index++;
		}
	}
	$index=0;
	while($resultarray[$index])
	{
		if($resultarray[$index]["1"]==1)
		$sql="select count(ssendcard_users) from study_specialty_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==2)
		$sql="select count(ssendcard_users) from studycom_highgrade_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==3)
		$sql="select count(ssendcard_users) from recreation_society_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==4)
		$sql="select count(ssendcard_users) from recreation_water_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==5)
		$sql="select count(ssendcard_users) from recruit_share_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==6)
		$sql="select count(ssendcard_users) from project_business_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==7)
		$sql="select count(ssendcard_users) from project_share_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==8)
		$sql="select count(ssendcard_users) from project_help_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
		$res=mysqli_query($mysqli,$sql);
		$like=mysqli_fetch_array($res,MYSQLI_ASSOC);
		$likenumber=$like["count(ssendcard_users)"];
		if($resultarray[$index]["1"]==1)
		$sql="select count(sfollowcard_id) from study_specialty_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==2)
		$sql="select count(sfollowcard_id) from studycom_highgrade_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==3)
		$sql="select count(sfollowcard_id) from recreation_society_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==4)
		$sql="select count(sfollowcard_id) from recreation_water_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==5)
		$sql="select count(sfollowcard_id) from recruit_share_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==6)
		$sql="select count(sfollowcard_id) from project_business_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==7)
		$sql="select count(sfollowcard_id) from project_share_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==8)
		$sql="select count(sfollowcard_id) from project_help_followcard where sfollowcard_sendcard_id=".$resultarray[$index]["ssendcard_id"];
		$res=mysqli_query($mysqli,$sql);
		$commit=mysqli_fetch_array($res,MYSQLI_ASSOC);
		$commitnumber=$commit["count(sfollowcard_id)"];
		if($resultarray[$index]["1"]==1)
		$link="studycom_specialty_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==2)
		$link="studycom_highgrade_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==3)
		$link="recreation_society_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==4)
		$link="recreation_water_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==5)
		$link="recruit_share_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==6)
		$link="project_business_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==7)
		$link="project_share_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		else if($resultarray[$index]["1"]==8)
		$link="project_help_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"];
		$content=mb_substr($resultarray[$index]["ssendcard_content"] , 0 , 125); 
		echo"<li>";
		echo"<div class=\"post-title\"><a href=\"".$link."\">".$resultarray[$index]["ssendcard_title"]."</a></div>";
		echo"<div class=\"post-details\">Posted at ".$resultarray[$index]["ssendcard_datetime"]." <span>|</span> <img src=\"images/comment.png\" alt=\"\">".$commitnumber."，❤ ".$likenumber." <span>|</span> <img src=\"images/permalink.png\" alt=\"\">";
		if($resultarray[$index]["1"]==1)
		echo"<a href=\"studycom_specialty.html?sid=".$_GET["sid"]."\">专业交流</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=1&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==2)
		echo"<a href=\"studycom_highgrade.html?sid=".$_GET["sid"]."\">升学交流</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=2&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==3)
		echo"<a href=\"recreation_society.html?sid=".$_GET["sid"]."\">社会百变</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=3&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==4)
		echo"<a href=\"recreation_water.html?sid=".$_GET["sid"]."\">灌水专区</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=4&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==5)
		echo"<a href=\"recruit_share.html?sid=".$_GET["sid"]."\">经验交流</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=5&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==6)
		echo"<a href=\"project_business.html?sid=".$_GET["sid"]."\">项目商机</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=6&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==7)
		echo"<a href=\"project_share.html?sid=".$_GET["sid"]."\">成功分享</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=7&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		else if($resultarray[$index]["1"]==8)
		echo"<a href=\"project_help.html?sid=".$_GET["sid"]."\">困难帮手</a> <span style=\"float:right\"><a href=\"deletesendcard.php?sid=".$_GET["sid"]."&bid=8&cid=".$resultarray[$index]["ssendcard_id"]."\">删除</a></span>";
		echo"<p>".$content."</p>";
		if($resultarray[$index]["1"]==1)
		$sql="select slabel_name from study_label where slabel_id in
			(select slabel_id from study_specialty_cardlabel where ssendcard_id=".$resultarray[$index]["ssendcard_id"].")";
		else if($resultarray[$index]["1"]==2)
		$sql="select slabel_name from school_label where slabel_id in
			(select slabel_id from studycom_highgrade_cardlabel where ssendcard_id=".$resultarray[$index]["ssendcard_id"].")";
		else if($resultarray[$index]["1"]==5)
		$sql="select slabel_name from employ_label where slabel_id in
			(select slabel_id from recruit_share_cardlabel where ssendcard_id=".$resultarray[$index]["ssendcard_id"].")";
		$res=mysqli_query($mysqli,$sql);
					echo"<ul>";
					while($label=mysqli_fetch_array($res,MYSQLI_ASSOC))
					{
						echo"<li>#".$label["slabel_name"]."#</li>";
					}
				  		
				  	echo"</ul>";
							echo"</div>";
						echo"</li>";
		$index++;
	}
}
function ChangePoint($account,$change)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select user_point from users where user_account='".$account."'";
	$res=mysqli_query($mysqli,$sql);
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	//echo"<script type=\"text/javascript\">alert(\"".$change."\")</script>";
	$change=$change+$result["user_point"];
	$sql="update users set user_point=".$change." where user_account='".$account."'";
	$res=mysqli_query($mysqli,$sql);
}
function DeleteSendcard($name,$cardid)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="delete from ".$name."_like where ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	$sql="delete from ".$name."_cardlabel where ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	$sql="delete from ".$name."_followcard where sfollowcard_sendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	$sql="delete from ".$name."_sendcard where ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	echo"<script type=\"text/javascript\">alert(\"删帖成功！\")</script>";
	else
	echo"<script type=\"text/javascript\">alert(\"删帖失败！\")</script>";
}
function UpdateUsers($account,$nickname,$password,$age,$province,$school,$specialty,$grade)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="update users set user_nickname='".$nickname."',user_password='".$password."',user_age=".$age.",user_province='".$province."',user_school='".$school."',user_speciality=".$specialty.",user_grade=".$grade." where user_account='".$account."'";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		return true;
	}
	else return false;
}
function ShowUsers($account)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select * from users where user_account='".$account."'";
	$res=mysqli_query($mysqli,$sql);
	$array=mysqli_fetch_array($res,MYSQLI_ASSOC);
	$sql="select specialties_name from specialties where specialties_id=".$array["user_speciality"];
	$res=mysqli_query($mysqli,$sql);
	$specialty=mysqli_fetch_array($res,MYSQLI_ASSOC);
	if($array["user_sex"]==1)
		$sex="男";
	else
		$sex="女";
	echo"<ul>";
	echo"<li>姓名:".$array["user_name"]."</li>";
	echo"<li>年龄:".$array["user_age"]."</li>";
	echo"<li>性别:".$sex."</li>";
	echo"<li>省份:".$array["user_province"]."</li>";
	echo"<li>学校:".$array["user_school"]."</li>";
	echo"<li>专业:".$specialty["specialties_name"]."</li>";
}
?>