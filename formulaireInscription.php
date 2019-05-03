<?php
include("bd/connexion.php");
echo"post";
session_start();
if(isset($_POST["submit"]))
{
<<<<<<< HEAD
  //echo"post";
  try {
    //echo"post";
    
        global $connexion, $rep;	
	      $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $dateNaissance = htmlspecialchars(trim($_POST['dateNaissance']));
        $ville = htmlspecialchars(trim($_POST['ville']));
        $codePostale = htmlspecialchars(trim($_POST['codePostale']));
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $courriel = htmlspecialchars(trim($_POST['courriel']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));
      
	      
        
        
	      $requete1="INSERT INTO utilisateur VALUES(0,?,?,?,?,?,?)";
	      $stmt = $connexion->prepare($requete1);
        $stmt->execute(array($nom,$prenom,$dateNaissance,$ville,$codePostale,$telephone));
        $idUser=$connexion->lastInsertId(); 
        //unset($connexion);
        unset($stmt);
        //header("location: annonces.php");
        //$idUser="SELECT idUser FROM utilisateur WHERE `courriel` = ?";
        //Var_dump($mdp);
        //Var_dump($courriel);
        //echo "allo";
        //Var_dump($idUser);
        //echo("$idUser");
        $requete2="INSERT INTO connexion VALUES(?,?,?)";
	      $stmt2 = $connexion->prepare($requete2);
	      $stmt2->execute(array($courriel,$mdp,$idUser));
        //header("location: annonces.php");
        unset($connexion);
        unset($stmt2);
        //exit('fin');
      //}
=======
  try {
    //echo"post";
        global $connexion, $rep;
          $nom = htmlspecialchars(trim($_POST['nom']));
          $prenom = htmlspecialchars(trim($_POST['prenom']));
          $dateNaissance = htmlspecialchars(trim($_POST['dateNaissance']));
          $ville = htmlspecialchars(trim($_POST['ville']));
          $codePostale = htmlspecialchars(trim($_POST['codePostale']));
          $telephone = htmlspecialchars(trim($_POST['telephone']));
          $courriel = htmlspecialchars(trim($_POST['courriel']));
          $mdp = htmlspecialchars(trim($_POST['mdp']));
          
        
          
          $requete="INSERT INTO utilisateur VALUES(0,?,?,?,?,?,?)";
          $stmt = $connexion->prepare($requete);
          $stmt->execute(array($nom,$prenom,$dateNaissance,$ville,$codePostale,$telephone));
          $idUser=$connexion->lastInsertId();
          $requete1="INSERT INTO connexion VALUES(?,?,?)";
          $stmt1 = $connexion->prepare($requete1);
          $stmt1->execute(array($courriel,$mdp,$idUser));
          header("location: annonces.php"); 	
>>>>>>> db2b41857482e64c8dcd36d32e32fea133012d57
        
      }
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
    <?php
        if (isset($message)) {
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
         }
    ?>
       <h1>Inscrivez-vous !</h1>
       

       <!-- debut formulaire -->
       <form method="post" enctype= "multipart/form-data" action="formulaireInscription.php"> 
          <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
          </div>

          <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
            </div>
          </div>

          <div class="form-group row">
            <label for="dateNaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="aaaa-mm-jj">
            </div>
          </div>
          <div class="form-group row">
            <label for="ville" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ville" name="ville" placeholder="ex : Montréal">
            </div>
          </div>
          <div class="form-group row">
            <label for="codePostale" class="col-sm-2 col-form-label">Code Postale</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="codePostale" id="codePostale" >
            </div>
          </div>
          <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telephone" id="telephone" >
            </div>
          </div>
          <div class="form-group row">
            <label for="courriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="courriel" name="courriel" aria-describedby="emailHelp" placeholder="Entrer email">
            </div> 
          </div>
          <div class="form-group row">
            <label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="mot de passe">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" name="submit" class="btn btn-primary" value="S'inscrire" />
              
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