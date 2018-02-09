<?php

    session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Découvrez | Lu.</title>
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
        <div class="col-lg-12">
            <div class="jumbotron jumbotron-marge">
                <a class="btn con_button" href="nouvelle.php">Nouvelle Oeuvre</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="jumbotron">
                <h3>Continuer à écrire</h3>


                <?php
                $conn = oci_connect('MAB7', '176904', 'localhost/XE');

                $user_id=$_SESSION["USER_ID"];
                 $stid = oci_parse($conn, "SELECT * FROM stories where user_id=$user_id");

                        oci_execute($stid);
                        oci_fetch_all($stid, $row, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                        if (!empty($row[0]["TITLE"])) {
                            foreach ($row as $value) {

                             echo '<div class="oeuvre-container text-center">
                                    <div class="histoire text-center">
                                     <a href="ecriture.php?story_id='.$value["STORY_ID"].'"><img class="oeuvre_cover" src="'.$value["COVER"].'">
                                    </div>
                                    <h4>'.$value["TITLE"].'</h4></a>
                                </div>';

                            }
                        }

                        else{
                                echo "<h4>*Pas encore d'oeuvres*</h4>";
                            }
                        
                        
                ?>    


            </div>
        </div>
    </div>

    <?php
        require 'footer.php';
    ?>      
</body>
</html>