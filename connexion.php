<?php
    //connexion a la base de donnes 
    $conn = mysqli_connect("localhost","root","","gestion_employe");
    if(!$conn){
        echo "vous n'etes pas connecter a la base de donnes";
    }




?>