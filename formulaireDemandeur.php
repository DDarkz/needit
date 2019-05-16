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
        $message = 'Veuillez remplir tous les champs.';
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

    <title>Nouvelle annonce</title>

    <?php include("includes/header-script.php"); ?>

  </head>
  <body>

    <?php include("includes/menu.php"); ?>
   
   <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
      <!-- debut container -->
      <div class="container pt-5">
        <!-- debut row -->
        <div class="row">
            <!-- debut col-lg-8 -->
            <div class="col-lg-8 mx-auto">
    
              <div class="alert alert-danger" id="message" role="alert" style="display: none;">
                  <label>Le code postal n'est pas valide</label>
              </div>

              <h1>Créer votre annonce</h1>

              <!-- debut formulaire -->
              <form method="post" enctype= "multipart/form-data" onsbmit=" return CodePostalValide();" class="needs-validation" novalidate>
                <div class="form-group row">
                  <label for="titre" class="col-sm-2 col-form-label">Titre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre" required>
                    <div class="invalid-feedback">
                      Veuillez inscrire votre titre.
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="liste" class="col-sm-2 col-form-label">Liste d'achats</label>
                  <div class="col-sm-10">
                    <textarea rows="4" cols="50" class="form-control" id="liste" name="liste" placeholder="Liste d'achats" required></textarea>
                    <div class="invalid-feedback">
                      Veuillez inscrire votre liste d'achats.
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="codepostal" class="col-sm-2 col-form-label">Code Postal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="codepostal" name="codepostal" placeholder="Code postal" onChange="validation()"  required>
                    <div class="invalid-feedback">
                      Veuillez inscrire votre code postal.
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                <label for="service" class="col-sm-2 col-form-label">Service</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="service" name="service" required>
                        <option value="">Choisir votre service</option>
                        <option value="epicerie">Épicerie</option>
                        <option value="pharmacie">Pharmacie</option>
                        <option value="autres">Autres</option>
                    </select>
                    <div class="invalid-feedback">
                        Veuillez remplir votre service.
                    </div>
                   </div>
                </div>

                <!-- <div class="form-group row">
                  <label for="service" class="col-sm-2 col-form-label">Service</label>
                    <div class="col-sm-10">
                      <select class="form-select" id="service" name="service" required>
                        <option value="epicerie">Épicerie</option>
                        <option value="pharmacie">Pharmacie</option>
                        <option value="autres">Autres</option>
                      </select>
                      <div class="invalid-feedback">
                        Veuillez inscrire votre service.
                      </div>
                    </div>
                </div> -->

                <div class="form-group row">
                  <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-file-input" id="photo" name="photo">
                  </div>
                </div>
                    

                <div class="form-group row">
                  <div class="col-sm-10 offset-md-2">
                    <input type="submit" name="submit" class="btn btn-primary" value="Créer" />
                    <button type="rest" name="rest" class="btn btn-danger">Effacer</button>
                  </div>
                </div>

              </form>
              <!-- fin formulaire -->
          </div>
          <!-- fin col-lg-8 -->
        </div>
        <!-- fin row -->
      </div>
      <!-- fin container -->
    </section>
    <!-- fin section -->

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