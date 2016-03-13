<?php
//$path=$_GET['path'];
function createFolder($path)
{
	if(!file_exists($path))
	{
		createFolder(dirname($path));
		mkdir($path,0777);
//		echo"success<br>";
	}
}
?>