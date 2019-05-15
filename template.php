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

  <title>GoFor</title>

  <?php include("includes/header-script.php"); ?>

</head>

<body id="page-top" onload="requetes(null,'actionListerIndex');">

<?php include("includes/menu.php"); ?>

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Go+For</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Rendez Service et gagner des bénéfices<br>
          <p class="text-white-50">aidez les gens et gagner de l'argent</p></h2>
        <a href="annonces.php" class="btn btn-primary js-scroll-trigger">Commencez</a>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Service de livraison entre particuliers</h2>
          <p class="text-white-50">Besoin d'une épicerie urgente , des médicaments ? vous êtes incapable de sortir?
            <a href="propos.php"><br>La solution est simple faites appel à votre application GoFor. </a> 
           <br>Et votre voisin "Go For You"<br><br>
           <a href="formulaireLogin.php" class="btn btn-primary js-scroll-trigger">Se connecter</a>
           <a href="formulaireInscription.php"><br>Pas encore inscrit? </a></p>
        </div>
      </div>
    </div>
  </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
        <div class="container">
            <div class="row">
            
            <div class="card-group" id="annoncesIndex">
            <!-- ici load les 3 dernieres annonces -->
            </div>
            </div>
        </div>
    </section>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

</body>

</html>
