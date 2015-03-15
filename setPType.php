<?php 

	$typeName="";
	$levelNum="";
	$typeName=$_POST['typeName'];
	$levelNum=$_POST['levelNum'];
	
	include_once('connections/connDB.php');
		$query = "INSERT INTO  netcompservice.priviledge_type(name,level)VALUES('$typeName','$levelNum')";
		$result = mysql_query($query, $link_ID) or die(mysql_error());
		
?>