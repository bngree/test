<?php require_once("../connections/MySiteDB.php");
$sponsor_id= $_GET['id']; ?>
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
            $sponsor = R::findOne('sponsor', '`id`=?', array($sponsor_id));

            if (!$sponsor) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }
                $name = $sponsor ['name'];
                $telephone = $sponsor ['telephone']; 

            ?>
            <div class="centering_left">
                <form action="" name="editsponsor" method="post" class="container left">
                        <div class="form-group row centering_center">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Имя" name="name" required value="<?php echo $name?>">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Телефон" name="phone" required value="<?php echo $telephone?>">
                            </div>
                    <div class="col">
                        <button type="submit" class="btn btn-warning" role="button" aria-disabled="true">Обновить</button>
                    </div>	
                </form>
            </div>
                <?php
                $name =$_POST['name'];
                $phone = $_POST['phone'];

                
                if($_POST){
                    $sponsor = R::load('sponsor', $sponsor_id);
                        $sponsor->name = $name;
                        $sponsor->telephone = $phone;
				    $id = R::store($sponsor);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$name.' '.$phone.' !");
                        window.location.replace("../sponsor.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';

                }
                
                ?>
        
	</body>
</html>