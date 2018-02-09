<?php

	//require 'users.php';

     class dao 
    {
        


        public function signup($last_name, $first_name, $email, $birthdate, $gender, $username, $password){
        	$conn = oci_connect('MAB7', '176904', 'localhost/XE');
        	//$user1=new users($last_name, $first_name, $email, $birthdate, $gender, $username, $password);


			$stid = oci_parse($conn, "INSERT INTO users( last_name,first_name,email,birthdate,gender,username,password) VALUES ('$last_name','$first_name','$email','$birthdate','$gender','$username','$password')");

			oci_execute($stid);

        }


        public function signin($username,$password){
            $conn = oci_connect('MAB7', '176904', 'localhost/XE');
            $stid = oci_parse($conn, "SELECT user_id, username, first_name,last_name, user_photo FROM users WHERE username='$username' AND password='$password'");

            oci_execute($stid);
            $row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
            
            if (empty($row)) {
                echo '<div class="alert alert-danger">
                        <strong>Erreur!</strong> Nom d’utilisateur ou mot de passe incorrect,réssayez.
                    </div>
                    <div class="text-center">
                    <img style="width:300px;height:auto;" src="img/error.png" draggable="false">
                    <h2>Redirection...</h2></div>
                    <meta http-equiv="refresh" content="2;url=login_form.php">';
            }

            else{
                session_start();
                $_SESSION=$row;
                header ("location:Decouvrez.php");
                
            }

        }


        public function set_image($file, $username){
            $conn = oci_connect('MAB7', '176904', 'localhost/XE');
            //var_dump($file);
            move_uploaded_file($file['user_photo']["tmp_name"],'img/'.$file['user_photo']["name"]);
            //
            $stid = oci_parse($conn, "UPDATE users SET user_photo='img/".$file['user_photo']["name"]."' where username='".$username."'");

            oci_execute($stid);

    }


    public function nouvelle_oeuvre($story_title,$story_genre,$story_status,$story_language,$file){
        $conn = oci_connect('MAB7', '176904', 'localhost/XE');
            move_uploaded_file($file['story_cover']["tmp_name"],'img/'.$file['story_cover']["name"]);
            //
            $user_id=$_SESSION["USER_ID"];
            $stid = oci_parse($conn, "INSERT INTO stories( user_id,title,status,language,genre,cover) VALUES ('$user_id','$story_title','$story_status','$story_language','$story_genre','img/".$file['story_cover']["name"]."')");

            oci_execute($stid);

            $stid = oci_parse($conn, "SELECT max(story_id) as story_id from stories");

            oci_execute($stid);
            $story=oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
            $story=$story["STORY_ID"];

            header("location:ecriture.php?story_id=".$story);

    }

}

?>