Skip to content
 
Search or jump to…

Pull requests
Issues
Marketplace
Explore
 
@DDarkz 
0
0 0 DDarkz/needit
 Code  Issues 0  Pull requests 0  Projects 1  Wiki  Insights  Settings
needit/formulaireInscription.php
@EmnaKhelifi EmnaKhelifi formulaire inscription test enregistrer ds cnx
dd50b64 4 hours ago
138 lines (121 sloc)  5.27 KB
    
<?php
include("bd/connexion.php");
session_start();
if(isset($_POST["submit"]))
{
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
      
	      
        //$iddemandeur="SELECT idUser FROM connexion WHERE `courriel` = '$courriel'";
       // foreach($connexion->query($iddemandeur) as $row)
       // $idservice="SELECT idService FROM service WHERE `nomService` = '$service'";
        //foreach($connexion->query($idservice) as $rowS)
        //$statut = 0;
        
	      $requete1="INSERT INTO utilisateur VALUES(0,?,?,?,?,?,?)";
	      $stmt = $connexion->prepare($requete1);
        $stmt->execute(array($nom,$prenom,$dateNaissance,$ville,$codePostale,$telephone));
        unset($connexion);
        unset($stmt);
        //header("location: annonces.php");
        $idUser="SELECT idUser FROM utilisateur WHERE `courriel` = $courriel";
        //Var_dump($mdp);
        //Var_dump($courriel);
       // Var_dump($idUser);
        $requete2="INSERT INTO connexion VALUES(?,?,$idUser)";
	      //$stmt2 = $connexion->prepare($requete2);
	      //$stmt2->execute(array($courriel,$mdp,$idUser));
        //header("location: annonces.php");
        //unset($connexion);
        //unset($stmt2);
      //}
        
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
          <div class="form-group">
            <label for="courriel">Courriel</label>
              <input type="email" class="form-control" id="courriel" name="courriel" aria-describedby="emailHelp" placeholder="Entrer email">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="mot de passe">
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