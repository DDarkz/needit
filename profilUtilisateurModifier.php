<?php
include("bd/connexion.php");
session_start();
global $connexion, $rep, $idSession;
if(isset($_SESSION['idUser'])) {
    $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE idUser = ?");
    $requser->execute(array($_SESSION['idUser']));
    $user = $requser->fetch();
    if(isset($_POST['nvnom']) AND !empty($_POST['nvnom']) AND $_POST['newnom'] != $user['nom']) {
       $nvnom = htmlspecialchars($_POST['nvnom']);
       $insertnom = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE idUser = ?");
       $insertnom->execute(array($nvnom, $_SESSION['idUser']));
       header('Location: profilUtilisateur.php?idUser='.$_SESSION['idUser']);
    }
    if(isset($_POST['nvprenom']) AND !empty($_POST['nvprenom']) AND $_POST['nvprenom'] != $user['prenom']) {
       $nvprenom = htmlspecialchars($_POST['nvprenom']);
       $insertprenom = $bdd->prepare("UPDATE utilisateur SET prenom = ? WHERE idUser = ?");
       $insertprenom->execute(array($nvprenom, $_SESSION['idUser']));
       header('Location: profilUtilisateur.php?idUser='.$_SESSION['idUser']);
    }
    if(isset($_POST['nvemail']) AND !empty($_POST['nvemail']) AND $_POST['nevemail'] != $user['email']) {
       $nvemail = htmlspecialchars($_POST['nvemail']);
       $insertmail = $bdd->prepare("UPDATE utilisateur SET email = ? WHERE idUser = ?");
       $insertmail->execute(array($nvemail, $_SESSION['idUser']));
       header('Location: profilUtilisateur.php?idUser='.$_SESSION['idUser']);
    }
    if(isset($_POST['nvmotdepasse']) AND !empty($_POST['nvmotdepasse'])) {
       $motdepasse = sha1($_POST['nvmotdepasse']);
       if($motdepasse > 2) {
          $insertmdp = $bdd->prepare("UPDATE utilisateur SET mdp = ? WHERE idUser = ?");
          $insertmdp->execute(array($mdp, $_SESSION['idUser']));
          header('Location: profilUtilisateur.php?idUser='.$_SESSION['idUser']);
       } else {
          $msg = "Vos deux mdp ne correspondent pas !";
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
        
      <!-- debut formulaire -->
      <form method="post" enctype= "multipart/form-data"> 
          <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nvnom" name="nvnom" placeholder="Nom" >
              
            </div>
           
          </div>

          <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nvprenom" name="nvprenom" >
              
            </div>
           
          </div>

          <div class="form-group row">
            <label for="dateNaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
              
            <input type="date" class="form-control" id="nvdateNaissance" name="nvdateNaissance" >
            
            </div>
        
          </div>
          <div class="form-group row">
            <label for="ville" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ville" name="ville" >
              
            </div>
            
          </div>
          <div class="form-group row">
            <label for="codePostale" class="col-sm-2 col-form-label">Code Postale</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nvcodePostale" id="nvcodePostale" >
              
            </div>
            
          </div>
          <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nvtelephone" id="nvtelephone"  >
              
            </div>
           
          </div>
          <div class="form-group row">
            <label for="courriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="nvcourriel" name="nvcourriel"  >
              
            </div> 
            
          </div>
          <div class="form-group row">
            <label for="mdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="nvmdp" name="nvmdp">
              
            </div>
            
          </div>
          
        </form>
        <!-- fin formulaire -->
    </div>
 
</div>
</div>
<!-- fin container -->

<?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>