<?php
include("bd/connexion.php");
session_start();

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
      <h1>Mon profil</h1>
      </div>
        
      <?php
global $connexion, $rep, $idSession;

$requete = "SELECT * FROM utilisateur WHERE idUser='$idSession'";

$rep="<div class='col-6'><img src='images/avatarfemme.png'></div>";
$rep.="<div class='col-6'>";

try{
   $stmt = $connexion->prepare($requete);
   $stmt->execute(array($idSession));
   while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
    //echo "coucou";
    //$rep[]=$ligne;
    $rep.="<h2>".($ligne->nom)." ".($ligne->prenom)."</h2>";
    $rep.="<p> Ville : ".($ligne->ville)."</p>";
    $rep.="<p> Date de naissance : ".($ligne->dateNaissance)."</p>";
    $rep.="<p> Code Postal : ".($ligne->codePostale)."</p>";
    $rep.="<p> Téléphone : ".($ligne->telephone)."</p>";
    $rep.="<button type='button' class='btn btn-warning'>Modifier</button>";

  
  }
  $rep.="</div>";
 }
 catch (Exception $e){
  echo "Problème controleur pour lister infos.";
 }
 finally {
  unset($connexion);
  unset($stmt);
  echo ($rep);
 }

       
       ?>
        
        
      </div>
    </div>
    <!-- fin container -->

    
</div>

 

       
<!-- fin container -->

<?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>