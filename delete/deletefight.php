<?php require_once("..\connections\MySiteDB.php");
$fight_id = $_GET['id'];?>
<html>
    <body>
    <div class="container centering_left">
        <form id="delfight" name="delfight" method="post" >
        <p class="lead">Вы действительно хотите удалить? </p><br>
            <?php           
            $fight = R::findOne('fight', '`id`=?', array($fight_id));
            if (!$fight) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }   
            echo '<p class="lead">';

                echo $fight ['id'], " ";
                echo $fight ['sportsman1'], " ";
                echo $fight ['sportsman2'], " ";
                echo $fight ['competitions'], " ";
                echo $fight ['points'], "</p><br>"; ?>

            <input type="submit" name="submit" id="submit" value="Удалить"  class="btn btn-danger" /><br>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            $fight = R::load('fight', $fight_id);
            $result = R::trash($fight);
            echo '<script>function goToBack() {
                    alert( "Удалено!" );
                    window.location.replace("../fight.php");
                  }
                  
                  setTimeout(goToBack, 2000);</script>';

        }
        ?>
    </div>
    </body>
</html>