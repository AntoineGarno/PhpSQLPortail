<?php
//Se connecter a la base de données
include "connexion-pdo.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué
if(isset($_POST["submit"])){
    //Préparation des données
    $codePermanent = $_POST["codePermanent"];
    $nomComplet = $_POST["nomComplet"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $moyenne = $_POST["moyenne"];
    $codeGroupe = $_POST["codeGroupe"];
    //Création de la requete préparée
    $insertionAuto = $conn->prepare(
        "INSERT INTO etudiant (codePermanent, nomComplet, adresse, telephone, moyenne,codeGroupe )
        VALUES (:codePermanent, :nomComplet, :adresse, :telephone, :moyenne, :codeGroupe)"
    );
    //Liaison des valeurs avec les marqueurs
    $insertionAuto->bindParam(':codePermanent', $codePermanent);
    $insertionAuto->bindParam(':nomComplet', $nomComplet);
    $insertionAuto->bindParam(':adresse', $adresse);
    $insertionAuto->bindParam(':telephone', $telephone);
    $insertionAuto->bindParam(':moyenne', $moyenne);
    $insertionAuto->bindParam(':codeGroupe', $codeGroupe);
    //Éxécution de requete
    $insertionAuto->execute();
}
?>
<head>
    <meta charset="UTF-8">
    <title>AjouterEtudiant</title>
    <link rel="stylesheet" href="styles.css" type="text/css">

    <style type="text/css">
        .vert{
                color: green;
            }
        .rouge{
            color: red;
            font-weight:bold;
            }
    </style>

</head>
<body>

<div class="container">
    <h1>Colnet O'sullivan</h1>

    <img src="./images/logo.jpg" alt="logo">

    <?php
        if (isset($_POST["submit"])){
            ?>
            <p>L'étudiant(e) <?php  echo $_POST["nomComplet"]?> a été ajouté(e) avec succès
            </p>
    <?php } ?>

    <h2>Veuillez vous connecter</h2>
    <form method="post" action="ajouterEtudiant.php">
        <div>
            <label for="codePermanent">Code permanent : </label>
            <input type="text" id="codePermanent" name="codePermanent" required>
        </div>
        <div>
            <label for="nomComplet">Nom complet: </label>
            <input type="text" id="nomComplet" name="nomComplet" required >
        </div>
        <div>
            <label for="adresse">Adresse : </label>
            <input type="text" id="adresse" name="adresse" required >
        </div>
        <div>
            <label for="telephone">Téléphone : </label>
            <input type="text" id="telephone" name="telephone" required >
        </div>
        <div>
            <label for="moyenne">Moyenne : </label>
            <input type="text" id="moyenne" name="moyenne" required >
        </div>
        
        <div>
            <label for="codeGroupe">Choisir un groupe :</label>
            <select name="codeGroupe" required>
                <option value="WEBA21C">WEBA21C</option>
                <option value="WEBA21H">WEBA21H</option>
                <option value="WEBA21L">WEBA21L</option>
                <option value="WEBH21C">WEBH21C</option>
            </select>
        </div>
        <div class="btnwrap">        
            <input class="button" type="submit" name="submit" value="Ajouter">          
        </div>
        <p class="accueil">Revenir vers l'<a href="./pageAccueil.php">accueil</a>
        </p>
    </form>
    


           
    

<?php include "footer.php";?>
</div>
</body>
</html>