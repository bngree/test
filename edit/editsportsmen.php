<?php require_once("../connections/MySiteDB.php");
$sportsman_id= $_GET['id'];?>
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
            $sportsman = R::findOne('sportsman', '`id`=?', array($sportsman_id));
            if (!$sportsman) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }
                $id_club = $sportsman ['club'];
                $name = $sportsman ['name'];
                $weight = $sportsman ['weight'];
                $age = $sportsman ['age']; 
                $rank_id = $sportsman ['rank']; 

            ?>
            <div class="container centering_left">
                <form action="" name="editsportsmen" method="post" class="container left">
                        <div class="form-group row">
                            <div class="col">
                                <select name="club" required class="form-control"><?php
                                    $clubs = R::findAll('club');
                                    foreach($clubs as $club){
                                        if($club['id'] != $id_club){
                                            echo "<option value=",$club['id'],">",$club['name'],"</option>";
                                        }else{
                                            echo "<option value=",$club['id']," selected>",$club['name'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Имя" name="name" required value="<?php echo $name?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Вес" name="weight" required value="<?php echo $weight?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Возраст" name="age" required value="<?php echo $age?>">
                            </div>
                            <div class="col">
                                <select name="rank" required class="form-control"><?php
                                    $ranks = R::findAll('ranksportsmen');
                                    foreach($ranks as $rank){
                                        if($rank['id'] != $rank_id){
                                            echo "<option value=",$rank['id'],">",$rank['rank'],"</option>";
                                        }else{
                                            echo "<option value=",$rank['id']," selected>",$rank['rank'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                    <div class="col">
                        <button type="submit"  class="btn btn-warning" role="button" aria-disabled="true">Обновить</button>
                    </div>	
                </form>
            </div>
                <?php
                $club =$_POST['club'];
                $name =$_POST['name'];
                $weight = $_POST['weight'];
                $age = $_POST['age'];
                $rank = $_POST['rank'];

                
                if($_POST){
                    $sportsman = R::load('sportsman', $sportsman_id);
                        $sportsman->club = $club;
                        $sportsman->name = $name;
                        $sportsman->weight = $weight;
                        $sportsman->age = $age;
                        $sportsman->rank = $rank;
                    $id = R::store($sportsman);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$club.' '.$name.' '.$weight.' '.$age.' '.$rank.' !");
                        window.location.replace("../sportsmen.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';
                }
                
                ?>
        
	</body>
</html>