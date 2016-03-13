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
				echo"<li><a href=\"studycom_highgrade.html?sid=".$_GET["sid"]."&lid=".$labelid."\"><i class=\"blog_icon4\"> </i><span>".$labelname."</span></a></li>";
				else
				echo"<li><a href=\"studycom_highgrade.html?lid=".$labelid."\"><i class=\"blog_icon4\"> </i><span>".$labelname."</span></a></li>";
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
		if($formname=="studycom_highgrade_sendcard")
		$sql="select ssendcard_id,user_account,user_nickname,ssendcard_title,ssendcard_content,ssendcard_datetime 
		 from studycom_highgrade_sendcard,users where ssendcard_users=user_account order by ssendcard_id DESC";
		$res=mysqli_query($mysqli,$sql);
		
	}
	else
	{
		if($formname=="studycom_highgrade_sendcard")
		$sql="select ssendcard_id,user_account,user_nickname,ssendcard_title,ssendcard_content,ssendcard_datetime 
		 from studycom_highgrade_sendcard,users where ssendcard_users=user_account 
		 and ssendcard_id in (select ssendcard_id from studycom_highgrade_cardlabel where slabel_id=".$_GET["lid"].")order by ssendcard_id DESC";
		$res=mysqli_query($mysqli,$sql);
		
	}
	if($res&&$formname=="studycom_highgrade_sendcard")
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
			echo"<hr/>";
			$content=mb_substr($resultarray[$index]["ssendcard_content"] , 0 , 125); 
			echo"<li>";
			echo"<img src=\"".$resultarray[$index]["user_account"]."\headImg.jpg\" alt=\"\"/ style=\"height:135px; width:113px\">";
			if($nickname!="未登录")
			echo"<h3><a href=\"studycom_highgrade_browse.html?sid=".$_GET["sid"]."&cid=".$resultarray[$index]["ssendcard_id"]."\"><strong><i>".$resultarray[$index]["ssendcard_title"]."</i></strong></a></h3>";
			else
			echo"<h3><a href=\"studycom_highgrade_browse.html?cid=".$resultarray[$index]["ssendcard_id"]."\"><strong><i>".$resultarray[$index]["ssendcard_title"]."</i></strong></a></h3>";
			echo"<p>".$content."</p>";
			$sql2="select count(ssendcard_users) from studycom_highgrade_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"];
			$res2=mysqli_query($mysqli,$sql2);
			$likecount=mysqli_fetch_array($res2,MYSQLI_ASSOC);
			echo"<span>❤ ".$likecount["count(ssendcard_users)"]."</span>";
			echo"<div class=\"content_middle_desc\">";
			echo"<div class=\"content_search\">";
			if($nickname!="未登录")
			{
				$sql2="select * from studycom_highgrade_like where ssendcard_id=".$resultarray[$index]["ssendcard_id"]." and ssendcard_users='".$_SESSION["account"]."'";
				$res2=mysqli_query($mysqli,$sql2);
				echo"<form action=\"".$_SERVER["PHP_SELF"]."?sid=".$_GET["sid"]."\" method=\"POST\">";
				
				if(!mysqli_fetch_array($res2,MYSQLI_ASSOC))
				{
				
					echo"<input type=\"hidden\" name=\"cardid\" value=\"".$resultarray[$index]["ssendcard_id"]."\">";
					echo"<input type=\"submit\" value=\"点赞\">";
				}
				else
				echo"<input type=\"submit\" value=\"已赞\" disabled=\"disabled\">";	
			}
			else
			{
				echo"<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"POST\">";
				echo"<input type=\"hidden\" name=\"cardid\" value=\"".$resultarray[$index]["ssendcard_id"]."\">";
				echo"<input type=\"submit\" value=\"点赞\">";
			}
				echo"</form>";
				echo"</div>";
				echo"</div><br/>";
				echo"<h3 class=\"zy_name\">".$resultarray[$index]["user_nickname"]."</h3>";
			$sql2="select slabel_name from school_label where slabel_id in
			(select slabel_id from studycom_highgrade_cardlabel where ssendcard_id=".$resultarray[$index]["ssendcard_id"].")";
			$res2=mysqli_query($mysqli,$sql2);
			if($res2)
			{
				echo"<div class=\"links_s\">";
					echo"<div class=\"links\">";
				  	echo" <ul>";
				  		echo"<li><a href=\"#\"><i class=\"blog_icon1\"> </i>";
				  		echo $resultarray[$index]["ssendcard_datetime"];
                        echo"</a></li>";
                        while($sendcardlabel=mysqli_fetch_array($res2,MYSQLI_ASSOC))
				  		echo"<li><a href=\"#\"><i class=\"blog_icon4\"> </i>".$sendcardlabel["slabel_name"]."</a></li>";
				  	 echo"</ul>";
			      echo"</div>";
			      echo"</div>";

			echo"</li>";
			}
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
	$sql="insert into studycom_highgrade_like values(".$cardid.",'".$_SESSION["account"]."')";
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
	if($formname=="studycom_highgrade_sendcard")
	{
		$sql="select ssendcard_id,user_account,user_nickname,ssendcard_title,ssendcard_content,ssendcard_datetime from studycom_highgrade_sendcard,users where ssendcard_users=user_account and  ssendcard_id=".$cardid;
	}
	$res=mysqli_query($mysqli,$sql);
	if($res&&$formname=="studycom_highgrade_sendcard")
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
	if($formname=="studycom_highgrade_followcard")
	$sql="select user_nickname,sfollowcard_content,sfollowcard_datetime 
		 from studycom_highgrade_followcard,users where sfollowcard_users=user_account and sfollowcard_sendcard_id=".$cardid." order by sfollowcard_id";
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
	if($formname=="studycom_highgrade_sendcard")
	{
		$sql="insert into studycom_highgrade_sendcard values(null,'".$_SESSION["account"]."','".$_POST["title"]."','".$_POST["content"]."','".$datetime."')";
		$res=mysqli_query($mysqli,$sql);
		if($res)
		{
			$sql="select max(ssendcard_id) from studycom_highgrade_sendcard";
			$res=mysqli_query($mysqli,$sql);
			if($res&&isset($_POST["label"]))
			{

				$card=mysqli_fetch_array($res,MYSQLI_ASSOC);
				foreach($_POST["label"] as $label)
				{
					$sql="insert into studycom_highgrade_cardlabel values(".$card["max(ssendcard_id)"].",".$label.")";
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
	if($formname=="studycom_highgrade_followcard")
	{
		$sql="insert into studycom_highgrade_followcard values(null,".$cardid.",'".$_SESSION["account"]."','".$_POST["followcard"]."','".$datetime."')";
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