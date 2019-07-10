<?php require_once("..\connections\MySiteDB.php");
$sportsman_id = $_GET['id'];?>
<html>
    <body>
    <div class="container centering_left">
        <form id="delcompetitions" name="delcompetitions" method="post" >
            <p class="lead">Вы действительно хотите удалить данные спортсмена и все связанные с ним бои? </p><br>
            <?php
            $sportsman = R::findOne('sportsman', '`id`=?', array($sportsman_id));
            echo '<p class="lead">';
                echo $sportsman ['id'], " ";
                echo $sportsman ['club'], " ";
                echo $sportsman ['name'], " ";
                echo $sportsman ['weight'], " ";
                echo $sportsman ['age'], " ";
                echo $sportsman ['rank'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить"  class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            $del_fight = R::exec("DELETE FROM fight WHERE fight.sportsman1 = $sportsman_id || fight.sportsman2 = $sportsman_id");
            $delete = R::exec("DELETE FROM sportsman WHERE sportsman.id = $sportsman_id");
           
        echo '<script>function goToBack() {
            alert( "Удалено!" );
            window.location.replace("../sportsmen.php");
            }
              
            setTimeout(goToBack, 2000);</script>';           
        }
        ?>
    </div>
    </body>
</html>