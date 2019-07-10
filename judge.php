<?php require_once("connections/MySiteDB.php");
$judge_id= $_GET['judge']; ?>
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
            if ($judge_id!=0) {
				$judge = R::findOne('judge', "`id`=?",array($judge_id));
				if(!$judge){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            } else {
                $judges = R::findAll('judge');
				if(!$judges){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            }

            echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Ранк</th>
                    <th scope="col">Стаж</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
					</tr></thead><tbody>';

            if ($judge_id!=0) {
                echo '<tr><th scope="row">'.$judge['id']."</th>";
                echo '<td scope="row">'.$judge['name']."</td>";
                echo '<td scope="row">'.$judge['rank']."</td>";
                echo '<td scope="row">'.$judge['exp']."</td>";
                echo '<td scope="row"><a href="../edit/editjudge.php?id='.$judge['id_'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
                echo '<td scope="row"><a href="../delete/deletejudge.php?id='.$judge['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
            } else {
                foreach($judges as $judge) {
                    echo '<tr><th scope="row">'.$judge['id']."</th>";
                    echo '<td scope="row">'.$judge['name']."</td>";
                    echo '<td scope="row">'.$judge['rank']."</td>";
                    echo '<td scope="row">'.$judge['exp']."</td>";
                    echo '<td scope="row"><a href="../edit/editjudge.php?id='.$judge['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
                    echo '<td scope="row"><a href="../delete/deletejudge.php?id='.$judge['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
                }
            }


            echo "</tbody></table>";
        ?>
	</body>
</html>