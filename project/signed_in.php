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
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $dao1 =new dao ();
        
        $dao1->signin($_POST["username"],$_POST["password"]);
        
    }


?>