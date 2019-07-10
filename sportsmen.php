<?php require_once("connections/MySiteDB.php");
$sportsman_id= $_GET['sportsmen']; ?>
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
            if($sportsmen_id!=0){
				$sportsman = R::findOne('sportsman', "`id`=?",array($sportsman_id));
				if(!$sportsman){
					echo '<script>alert( "Запрос провален!" );</script>';				
				}
            }else{
				$sportsmen = R::findAll('sportsman');
				if(!$sportsmen){
					echo '<script>alert( "Запрос провален!" );</script>';				
				}	
            }
	

			echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
					<th scope="col">Клуб</th>
					<th scope="col">Имя</th>
					<th scope="col">Вес</th>
                    <th scope="col">Возраст</th>
					<th scope="col">Ранк</th>
					<th scope="col"></th>
					<th scope="col"></th>
					</tr></thead><tbody>';

			if($sportsmen_id!=0){
				echo '<tr><th scope="row">'.$sportaman['id']."</th>";
				echo '<td><a href="club.php?club='.$sportsman['club'].'">'.$sportsmen['club'].'</a></td>';
				echo '<td scope="row">'.$sportsman['name']."</td>";
				echo '<td scope="row">'.$sportsman['weight']."</td>";
				echo '<td scope="row">'.$sportsman['age']."</td>";
				echo '<td scope="row">'.$sportsman['rank']."</td>";
				echo '<td scope="row"><a href="../edit/editsportsmen.php?id='.$sportsman['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
				echo '<td scope="row"><a href="../delete/deletesportsmen.php?id='.$sportsman['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
		
			}else{
                foreach ($sportsmen as $sportsman) {
                    echo '<tr><th scope="row">'.$sportsman['id']."</th>";
                    echo '<td><a href="club.php?club='.$sportsman['club'].'">'.$sportsman['club'].'</a></td>';
                    echo '<td scope="row">'.$sportsman['name']."</td>";
                    echo '<td scope="row">'.$sportsman['weight']."</td>";
                    echo '<td scope="row">'.$sportsman['age']."</td>";
                    echo '<td scope="row">'.$sportsman['rank']."</td>";
                    echo '<td scope="row"><a href="../edit/editsportsmen.php?id='.$sportsman['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
                    echo '<td scope="row"><a href="../delete/deletesportsmen.php?id='.$sportsman['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
                }
			}



			echo "</tbody></table>";
		?>
	</body>
</html>