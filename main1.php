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
			table{
				/* margin: 0px auto; */
			}
			.try{
				display: flex;
				flex-direction: column;
				justify-content: center"
			}
			</style>

	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="lead">Топ самых щедрых спонсоров</p>
				<?php
					$query = "SELECT * FROM `top_generous_sponsors`";
					$topS = mysqli_query($link, $query);
					if(!$topS){
						echo '<script>alert( "Запрос топ меценатов провален!" );</script>';				
					}	
					
					echo '<table class="table table-sm table-hover table-responsive" style="margin:1% auto;">
							<thead><tr>
							<th scope="col">Имя</th>
							<th scope="col">Кол-ство спонсируемых соревнований</th>
							</tr></thead><tbody>';

					while ($sponsor = mysqli_fetch_array($topS)){
						echo '<tr><th scope="row">'.$sponsor['Name']."</th>";
						echo '<td scope="row">'.$sponsor['Count']."</td></tr>";
					}
					echo "</tbody></table>";
				?>
				</div>
				<div class="col">
					<p class="lead">Топ-5 самых тяжелых спортсменов</p>
				<?php
					$query = "SELECT * FROM `top5_sportsmens_by_weight`";
					$top5 = mysqli_query($link, $query);
					if(!$top5){
						echo '<script>alert( "Запрос топ-5 тяжелых спортсменов провален!" );</script>';				
					}	
					
					echo '<table class="table table-sm table-hover table-responsive" style="margin:1% auto;">
							<thead><tr>
							<th scope="col">Имя</th>
							<th scope="col">Вес</th>
							</tr></thead><tbody>';

					while ($sportsmen = mysqli_fetch_array($top5)){
						echo '<tr><td scope="row">'.$sportsmen['Name']."</th>";
						echo '<td scope="row">'.$sportsmen['Weight']."</td></tr>";
					}
					echo "</tbody></table>";
				?>
				</div>
				<div class="col">
					<p class="lead">Города с найбольшим кол-ством поражений</p>
				<?php
					$query = "SELECT * FROM `towns_with_draw`";
					$top_town = mysqli_query($link, $query);
					if(!$top_town){
						echo '<script>alert( "Запрос топ городов с найбольшим кол-ством поражений провален!" );</script>';				
					}	
					
					echo '<table class="table table-sm table-hover table-responsive" style="margin:1% auto;" align="right">
							<thead><tr>
							<th scope="col">Город</th>
							<th scope="col">Количество</th>
							</tr></thead><tbody>';

					while ($town = mysqli_fetch_array($top_town)){
						echo '<tr><td scope="row">'.$town['Town']."</th>";
						echo '<td scope="row">'.$town['Fights with draw']."</td></tr>";
					}
					echo "</tbody></table>";
				?>
				</div>
			</div>
			<div class="row">
				<div class="col">
						<p class="lead">Наши клубы</p>
					<?php
						$query = "SELECT * FROM `clubs`";
						$clubs = mysqli_query($link, $query);
						if(!$top5){
							echo '<script>alert( "Запрос клубы провален!" );</script>';				
						}	
						
						echo '<table class="table table-sm table-hover table-responsive" style=" margin:1%;">
								<thead><tr>
								<th scope="col">Название</th>
								<th scope="col">Местоположение</th>
								</tr></thead><tbody>';

						while ($club = mysqli_fetch_array($clubs)){
							echo '<tr><td scope="row">'.$club['Club name']."</th>";
							echo '<td scope="row">'.$club['Location']."</td></tr>";
						}
						echo "</tbody></table>";
					?>
				</div>
				<div class="col">
						<p class="lead">Соревнования</p>
					<?php
						$query = "CALL typesOfCompetitions";
						$types = mysqli_query($link, $query);
						if(!$types){
							echo '<script>alert( "Запрос типов соревнований провален!" );</script>';				
						}	
						
						echo '<table class="table table-sm table-hover table-responsive" style="margin:1%;">
								<thead><tr>
								<th scope="col">Город</th>
								<th scope="col">Тип</th>
								</tr></thead><tbody>';

						while ($type = mysqli_fetch_array($types)){
							echo '<tr><th scope="row">'.$type['town_compet']."</th>";
							echo '<td scope="row">'.$type['whatTypeOfCompet(id_compet)']."</td></tr>";
						}
						echo "</tbody></table>";
					?>
				</div>
			</div>
		</div>
	</body>
</html>
