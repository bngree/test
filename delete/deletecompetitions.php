<?php require_once("..\connections\MySiteDB.php");
$compet_id = $_GET['id'];?>
<html>
    <body>
    <div class="container centering_left">
        <form id="delcompetitions" name="delcompetitions" method="post" >
            <p class="lead">Вы действительно хотите удалить данные соревнования и все связанные с ним бои? </p><br>
            <?php
            
            $competition = R::findOne('competition', '`id`=?', array($compet_id));
            echo '<p class="lead">';
                echo $competition ['id'], " ";
                echo $competition ['town'], " ";
                echo $competition ['data'], " ";
                echo $competition ['sponsor'], " ";
                echo $competition ['judge'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить" class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            $del_fight = R::exec("DELETE FROM fight WHERE fight.competition = $compet_id");
            $delete = R::exec("DELETE FROM competition WHERE competition.id = $compet_id");
                    echo '<script>function goToBack() {
                        alert( "Удалено!" );
                        window.location.replace("../competitions.php");
                      }
                      
                      setTimeout(goToBack, 2000);</script>';

        }
        ?>
    </div>
    </body>
</html>