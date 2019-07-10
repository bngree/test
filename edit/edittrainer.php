<?php require_once("../connections/MySiteDB.php");
$trainer_id= $_GET['id']; ?>
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
            $trainer = R::findOne('trainer', '`id`=?', array($trainer_id));
            if (!$trainer) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }
                $name = $trainer ['name'];
                $exper = $trainer ['ex']; 
            ?>
            <div class="centering_left">
                <form action="" name="edittrainer" method="post" class="container left">
                        <div class="form-group row centering_center">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Имя" name="name" required value="<?php echo $name?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Стаж" name="ex" required value="<?php echo $exper?>">
                            </div>
                    <div class="col">
                        <button type="submit" class="btn btn-warning" role="button" aria-disabled="true">Обновить</button>
                    </div>	
                </form>
            </div>
                <?php
                $name =$_POST['name'];
                $ex = $_POST['ex'];

                
                if($_POST){
                    $trainer = R::load('trainer', $trainer_id);                   
					    $trainer->name = $name;
					    $trainer->ex = $ex;
				    $id = R::store($trainer);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$name.' '.$ex.' !");
                        window.location.replace("../trainer.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';
                }
                
                ?>
        
	</body>
</html>