<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
        //connexsion a la base de donnes
        include_once "connexion.php";
        //récupération de id 
        $id =$_GET['id'];
        //requet de récupération des encien information
        $req = mysqli_query($conn,"SELECT * FROM employe where id=$id");
        $row = mysqli_fetch_assoc($req);
        //vérifier que le botton modifier a été bien cliqué
        if(isset($_POST['button'])){
            //extraction des information envoyé dans des varaible par la method post
            extract($_POST);
            //vérifier que tout les champs ont été remplir
            if(isset($nom) && isset($prenom) && $age){
                $req = mysqli_query($conn,"UPDATE employe set nom='$nom' , prenom='$prenom' , age ='$age' where id =$id");
                if($req){ //si la requete a été éffectuee avec succé ,on fait une redirection
                    header("location:index.php");
                }else{
                    $message = "employe non modifier";
                }
            }else{ 
                $message = "veuillez remplir tout les champs !";
            }
        }
     ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> <p>Retour</p></a>
        <h2>Modifier l'employé : <?=$row['nom']?> </h2>
        <p class="error_mesg">
                <?php
                    if(isset($message)){
                        echo $message;
                    }
                ?>
        </p>
        <form action="" method="post">
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>">
            <label>Prenom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>">
            <label>Age</label>
            <input type="number" name="age" value="<?=$row['age']?>">
            <input type="submit" value="modifier" name="button">
        </form>
    </div>
    
</body>
</html>