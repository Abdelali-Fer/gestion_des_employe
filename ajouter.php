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
          //vérifier que le botton ajouter a été bien cliqué
          if(isset($_POST['button'])){
            //extraction des information envoyé dans des varaible par la method post
            extract($_POST);
            //vérifier que tout les champs ont été remplir
            if(isset($nom) && isset($prenom) && $age){
                //connexsion a la base de donnes
                include_once "connexion.php";
                //requet d'ajouter
                $req = mysqli_query($conn,"INSERT INTO employe VALUES('NULL','$nom','$prenom','$age')");
                if($req){ //si la requete a été éffectuee avec succé ,on fait une redirection
                    header("location:index.php");
                }else{
                    $message = "employe non ajouter";
                }
            }else{ 
                $message = "veuillez remplir tout les champs !";
            }
          }
     ?>

    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> <p>Retour</p></a>
        <h2>Ajouter un employé</h2>
        <p class="error_mesg">
            <?php
               if(isset($message)){
                echo $message;
               }
            ?>
        </p>
        <form action="" method="post">
            <label>Nom</label>
            <input type="text" name="nom">
            <label>Prenom</label>
            <input type="text" name="prenom">
            <label>Age</label>
            <input type="number" name="age">
            <input type="submit" value="ajouter" name="button">
        </form>
    </div>
    
</body>
</html>