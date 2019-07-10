<?php 
    require 'connections/rb.php';
    R::setup('mysql:host=127.0.0.1;dbname=karatebean','root','');
        if(!R::testConnection()){
           echo '<script>alert( "There is no connection!" )</script>'; 
        }
?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
	<body>
<?php
        // $sportsmen = R::findAll('sportsman');
        //         //var_dump($sportsmen);
        //         foreach($sportsmen as $item){
        //                 echo $item['name'];
        //         }
        $trainer_id =1;
        $club = R::findOne('club', "`id`=?",array($trainer_id));
        echo $club->name;
        print_r($club);
        $clubs = R::findAll('club');
        foreach($clubs as $item){
                echo $item['name'].' ';
                echo $item['trainer'].'<br>';
        }


        // echo '<table class="table table-sm table-hover table-responsive" style="width:70%; margin:1%;">
        //                 <thead><tr>
        //                 <th scope="col">ID</th>
        //                 <th scope="col">Имя</th>
        //                 <th scope="col">Стаж</th>
        //                 <th scope="col"></th>
        //                 <th scope="col"></th>
        //                 </tr></thead><tbody>';

        // foreach($trainers AS $trainer){
        //         echo '<tr><th scope="row">'.$trainer['id']."</th>";
        //         echo '<td scope="row">'.$trainer['name']."</td>";
        //         echo '<td scope="row">'.$trainer['ex']."</td>";
        //         echo '<td scope="row"><a href="../edit/edittrainer.php?id='.$trainer['id_trainer'].'"><img src="../pic/edit2.png" alt="Изменить"></a></td>';
        //         echo '<td scope="row"><a href="../delete/deletetrainer.php?id='.$trainer['id_trainer'].'"><img src="../pic/del2.png" alt="Удалить"></a></td></tr>';
        // }
        //echo "</tbody></table>";
?>

	</body>
</html>
