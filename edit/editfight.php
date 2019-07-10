<?php require_once("../connections/MySiteDB.php");
$fight_id= $_GET['id']; ?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
	<style>
		@import "/css/styles.css";
		td{
			text-align: center;
		}
	</style>	
	<body>
        <?php
            $fight = R::findOne('fight', '`id`=?', array($fight_id));
            if (!$fight) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }            
                $id_sportsman1 = $fight['sportsman1'];
                $id_sportsman2 = $fight['sportsman2'];
                $id_compet = $fight ['competition'];
                $points = $fight ['points']; 

            ?>
            <div class="container centering_left">
                <form action="" name="editcompetitions" method="post" class="container left">
                        <div class="form-group row">
                        <div class="col">
                                <select name="sportsman1" required class="form-control"><?php
                                    $sportsmen = R::findAll('sportsman');
                                    foreach($sportsmen as $sportsman){
                                        if($sportsman['id'] != $id_sportsman1){
                                            echo "<option value=",$sportsman['id'],">",$sportsman['name'],"</option>";
                                        }else{
                                            echo "<option value=",$sportsman['id']," selected>",$sportsman['name'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="sportsman2" required class="form-control"><?php
                                    $sportsmen = R::findAll('sportsman');
                                    foreach($sportsmen as $sportsman){
                                        if($sportsman['id'] != $id_sportsman2){
                                            echo "<option value=",$sportsman['id'],">",$sportsman['name'],"</option>";
                                        }else{
                                            echo "<option value=",$sportsman['id']," selected>",$sportsman['name'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="compet" required class="form-control"><?php
                                    $competitions = R::findAll('competition');
                                    foreach($competitions as $competition){
                                        if($competition['id'] != $id_compet){
                                            echo "<option value=",$competition['id'],">",$competition['town'],"</option>";
                                        }else{
                                            echo "<option value=",$competition['id']," selected>",$competition['town'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Очки" name="points" required value="<?php echo $points?>">
                            </div>
                    <div class="col">
                        <button type="submit"  class="btn btn-warning" role="button" aria-disabled="true">Обновить</button>
                    </div>	
                </form>
            </div>
                <?php
                $sportsman1 =$_POST['sportsman1'];
                $sportsman2 = $_POST['sportsman2'];
                $competition = $_POST['compet'];
                $points = $_POST['points'];

                
                if($_POST){
                    $fight = R::load('fight', $fight_id);
                        $fight->sportsman1 = $sportsman1;
                        $fight->sportsman2 = $sportsman2;
                        $fight->competition = $competition;
                        $fight->points = $points;
                    $id = R::store($fight);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$sportsman1.' '.$sportsman2.' '.$competition.' '.$points.' !");
                        window.location.replace("../fight.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';
                }
                
                ?>
        
	</body>
</html>