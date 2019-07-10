<?php require_once("..\connections\MySiteDB.php");
$club_id = $_GET['id'];?>
<html>
    <body>
        <div class="container centering_left">
        <form id="delcompetitions" name="delcompetitions" method="post" >
            <p class="lead">Вы действительно хотите удалить данные клуба, спортсмена и всех связанных с спортсменом боями? </p><br>
            <?php           

            $club = R::findOne('club','`id`=?', array($club_id));
            echo '<p class="lead">';
                echo $club ['id'], " ";
                echo $club ['rainer'], " ";
                echo $club ['name'], " ";
                echo $club ['location'], " ";
                echo $club ['count'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить" class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            
            $del_fight = R::exec("DELETE FROM fight USING fight, sportsman WHERE fight.sportsman1 = sportsman.id && sportsman.club = $club_id || fight.sportsman2 = sportsman.id  && sportsman.club = $club_id");            
            $del_sportsman = R::exec("DELETE FROM sportsman WHERE sportsman.club = $club_id");
            $delete = R::exec("DELETE FROM club WHERE club.id = $club_id");

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