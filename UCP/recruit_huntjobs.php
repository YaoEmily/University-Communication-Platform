<?php

function Identify($account,$password)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select * from users where user_account='".$account."' and user_password='".$password."'";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator = mysqli_fetch_array($res,MYSQLI_ASSOC);
		if(!$administrator)
		{
			return false;
		}
		else return $administrator["user_account"];
	}
	else 
	{
		return false;
	}
}
function Register($username,$password,$school,$name,$nickname,$age,$sex,$province,$province,$specialty,$grade,$point)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	settype($sex,'integer');
	settype($specialty,'integer');
	settype($age,'integer');
	settype($grade,'integer');

	$sql="insert into users values ('".$username."','".$password."','".$nickname."','".$province."','".$school."',".$specialty.",".$sex.",'".$name."',".$age.",".$grade.",'".$point."')";
	$res=mysqli_query($mysqli,$sql);
	if (!$res) {
 		printf("Error: %s\n", mysqli_error($mysqli));
 		exit();
	}
	if($res)
	{
		 return true;
	}
	else 
	{
		return false;
	}
}
function SetHeadimg($username)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="insert into image_sql values(null, '".$username."', 'headimg1.jpg','headimg1.jpg',);";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator = mysqli_fetch_array($res,MYSQLI_ASSOC);
		if(!$administrator)
		{
			return false;
		}
		else return $administrator["user_account"];
	}
	else 
	{
		return false;
	}
}

function GetUsername($account)
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
		return $administrator["user_account"];
	}
	return false;
}
function GetName($account)
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
		return $administrator["user_name"];
	}
	return false;
}
function GetSchool($account)
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
		return $administrator["user_school"];
	}
	return false;
}

function GetSex($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_sex"];
	}
	return false;
}

function GetEdu($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_education"];
	}
	return false;
}

function GetNation($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_nation"];
	}
	return false;
}

function GetHeight($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_height"];
	}
	return false;
}
function GetBirth($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_birthday"];
	}
	return false;
}

function GetHometown($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_hometown"];
	}
	return false;
}
function GetIdnum($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_idnumber"];
	}
	return false;
}
function GetAccL($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_accountlocation"];
	}
	return false;
}
function GetMarried($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_married"];
	}
	return false;
}
function GetSpe($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_specialty"];
	}
	return false;
}

function GetGratime($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_graduationtime"];
	}
	return false;
}

function GetPolities($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_politics"];
	}
	return false;
}
function GetAddress($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_address"];
	}
	return false;
}
function GetExp($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_experience"];
	}
	return false;
}

function GetSelf($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_selfevaluation"];
	}
	return false;
}
function GetTel($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_tel"];
	}
	return false;
}
function GetEmail($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_email"];
		return $administrator[""];
	}
	return false;
}
function GetQQ($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_qq"];
		return $administrator[""];
	}
	return false;
}
function GetSchool1($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_school"];
	}
	return false;
}
function GetName1($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_name"];
	}
	return false;
}

function GetMobile($cardid)
{
	header ( "Content-Type: text/html; charset=utf8" );
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select ssendcard_id,ssendcard_users,ssendcard_name,ssendcard_sex,ssendcard_education,
		ssendcard_nation,ssendcard_height,ssendcard_birthday,ssendcard_hometown,ssendcard_idnumber,
		ssendcard_accountlocation,ssendcard_married,ssendcard_school,ssendcard_specialty,
		ssendcard_graduationtime,ssendcard_politics,ssendcard_address,ssendcard_experience,
		ssendcard_selfevaluation,ssendcard_mobile,ssendcard_tel,ssendcard_email,ssendcard_qq 
		from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	$res=mysqli_query($mysqli,$sql);
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		$administrator=mysqli_fetch_array($res,MYSQLI_ASSOC);
		return $administrator["ssendcard_mobile"];
	}
	return false;
}
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
function PrintLabel($formname,$nickname)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select * from ".$formname;
	$res=mysqli_query($mysqli,$sql);
	if($res&&$formname=="school_label")
	{
		while($labelarray=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
				$labelid=$labelarray['slabel_id'];
				$labelname=$labelarray['slabel_name'];
				if($nickname!="未登录")
				echo"<li><a href=\"recruit_huntjobs.html?sid=".$_GET["sid"]."&lid=".$labelid."\"><i class=\"blog_icon4\"> </i><span>".$labelname."</span></a></li>";
				else
				echo"<li><a href=\"recruit_huntjobs.html?lid=".$labelid."\"><i class=\"blog_icon4\"> </i><span>".$labelname."</span></a></li>";
		}
	}
	//mysqli_close($res);
}
function SelectLabel($formname)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="select * from ".$formname;
	$res=mysqli_query($mysqli,$sql);
	if($res&&$formname=="school_label")
	{
		while($labelarray=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
				$labelid=$labelarray['slabel_id'];
				$labelname=$labelarray['slabel_name'];
			echo"<li><span>
					<input type=\"checkbox\" name=\"label[]\" value=\"".$labelid."\"/>".$labelname."</span></li>";
		}
	}
}

function GetSendCard($formname,$nickname)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	if(!isset($_GET["lid"]))
	{
		if($formname=="recruit_huntjobs_sendcard")
		$sql="select ssendcard_id,user_account,ssendcard_name,user_nickname,ssendcard_sex,ssendcard_education,ssendcard_school,ssendcard_experience from recruit_huntjobs_sendcard,users where ssendcard_users=user_account order by ssendcard_id DESC";
		$res=mysqli_query($mysqli,$sql);
	}
	if($res&&$formname=="recruit_huntjobs_sendcard")
	{
		$resultarray=array();
		$index=0;
		while($resultarray[$index]=mysqli_fetch_array($res,MYSQLI_ASSOC))
		{
			$index++;
		}
		$index=0;
		while($resultarray[$index])
		{
			$name=$resultarray[$index]["ssendcard_name"];
			$user_nickname=$resultarray[$index]["user_nickname"];
			$content=mb_substr($resultarray[$index]["ssendcard_experience"] , 0 , 125);
			$education=$resultarray[$index]["ssendcard_education"];
			$school=$resultarray[$index]["ssendcard_school"];
			$sex=$resultarray[$index]["ssendcard_sex"];
			echo "<li>";
			
			echo "<img src=\"".$resultarray[$index]["user_account"]."\headImg.jpg\" alt=\"\"/ style=\"height:135px; width:113px\">";
			if($nickname!="未登录")
			echo "<h3><a href=\"recruit_huntjobs_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"]."\"><strong>".$name."</strong></a></h3></br>";
			else
			echo "<h3><a href=\"recruit_huntjobs_browse.html?cid=".$resultarray[$index]["ssendcard_id"]."\"><strong>".$name."</strong></a></h3></br>";
			echo"<div class=\"links_ss\"><ul>";
			
			echo "<li>".$sex."<i>|</i></li>";
			echo "<li>".$education."<i>|</i></li>";
			echo "<li>".$school."<i>|</i></li>";
		
			echo "</ul><p>";
			echo $content;
			echo "</p></div></li>";
			echo "<hr/>";
			$index++;
		}
	}
}

function like($cardid)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	$sql="insert into recruit_huntjobs_like values(".$cardid.",'".$_SESSION["account"]."')";
	$res=mysqli_query($mysqli,$sql);
	if($res)
		return true;
	else
		return false;
}

function ShowSendCard($formname,$cardid)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	if($formname=="recruit_huntjobs_sendcard")
	{
		$sql="select ssendcard_id,user_account,user_nickname,ssendcard_title,ssendcard_datetime,ssendcard_school,ssendcard_place,ssendcard_people,ssendcard_description,ssendcard_requirement,ssendcard_mobile,,ssendcard_phone,ssendcard_email,ssendcard_qq from recruit_huntjobs_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	}
	$res=mysqli_query($mysqli,$sql);
	if($res&&$formname=="recruit_huntjobs_sendcard")
	{
		$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
		echo "<h3>".$result["ssendcard_title"]."</h3>";
		echo"<div class=\"extra\">";
		echo $result["ssendcard_datetime"] ."/ BY <span class=\"username\">".$result["user_nickname"]."</span>";  
					
				echo" </div>";
				echo"<div class=\"stripe-scarf3—_jpg\"><img src=\"".$result["user_account"]."\/headImg.jpg\" class=\"img-responsive\" alt=\"\" style=\"height:150px;width:140px;\"/></div>";
				echo"<pre>".$result["ssendcard_content"]."</pre>";
	}
}

function ShowFollowCard($formname,$cardid)
{
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	if($formname=="recruit_huntjobs_followcard")
	$sql="select user_nickname,sfollowcard_content,sfollowcard_datetime 
		 from recruit_huntjobs_followcard,users where sfollowcard_users=user_account and sfollowcard_sendcard_id=".$cardid." order by sfollowcard_id";
	$res=mysqli_query($mysqli,$sql);
	if($res)
	{
		while($result=mysqli_fetch_array($res,MYSQLI_ASSOC))
		echo"<li><p><span><strong>".$result["user_nickname"]."</strong> at ".$result["sfollowcard_datetime"]."<strong>：</strong></span>".$result["sfollowcard_content"]."</p></li>";
	}

}
function SendCard($formname)
{
	ini_set('date.timezone','Asia/Shanghai');
	$time=time();
	$datetime=date("Y-m-d H:i:s",$time);
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	if($formname=="recruit_huntjobs_sendcard")
	{
		$sql="insert into recruit_huntjobs_sendcard values(null,'".$_SESSION["account"]."',
			'".$_POST["name"]."','".$_POST["sex"]."','".$_POST["education"]."','".$_POST["nation"]."',
			'".$_POST["height"]."',	'".$_POST["birth"]."','".$_POST["hometown"]."','".$_POST["idnum"]."',
			'".$_POST["acclocation"]."','".$_POST["married"]."','".$_POST["school"]."',
			'".$_POST["edutime"]."','".$_POST["specialty"]."','".$_POST["politics"]."',
			'".$_POST["address"]."','".$_POST["experience"]."','".$_POST["selfeva"]."',
			'".$_POST["mobile"]."','".$_POST["tel"]."','".$_POST["email"]."','".$_POST["qq"]."',
			'".$datetime."')";
//echo $sql;
		$res=mysqli_query($mysqli,$sql);
		if($res)
		{
			$sql="select max(ssendcard_id) from recruit_huntjobs_sendcard";
			$res=mysqli_query($mysqli,$sql);
			if($res&&isset($_POST["label"]))
			{

				$card=mysqli_fetch_array($res,MYSQLI_ASSOC);
				foreach($_POST["label"] as $label)
				{
					$sql="insert into recruit_huntjobs_cardlabel values(".$card["max(ssendcard_id)"].",".$label.")";
					$res=mysqli_query($mysqli,$sql);
				}
				if($res)
					return true;
			}
			else if($res&&!isset($_POST["label"]))
			return true;
		}
		return false;
	}
}
function FollowCard($formname,$cardid)
{
	ini_set('date.timezone','Asia/Shanghai');
	$time=time();
	$datetime=date("Y-m-d H:i:s",$time);
	$mysqli=mysqli_connect("localhost","root","hhh19950129","uni_com_platform");
	if(mysqli_connect_error())
	{
		Printf("Connection failed:%s\n",mysqli_connect_error());
		exit;
	}
	$mysqli->query("SET NAMES utf8");
	if($formname=="recruit_huntjobs_followcard")
	{
		$sql="insert into recruit_huntjobs_followcard values(null,".$cardid.",'".$_SESSION["account"]."','".$_POST["followcard"]."','".$datetime."')";
		$res=mysqli_query($mysqli,$sql);
		if($res)
			return true;
	}
	else return false;
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
?>