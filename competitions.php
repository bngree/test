<?php require_once("connections/MySiteDB.php");
$compet_id= $_GET['competition']; ?>
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
            if($compet_id!=0){
				$competition = R::findOne('competition', "`id`=?",array($compet_id));
				if(!$competition){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}
            }else{
				$competitions = R::findAll('competition');
				if(!$competitions){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            }

			echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
					<th scope="col">Город</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Спонсор</th>
                    <th scope="col">Судья</th>
					<th scope="col">Кол-ство боёв</th>
					<th scope="col"></th>
					<th scope="col"></th>
					</tr></thead><tbody>';

			if($compet_id!=0){
				echo '<tr><th scope="row">'.$competition['id']."</th>";
				echo '<td scope="row">'.$competition['town']."</td>";
				echo '<td scope="row">'.$competition['data']."</td>";
				echo '<td><a href="sponsor.php?sponsor='.$competition['sponsor'].'">'.$competition['sponsor'].'</a></td>';
				echo '<td><a href="judge.php?judge='.$competition['judge'].'">'.$competition['judge'].'</a></td>';
				echo '<td scope="row">'.$competition['count']."</td>";
				echo '<td scope="row"><a href="../edit/editcompetitions.php?id='.$competition['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
				echo '<td scope="row"><a href="../delete/deletecompetitions.php?id='.$competition['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';

			}else{
				foreach($competitions as $competition){
					echo '<tr><th scope="row">'.$competition['id']."</th>";
					echo '<td scope="row">'.$competition['town']."</td>";
					echo '<td scope="row">'.$competition['data']."</td>";
					echo '<td><a href="sponsor.php?sponsor='.$competition['sponsor'].'">'.$competition['sponsor'].'</a></td>';
					echo '<td><a href="judge.php?judge='.$competition['judge'].'">'.$competition['judge'].'</a></td>';
					echo '<td scope="row">'.$competition['count']."</td>";
					echo '<td scope="row"><a href="../edit/editcompetitions.php?id='.$competition['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
					echo '<td scope="row"><a href="../delete/deletecompetitions.php?id='.$competition['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
				}
			}


			echo "</tbody></table>";
		?>
	</body>
</html>