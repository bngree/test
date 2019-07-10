<?php require_once("..\connections\MySiteDB.php");?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
<head>	
	<link rel="stylesheet" href="/css/styles.css">
	<script src="/js/jquery-3.3.1.js"></script>
</head>
<body>
	<div class="centering_left">
		<form action="" name="newfight" method="post" class="container left">
			    <div class="form-group row centering_center">
                    <div class="col w25">
						<select  name="sportsman1" required class="form-control"><?php
							$sportsmen = R::findAll('sportsman');
							foreach($sportsmen as $sportsman1){
									echo "<option value=".$sportsman1['id'].">".$sportsman1['name']."</option>";
							}		
							?></select>
    			    </div>    
                    <div class="col w25">
						<select  name="sportsman2" required class="form-control"><?php
							$sportsmen = R::findAll('sportsman');
							foreach($sportsmen as $sportsman3){
									echo "<option value=".$sportsman3['id'].">".$sportsman3['name']."</option>";
							}	
							?></select>
    			    </div>   				
                    <div class="col w25">
						<select  name="competition" required class="form-control"><?php
							$competitions = R::findAll('competition');
							foreach($competitions as $competition){
									echo "<option value=".$competition['id'].">".$competition['town']."</option>";
							}		
							?></select>
    			    </div>  
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Очки" name="points" required>
                    </div>

                    
			<div class="col">
				<button type="submit" class="btn btn-primary" role="button" aria-disabled="true">Отправить</button>
			</div>	
		</form>
	</div>
        <?php
            $sportsman1 = $_POST['sportsman1'];
			$sportsman2 =$_POST['sportsman2'];
			$competition = $_POST['competition'];
            $points = $_POST['points'];            
			
            if($_POST){
				$fight = R::dispense('fight');
					$fight->sportsman1 = $sportsman1;
					$fight->sportsman2 = $sportsman2;
					$fight->competition = $competition;
					$fight->points = $points;
				$id = R::store($fight);
				echo '
				<script>function goToBack() {
                    alert(" Успешно добавлено!'.$sportsman1.' '.$sportsman2.' '.$competition.' '.$points.'");
                    window.location.replace("../fight.php");
                  }
                  
                  setTimeout(goToBack, 2000);</script>
				';
            }
            
		?>

</body>
</html>

