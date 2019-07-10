<html>
<head>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
    require 'rb.php';
    
	$localhost = "localhost";
	$db = "karatebean";
	$user = "root";
	$password = "";
    R::setup('mysql:host=127.0.0.1;dbname=karatebean','root','');
    if(!R::testConnection()){
       echo '<script>alert( "There is no connection!" )</script>'; 
    }

	$link = mysqli_connect($localhost, $user, $password, $db) or trigger_error(mysql_error(),E_USER_ERROR);
	mysqli_query($link, "SET NAMES utf8;");?>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">	
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<script src="/js/jquery-3.3.1.slim.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.min.js" ></script>



</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  			<a class="navbar-brand" href="/main.php">KARATE_BASE v.2</a>
		<div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
					<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Новая запись
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="/new/newfight.php">Бой</a>
								<a class="dropdown-item" href="/new/newcompetitions.php">Соревнования</a>
								<a class="dropdown-item" href="/new/newsportsmen.php">Спортсмен</a>
								<a class="dropdown-item" href="/new/newsponsor.php">Спонсор</a>
								<a class="dropdown-item" href="/new/newclub.php">Клуб</a>
								<a class="dropdown-item" href="/new/newtrainer.php">Тренер</a>
								<a class="dropdown-item" href="/new/newjudge.php">Судья</a>
							</div>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/fight.php">Бои</a>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/competitions.php">Соревнования</a>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/sportsmen.php">Спортсмены</a>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/sponsor.php">Спонсоры</a>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/club.php">Клубы</a>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/trainer.php">Тренера</a>
					</li>
					<li class="nav-item">
		        <a class="nav-link" href="/judge.php">Судьи</a>
					</li>
						
		    </ul>
		  </div>
		</nav>
	</header>
</body>
</html>