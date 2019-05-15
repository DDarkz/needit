   
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
 
Thank you for contacting us. We will be in touch with you very soon.
 

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

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="vues/vues.js"></script>
  <script type="text/javascript" src="requetes/requetes.js"></script>  

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="images\logoGoFor.png" width="100"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" class="dropdown-item active" href="propos.php">Propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="annonces.php">Annonces</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="description.php">Comment ça marche</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="contact">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Contactez nous</h1>
        <!-- <h2 class="text-white-50 mx-auto mt-2 mb-5">Rendez Service et gagner des bénéfices<br>
          <p class="text-white-50">aidez les gens et gagner de l'argent</p></h2>
        <a href="annonces.php" class="btn btn-primary js-scroll-trigger">Commencez</a> -->
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Ecrivez nous !</h2>
          <p class="text-white-50"></p>
          <form name="contactform" method="post" action="contact.php"> 
          <div class="form-group row">
            <label for="nom" class="text-white-50 col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nom" name="nom" Required>
            </div>
           
          </div>
          <div class="form-group row">
            <label for="prenom" class="text-white-50 col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" id="prenom" name="prenom"  Required >
            </div>
          </div>
          <div class="form-group row">
            <label for="courriel" class="text-white-50 col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="courriel" name="courriel" aria-describedby="emailHelp"  Required>
            </div> 
            
          </div>
          <div class="form-group row">
            <label for="objet" class="text-white-50 col-sm-2 col-form-label">Objet</label>
            <div class="col-sm-10">
              <input type="text"  class="form-control" id="objet" name="objet"  Required >
            </div>
          </div>
          <div class="form-group row">
            <label for="sujet" class="text-white-50 col-sm-2 col-form-label">Sujet</label>
            <div class="col-sm-10">
              <textarea rows="4" cols="50" id="sujet" name="sujet" class="form-control" ></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10 offset-md-2">
              <input type="submit" name="submit" class="btn btn-info" value="contacter" />  
              
            </div>
          </div>
          </form><br>
           <!-- <p> <a href="formulaireLogin.php" class="btn btn-primary js-scroll-trigger">Se connecter</a>
           <a href="formulaireInscription.php"><br>Pas encore inscrit? </a></p> -->
        </div>
      </div>
      <!-- <img src="images/Gofor.jpg" class="img-fluid" alt=""> -->
    </div>
  </section>

  <!-- Projects Section -->
  <section id="projects" class="projects-section bg-light">
    <div class="container" id="annoncesIndex">



    </div>
  </section>
<!-- 
  Signup Section
  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">

          

        </div>
      </div>
    </div>
  </section> -->

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Adresse</h4>
              <hr class="my-4">
              <div class="small text-black-50">9155 Rue St-Hubert, Montréal, QC H2M 1Y8</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">Gofor@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+1 (555) 902-8832</div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center">
        <a href="#" class="mx-2">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="mx-2">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="mx-2">
          <i class="fab fa-github"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; GoFor 2019
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>

</body>

</html>
