   
  <?php
include("bd/connexion.php");
session_start();

if(isset($_POST['courriel'])) {
    
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "emna.kh@gmail.com";
    $email_subject = "Your email subject line";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['courriel']) ||
        !isset($_POST['objet']) ||
        !isset($_POST['sujet'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $nom = $_POST['nom']; // required
    $prenom = $_POST['prenom']; // required
    $courriel = $_POST['courriel']; // required
    $objet = $_POST['objet']; // not required
    $sujet = $_POST['sujet']; // required
 //echo $courriel;
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$courriel)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$nom)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$prenom)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($sujet) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Nom: ".clean_string($nom)."\n";
    $email_message .= "Prénom: ".clean_string($prenom)."\n";
    $email_message .= "Courriel: ".clean_string($courriel)."\n";
    $email_message .= "Objet: ".clean_string($objet)."\n";
    $email_message .= "Sujet: ".clean_string($sujet)."\n";
 
// create email headers
$headers = 'From: '.$courriel."\r\n".
'Reply-To: '.$courriel."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

?>
 
<!-- include your own success html here -->
$message = "Thank you for contacting us. We will be in touch with you very soon.";


 

<?php
 
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Contact</title>

  <?php include("includes/header-script.php"); ?>

</head>

<body id="page-top">

  <?php include("includes/menu.php"); ?>

   <!-- debut section -->
   <section id="projects" class="projects-section bg-light">
    <div class="container pt-5">
    <?php
        if (isset($message)) {
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
           }
       ?>

      <div class="row">
        <div class="col-lg-8 mx-auto">
        <h1>Contactez-nous</h1>

          <form name="contactform" method="post" action="contact.php" class="needs-validation" novalidate> 
          <div class="form-group row">
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nom" name="nom" required>
              <div class="invalid-feedback">
                  Veuillez inscrire votre nom.
              </div>
            </div>
           
          </div>
          <div class="form-group row">
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" id="prenom" name="prenom"  required>
              <div class="invalid-feedback">
                  Veuillez inscrire votre prénom.
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="courriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="courriel" name="courriel" aria-describedby="emailHelp" required>
              <div class="invalid-feedback">
                  Veuillez inscrire votre courriel.
              </div>
            </div> 
            
          </div>
          <div class="form-group row">
            <label for="objet" class="col-sm-2 col-form-label">Objet</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" id="objet" name="objet"  required>
              <div class="invalid-feedback">
                  Veuillez inscrire votre objet.
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="sujet" class="col-sm-2 col-form-label">Sujet</label>
            <div class="col-sm-10">
              <textarea rows="4" cols="50" id="sujet" name="sujet" class="form-control" required></textarea>
              <div class="invalid-feedback">
                  Veuillez inscrire votre sujet.
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10 offset-md-2">
              <input type="submit" name="submit" class="btn btn-info" value="contacter" />  
              <input type="reset" name="reset" class="btn btn-danger" value="Effacer" /> 
            </div>
          </div>
          </form><br>
        </div>
      </div>
    </div>
  </section>

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
