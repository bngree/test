<?php require_once("connections/MySiteDB.php");
$sponsor_id= $_GET['sponsor']; ?>
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
            if ($sponsor_id!=0) {
				$sponsor = R::findOne('sponsor', "`id`=?",array($sponsor_id));
				if(!$sponsor){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            } else {
				$sponsors = R::findAll('sponsor');
				if(!$sponsors){
					echo '<script>alert( "Запрос провален!" );</script>';				
		   		}	
            }            

            echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
					<thead><tr>
					<th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
					</tr></thead><tbody>';

            if ($sponsor_id!=0) {
                echo '<tr><th scope="row">'.$sponsor['id']."</th>";
                echo '<td scope="row">'.$sponsor['name']."</td>";
                echo '<td scope="row">'.$sponsor['telephone']."</td>";
                echo '<td scope="row"><a href="../edit/editsponsor.php?id='.$sponsor['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
                echo '<td scope="row"><a href="../delete/deletesponsor.php?id='.$sponsor['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
            } else {
	            foreach($sponsors as $sponsor) {
                    echo '<tr><th scope="row">'.$sponsor['id']."</th>";
                    echo '<td scope="row">'.$sponsor['name']."</td>";
                    echo '<td scope="row">'.$sponsor['telephone']."</td>";
                    echo '<td scope="row"><a href="../edit/editsponsor.php?id='.$sponsor['id'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
                    echo '<td scope="row"><a href="../delete/deletesponsor.php?id='.$sponsor['id'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
                }
            }   


            echo "</tbody></table>";
        ?>
	</body>
</html>