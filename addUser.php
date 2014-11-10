<?php
	header("Content-Type:text/html; charset=utf-8");
	
	$account="";
	$password="";
	$type="";
	$account=$_POST['act'];
	$password=$_POST['pwd'];
	$type=$_POST['selected'];
	echo $account.$password.$type;
	
	include_once('connections/connDB.php');
		$query = "INSERT INTO  netcompservice.user(account,pwd,level)VALUES('$account','$password',$type)";
		mysql_query($query);
?>