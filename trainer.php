<?php require_once("connections/MySiteDB.php");
$trainer_id= $_GET['trainer']; ?>
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
		
            if($trainer_id!=0){
				$trainer = R::findOne('trainer', "`id`=?",array($trainer_id));
				if(!$trainer){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            }else{
				$trainers = R::findAll('trainer');
				if(!$trainers){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            }


			

			echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
					<th scope="col">Имя</th>
					<th scope="col">Стаж</th>
					<th scope="col"></th>
					<th scope="col"></th>
					</tr></thead><tbody>';
			
			if($trainer_id!=0){
					echo '<tr><th scope="row">'.$trainer['id']."</th>";
					echo '<td scope="row">'.$trainer['name']."</td>";
					echo '<td scope="row">'.$trainer['ex']."</td>";
					echo '<td scope="row"><a href="../edit/edittrainer.php?id='.$trainer['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
					echo '<td scope="row"><a href="../delete/deletetrainer.php?id='.$trainer['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
			}else{
				foreach($trainers as $trainer){
					echo '<tr><th scope="row">'.$trainer['id']."</th>";
					echo '<td scope="row">'.$trainer['name']."</td>";
					echo '<td scope="row">'.$trainer['ex']."</td>";
					echo '<td scope="row"><a href="../edit/edittrainer.php?id='.$trainer['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
					echo '<td scope="row"><a href="../delete/deletetrainer.php?id='.$trainer['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
				}
			}



			echo "</tbody></table>";
		?>
	</body>
</html>