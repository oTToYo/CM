<?php 
	header("Content-type: text/x-csv");
	header("Content-Disposition: attachment; filename='output.csv'");
	$name = $_POST["export"];
	include_once('connections/connDB.php');
	
	$query = "SELECT * FROM hackedmail WHERE account like \"%$name%\" or type like \"%$name%\"";
	$result = mysql_query($query, $link_ID) or die(mysql_error());
	$content = "";
	while($row_result = mysql_fetch_assoc($result))
	{
		foreach($row_result as $key => $value)
		{
			
			if($key=="checked")
				$content=$content."$value\n";
			else
				$content=$content."$value,";
		}
	}
	
	//$content = "Column1,Column2,Column3\n";
	//$content = mb_convert_encoding($content , "Big5" , "UTF-8");
	echo $content;
	exit;
?>