<?php session_start();
 require_once("connections/MySiteDB.php"); ?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
	<style>
		@import "/css/styles.css";
		td{
			text-align: center;
		}
	</style>	
	<header>
	</header>
	<body>
		<?php
			$fights = R::findAll('fight');
			if(!$fights){
				echo '<script>alert( "Запрос провален!" );</script>';				
		   	}	
			

			echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
					<th scope="col">Спортсмен 1</th>
					<th scope="col">Спортсмен 2</th>
					<th scope="col">Соревнования</th>
					<th scope="col">Очки</th>
					<th scope="col"></th>
					<th scope="col"></th>
					</tr></thead><tbody>';

			foreach($fights as $fight){
				echo '<tr><th scope="row">'.$fight ['id']."</th>";
                echo '<td><a href="sportsmen.php?sportsmen='.$fight['sportsman1'].'">'.$fight['sportsman1'].'</a></td>';
                echo '<td><a href="sportsmen.php?sportsmen='.$fight['sportsman2'].'">'.$fight['sportsman2'].'</a></td>';
				echo '<td><a href="competitions.php?competition='.$fight['competition'].'">'.$fight['competition'].'</a></td>';
				echo '<td scope="row">'.$fight ['points']."</td>";
				echo '<td scope="row"><a href="../edit/editfight.php?id='.$fight['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
				echo '<td scope="row"><a href="../delete/deletefight.php?id='.$fight['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
			}
			echo "</tbody></table>";
		?>
	</body>
</html>