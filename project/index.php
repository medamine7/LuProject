<?php
	session_start();
	session_destroy();
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lu. | Lecture et Écriture</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
	
</head>
<body>
	<header>
		<div class="container-fluid text-center">
			<h3 id="website_name" style="font-size:50px;font-family: 'Barbershop in Thailand';">Lu.</h3>
		</div>
	</header>
	<div class="motto text-center">
		<img src="img/book.png" draggable="false">
		<p>Une communauté pour les enthousiastes de la lecture et écriture.</p>
	</div>
	<div class="container">
		<div class="col-lg-4 col-lg-offset-4 text-center">
			<a type="button" class="btn insc_button" href="signup_form.php">Inscription</a>
			<a type="button" class="btn con_button" href="login_form.php">Se connecter</a>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php
		require 'footer.php';
	?>		
</body>
</html>