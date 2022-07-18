<?php
//Se connecter a la base de données
include "connexion-pdo.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué
if(isset($_POST["submit"])){
    //Préparation des données
    $nomComplet = $_POST["nomComplet"];
    $username = $_POST["username"];
    $codePostal = $_POST["codePostal"];
    $email = $_POST["email"];
    $motDePasse = $_POST["motDePasse"];
    //Création de la requete préparée
    $insertionAuto = $conn->prepare(
        "INSERT INTO utilisateurs (nomComplet, username, codePostal, email, motDePasse)
        VALUES (:nomComplet, :username, :codePostal, :email, :motDePasse)"
    );
    //Liaison des valeurs avec les marqueurs
    $insertionAuto->bindParam(':nomComplet', $nomComplet);
    $insertionAuto->bindParam(':username', $username);
    $insertionAuto->bindParam(':codePostal', $codePostal);
    $insertionAuto->bindParam(':email', $email);
    $insertionAuto->bindParam(':motDePasse', $motDePasse);
    //Éxécution de requete
    $insertionAuto->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Compte</title>
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

    <h2>Veuillez créer un compte</h2>
    <form method="post" action="pageCompte.php">
        <div>
            <label for="nomComplet">Nom complet : </label>
            <input type="text" id="nomComplet" name="nomComplet" required>
        </div>
        <div>
            <label for="username">Username : </label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="codePostal">Code postal : </label>
            <input type="text" id="codePostal" name="codePostal" required>
        </div>
        <div>
            <label for="email">Email : </label>
            <input type="text" id="email" name="email" required>
        </div>
        <div>
            <label for="motDePasse">Mot de passe : </label>
            <input type="password" id="motDePasse" name="motDePasse" required>
        </div>
        <div class="btnwrap">        
            <input class="button" type="submit" name="submit" value="S'enregistrer">
        </div>
        
    </form>
    
    <?php
        if (isset($_POST["submit"])){
            ?>
            <p class="vert">Votre compte a été créé, vous pouvez vous
            <a href="./pageConnexion.php">connecter</a></p>
    <?php } ?>

    <?php include "footer.php";?>
</div>


</body>
</html>