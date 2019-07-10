<?php require_once("../connections/MySiteDB.php");
$club_id= $_GET['id']; ?>
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
            $club = R::findOne('club', '`id`=?', array($club_id));
            if (!$club) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }
                $id_trainer = $club['trainer'];
                $name = $club ['name'];
                $location = $club ['location']; 

            ?>
            <div class="container centering_left">
                <form action="" name="editclub" method="post" class="container left">
                        <div class="form-group row">
                            <div class="col">
                            <select name="trainer_sel" required class="form-control" style=" width=10px;"><?php
                                $trainers = R::findAll('trainer');
                                foreach($trainers as $trainer){
                                    if($trainer['id'] != $id_trainer){
                                        echo "<option value=",$trainer['id'],">",$trainer['name'],"</option>";
                                    }else{
                                        echo "<option value=",$trainer['id']," selected>",$trainer['name'],"</option>";
                                    }						
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Название" name="name" required value="<?php echo $name?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Расположение" name="location" required value="<?php echo $location?>">
                            </div>
                    <div class="col">
                        <button type="submit"  class="btn btn-warning" role="button" aria-disabled="true">Обновить</button>
                    </div>	
                </form>
            </div>
                <?php
                $name =$_POST['name'];
                $location = $_POST['location'];
                $trainer = $_POST['trainer_sel'];

                
                if($_POST){
                    $club = R::load('club', $club_id);
                        $club->trainer = $trainer;
                        $club->name = $name;
                        $club->location = $location;
				    $id = R::store($club);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$name.' '.$location.' '.$trainer.' !");
                        window.location.replace("../club.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';
                }
                
                ?>
        
	</body>
</html>