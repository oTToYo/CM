<?php 

	$add="";
	$del="";
	$change="";
	$add=json_decode($_POST['add']);
	$del=json_decode($_POST['del']);
	$change=json_decode($_POST['change']);
	
	print_r($change);
	include_once('connections/connDB.php');
	//add
		foreach($add as $value)
		{
			$ch=0;
			if((strpos($value[5],"hecked"))!=false)
			$ch=1;
			
			$query = "INSERT INTO  netcompservice.hackedmail(date,account,type,ip,notes,checked)VALUES('$value[0]','$value[1]','$value[2]','$value[3]','$value[4]',$ch)";
			$result = mysql_query($query, $link_ID) or die(mysql_error());
		}
	//delete
		foreach($del as $value)
		{
			$query = "DElETE FROM  netcompservice.hackedmail WHERE hackedmail.account='$value'";
			$result = mysql_query($query, $link_ID) or die(mysql_error());
		}
		
	//change
		foreach($change as $value)
		{
			$ch=0;
			echo (strpos($value[5],"hecked"));
			if((strpos($value[5],"hecked"))!=false)
			{
			echo "dd";
			$ch=1;
			}
			
			
			$query = "UPDATE netcompservice.hackedmail SET hackedmail.checked=$ch WHERE hackedmail.account='$value[1]'";
			$result = mysql_query($query, $link_ID) or die(mysql_error());
		}
		
?>