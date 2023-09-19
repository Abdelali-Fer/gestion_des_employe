<?php
    //connexion a la base de donnes
    include_once "connexion.php";
    //recuperation de id dans le lien
    $id=$_GET['id'];
    // requet de suppresion
    $req = mysqli_query($conn,"DELETE FROM employe where id = $id");
    //redirection vers la page index.php
    header("location:index.php");
?>