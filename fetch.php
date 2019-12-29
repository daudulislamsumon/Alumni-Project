<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="display-4">OUTPUT:</p>

				<?php  
					include 'functions/db.php';

					$sql = "SELECT * FROM users";
					$result = query($sql);
					confirm($result);
					$row = fetch_array($result);
					echo $row['name'].'<br>';
					echo $row['studentid'].'<br>';
					echo $row['appliedfor'].'<br>';
					echo $row['bloodgroup'];


				?>

			</div>
		</div>
	</div>
</body>
</html>