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
    if (isset($_FILES["user_photo"]["tmp_name"])) {
        $dao1 =new dao ();

        
        $dao1->set_image($_FILES,$_SESSION["USERNAME"]);

        $desc = $_POST["description"];
        $desc=str_replace("'", "''", $desc);
        $conn = oci_connect('MAB7', '176904', 'localhost/XE');
        $user_id=$_SESSION["USER_ID"];
        $stid = oci_parse($conn, "UPDATE users set description='$desc' where user_id=$user_id");
        oci_execute($stid);
        

        header ('location:profile.php');
        
    }else{
        echo "échec d'operation!";
    }



    


?>