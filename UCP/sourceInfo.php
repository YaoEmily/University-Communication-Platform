<?php
 header('Content-type:text/html; charset=utf-8');
$id=$_GET['id'];
@ $con = mysqli_connect('localhost','root','hhh19950129');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,"uni_com_platform" );
mysqli_query($con,"set names utf8"); 
$sql="select * from pocess,source where sourceID=Id and sourceID=".$id;

$result = mysqli_query($con,$sql);
while($row =  mysqli_fetch_array($result))
  {
    $back = array(
    'User' =>$row[0],
    'name'=>$row[3],
    'type'=>$row[4],
    'size'=>$row[5],
    'title'=>$row[6],
    'point'=>$row[7],
    'content'=>$row[8]
    );

  }

    mysqli_close($con);
echo json_encode($back);
?>