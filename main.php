<?php session_start();
 require_once("connections/MySiteDB.php"); ?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
	<head>
		<style>
			p{
				text-align: center;
			}
			td, tr,th{
				text-align:left;
				height: 20px;
			}
			.st{
				width: 500px;
				height: 500px;
				margin: 1px auto;
			}
			</style>

	</head>
	<body><?php
	                    $tables = R::load('club',1);
                        echo $tables->id_club;
                        echo $tables->name_club;
	?>
		<div class="container-fluid">
			<div class="row">
				<div class="col">
					<p class="lead">Топ самых щедрых спонсоров</p>
				</div>
				<div class="col">
					<p class="lead">Топ-5 самых тяжелых спортсменов</p>
				</div>
				<div class="col">
					<p class="lead">Города с найбольшим кол-ством поражений</p>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<?php
					
						$query = R::getAll('SELECT * FROM `topgeneroussponsors`');

						if(!$query){
							echo '<script>alert( "Запрос топ меценатов провален!" );</script>';				
						}	
						
						echo '<table class="table table-dark table-striped table-hover table-sm">
								<thead><tr>
								<th>Имя</th>
								<th>Кол-ство спонсируемых соревнований</th>
								</tr></thead><tbody>';

						foreach($query as $sponsor){
							echo '<tr><td>'.$sponsor['name']."</td>";
							echo '<td align="center">'.$sponsor['Count']."</td></tr>";
						}
						echo "</tbody></table>";
					?>
				</div>
				<div class="col">
					
					<?php
						$query = R::getAll('SELECT * FROM `top5sportsmenweight`');
						
						if(!$query){
							echo '<script>alert( "Запрос топ-5 тяжелых спортсменов провален!" );</script>';				
						}	
						echo '<table class="table table-dark table-striped table-hover table-sm">
								<thead><tr>
								<th>Имя</th>
								<th>Вес</th>
								</tr></thead><tbody>';

						foreach($query as $sportsman){
							echo '<tr><td>'.$sportsman['name']."</td>";
							echo '<td>'.$sportsman['weight']."</td></tr>";
						}
						echo "</tbody></table>";
					?>
				</div>
				<div class="col">
					
					<?php
					
						$query = R::getAll('SELECT * FROM `townswithdraw`');
						
						if(!$query){
							echo '<script>alert( "Запрос топ городов с найбольшим кол-ством поражений провален!" );</script>';				
						}	
						
						echo '<table class="table table-dark table-striped table-hover table-sm">
								<thead><tr>
								<th>Город</th>
								<th>Количество</th>
								</tr></thead><tbody>';

						foreach($query as $town){
							echo '<tr><td>'.$town['town']."</td>";
							echo '<td>'.$town['fights']."</td></tr>";
						}
						echo "</tbody></table>";
				?>
				</div>
			</div>



			<div class="row">
				<div class="col">
					<p class="lead">Наши клубы</p>
					<?php
						$query = R::getAll('SELECT * FROM `clubs`');
						if(!$query){
							echo '<script>alert( "Запрос клубы провален!" );</script>';				
						}	
						
						echo '<table class="table table-dark table-striped table-hover table-sm"  align="left" style="margin:1px auto;">
								<thead><tr>
								<th>Название</th>
								<th>Местоположение</th>
								</tr></thead><tbody>';

						foreach($query as $club){
							echo '<td>'.$club['name']."</td>";
							echo '<td>'.$club['location']."</td></tr>";
						}
						echo "</tbody></table>";
					?>
				</div>
				<div class="col">
					<p class="lead">Соревнования</p>
					<?php
						$query = R::getAll('CALL typesofCompetition');
						
						if(!$query){
							echo '<script>alert( "Запрос типов соревнований провален!" );</script>';				
						}	
						
						echo '<table class="table table-dark table-striped table-hover table-sm" style="margin:1px auto; align:center;">
								<thead><tr>
								<th>Город</th>
								<th>Тип</th>
								</tr></thead><tbody>';

						foreach($query as $type){
							echo '<td>'.$type['town']."</td>";
							echo '<td>'.$type['type']."</td></tr>";
						}
						echo "</tbody></table>";
					?>
				</div>
			</div>
				
		</div>
	</body>
</html>
