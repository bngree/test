<?php require_once("..\connections\MySiteDB.php");
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
      					<input type="text" class="form-control" placeholder="Телефон" name="phone" required>
    				</div>
			<div class="col">
				<button type="submit" class="btn btn-primary" role="button" aria-disabled="true">Отправить</button>
			</div>	
		</form>
	</div>
		<?php
			$name =$_POST['name'];
			$phone = $_POST['phone'];

			
            if($_POST){
				$sponsor = R::dispense('sponsor');
					$sponsor->name= $name;
					$sponsor->telephone = $phone;
				$id = R::store($sponsor);
				echo '
				<script>function goToBack() {
                    alert(" Успешно добавлено'.$name.' '.$phone.' !");
                    window.location.replace("../sponsor.php");
                  }
                  
                  setTimeout(goToBack, 2000);</script>
				';
            }
            
		?>

</body>
</html>

