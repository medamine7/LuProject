<?php

session_start();


$conn = oci_connect('MAB7', '176904', 'localhost/XE');
        $uid=$_SESSION["USER_ID"];
        $des=$_POST["destinataire"];
        $des=str_replace('@', '', $des);
        $msg=$_POST["message"];
        $msg=str_replace("'", "''", $msg);


        $query="SELECT user_id from users where username='$des'";
         
        $stid = oci_parse($conn, $query);

        oci_execute($stid);

        $destinataire=oci_fetch_assoc($stid);
        $destinataire=$destinataire["USER_ID"];

        $query="INSERT into header(from_id,to_id) values ($uid,$destinataire)";
         
        $stid = oci_parse($conn, $query);

        oci_execute($stid);

        $query="SELECT header_id from header where from_id=$uid and to_id=$destinataire";
         
        $stid = oci_parse($conn, $query);

        oci_execute($stid);

        $header_id=oci_fetch_assoc($stid);
        $header_id=$header_id["HEADER_ID"];
        $query="INSERT into messages (header_id,message) values ($header_id,'$msg')";
         
        $stid = oci_parse($conn, $query);

        oci_execute($stid);


        header("location:messages.php");


?>