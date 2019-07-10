<?php require_once("..\connections\MySiteDB.php");
$sponsor_id = $_GET['id'];?>
<html>
    <body>
    <div class="container centering_left">
        <form id="delcompetitions" name="delcompetitions" method="post" >
        <p class="lead">Вы действительно хотите удалить данные спонсора, соревнования и все связанные с соревнованиями бои? </p><br>
            <?php
            $sponsor = R::findOne('sponsor', '`id`=?', array($sponsor_id));            
            echo '<p class="lead">';
                echo $sponsor ['id'], " ";
                echo $sponsor ['name'], " ";
                echo $sponsor ['telephone'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить"  class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            
            $del_fight = R::exec("DELETE FROM fight USING fight, competition WHERE fight.competition = competition.id && competition.sponsor = $sponsor_id");         
            $del_competitions = R::exec("DELETE FROM competition WHERE competition.sponsor = $sponsor_id");
            $delete = R::exec("DELETE FROM sponsor WHERE sponsor.id = $sponsor_id");
            
            echo '<script>function goToBack() {
                alert( "Удалено!" );
                window.location.replace("../sponsor.php");
              }
              
              setTimeout(goToBack, 2000);</script>';                        
        }
        ?>
    </div>
    </body>
</html>