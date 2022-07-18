<?php
//Se connecter a la base de données
include "connexion-pdo.php";
//Si le formulaire a été rempli -- Si le bouton submit a été cliqué

?>
<head>
    <meta charset="UTF-8">
    <title>AfficherDonnées</title>
    <link rel="stylesheet" href="styles.css" type="text/css">

</head>
<body>

<div class="container">
    <h1>Colnet O'sullivan</h1>

    <img src="./images/logo.jpg" alt="logo">

            <?php
                if(isset($_POST["submit"])){
                   
                try{
                    $codeGroupe  = $_POST["codeGroupe"];
                    $triMoy = $_POST["triMoy"];
                    $sql = ("SELECT * FROM etudiant WHERE codeGroupe = '$codeGroupe' order by moyenne $triMoy");   
                    $result = $conn->query($sql);
                    if($result->rowCount() > 0){
                        echo "<table>";
                            echo "<tr>";
                                echo "<th>Code Permanent</th>";
                                echo "<th>Nom Complet</th>";
                                echo "<th>Adresse</th>";
                                echo "<th>Téléphone</th>";
                                echo "<th>Moyenne</th>";
                                echo "<th>Groupe</th>";
                            echo "</tr>";
                        while($row = $result->fetch()){
                            echo "<tr>";
                                echo "<td>" . $row['codePermanent'] . "</td>";
                                echo "<td>" . $row['nomComplet'] . "</td>";
                                echo "<td>" . $row['adresse'] . "</td>";
                                echo "<td>" . $row['telephone'] . "</td>";
                                echo "<td>" . $row['moyenne'] . "</td>";
                                echo "<td>" . $row['codeGroupe'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        // Free result set
                        unset($result);
                    }
                }catch(PDOException $e){
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                }
            }
                ?>
            





    <h2>Veuillez appliquer vos filtres</h2>
    <form method="post" action="afficherDonnees.php">
        <div>
            <label for="codeGroupe">Choisir un groupe :</label>
            <select name="codeGroupe" required>
                <option value="WEBA21C">WEBA21C</option>
                <option value="WEBA21H">WEBA21H</option>
                <option value="WEBA21L">WEBA21L</option>
                <option value="WEBH21C">WEBH21C</option>
            </select>
        </div>
        
        <div>
            <label for="triMoy">Tri sur la moyenne :</label>
            <select name="triMoy" required>
                <option value="ASC">Ascendant</option>
                <option value="DESC">Descendant</option>
                
            </select>
        </div>
        <div class="btnwrap">        
            <input class="button" type="submit" name="submit" value="Afficher Resultats">          
        </div>
        <p class="accueil">Revenir vers l'<a href="./pageAccueil.php">accueil</a>
        </p>
        
    </form>
    


           
    

<?php include "footer.php";?>
</div>
</body>
</html>