<?php
include("bd/connexion.php");
session_start();
if(!isset($_SESSION["courriel"])){
  header('location:annonces.php');
}
if(isset($_POST["submit"]))
{

  try {
  
      if (empty($_POST["titre"])  || empty($_POST["liste"]) || empty($_POST["codepostal"]))
      {
        $message = '<label id = "message">Veuillez remplir tous les champs.</lable>';
      }
      else
      {
        global $connexion, $rep;	
	      $titre = htmlspecialchars(trim($_POST['titre']));
        $liste = htmlspecialchars(trim($_POST['liste']));
        $codepostal = htmlspecialchars(trim($_POST['codepostal']));
	      $courriel = $_SESSION["courriel"];
        $service = $_POST["service"];
        $iddemandeur="SELECT idUser FROM connexion WHERE `courriel` = '$courriel'";
        foreach($connexion->query($iddemandeur) as $row)
        $idservice="SELECT idService FROM service WHERE `nomService` = '$service'";
        foreach($connexion->query($idservice) as $rowS)
        $statut = 0;
        $dossier="images/";
        if(!is_dir($dossier)){
          mkdir($dossier);
        }
	      $nomPochette=sha1($titre.time());
	      $pochette="avatar.jpg";
	      if($_FILES["photo"]['tmp_name']!==""){
		      //Upload de la photo
		      $tmp = $_FILES["photo"]['tmp_name'];
		      $fichier= $_FILES["photo"]['name'];
		      $extension=strrchr($fichier,'.');
		      @move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
		      // Enlever le fichier temporaire chargé
		      @unlink($tmp); //effacer le fichier temporaire
		      $pochette=$nomPochette.$extension;
	}
	      $requete="INSERT INTO annonce VALUES(0,?,?,?,?,?,?,?,NOW())";
	      $stmt = $connexion->prepare($requete);
	      $stmt->execute(array($row['idUser'],$rowS['idService'],$titre,$liste,$codepostal,$statut,$pochette));
        header("location: annonces.php");
      }
        
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
    <script type="text/javascript" src="js/general.js"></script>  

    <title>Nouvelle annonce</title>
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
       <div class="alert alert-danger" id = "message" role="alert" style="display: none;">
          <label>Le code postal n'est pas valide</label>
       </div>
       <h1>Créer votre annonce</h1>

       <!-- debut formulaire -->
        <form method="post" enctype= "multipart/form-data" onsbmit=" return CodePostalValide();">
          <div class="form-group row">
            <label for="titre" class="col-sm-2 col-form-label">Titre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre">
            </div>
          </div>

          <div class="form-group row">
            <label for="liste" class="col-sm-2 col-form-label">Liste d'achats</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="liste" name="liste" placeholder="Liste d'achats"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="codepostal" class="col-sm-2 col-form-label">Code postal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Code postal" onChange="validation()">
            </div>
          </div>
          <div class="form-group row">
            <label for="service" class="col-sm-2 col-form-label">Service</label>
            <div class="col-sm-10">
              <select class="form-select" name="service">
                <option value="epicerie">Épicerie</option>
                <option value="pharmacie">Pharmacie</option>
                <option value="autres">Autres</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
              <input type="file" class="form-file-input" id="photo" name="photo">
            </div>
          </div>
            
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" name="submit" class="btn btn-primary" value="Créer l'annonce" />
              <button type="rest" name="rest" class="btn btn-warning">Effacer</button>
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