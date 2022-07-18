<?php
//Se connecter a la base de données
include "connexion-pdo.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué
if(isset($_POST["submit"])){
    //Préparation des données
    $code = $_POST["code"];
    $nomGroupe = $_POST["nomGroupe"];
    $Ctype = $_POST["Ctype"];
    //Création de la requete préparée
    $insertionAuto = $conn->prepare(
        "INSERT INTO groupe (code, nom , type)
        VALUES (:code, :nomGroupe, :Ctype)"
    );
    //Liaison des valeurs avec les marqueurs
    $insertionAuto->bindParam(':code', $code);
    $insertionAuto->bindParam(':nomGroupe', $nomGroupe);
    $insertionAuto->bindParam(':Ctype', $Ctype);
    //Éxécution de requete
    $insertionAuto->execute();
}
?>
<head>
    <meta charset="UTF-8">
    <title>AjouterGroupe</title>
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
            <p>Le groupe <?php  echo $_POST["code"]?> a été ajouté avec succès
            </p>
    <?php } ?>

    <h2>Ajouter un groupe</h2>
    <form method="post" action="ajouterGroupe.php">
        <div>
            <label for="code">Code : </label>
            <input type="text" id="code" name="code" required>
        </div>
        <div>
            <label for="nomGroupe">Nom : </label>
            <input type="text" id="nomGroupe" name="nomGroupe" required >
        </div>
        
        <div>
            <label for="Ctype">Choisir un type :</label>
            <select name="Ctype" required>
                <option value="En ligne">En ligne</option>
                <option value="En classe">En classe</option>
                <option value="Hybride">Hybride</option>
            </select>
        </div>
        <div class="btnwrap">        
            <input class="button" type="submit" name="submit" value="Ajouter"> 
                     
        </div>
        <p class="accueil">Revenir vers l'<a href="./pageAccueil.php">accueil</a></p>
        
    </form>
    


           
    

<?php include "footer.php";?>
</div>
</body>
</html>