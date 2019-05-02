<?php
include("bd/connexion.php");
session_start();
if(isset($_POST["submit"]))
{

  try {
  
    
        global $connexion, $rep;	
	      $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $dateNaissance = htmlspecialchars(trim($_POST['dateNaissance']));
        $ville = htmlspecialchars(trim($_POST['ville']));
        $codePostale = htmlspecialchars(trim($_POST['codePostale']));
        $telephone = htmlspecialchars(trim($_POST['telephone']));
	      
        //$iddemandeur="SELECT idUser FROM connexion WHERE `courriel` = '$courriel'";
       // foreach($connexion->query($iddemandeur) as $row)
       // $idservice="SELECT idService FROM service WHERE `nomService` = '$service'";
        //foreach($connexion->query($idservice) as $rowS)
        //$statut = 0;
        
	      $requete="INSERT INTO utilisateur VALUES(0,?,?,?,?,?,?)";
	      $stmt = $connexion->prepare($requete);
	      $stmt->execute(array($nom,$prenom,$dateNaissancet,$ville,$codePostale,$telephone));
        header("location: annonces.php");
      }
        
      //}
      catch(Exception $e) 
      {
          $message =$e->getMessage();
      }
  }    
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

    <title>Formulaire inscription</title>
  </head>
  <body>

    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
    <div class="container pt-5">
       <h1>Inscrivez-vous !</h1>
       

       <!-- debut formulaire -->
       <form>
          <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nom" placeholder="Nom">
            </div>
          </div>

          <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="prenom" placeholder="Prénom">
            </div>
          </div>

          <div class="form-group row">
            <label for="dateNaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="datNaissance" placeholder="aaaa-mm-jj">
            </div>
          </div>
          <div class="form-group row">
            <label for="ville" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ville" placeholder="ex : Montréal">
            </div>
          </div>
          <div class="form-group row">
            <label for="codePostale" class="col-sm-2 col-form-label">Code Postale</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="codePostale" >
            </div>
          </div>
          <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="telephone" >
            </div>
          </div>
          <div class="form-group">
            <label for="courriel">Courriel</label>
              <input type="email" class="form-control" id="courriel" aria-describedby="emailHelp" placeholder="Entrer email">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
              <input type="password" class="form-control" id="mdp" placeholder="mot de passe">
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">S'inscrire</button>
            </div>
          </div>
        </form>
        <!-- fin formulaire -->
    </div>
    <!-- fin container -->

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>