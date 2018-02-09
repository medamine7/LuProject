<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Découvrez | Lu.</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="message_style.css">
	<link rel="stylesheet" type="text/css" href="style.css">



</head>
<body>
	<?php
        require 'header.php';


        $conn = oci_connect('MAB7', '176904', 'localhost/XE');
        $uid=$_SESSION["USER_ID"];
        $query="SELECT message, username, user_photo, from_id FROM messages m ,users,header h where from_id=user_id and h5header_id=m5header_id and to_id=$uid";
         
        $stid = oci_parse($conn, str_replace('5','.',$query));

        oci_execute($stid);

        oci_fetch_all($stid,$res,null,null,OCI_FETCHSTATEMENT_BY_ROW);

       // var_dump($res);
        ?>

        




        <div class="container" style="padding-top:30px">
    <div class="row">

        <?php
        echo "<div class='jumbotron jumbotron-marge'><h4 class='text-center'>Envoyer un message:</h4><hr>
            <form method='post' action='send_message.php'>
                <div class='form-group'>
                    <label for='destinataire'>Destinataire:</label>
                    <input name='destinataire' class='form-control' type='text' autofocus>                    
                </div>
                <div class='form-group'>
                    <label for='text'>Message:</label>
                    <textarea name='message' class='form-control' cols='30' rows='3' placeholder='Ajouter un message...''></textarea>
                </div>
                <button style='float:right;' type='submit' class='btn btn-primary'>Envoyer</button>
            </form>
        </div>";


        echo "<h4 class='text-center'>Boîte de récéption:</h4><hr>";

        foreach ($res as $meh) {
            
            echo '<div class="col-sm-4">
                        <div id="tb-testimonial" class="testimonial testimonial-default">
                            <div class="testimonial-section">
                                '.$meh["MESSAGE"].'
                            </div>
                            <div class="testimonial-desc">
                                <a href="foreign_profile.php?user_id='.$meh["FROM_ID"].'"><img src="'.$meh["USER_PHOTO"].'" >
                                <div class="testimonial-writer">
                                    <div class="testimonial-writer-name">'.$meh["USERNAME"].'</div></a>
                                 </div>
                            </div>
                        </div> </div> 
                    ';

        }

        
        ?>

    </div>
</div>


 
           
       
        

    <?php

        require 'footer.php';
    ?>      
</body>
</html>