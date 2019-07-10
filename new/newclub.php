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
		<form action="" name="newclub" method="post" class="container left">
			    <div class="form-group row centering_center">
                    <div class="col w25">
						<select  name="trainer" required class="form-control"><?php
							$trainers = R::findAll('trainer');
							foreach($trainers as $trainer){
									echo "<option value=".$trainer['id'].">".$trainer['name']."</option>";
							}		
							?></select>
    			    </div>    
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Название клуба" name="name" required>
    				</div>    				
            <div class="col">
      					<input type="text" class="form-control" placeholder="Местоположение" name="location" required>
            </div>
                    

			<div class="col">
				<button type="submit" class="btn btn-primary" role="button" aria-disabled="true">Отправить</button>
			</div>	
		</form>
	</div>
		<?php
			$name =$_POST['name'];
            $location = $_POST['location'];
            
            $trainer=$_POST['trainer'];
			
            if($_POST){
				$club = R::dispense('club');
					$club->trainer = $trainer;
					$club->name = $name;
					$club->location = $location;
					$club->count = 0;
				$id = R::store($club);
				echo '
				<script>function goToBack() {
                    alert(" Успешно добавлено!'.$trainer.' '.$name.' '.$location.'");
                    window.location.replace("../club.php");
                  }
                  
				  setTimeout(goToBack, 2000);
				  </script>';
            }
            
		?>

</body>
</html>

