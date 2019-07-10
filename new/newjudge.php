<?php require_once("..\connections\MySiteDB.php");
// $query_ranks = "SELECT rank_judge.id, rank_judge.rank FROM rank_judge";
// $ranks = mysqli_query($link, $query_ranks);
?>
<!DOCTYPE html>
<meta charset="utf-8"?>
<html>
<head>	
	<link rel="stylesheet" href="/css/styles.css">
	<script src="/js/jquery-3.3.1.js"></script>
</head>
<body>
	<div class="centering_left">
		<form action="" name="newcar" method="post" class="container left">
			    <div class="form-group row centering_center">
    				<div class="col">
      					<input type="text" class="form-control" placeholder="Имя" name="name" required>
    				</div>    				
                    <div class="col">
      					<input type="text" class="form-control" placeholder="Стаж" name="exp" required>
                    </div>
                    <div class="col w25">
						<select  name="rank" required class="form-control"><?php
							$ranks = R::findAll('rankjudge');
							foreach($ranks as $rank){
									echo "<option value=".$rank['id'].">".$rank['rank']."</option>";
							}		
							?></select>
    				</div>
			<div class="col">
				<button type="submit" class="btn btn-primary" role="button" aria-disabled="true">Отправить</button>
			</div>
            </div>
		</form>
	</div>
		<?php
			$name =$_POST['name'];
            $exp = $_POST['exp'];
            
            $rank=$_POST['rank'];
            if($_POST){
				$judge = R::dispense('judge');
					$judge->name = $name;
					$judge->rank = $rank;
					$judge->exp = $exp;
				$id = R::store($judge);
				echo '
				<script>function goToBack() {
                    alert(" Успешно добавлено!'.$name.' '.$exp.' '.$rank.'");
                    window.location.replace("../judge.php");
                  }
                  
                  setTimeout(goToBack, 2000);</script>
				';
            }
            
		?>

</body>
</html>

