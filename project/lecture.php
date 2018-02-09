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

</head>
<body>
	<?php
        require 'header.php';

        $conn = oci_connect('MAB7', '176904', 'localhost/XE');
        $story_id=$_GET["story_id"];
        $stid = oci_parse($conn, "SELECT content, title, user_id FROM stories where story_id=$story_id");

        oci_execute($stid);

        $infos=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

        if ($infos==false) {
                    echo "<h2 class='properties_bar'>Erreur 404 : page introuvable</h2>";die();
                }

        if (!is_null($infos["CONTENT"])) {
             $story_content=$infos['CONTENT']->load();
        }
        else{
            $story_content="*Cette oeuvre n'as pas encore du contenu*";
        }
        $story_title=$infos["TITLE"];
    ?>

    <div class="container text-center">
        <hr>
        
        <?php

            if ($_SESSION["USER_ID"]==$infos["USER_ID"]) {
                echo '<a title="Supprimer" href="supprimer.php?story_id='.$story_id.'" class="btn btn-danger" style="float:right" onclick="confirm'."('Voulez-vous vraiment supprimer?')".'"><span class="glyphicon glyphicon-trash"></span></a>';
            }


            if ($_SESSION["USER_ID"] !=$infos["USER_ID"]) {
                echo '<a title="Ajouter à la liste de lecture" href="ajouter.php?story_id='.$story_id.'" class="btn btn-success " style="float:right;"><span class="glyphicon glyphicon-plus"></span></a>';
            }

            $uid=$infos["USER_ID"];
            $stid = oci_parse($conn, "SELECT first_name, last_name FROM users where user_id=$uid");

            oci_execute($stid);

            $names=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

            
            echo '<h2 style="font-weight:bold;">'.$story_title.'</h2>
            <hr>';
            
            if ($_SESSION["USER_ID"] !=$infos["USER_ID"]) {
            echo 'AUTEUR: <a href="foreign_profile.php?user_id='.$infos["USER_ID"].'"><span style="padding-left:10px"class="glyphicon glyphicon-user"></span>'.$names["FIRST_NAME"].' '.$names["LAST_NAME"].'</a>'; 
            }else{

                echo 'AUTEUR: <a href="foreign_profile.php?user_id='.$infos["USER_ID"].'"><span style="padding-left:10px"class="glyphicon glyphicon-user"></span> Vous</a>';
            }

            echo '<hr style="width:25%"><div class="jumbotron"><p id="text">'.$story_content.'</p></div> 
            <input name="story_id" value="'.$_GET["story_id"].'" type="hidden">';



            echo "<div class='well'>";

            include 'comment.php';


            echo "</div>"; 

            ?>
           
       
        

    </div>

    <?php
        require 'footer.php';
    ?>      
</body>
</html>