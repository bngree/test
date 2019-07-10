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
		<form action="" name="newsportsmen" method="post" class="container left">
			    <div class="form-group row centering_center">
                    <div class="col w25">
						<select  name="club" required class="form-control"><?php
							$clubs = R::findAll('club');
							foreach($clubs as $club){
									echo "<option value=".$club['id'].">".$club['name']."</option>";
							}		
							?></select>
    			    </div>    
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Имя" name="name" required>
    				</div>    				
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Вес" name="weight" required>
                    </div>
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Возраст" name="age" required>
                    </div>
                    <div class="col w25">
						<select  name="rank" required class="form-control"><?php
							$ranks = R::findAll('ranksportsmen');
							foreach($ranks as $rank){
									echo "<option value=".$rank['id'].">".$rank['rank']."</option>";
							}		
							?></select>
    			    </div>  
                    
			<div class="col">
				<button type="submit" class="btn btn-primary" role="button" aria-disabled="true">Отправить</button>
			</div>	
		</form>
	</div>
        <?php
            $club = $_POST['club'];
			$name =$_POST['name'];
            $weight = $_POST['weight'];
            $age = $_POST['age'];            
            $rank=$_POST['rank'];
			
            if($_POST){
				$sportsman = R::dispense('sportsman');
					$sportsman->club = $club;
					$sportsman->name = $name;
					$sportsman->weight = $weight;
					$sportsman->age = $age;
					$sportsman->rank = $rank;
				$id = R::store($sportsman);
				echo '				
				<script>function goToBack() {
                    alert(" Успешно добавлено!'.$name.' '.$weight.' '.$age.' '.$club.' '.$rank.'");
                    window.location.replace("../sportsmen.php");
                  }
                  
				  setTimeout(goToBack, 2000);</script>';

            }
            
		?>

</body>
</html>

