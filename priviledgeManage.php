<?php
SESSION_START();
header("Content-Type:text/html; charset=utf-8");

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<title>PriviledgeManagemt</title>

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" type="text/css" class="ui" href="../packaged/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
	
	<link rel="stylesheet" type="text/css" href="homepage.css">

	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
	<script src="../packaged/javascript/jquery.min.js"></script>
	<script src="../packaged/javascript/semantic.js"></script>
	<script src="../packaged/javascript/semantic.min.js"></script>
	
	
	<script src="homepage.js"></script>

</head>
<body>
<div class="info message">addUser</div>
<form class="ui form segment" id="addUser" name="addUser" method="post" action="addUser.php">

  <div class="field">
    <label>account</label>
    <input placeholder="Username" name="act" type="text">
  </div>
  <div class="field">
    <label>Password</label>
    <input type="password" name="pwd">
  </div>
  <p>Type</p>
  <div class="ui selection dropdown">
  <input type="hidden" name="selected" value='0'>
		<div class="default text">admin</div>
		<i class="dropdown icon"></i>
		<div class="menu">
		  <?php 
			include_once('connections/connDB.php');
				$query = "select name,level from priviledge_type";
				$result = mysql_query($query);
							while($row_result = mysql_fetch_assoc($result))
							{
								
									echo "<div class='item' data-value='".$row_result['level']."'>".$row_result['name']."</div>";
							}
		  ?>
	
		
		</div>
	</div>
	<p></p>
  <div class="inline field">
    <div class="ui checkbox">
      <input type="checkbox" name="terms">
      <label>I agree to the Terms and Conditions</label>
    </div>
  </div>
  
  <button class="ui blue submit button">Submit</button>

</form> <!--add end -->

<div class="info message">deleteUser</div>
<form class="ui form segment" id="delUser" name="delUser" method="post" action="delUser.php">

  <div class="field">
    <label>account</label>
    <input placeholder="Username" name="act" type="text">
  </div>
	<p></p>

  <button class="ui blue submit button">Submit</button>

</form> <!--delete end -->


<div class="info message">editUser</div>
<form class="ui form segment" id="editUser" name="editUser" method="post" action="editUser.php">

  <div class="field">
    <label>account</label>
    <input placeholder="Username" name="act" type="text">
  </div>
	<p>Type</p>
  <div class="ui selection dropdown">
  <input type="hidden" name="selected" value='0'>
		<div class="default text">admin</div>
		<i class="dropdown icon"></i>
		<div class="menu">
		  <?php 
			include_once('connections/connDB.php');
				$query = "select name,level from priviledge_type";
				$result = mysql_query($query);
							while($row_result = mysql_fetch_assoc($result))
							{
								
									echo "<div class='item' data-value='".$row_result['level']."'>".$row_result['name']."</div>";
							}
		  ?>
	
		</div>
	</div>
	<p></p>
  <button class="ui blue submit button">Submit</button>

</form> <!--edit end -->

<div class="info message">SetPriviledgeType</div>
<form class="ui form segment"  method="post" action="setPType.php">

  <div class="field">
    <label>typeName</label>
    <input placeholder="typeName" name="typeName" type="text">
	<label>level</label>
    <input placeholder="levelNum" name="levelNum" type="text">
  </div>
	<p></p>

  <button class="ui blue submit button">Submit</button>

</form><!--SetPriviledgeType end -->

<div class="info message">SetModelPriviledge</div>
<form class="ui form segment" id="delUser" name="delUser" method="post" action="delUser.php">

  <div class="field">
    <label>modelName</label>
    <input placeholder="modelName" name="act" type="text">
	<label>level</label>
    <input placeholder="levelNum" name="act" type="text">
  </div>
	<p></p>

  <button class="ui blue submit button">Submit</button>

</form>

</body>
</html>