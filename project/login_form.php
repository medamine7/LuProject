<!DOCTYPE html>
<html>
<head>
	<title>Se connecter | Lu</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login_style.css">
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">

</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="top_banner row"> 
                <div class="col-md-4">
                    <a href="index"><h3 class="homepage" style="color:#2D5592;font-size:50px;font-family: 'Barbershop in Thailand';">Lu.</h3></a>
                </div>
                <div class="col-md-4 text-center">
                    <h3 style="font-weight: bold;">Se connecter</h3>
                </div>
                <div class="col-md-4 text-right">
                    <h4><a href="signup_form">Inscription</a></h4>
                </div>
            </div>
		</div>
	</header>
    <div class="container">
        <div class="card card-container">
        <h2 class='login_title text-center'>Bienvenue!</h2>
        <hr>

            <form class="form-signin" action="signed_in.php" method="post">
                <input type="text" id="inputEmail" class="login_box" placeholder="Nom d'utilisateur" name="username" required autofocus>
                <input type="password" id="inputPassword" class="login_box" placeholder="Mot de passe" name="password" required>
			<button class="btn con_button">Se connecter</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
</html>