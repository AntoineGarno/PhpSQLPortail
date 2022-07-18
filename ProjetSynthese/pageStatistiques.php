
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
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

<?php


include "connexion-mysqli.php";
  
$sql = "SELECT COUNT(*) AS total from etudiant";
$result = $con->query($sql);
$data =  $result->fetch_assoc();


$sql = "SELECT COUNT(*) AS total from etudiant where moyenne > 12";
$result = $con->query($sql);
$data2 =  $result->fetch_assoc();

// Taux reussite en ligne
$sql = "Select count(moyenne) from (SELECT * FROM groupe LEFT JOIN Etudiant ON groupe.code = etudiant.codeGroupe where groupe.type = 'En ligne') as value";
$result = $con->query($sql);
$data3 =  $result->fetch_assoc();
$nbEtudiantL = $data3['count(moyenne)'];

$sql = "Select count(moyenne) from (SELECT * FROM groupe LEFT JOIN Etudiant ON groupe.code = etudiant.codeGroupe where groupe.type = 'En ligne') as value where moyenne> 12";
$result = $con->query($sql);
$data4 =  $result->fetch_assoc();
$reussiteL = ($data4['count(moyenne)']/ $nbEtudiantL) * 100;


// Taux reussite en Classe
$sql = "Select count(moyenne) from (SELECT * FROM groupe LEFT JOIN Etudiant ON groupe.code = etudiant.codeGroupe where groupe.type = 'En classe') as value";
$result = $con->query($sql);
$data5 =  $result->fetch_assoc();
$nbEtudiantC = $data5['count(moyenne)'];

$sql = "Select count(moyenne) from (SELECT * FROM groupe LEFT JOIN Etudiant ON groupe.code = etudiant.codeGroupe where groupe.type = 'En classe') as value where moyenne> 12";
$result = $con->query($sql);
$data6 =  $result->fetch_assoc();
$reussiteC = ($data6['count(moyenne)']/ $nbEtudiantC) * 100;


// Taux reussite en Hybride
$sql = "Select count(moyenne) from (SELECT * FROM groupe LEFT JOIN Etudiant ON groupe.code = etudiant.codeGroupe where groupe.type = 'Hybride') as value";
$result = $con->query($sql);
$data7 =  $result->fetch_assoc();
$nbEtudiantH = $data7['count(moyenne)'];

$sql = "Select count(moyenne) from (SELECT * FROM groupe LEFT JOIN Etudiant ON groupe.code = etudiant.codeGroupe where groupe.type = 'Hybride') as value where moyenne> 12";
$result = $con->query($sql);
$data8 =  $result->fetch_assoc();
$reussiteH = ($data8['count(moyenne)']/ $nbEtudiantH) * 100;

?>


<div class="container">
    <h1>Colnet O'sullivan</h1>

    <img src="./images/logo.jpg" alt="logo">

    <h2>Veuillez consulter les statistiques des étudiants</h2>
    
    <p><?php echo $data['total'];?> étudiants Ont été évalués</p>
    <p><?php echo $data2['total'];?> étudiants Ont réussi</p>
    <p>Le taux de réussite en ligne est <?php echo number_format($reussiteL,2);?> %</p>
    <p>Le taux de réussite en classe est <?php echo number_format($reussiteC,2);?> %</p>
    <p>Le taux de réussite en hybride est <?php echo number_format($reussiteH,2);?> %</p>
        


           
    

<?php include "footer.php";?>
</div>
</body>
</html>