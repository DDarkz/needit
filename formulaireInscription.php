<?php
include("bd/connexion.php");
echo"post";
session_start();
if(isset($_POST["submit"]))
{
  //echo"post";
  try {
    //echo"post";
    
        global $connexion, $rep;	
	      $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $sexe = htmlspecialchars(trim($_POST['sexe']));
        $dateNaissance = htmlspecialchars(trim($_POST['dateNaissance']));
        $ville = htmlspecialchars(trim($_POST['ville']));
        $codePostale = htmlspecialchars(trim($_POST['codePostale']));
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $courriel = htmlspecialchars(trim($_POST['courriel']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));
        
	      $requete1="INSERT INTO utilisateur VALUES(0,?,?,?,?,?,?,?)";
	      $stmt = $connexion->prepare($requete1);
        $stmt->execute(array($nom,$prenom,$sexe,$dateNaissance,$ville,$codePostale,$telephone));
        $idUser=$connexion->lastInsertId(); 
        
        unset($stmt);
        
        $requete2="INSERT INTO connexion VALUES(?,?,?)";
	      $stmt2 = $connexion->prepare($requete2);
        $stmt2->execute(array($courriel,$mdp,$idUser));
       /*
        $destinataire = $courriel;
       //echo "$destinataire";
        $sujet = "Activer votre compte" ;
        $entete = "From: 201897878@collegeahuntsic.qc.ca" ;
 
        // Le lien d'activation est composé du login(log) et de la clé(cle)
        $message = 'Bienvenue sur VotreSite,
 
        Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        ou copier/coller dans votre navigateur internet.
 
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre';
        
        mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail*/
        header("location: BienvenueMembre.php");
        unset($connexion);
        unset($stmt2);
        //exit('fin');
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
    <?php
        if (isset($message)) {
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
         }
    ?>
       <h1>Inscrivez-vous !</h1>
       

       <!-- debut formulaire -->
       <form method="post" enctype= "multipart/form-data"  class="needs-validation" action="formulaireInscription.php" novalidate> 
          <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" Required>
              <div class="invalid-feedback">
                Veuillez choisir votre nom.
            </div>
            </div>
           
          </div>

          <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" Required >
              <div class="invalid-feedback">
                Veuillez choisir votre prénom.
            </div>
            </div>
           
          </div>
          <div class="form-group row">
            <label for="sexe" class="col-sm-2 col-form-label">Sexe</label>
            <div class="col-sm-10">
          <div class="custom-control custom-radio">
            <input type="radio" id="F" name="sexe" class="custom-control-input">
              <label class="custom-control-label" for="F">Féminin</label>
        </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="M" name="sexe" class="custom-control-input">
              <label class="custom-control-label" for="M">Masculin</label>
              </div>
              </div>
            </div>
           
          

          <div class="form-group row">
            <label for="dateNaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
              
            <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="aaaa-mm-jj" Required>
            <div class="invalid-feedback">
                Veuillez choisir votre date de naissance.
            </div>
            </div>
            
          </div>
          <div class="form-group row">
            <label for="ville" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ville" name="ville" placeholder="ex : Montréal" Required>
              <div class="invalid-feedback">
                Veuillez choisir votre ville.
            </div>
            </div>
            
          </div>
          <div class="form-group row">
            <label for="codePostale" class="col-sm-2 col-form-label">Code Postale</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="codePostale" id="codePostale" Required >
              <div class="invalid-feedback">
                Veuillez choisir votre code postal.
            </div>
            </div>
            
          </div>
          <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="telephone" id="telephone" Required >
              <div class="invalid-feedback">
                Veuillez choisir votre numéro de téléphone.
            </div>
            </div>
           
          </div>
          <div class="form-group row">
            <label for="courriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="courriel" name="courriel" aria-describedby="emailHelp" placeholder="Entrer email" Required>
              <div class="invalid-feedback">
                Veuillez choisir votre courriel.
            </div>
            </div> 
            
          </div>
          <div class="form-group row">
            <label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="mot de passe" Required>
              <div class="invalid-feedback">
                Veuillez choisir votre mot de passe.
            </div>
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

    
    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


  </body>
</html>