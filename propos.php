
    
  <?php
include("bd/connexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Propos</title>

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
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">À propos de nous </h1>
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
          <h2 class="text-white mb-4">Parce que votre aide est une priorité pour nous</h2>
          <p class="text-white-50">GoFor est une plateforme communautaire qui connecte les particuliers entre eux 
           pour un service de livraison. </p>
           <p class="text-white-50">Qu'il s'agisse d'une personne agée, handicappée ou même une personne dans des conditions normales. 
           Aujourdh'hui c'est la tempete de l'année, il fait -30 dehors,votre bébé dort !<br>
           Vous êtes dans tous les cas incapable de sortir de chez vous pour faire vos courses ou acheter des ingredientns ou medicaments urgents, un outil obligatoire.., que vous voulez 
           le recevoir dans une heure, 2 heures maximum ! </p>
           <p class="text-white-50">GoFor s'appuie sur la technologie pour vous offrir une expérience exceptionnelle au moment où vous en avez besoin.
           On vous offre un service de livraison entre partiuliers pour tous vos besoins.</p>
            <p class="text-white-50">Hey, vous êtes dejà entrain de faire vos courses et vous voulez rembourser une partie de votre epicerie ?
             vous avez du temps libre?<br>GoFor vous offre aussi la possibilité d'aider les gens en gagnant de l'argent .<br>Et ceci, en faisant la livraison pour les gens de votre quartier! 
             C'est amusant n'est ce pas?<br></p>
           <p> <a href="formulaireLogin.php" class="btn btn-primary js-scroll-trigger">Se connecter</a>
           <a href="formulaireInscription.php"><br>Pas encore inscrit? </a></p>
           
           </p>
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
