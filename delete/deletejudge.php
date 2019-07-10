<?php require_once("..\connections\MySiteDB.php");
$judge_id = $_GET['id'];?>
<html>
    <body>
    <div class="container centering_left">
        <form id="delcompetitions" name="delcompetitions" method="post" >
        <p class="lead">Вы действительно хотите удалить данные судьи, соревнования и все связанные с соревнованиями бои? </p><br>
            <?php
            $judge = R::findOne('judge', '`id`=?', array($judge_id));
            echo '<p class="lead">';
                echo $judge ['id'], " ";
                echo $judge ['name'], " ";
                echo $judge ['rank'], " ";
                echo $judge ['exp'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить"  class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            
            $del_fight = R::exec("DELETE FROM fight USING fight, competition WHERE fight.competition = competition.id && competition.judge = $judge_id");            
            $del_competitions = R::exec("DELETE FROM competition WHERE competition.judge = $judge_id");
            $delete = R::exec("DELETE FROM judge WHERE judge.id = $judge_id");

            echo '<script>function goToBack() {
                alert( "Удалено!" );
                window.location.replace("../judge.php");
              }
              
              setTimeout(goToBack, 2000);</script>';   
        }
        ?>
    </div>
    </body>
</html>