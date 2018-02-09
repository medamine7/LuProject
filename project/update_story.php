<?php
    session_start();

                    
    $conn = oci_connect('MAB7', '176904', 'localhost/XE');
    $story_content=$_POST["story_content"];
    $story_content=str_replace("'", "''", $story_content);
    $story_id=$_POST["story_id"];

    $stid = oci_parse($conn, "UPDATE stories set content='".$story_content."' where story_id=$story_id");

    oci_execute($stid);

    header ('location:decouvrez.php');    
                
?>
