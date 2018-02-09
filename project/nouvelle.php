<?php
    session_start();
    ?>

<!DOCTYPE html>
<html>
<head>
	<title>Nouvelle oeuvre | Lu.</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">

</head>
<body>
	<?php
        require 'header.php';
    ?>

        <div class="container">
            <div class="jumbotron">
                <form method="post" enctype="multipart/form-data" action="nouvelle_oeuvre.php">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Titre</label>
                                <input class="form-control" type="text" name="story_title">
                            </div>
                            <div class="form-group">
                                <label>Genre</label>
                                <select name="story_genre" class="form-control">
                                    <option value="horreur">Horreur</option>
                                    <option value="romance">Romance</option>
                                    <option value="science-fiction">Science-fiction</option>
                                    <option value="action">Action</option>
                                    <option value="drama">Drama</option>
                                    <option value="fantasie">Fantasie</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label>Statut</label>
                            <select name="story_status" class="form-control">
                                <option value="public">Publique</option>
                                <option value="private">Privée</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label>Langue</label>
                            <select name="story_language" class="form-control">
                                <option value="french">Français</option>
                                <option value="arabic">العربية</option>
                                <option value="english">English</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-md-offset-2 col-md-5">
                            <label>Couverture d'oeuvre</label>
                            <img class="placeholder-image" src="img/placeholder-image.jpg">
                            <input type="file" name="story_cover">
                        </div>
                        <button class="btn con_button" type="submit" style="display: block; margin: 30px;">Créer</button>
                    </form>
                </div>
            </div>
        </div>
    

    <?php
        require 'footer.php';
    ?>      
</body>
</html>