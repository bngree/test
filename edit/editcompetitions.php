<?php require_once("../connections/MySiteDB.php");
$compet_id= $_GET['id']; ?>
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
            $competition = R::findOne('competition', '`id`=?', array($compet_id));
            if (!$competition) {
                echo '<script>alert( "Запрос провален!" );</script>';
            }           
                $id_compet = $competition['id'];
                $town = $competition ['town'];
                $data = $competition ['data'];
                $id_sponsor = $competition ['sponsor']; 
                $id_judge = $competition ['judge']; 

            ?>
            <div class="container centering_left">
                <form action="" name="editcompetitions" method="post" class="container left">
                        <div class="form-group row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Город" name="town" required value="<?php echo $town?>">
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" placeholder="Дата" name="data" required value="<?php echo $data?>">
                            </div>
                            <div class="col">
                                <select name="sponsor" required class="form-control"><?php
                                    $sponsors = R::findAll('sponsor');
                                    foreach($sponsors as $sponsor){
                                        if($sponsor['id'] != $id_sponsor){
                                            echo "<option value=",$sponsor['id'],">",$sponsor['name'],"</option>";
                                        }else{
                                            echo "<option value=",$sponsor['id']," selected>",$sponsor['name'],"</option>";
                                        }						
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <select name="judge" required class="form-control"><?php
                                    $judges = R::findAll('judge');
                                    foreach($judges as $judge){
                                        if($judge['id'] != $id_judge){
                                            echo "<option value=",$judge['id'],">",$judge['name'],"</option>";
                                        }else{
                                            echo "<option value=",$judge['id']," selected>",$judge['name'],"</option>";
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
                $town =$_POST['town'];
                $data = $_POST['data'];
                $id_sponsor = $_POST['sponsor'];
                $id_judge = $_POST['judge'];

                
                if($_POST){
                    $judge = R::load('competition', $compet_id);
                        $competition->town = $town;
                        $competition->data = $data;
                        $competition->sponsor = $id_sponsor;
                        $competition->judge = $id_judge;
                    $id = R::store($competition);
                    echo '
                    <script>function goToBack() {
                        alert(" Успешно обновлено '.$town.' '.$data.' '.$id_sponsor.' '.$id_judge.' !");
                        window.location.replace("../competitions.php");
                    }
                    
                    setTimeout(goToBack, 2000);</script>
                    ';
                }
                
                ?>
        
	</body>
</html>