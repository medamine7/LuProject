<?php
session_start();


echo "<!DOCTYPE html>
<html>
<head>
	<title>".$_SESSION["FIRST_NAME"]." ".$_SESSION["LAST_NAME"]." | Lu.</title>";
    ?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

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

    <div class="profile">
        <div class="container-fluid">
            <div class="properties_bar profile-marge">
                
                <?php
                $conn = oci_connect('MAB7', '176904', 'localhost/XE');
                $user_id=$_SESSION["USER_ID"];
                $stid = oci_parse($conn, "SELECT user_photo from users where user_id=$user_id");
                oci_execute($stid);
                $img = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

                $_SESSION['USER_PHOTO']=$img["USER_PHOTO"];
                  echo '<div class="user_photo_container"><img class="user_photo" src="'.$_SESSION['USER_PHOTO'].'"></div>';
                          ?>
                
                <?php echo '<h3>'.$_SESSION['FIRST_NAME'].' '.$_SESSION['LAST_NAME'].'</h3>'; 
                echo '<h5>@'.$_SESSION['USERNAME'].'</h5>';
                ?>
                <ul style="margin-right: 30px;">
                    <!--<li><span class="profile_counter">999</span>Abonnées</li>-->
                    <?php
                    $conn = oci_connect('MAB7', '176904', 'localhost/XE');
                    $user_id=$_SESSION["USER_ID"];
                    $stid = oci_parse($conn, "SELECT count(title) as value from stories where user_id=$user_id");
                    oci_execute($stid);
                    $o_count= oci_fetch_assoc($stid); //oeuvre count
                    $o_count=$o_count["VALUE"];
                    $stid = oci_parse($conn, "SELECT count(user_id) as value from reading_list where user_id=$user_id");
                    oci_execute($stid);
                    $l_count= oci_fetch_assoc($stid);//lecture count
                    $l_count=$l_count["VALUE"];
             
                          
                    echo '<li><span class="profile_counter">'.$o_count.'</span>Oeuvres</li>
                    <li><span class="profile_counter">'.$l_count.'</span>Lectures</li>';
                    ?>
                </ul>            
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="jumbotron">
                        <h4 class="profile_hl">Biography</h4>
                        
                        <?php

                                $stid = oci_parse($conn, "SELECT description FROM users where user_id=$user_id");

                                oci_execute($stid);

                                $description=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

                                if (!is_null($description["DESCRIPTION"])) {
                                    
                                    $description=$description['DESCRIPTION']->load();
                                }
                                else{
                                    $description="*Aucune description*";
                                }
                            
                            echo '<p>'.$description.'</p>';



                        ?>
                        <hr>
                        <!--<h4>inscrit le: <span>19/02/96</span></h4>-->
                        
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="jumbotron">
                        <h4 class="profile_hl">Mes Oeuvres</h4> 

                        <?php
                    
                        $stid = oci_parse($conn, "SELECT * FROM stories where user_id=$user_id");

                        oci_execute($stid);
                        oci_fetch_all($stid, $row, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                        if (!empty($row[0]["TITLE"])) {
                            foreach ($row as $value) {

                                 echo '<div class="oeuvre-container text-center">
                                        <div class="histoire text-center">
                                         <a href="lecture.php?story_id='.$value["STORY_ID"].'"><img class="oeuvre_cover" src="'.$value["COVER"].'">
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
                <div class="col-lg-offset-4 col-lg-8">
                    <div class="jumbotron">
                        <h4 class="profile_hl">Liste de lecture</h4>

                        <?php
                    
                        $stid = oci_parse($conn, "SELECT story_id FROM reading_list where user_id=$user_id");

                        oci_execute($stid);
                        oci_fetch_all($stid, $row, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                        if (!empty($row[0])) {
                            foreach ($row as $value) {
                                $s_id=$value["STORY_ID"];
                                 $stid = oci_parse($conn, "SELECT * FROM stories where story_id=$s_id");

                                oci_execute($stid);
                                oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);

                                 echo '<div class="oeuvre-container text-center">
                                        <div class="histoire text-center">
                                         <a href="lecture.php?story_id='.$res[0]["STORY_ID"].'"><img class="oeuvre_cover" src="'.$res[0]["COVER"].'">
                                        </div>
                                        <h4>'.$res[0]["TITLE"].'</h4></a>
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
        </div>
    </div>







    <?php
        require 'footer.php';
    ?>      
</body>
</html>