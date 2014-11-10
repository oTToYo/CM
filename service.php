<!DOCTYPE HTML> 
<?php

SESSION_START();

header("Content-Type:text/html; charset=utf-8");




//echo $_SESSION['uname'];
?>


<html class="no-js" lang="zh-TW">
<head>
    <meta charset="utf-8">

    <title>service</title>
    <meta name="description" content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- build:css styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.13.0/css/semantic.min.css">
    <!-- endbower -->
    <!-- endbuild -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,vietnamese' rel='stylesheet' type='text/css'>

    <!-- build:css styles/main.css -->
    <link rel="stylesheet" href="homepage.css">
    <!-- endbuild -->
</head>
<body>

    <div class="ui page grid">
        <div class="computer tablet only row">
            <div class="ui inverted menu navbar">
                <a href="" class="brand item">權限管理系統</a>
                <a href="" class="active item">宗旨</a>
                <a href="" class="item">相關網站</a>
                <a class="ui dropdown item">服務項目
                  <i class="dropdown icon"></i>
                  <div class="menu">
				  <?php
					include_once('connections/connDB.php');
					$name = $_SESSION['uname'];
					$lev = $_SESSION['level'];
					$query = "select name,content from priviledge natural join module where level >='$lev' ";
					$result = mysql_query($query);
					while($row_result = mysql_fetch_assoc($result))
					{
						//foreach($row_result as $item)
							echo "<div class='item' onclick=\"location.href= '".$row_result['content']."'\">".$row_result['name']."</div>";
					}
					
					
				  ?>
                    <!--<div class="item">帳號停用管理</div>
                    <div class="item">使用者權限管理</div>
                    <div class="item">其他</div>-->
                   
                  </div>

                </a>
                <div class="right menu">
                    <a href="" class="active item">介紹</a>
                    <a href="" class="item">連絡我們</a>
                    <a href="" class="item">登出</a>
                </div>
            </div>
        </div>
        <div class="mobile only narrow row">
            <div class="ui inverted navbar menu">
                <a href="" class="brand item">權限管理系統</a>
                <div class="right menu open">
                    <a href="" class="menu item">
                        <i class="reorder icon"></i>
                    </a>
                </div>
            </div>
            <div class="ui vertical navbar menu">
                <a href="" class="brand item">權限管理系統</a>
                <a href="" class="active item">宗旨</a>
                <a href="" class="item">相關網站</a>
                <div class="ui item">
                    <div class="text">服務項目</div>
                    <div class="menu">
                        <div class="item">帳號停用管理</div>
						<div class="item">使用者權限管理</div>
						<div class="item">其他</div>
                    </div>
                </div>
                <div class="menu">
                    <a href="" class="active item">介紹</a>
                    <a href="" class="item">連絡我們</a>
                    <a href="" class="item">登出</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column padding-reset">
                <div class="ui large message">
                    <h1 class="ui huge header">Welcome to Network computing Center</h1>
                    <p>今天天氣不錯....</p>
                    <a href="" class="ui blue button">看更多 &raquo;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- build:js scripts/vendor.js -->
    <!-- bower:js -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.13.0/javascript/semantic.min.js"></script>
    <script src="homepage.js"></script>
    <!-- endbower -->
    <!-- endbuild -->
</body>
</html>