<?php
    session_start();

    if (isset($_SESSION) || !empty($_SESSION)) {
        
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

    <style type="text/css">
        .navbar{
            margin: 0;
        }
    </style>
</head>
<body>
    <?php
        require 'header.php';
    ?>
    <div class="container-fluid">
        <?php require 'sidebar.php' ?>

        <div class="container-fluid">
            <div class="col-md-12">
                <div class="glyphicon glyphicon-menu-hamburger menu-icon"></div>

                <div class="jumbotron jumbo_histoire text-center jumbotron-marge">

                     <?php
                    $conn = oci_connect('MAB7', '176904', 'localhost/XE');

                    $user_id=$_SESSION["USER_ID"];
                    $stid = oci_parse($conn, "SELECT * FROM stories where genre='action'");

                    oci_execute($stid);
                    oci_fetch_all($stid, $row, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                   // var_dump($row);
                    foreach ($row as $value) {
                         echo '<div class="oeuvre-container">
                                <div class="histoire text-center">
                                <a href="lecture.php?story_id='.$value["STORY_ID"].'"><img class="oeuvre_cover" src="'.$value["COVER"].'">
                                 <img class="oeuvre_cover" src="'.$value["COVER"].'">
                                </div>
                                <h4>'.$value["TITLE"].'</h4></a>
                            </div>';
                    }

                  ?>    


                </div>
            </div>
        </div>
</div>


    <?php
        require 'footer.php';

    }

    ?> 

    <script src="sidebarscript.js"></script>
     
</body>
</html>