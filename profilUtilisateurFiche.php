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
        global $connexion, $rep, $idSession;

        $requete = "SELECT * FROM utilisateur WHERE idUser='$idSession'";

        $stmt = $connexion->prepare($requete);
          $stmt->execute(array($idSession));
          while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
        if ($ligne->sexe=='F'){  
        $rep="<div class='col-4'><img class='img-fluid' src='images/avatarfemme.png'></div>";
        } else {
          $rep="<div class='col-4'><img class='img-fluid' src='images/avatarHomme.png'></div>";
        }
        $rep.="<div class='col-8'>";
        }
        try{
          $stmt = $connexion->prepare($requete);
          $stmt->execute(array($idSession));
          while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
            //echo "coucou";
            //$rep[]=$ligne;
            $rep.="<form method='post'  action='profilUtilisateurModifier.php'>";
            $rep.="<div class='form-group row'>";
            $rep.=" <label for='nom' class='col-md-3 col-form-label'> Nom : </label> ";
            $rep.="<div class='col-md-9'> <input name='nom' value=$ligne->nom id='nom' ></div>";
            $rep.="</div>";
            $rep.="<div class='form-group row'>";
            $rep.="<label for='prenom' class='col-md-3 col-form-label'> Prénom :</label> ";
            $rep.="<div class='col-md-9'> <input  name='prenom' value=$ligne->prenom></div>";
            $rep.="</div>";
            $rep.="<div class='form-group row'>";
            $rep.="<label for='sexe' class='col-md-3 col-form-label'> Sexe :</label> ";
            $rep.="<div class='col-md-9'> <input  name='sexe' value=$ligne->sexe></div>";
            $rep.="</div>";
            $rep.="<div class='form-group row'>";
            $rep.="<label for='ville' class='col-md-3 col-form-label'> Ville : </label>";
            $rep.="<div class='col-md-9'><input  name='ville' value=$ligne->ville></div>";
            $rep.="</div>";
            $rep.="<div class='form-group row'>";
            $rep.="<label for='dateNaissance' class='col-md-3 col-form-label'> Date de naissance : </label> ";
            $rep.="<div class='col-md-9'><input name='dateNaissance' value=$ligne->dateNaissance></div>";
            $rep.="</div>";
            $rep.="<div class='form-group row'>";
            $rep.="<label for='codePostale' class='col-md-3 col-form-label'>Code Postal :</label> ";
            $rep.="<div class='col-md-9'><input name='codePostale' value=$ligne->codePostale></div>";
            $rep.="</div>";
            $rep.="<div class='form-group row'>";
            $rep.="<label for='telephone' class='col-md-3 col-form-label'> Téléphone : </label>";
            $rep.="<div class='col-md-9'><input  name='telephone' value=$ligne->telephone></div>";
            $rep.="</div>";
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
    </section>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>