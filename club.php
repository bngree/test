<?php require_once("connections/MySiteDB.php");
$club_id= $_GET['club']; ?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
	<style>
		@import "/css/styles.css";
		td{
			text-align: center;
		}
	</style>	
	<body>
        <?php
            if($club_id!=0){
				$club = R::findOne('club', "`id`=?",array($club_id));
				if(!$club){
					echo '<script>alert( "Запрос провален!" );</script>';				
				}
            }else{
				$clubs = R::findAll('club');
				if(!$clubs){
					echo '<script>alert( "Запрос провален!" );</script>';				
				}	

            }

			

			echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
					<th scope="col">Тренер</th>
					<th scope="col">Название</th>
					<th scope="col">Адрес</th>
					<th scope="col">Кол-ство спортсменов</th>
					<th scope="col"></th>
					<th scope="col"></th>
					</tr></thead><tbody>';
			
				if($club_id!=0){
					echo '<tr><th scope="row">'.$club['id']."</th>";
					echo '<td><a href="trainer.php?trainer='.$club['trainer'].'">'.$club['trainer'].'</a></td>';
					echo '<td scope="row">'.$club['name']."</td>";
					echo '<td scope="row">'.$club['location']."</td>";
					echo '<td scope="row">'.$club['count']."</td>";
					echo '<td scope="row"><a href="../edit/editclub.php?id='.$club['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
					echo '<td scope="row"><a href="../delete/deleteclub.php?id='.$club['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
				}else{
					foreach($clubs as $club){
						echo '<tr><th scope="row">'.$club['id']."</th>";
						echo '<td><a href="trainer.php?trainer='.$club['trainer'].'">'.$club['trainer'].'</a></td>';
						echo '<td scope="row">'.$club['name']."</td>";
						echo '<td scope="row">'.$club['location']."</td>";
						echo '<td scope="row">'.$club['count']."</td>";
						echo '<td scope="row"><a href="../edit/editclub.php?id='.$club['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
						echo '<td scope="row"><a href="../delete/deleteclub.php?id='.$club['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
					}
				}



			echo "</tbody></table>";
		?>
	</body>
</html>