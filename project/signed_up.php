<?php
    require 'dao.php';
    if (isset($_POST["lname"])) {
        $dao1 =new dao ();
        
        $dao1->signup($_POST["lname"],$_POST["fname"],$_POST["email"],$_POST["birthdate"],$_POST["gender"],$_POST["username"],$_POST["password"]);
            
        header("location:index.php");

        }
        
    

?>