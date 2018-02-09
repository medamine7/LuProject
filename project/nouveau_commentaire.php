<?php
    session_start();

                    
    $conn = oci_connect('MAB7', '176904', 'localhost/XE');
    $story_id=$_POST["story_id"];
    $user_id=$_SESSION["USER_ID"];
    $new_comment=$_POST["new_comment"];
    $new_comment=str_replace("'", "''", $new_comment);


    var_dump($user_id);
    $stid = oci_parse($conn, "INSERT into comments(story_id,commenter_id, comment_) values($story_id, $user_id,'$new_comment')");

    oci_execute($stid);

    header ('location:lecture.php?story_id='.$story_id);    
                
?>
