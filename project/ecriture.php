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
        $stid = oci_parse($conn, "SELECT content FROM stories where story_id=$story_id");


        oci_execute($stid);

        $story_content=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

        if (!is_null($story_content["CONTENT"])) {
             $story_content=$story_content['CONTENT']->load();
        }
        else{
            $story_content=null;
        }
       
    ?>

    <div class="container-fluid text-center">
        <hr>
        <h3> À vous d'écrire...</h3>
        <hr>
        <?php
            echo '<form method="post" action="update_story.php">'; 
             
            echo '<textarea name="story_content" autofocus style="width: 100%; height: 500px; padding:20px 300px; font-size: 20px; border: 0;">'.$story_content.'</textarea> 
            <input name="story_id" value="'.$_GET["story_id"].'" type="hidden">
            <button class="btn btn-lg" type="submit"  style=" float:right; display: block; margin: 30px;">Enregistrer</button>
             </form>';
            ?>
           
       
        

    </div>

    <?php
        require 'footer.php';
    ?>      
</body>
</html>