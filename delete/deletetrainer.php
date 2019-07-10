<?php require_once("..\connections\MySiteDB.php");
$trainer_id = $_GET['id'];?>
<html>
    <body>
    <div class="container centering_left">
        <form id="delcompetitions" name="delcompetitions" method="post" >
        <p class="lead">Вы действительно хотите удалить данные тренера, клубов, спортсменов и всех связанных с ими бои? </p><br>
            <?php           

            $trainer = R::findOne('trainer', '`id`=?', array($trainer_id));
            echo '<p class="lead">';
                echo $trainer ['id'], " ";
                echo $trainer ['name'], " ";
                echo $trainer ['ex'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить" class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            
            $del_fight = R::exec("DELETE FROM fight USING fight, sportsman, club WHERE fight.sportsman1 = sportsman.id && sportsman.club = club.id && club.trainer = $trainer_id || fight.sportsman2 = sportsman.id  && sportsman.club = club.id && club.trainer = $trainer_id");            
            $del_sportsman = R::exec("DELETE FROM sportsman USING sportsman, club WHERE sportsman.club = club.id && club.trainer = $trainer_id");
            $del_club = R::exec("DELETE FROM club WHERE club.trainer = $trainer_id");
            $delete = R::exec("DELETE FROM trainer WHERE trainer.id = $trainer_id");

            echo '<script>function goToBack() {
                alert( "Удалено!" );
                window.location.replace("../club.php");
              }
              
              setTimeout(goToBack, 2000);</script>';                            
        }
        ?>
    </div>
    </body>
</html>