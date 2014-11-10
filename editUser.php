<?php 

	$account="";
	$type="";
	$account=$_POST['act'];
	$type=$_POST['selected'];
	echo $account;
	
	include_once('connections/connDB.php');
		$query = "SELECT account FROM user WHERE account = '$account'";
		$result = mysql_query($query, $link_ID) or die(mysql_error());
		$totalRows = mysql_num_rows($result);
		if($totalRows>0)
		{
			$query = "UPDATE netcompservice.user SET user.level=$type WHERE user.account='$account'";
			$result = mysql_query($query, $link_ID) or die(mysql_error());
		}
?>