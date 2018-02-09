<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Se connecter | Lu</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">

</head>
<?php
    require 'dao.php';
    if (isset($_POST["story_title"]) && isset($_POST["story_genre"])) {
        $dao1 =new dao ();
        
        $dao1->nouvelle_oeuvre($_POST["story_title"],$_POST["story_genre"],$_POST["story_status"],$_POST["story_language"],$_FILES);
        
    }


?>