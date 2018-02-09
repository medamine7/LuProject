<?php
    session_start();

                    
    $conn = oci_connect('MAB7', '176904', 'localhost/XE');
    $story_id=$_GET["story_id"];

    $stid = oci_parse($conn, "DELETE from stories where story_id=$story_id");

    oci_execute($stid);

    header ('location:decouvrez.php');    
                
?>
