<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<header>
        <div class="container-fluid">
            <div class="navbar">
                <h3 class="navbar-brand"  style="font-size:50px;font-family: 'Barbershop in Thailand';"><a href="decouvrez.php">Lu.</a></h3>
                <ul id="navlist">
                    <li class="navlink"><a href="decouvrez.php">Découvrir</a></li>
                    <li><a href="creez.php">Créer</a></li>
                    <li><a href="messages.php">Messages</a></li>
                </ul>
                <div class="searchbar-container">
                    <form class="form-inline" action="recherche.php" method="get">
                        <input class="form-control mr-sm-2" id="search_bar" type="text" placeholder="Rechercher des oeuvres" name="recherche">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true">  </span></button>
                    </form>
                </div>
                <div id="nom_utilisateur">
                    <?php
                        $conn = oci_connect('MAB7', '176904', 'localhost/XE');
                        $user_id=$_SESSION["USER_ID"];
                        $stid = oci_parse($conn, "SELECT user_photo from users where user_id=$user_id");
                        oci_execute($stid);
                        $img = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);

                        $_SESSION['USER_PHOTO']=$img["USER_PHOTO"];
                          
                    echo '<div class="userOptions"><img style="border-radius:50%;width:30px; height:30px;" src="'.$_SESSION['USER_PHOTO'].'">
                                <a href="profile.php">'.$_SESSION['FIRST_NAME'].' '.$_SESSION["LAST_NAME"].'</a><span class="glyphicon glyphicon-menu-down" id="disconnect-arrow"></span>';


                                ?>

                        <ul class="userOptionsList">
                            <a href="modifier_profile.php"><li>Modifier mon Profile</li></a><hr>
                            <a href="index.php"><li>Déconnecter</li></a>
                        </ul>
                    </div>  
                </div>
            </div>
        </div>  

        <script type="text/javascript">
            var disconnectArrow = document.getElementById('disconnect-arrow');
            var open=false;
            var userOptionsList = document.getElementsByClassName("userOptionsList")[0];
            window.addEventListener('click',closeOptions);

            disconnectArrow.addEventListener('click',function(){
                if (open===false) {
                    userOptionsList.style.display="block";
                    open=true;
                }
            });


            function closeOptions(e){
                if (open==true && e.target!=userOptionsList && e.target!=disconnectArrow) {
                    userOptionsList.style.display="none";
                    open=false;
                }
            }
        </script> 
    </header>