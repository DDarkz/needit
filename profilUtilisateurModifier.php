<?php
include("bd/connexion.php");
session_start();
//echo "POST";
//requete update
global $connexion,$idSession;
	echo $idSession;
// $requete="UPDATE utilisateur SET nom=?,prenom=? WHERE idUser='$idSession'";
// $stmt=$connexion->prepare($requete);
// $stmt->execute(array($nom,$prenom,$idSession));
// echo "informations bien modifié";
// unset($connexion);
// unset($stmt);	
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="vues/vues.js"></script>
    <script type="text/javascript" src="requetes/requetes.js"></script>
    <title>Profil</title>
  </head>
  <body>
  <!-- debut container -->
  <div class="container pt-5">
    
      
  
    <?php include("includes/menu.php"); ?>
    <div class="container pt-5">
      <div class="row">
      <div class='col-12'>
      <h1>Modifier mon profil</h1>
      </div>
        
<?php
       
        
        //requete update
        global $connexion,$idSession;
        echo $idSession;
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $ville=$_POST['ville'];
        $dateNaissance=$_POST['dateNaissance'];
        $codePostale=$_POST['codePostale'];
        $telephone=$_POST['telephone'];
        

        

$requete="UPDATE utilisateur SET nom=?,prenom=?,ville=?,dateNaissance=?,codePostale=?,telephone=? WHERE idUser='$idSession'";
 $stmt=$connexion->prepare($requete);
$stmt->execute(array($nom,$prenom,$ville,$dateNaissance,$codePostale,$telephone));
 echo "informations bien modifié";
unset($connexion);
unset($stmt);	
?>
      
    </div>
 
</div>
</div>
<!-- fin container -->

<?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>