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

    <title>Profil</title>

    <?php include("includes/header-script.php"); ?>

  </head>
  <body id="page-top">

  <?php include("includes/menu.php"); ?>

  <!-- debut section -->
  <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
      <div class="row">
        <div class='col-12'>
          <h1>Mon profil</h1>
        </div>
        
            <?php
              //requete update
              global $connexion,$idSession;
              //echo $idSession;
              $nom=$_POST['nom'];
              $prenom=$_POST['prenom'];
              $sexe=$_POST['sexe'];
              $ville=$_POST['ville'];
              $dateNaissance=$_POST['dateNaissance'];
              $codePostale=$_POST['codePostale'];
              $telephone=$_POST['telephone'];
                      
              $requete="UPDATE utilisateur SET nom=?,prenom=?,sexe=?,ville=?,dateNaissance=?,codePostale=?,telephone=? WHERE idUser='$idSession'";
              $stmt=$connexion->prepare($requete);
              $stmt->execute(array($nom,$prenom,$sexe,$ville,$dateNaissance,$codePostale,$telephone));
              echo "Vos informations ont été bien modifié !";
              unset($connexion);
              unset($stmt);	
            ?>
    </div>
  </div>
  <!-- fin container -->
</section>


    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>