<?php
    session_start();

                    
    $conn = oci_connect('MAB7', '176904', 'localhost/XE');
    $story_id=$_GET["story_id"];
   	$user_id=$_SESSION["USER_ID"];

    $stid = oci_parse($conn, "INSERT into reading_list values( $user_id, $story_id)");

    oci_execute($stid);

	header ('location:lecture.php?story_id='.$story_id);    
                
?>
