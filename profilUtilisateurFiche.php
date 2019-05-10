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

$rep="<div class='col-6'><img class='img-fluid' src='images/avatarfemme.png'></div>";
$rep.="<div class='col-6'>";

try{
   $stmt = $connexion->prepare($requete);
   $stmt->execute(array($idSession));
   while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
    //echo "coucou";
    //$rep[]=$ligne;
    $rep.="<form method='post'  action='profilUtilisateurModifier.php'>";
    $rep.=" <p> Nom : <input name='nom' value=$ligne->nom id='nom' ><br> ";
    $rep.="<p> Prénom : <input  name='prenom' value=$ligne->prenom><br>";
    $rep.="<p> Ville : <input  name='ville' value=$ligne->ville></p>";
    $rep.="<p>  Date de naissance : <input name='dateNaissance' value=$ligne->dateNaissance></p>";
    $rep.="<p> Code Postal : <input name='codePostale' value=$ligne->codePostale></p>";
    $rep.="<p> Téléphone : <input  name='telephone' value=$ligne->telephone></p>";
    $rep.="<button class='btn btn-primary' type='submit' >Confirmer </button>";
    $rep.="</form>";

  
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