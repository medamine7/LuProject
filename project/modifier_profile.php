<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>nom d'utilisateur | Lu.</title>
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

    <div class="profile">
        <div class="container-fluid">
            <div class="properties_bar profile-marge">
                 <?php echo '<div class="user_photo_container"><img class="user_photo" src="'.$_SESSION['USER_PHOTO'].'"></div>';
                          ?>
                <?php echo '<h3>'.$_SESSION['FIRST_NAME'].' '.$_SESSION['LAST_NAME'].'</h3>'; 
                echo '<h5>@'.$_SESSION['USERNAME'].'</h5>';
                ?>
                         
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="jumbotron">
                        <label>Changer la biography:</label>
                        <form method="post" action="set_image.php"  enctype="multipart/form-data">
                           <?php 

                                $conn = oci_connect('MAB7', '176904', 'localhost/XE');

                                $user_id=$_SESSION["USER_ID"];
                                $stid = oci_parse($conn, "SELECT description FROM users where user_id=$user_id");

                                oci_execute($stid);

                                $description=oci_fetch_assoc($stid);

                                 if (!is_null($description["DESCRIPTION"])) {
                                    
                                    $description=$description['DESCRIPTION']->load();
                                }
                                else{
                                    $description=null;
                                }
                            
                            echo '<textarea style="border:none;border-radius:4px ; background-color:#eee;width:100%;max-width: 100%;" name="description" autofocus>'.$description.'</textarea>';
                           ?>                   
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="jumbotron">
                            <div class="form-group">
                                <label>Changer la photo du profile:</label>
                            </div>
                            <div class="form-group">   
                                <input type="file" name="user_photo">
                            </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" style="width: 100%;" type="submit" name="update_profile">ok</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    
        require 'footer.php';
    ?>      
</body>
</html>