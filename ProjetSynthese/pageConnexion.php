
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="styles.css" type="text/css">

    <style type="text/css">
        .vert{
                color: green;
            }
        .rouge{
            color: red;
            font-weight: bold;
            }
    </style>

</head>
<body>

<div class="container">
    <h1>Colnet O'sullivan</h1>

    <img src="./images/logo.jpg" alt="logo">

    <h2>Veuillez vous connecter</h2>
    <form method="post" action="pageConnexion.php">
        <div>
            <label for="username">Nom d'utilisateur : </label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="motDePasse">Mot de passe : </label>
            <input type="password" id="motDePasse" name="motDePasse" required >
        </div>
        <div class="btnwrap">        
            <input class="button" type="submit" name="submit" value="Connexion">
            <input class="button" type="button" onclick="location.href='pageCompte.php'" value="Créer un compte">
        </div>
        
    </form>
     <?php


     include "connexion-mysqli.php";

if (isset($_POST["submit"])){
        $username = $_POST['username'];  
        $motDePasse = $_POST['motDePasse'];  
          
        
            $username = stripcslashes($username);  
            $motDePasse = stripcslashes($motDePasse);  
            $username = mysqli_real_escape_string($con, $username);  
            $motDePasse = mysqli_real_escape_string($con, $motDePasse);  
          
            $sql = "select * from utilisateurs where username = '$username' and motDePasse = '$motDePasse'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
              
            if($count == 1){  
                echo "<p class='vert'>Votre compte a été créé, vous pouvez acceder à <a href='./pageAccueil.php'>l'accueil</a></p>";  
            }  
            else{  
                echo "<p class='rouge'>Crédentiels invalides, vérifiez vos informations ou créez un compte</p>"; 
            }     
        }
        ?>  


           
    

<?php include "footer.php";?>
</div>
</body>
</html>