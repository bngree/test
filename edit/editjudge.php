<?php require_once("../connections/MySiteDB.php");
$judge_id= $_GET['id'];?>
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
            $judge = R::findOne('judge', '`id`=?', array($judge_id));
            if (!$judge) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }
            
                $name = $judge ['name'];
                $rank_check = $judge ['rank'];
                $exp = $judge ['exp']; 

            ?>
            <div class="container centering_left">
                <form action="" name="editjudge" method="post" class="container left">
                        <div class="form-group row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Имя" name="name" required value="<?php echo $name?>">
                            </div>
                            <div class="col">
                                <select name="rank" required class="form-control"><?php
                                    $ranks = R::findAll('rankjudge');
                                    foreach($ranks as $rank){
                                        if($rank['id'] != $rank_check){
                                            echo "<option value=",$rank['id'],">",$rank['rank'],"</option>";
                                        }else{
                                            echo "<option value=",$rank['id']," selected>",$rank['rank'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Стаж" name="exp" required value="<?php echo $exp?>">
                            </div>
                            
                    <div class="col">
                        <button type="submit"  class="btn btn-warning" role="button" aria-disabled="true">Обновить</button>
                    </div>	
                </form>
            </div>
                <?php
                $name =$_POST['name'];
                $rank = $_POST['rank'];
                $exp = $_POST['exp'];

                
                if($_POST){
                    $judge = R::load('judge', $judge_id);
                        $judge->name = $name;
                        $judge->rank = $rank;
                        $judge->exp = $exp;
                    $id = R::store($judge);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$name.' '.$rank.' '.$exp.' !");
                        window.location.replace("../judge.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';
                }
                
                ?>
        
	</body>
</html>