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

    <title>Profil</title>

    <?php include("includes/header-script.php"); ?>

  </head>
  <body id="page-top">
  <!-- debut container -->
    
    <?php include("includes/menu.php"); ?>

    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
    <div class="container pt-5">
      <div class="row">
        <div class='col-12'>
          <h1>Mon profil</h1>
        </div>
        
      <?php
        global $connexion, $rep, $idSession;

        $requete = "SELECT * FROM utilisateur WHERE idUser='$idSession'";
        $stmt = $connexion->prepare($requete);
          $stmt->execute(array($idSession));
          while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
          if ($ligne->sexe=='F'){  
            $rep="<div class='col-4'><img class='img-fluid' src='images/avatarfemme.png'></div>";
            } else{
              $rep="<div class='col-4'><img class='img-fluid' src='images/avatarHomme.png'></div>";
            }
            $rep.="<div class='col-8'>";
          }
   
          try{
          $stmt = $connexion->prepare($requete);
          $stmt->execute(array($idSession));
          while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
            if($ligne->sexe=='F'){
              $ligne->sexe='Féminin';
            }
            else{
              $ligne->sexe='Masculin';
            }
            $rep.="<h2>".($ligne->nom)." ".($ligne->prenom)."</h2>";
            $rep.="<p> Sexe : ".($ligne->sexe)."</p>";
            $rep.="<p> Ville : <span class='text-capitalize'> ".($ligne->ville)."</span></p>";
            $rep.="<p> Date de naissance : ".($ligne->dateNaissance)."</p>";
            $rep.="<p> Code Postal <span class='text-uppercase'>: ".($ligne->codePostale)."</span></p>";
            $rep.="<p> Téléphone : ".($ligne->telephone)."</p>";
            $rep.="<a class='btn btn-success mr-2' href='profilUtilisateurFiche.php' role='button'>Modifier mon profil</a>";
            //$rep.="<a class='btn btn-dark ' href='profilUtilisateurAnnonces.php' role='button'>Voir mes annonces</a>";
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
  </section>
  <!-- fin section -->
  
    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>