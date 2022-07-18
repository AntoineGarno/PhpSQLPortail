<?php
//Se connecter a la base de données
include "connexion-pdo.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="styles.css" type="text/css">

    <style type="text/css">
        .vert{
                color: green;
            }
    </style>

</head>
<body>

<div class="container">
    <h1>Colnet O'Sullivan</h1>

    <img src="./images/logo.jpg" alt="logo">

    <h2>Veuillez faire un choix</h2>

    <nav>
        <ul>
            <li><a href="./ajouterGroupe.php">Ajouter un groupe</a></li>
            <li><a href="./ajouterEtudiant.php">Ajouter étudiant</a></li>
            <li><a href="./afficherDonnees.php">Afficher données</a></li>
            <li><a href="./pageStatistiques.php">Compiler statistiques</a></li>
        </ul>
    </nav>
   
    
    
    

    <?php include "footer.php";?>
</div>


</body>
</html>