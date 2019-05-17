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
  
  <?php include("includes/header-script.php"); ?>

</head>

<body id="page-top" class="bgImage">

<?php include("includes/menu.php"); ?>

  <!-- Header -->
  <header class="propos">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase couleur">À propos de nous </h1>
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

  <?php include("includes/footer.php"); ?>
  <?php include("includes/footer-script.php"); ?>


</body>

</html>
