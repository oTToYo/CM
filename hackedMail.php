<?php
SESSION_START();
header("Content-Type:text/html; charset=utf-8");
$uname = $_SESSION['uname'];
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<title>hackMailManagemt</title>

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" type="text/css" class="ui" href="../packaged/css/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
	
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link href="css/latoja.datepicker.css" rel="stylesheet">
	<link href="css/jquery-ui-1.10.1.css" rel="stylesheet" >
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	
	<script src="../packaged/javascript/jquery.min.js"></script>
	<script src="../packaged/javascript/semantic.js"></script>
	
	<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
	
	<script src="homepage.js"></script>
	<script>
		$( document ).ready(function() 
		{
			
			
			$('tbody').on('click','.ui.toggle.button',function()
			{
				$(this).toggleClass("active");
				$(this).parent().parent().toggleClass("positive changed");
				//$(this).parent().parent().toggleClass("changed");
				$(this).siblings("i").toggleClass("checkmark ");				
				if ($(this).text() == "check") 
					$(this).text("checked");
				else
					$(this).text("check");
			});
			
			$('tbody').on('click','.ui.button.removeBtn',function()
			{
				
				$(this).parent().parent().remove();
				
			});
			
			$('tbody').on('click','.ui.button.delBtn',function()
			{
				$(this).toggleClass("red");
				$(this).siblings("i.delete").css("color","red");
				//if(($(this).parent().parent().hasClass("changed"))==false)
					$(this).parent().parent().toggleClass("delR");
			});
			
			
			
			$( "#add" ).on( "click", function()
			{
	
				$('#addform').modal('show');
			});
			
		
		
			$("#prepend").on("click",function()
			{
				var d = new Date(); 
				var year = d.getFullYear();
				var month = d.getMonth()+1; 
				var day = d.getDate(); 
				
				var time = year + '-' + 
				 (month<10 ? '0' : '') + month + '-' + 
				 (day<10 ? '0' : '') + day;
			
				var $tr = $("<tr/>");
				$tr.addClass("newAdd");
				//$("tbody").prepend('<tr class=\'newAdd\'></tr>');
				//$tr.prepend('<td>'+time+'</td>');
				var $data  = $('.addCount');
				$data.each(function()
				{
					$tr.append('<td>'+$(this).val()+'</td>');
				})
				$tr.append("<td><i class=\"icon\"></i><div class=\"ui toggle button\">check</div><i class=\"icon delete\" style=\"color:red\"></i><div class=\" ui orange button removeBtn\">remove</div></td>");
				$("#listCnt").prepend($tr);
			//$("tbody").prepend("")
		});
			
			$("#search").on("click",function()
			{
				$input = $(".ui.left.icon.input > input");
				var searchName = $input.val();
				searchName = searchName.toLowerCase();
				
				$allTr = $("tbody >tr");
				
				$allTr.each(function()
				{
					$accField= $(this).children("td:eq(1)");
					var acc = $accField.text();
					//alert(acc);
					if(acc.match(searchName)!=null)
					{
						if($(this).css("display")=="none")
							$(this).removeAttr("style");
							//alert("1");
							
					}
					else
						$(this).css("display","none");
				
				});
			
			})
		
			
			
			$("#save").on("click",function()
			{
			    var delArr =[];
				$delTr = $(".delR");
				$delTr.each(function()
				{
					$addTd = $(this).children("td:eq(1)");
					delArr.push($addTd.text());
						
				});
				
				var changeArr = [] ;
				
				$changedTr = $(".changed:not(.delR)");
				
				$changedTr.each(function()
				{
						$allTd = $(this).children("td");
						var allField = [];
						$allTd.each(function()
						{
							
							//alert($(this).text());
							allField.push($(this).text());
						})
						changeArr.push(allField);
				})
					
				var newArr = [];
				$newTr = $(".newAdd");
				$newTr.each(function()
				{
						$newAllTd = $(this).children("td");
						var allField = [];
						$newAllTd.each(function()
						{
							
							//alert($(this).text());
							allField.push($(this).text());
						})
						newArr.push(allField);
						//alert(JSON.stringify(allField));
				})
				
					//for(var i=0;i<newArr.length;i=i+1)
						//for(var j=0;j<newArr[i].length;j=j+1)
							//alert(newArr[i][j]);
				
				
				$.ajax
				({
					url: 'hackedMailSave.php',
					cache: false,
					dataType: 'html',
					type:'POST',
					data: { change:JSON.stringify(changeArr) ,del:JSON.stringify(delArr),add: JSON.stringify(newArr)},
					error: function(xhr) 
					{
					   alert('Ajax request 發生錯誤');
					},
					success: function(response) 
					{ 
						alert(response);
					}
				});
			});
			
			
			
			
		$( ".datepicker" ).datepicker
		({dateFormat:"yy-mm-dd",showMonthAfterYear:true});
		
		/*$("#export").on("click",function()
		{
			var exportName = $("#exportName").attr("value");
			if(exportName=="")
			{
				alert("空");
			}
			else
			{
			
			$.ajax
				({
					url: 'export.php',
					cache: false,
					dataType: 'html',
					type:'POST',
					data: { name:exportName},
					error: function(xhr) 
					{
					   alert('Ajax request 發生錯誤');
					},
					success: function(response) 
					{ 
						alert(response);
					}
				});
			
			}
		
		});*/	
			
			
		
		
		
		});

 
    
  
		
	</script>


</head>
<body>
<div class="ui segment">
<div class="ui left icon input ">
  <input type="text" placeholder="Search users...">
  <i class="users icon"></i>

</div>
  <button id="search" class="ui button">Search</button>
  <form method="post" action="export.php"></form>
<input id="exportName" type="hidden" name="export" value="">
<button id="export" class="ui button">export</button>
</div>




<table class="ui table segment">
      <thead>
        <tr><th>日期</th>
        <th>帳號</th>
        <th>帳號類型</th>
		<th>IP位址</th>
		<th>備註</th>
		<th>狀態</th>
		
      </tr></thead>
      <tbody id="listCnt">
        <?php
			include_once('connections/connDB.php');
			$query = "select date,account,type,ip,notes,checked from hackedMail";
			$result = mysql_query($query);
			
			$lvQuery = "select ulevel from hackmailuser where account = '$uname'";
			$lvResult = mysql_query($lvQuery);
			$lv_result = mysql_fetch_assoc($lvResult);
			$modelLv = $lv_result['ulevel'];
			
			while($row_result = mysql_fetch_assoc($result))
			{
				if($row_result['checked']==1)
					echo "<tr class='positive'>";
				else
					echo "<tr>";
				foreach($row_result as $key => $value)
				{
					
					if($key=="checked")
					{
						if($value==0)
							echo  "<td><i class=\"icon\"></i><div class=\"ui toggle button\">check</div>";
						elseif($value==1)
							echo  "<td><i class=\"icon checkmark\"  ></i><div class=\"ui toggle button active\">checked</div>";
							
							if($modelLv==0)
								echo "<i class=\"icon delete\" style=\"color:gray\"></i><div class=\" ui button delBtn\">delete</div></td>";
							else
								echo"</td>";
						
					}
					else
						echo "<td>".$value."</td>";
				}
				//if()
				echo "</tr>";
			}	
				
		?>
        <!--<tr >
          <td >Jimmy</td>
          <td>Approved</td>
          <td>None</td>
		  <td><div class="ui form">
			<div class="field">
			<textarea></textarea>
			</div>
			</div></td>
		  <td><i class="remove icon"></i><div class="ui button">delete</div></td>
        </tr>
        <tr>
          <td>Jamie</td>
          <td>Unknown</td>
          <td class="negative"><i class="icon close"></i> Requires call</td>
        </tr>
        -->
      </tbody>
    </table>
	<?php 
		if($modelLv==0)
			echo"<i class=\"add icon\"></i><div class=\"ui button\" id=\"add\">add</div>";
	?>
	
	<i class="save icon"></i><div class="ui button" id="save">save</div>
	<!--add dialog form -->
	<div class="ui modal" id="addform">
	  <i class="close icon"></i>
	  <div class="header">
		新增停用帳號
	  </div>
		  <div class="content">
			<form class="ui form segment">
				
				<div class="field">
				<label>date</label>
				<input class="addCount datepicker ll-skin-latoja"  name="act" type="text">
			  </div>
				<p></p>
			  <div class="field">
				<label>account</label>
				<input class="addCount" placeholder="account" name="act" type="text">
			  </div>
				<p></p>
				<div class="field">
				<label>type</label>
				<input class="addCount" placeholder="type" name="act" type="text">
			  </div>
				<p></p>
				<div class="field">
				<label>ip</label>
				<input class="addCount" placeholder="ip" name="act" type="text">
			  </div>
				<p></p>
				<div class="field">
				<label>備註</label>
				<input class="addCount" placeholder="notes" name="act" type="text">
			  </div>
			 
		</form>
	  </div>
	  <div class="actions">
		<div class="ui button">
		  Cancel
		</div>
		<button class="ui button" id="prepend">
		  Okay
		</button>
	  </div>
	</div>
	
</body>

</html>