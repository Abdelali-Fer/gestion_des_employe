<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employé</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/plus.png"> <p>Ajouter</p></a>
        <table>
       
            <tr id="items">
                <th>Nom</th>
                <th>prenom</th>
                <th>age</th>
                <th>Modifier</th>
                <th>supprimer</th>
            </tr>
            <?php
             //inclure a la page de connexion
              include_once "connexion.php";
              //requet pour afficher la liste des employes
              $req =mysqli_query($conn ,"SELECT * from employe");
              if(mysqli_num_rows($req) == 0){
                //s'il n'ya pas d'employe ajouter alors on vas afficher ce message
                echo "il n'ya pas encore d'employe ajouter";
              }else{
                //si non ,affichons la liste de toute les employe
                while($row=mysqli_fetch_assoc($req)){
                    ?>
                        <tr>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['age']?></td>
                            <!-- nous alons mettre l'id de chaque employe dans ce lien-->
                            <td> <a href="modifier.php?id=<?=$row['id']?>"> <img src="images/pen.png" ></a></td>
                            <td> <a href="supprimier.php?id=<?=$row['id']?>"> <img src="images/trash.png" > </a></td>
                        </tr>
                    <?php
                }
              }
            ?>
        </table>
    </div>
 
</body>
</html>