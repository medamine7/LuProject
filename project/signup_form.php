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
                    <a href="index.php"><h3 class="homepage" style="color:#2D5592;font-size:50px;font-family: 'Barbershop in Thailand';">Lu.</h3></a>
                </div>
                <div class="col-md-4 text-center">
                    <h3 style="font-weight: bold;">Inscription</h3>
                </div>
                <div class="col-md-4 text-right">
                    <h4><a href="login_form.php">Se connecter</a></h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card card-container">
        <h2 class='login_title text-center'>Rejoignez-nous!</h2>
        <hr>

            <form class="form-signin" action="signed_up.php" method="post">
                <input type="text" placeholder="Nom" class="login_box" name="lname" required>
                <input type="text" placeholder="Prénom" class="login_box" name="fname" required>
                <input type="email" placeholder="Email" class="login_box" name="email" required>
                <label>Date de naissance:</label>
                <input type="date" placeholder="Date de naissance" class="login_box" name="birthdate" required>
                <div class="form-group">
                    <label for="gender">Sex:</label><br>
                    <select name="gender" class="form-control">
                        
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                            
                    </select>
                </div>
                <input type="username" placeholder="Nom d'utilisateur" name="username" class="login_box" required>
                <input type="password" placeholder="Mot de passe" name="password" class="login_box" required>
                <p>En inscrivant, vous acceptez nos Conditions d'utilisation et notre Politique de confidentialité.</p>
            <button class="btn con_button">Se connecter</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
</html>

