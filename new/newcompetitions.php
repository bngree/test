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
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Город" name="town" required>
                    </div>
                    <div class="col">
      					<input type="date" class="form-control" placeholder="Дата" name="data" required>
                    </div>
                    <div class="col w25">
						<select  name="sponsor" required class="form-control"><?php
							$sponsors = R::findAll('sponsor');
							foreach($sponsors as $sponsor){
									echo "<option value=".$sponsor['id'].">".$sponsor['name']."</option>";
							}		
							?></select>
    			    </div>   				
                    <div class="col w25">
						<select  name="judge" required class="form-control"><?php
							$judges = R::findAll('judge');
							foreach($judges as $judge){
									echo "<option value=".$judge['id'].">".$judge['name']."</option>";
							}		
							?></select>
    			    </div>  
                    
			<div class="col">
				<button type="submit" class="btn btn-primary" role="button" aria-disabled="true">Отправить</button>
			</div>	
		</form>
	</div>
        <?php
            $town = $_POST['town'];
			$data =$_POST['data'];
            $sponsor = $_POST['sponsor'];
            $judge = $_POST['judge'];            
			
            if($_POST){
				$competition = R::dispense('competition');
					$competition->town = $town;
					$competition->data = $data;
					$competition->sponsor = $sponsor;
					$competition->judge = $judge;
					$competition->count = 0;
				$id = R::store($competition);
				echo '
				<script>function goToBack() {
                    alert(" Успешно добавлено!'.$town.' '.$data.' '.$sponsor.' '.$judge.'");
                    window.location.replace("../competitions.php");
                  }
                  
                  setTimeout(goToBack, 2000);</script>
				';
            }
            
		?>

</body>
</html>

