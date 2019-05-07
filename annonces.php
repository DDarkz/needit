<?php
include("bd/connexion.php");
session_start();
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

    <title>Toutes les annonces</title>
  </head>
  <body onload="requetes(null,'actionLister');">

    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
    <div class="container pt-5">
    <h1>Toutes les annonces</h1>
       <!-- debut card-columns -->
        <div class="card-columns" id="annoncesAccueil">

          <!-- <div class="card m-3">
            <a class="text-dark" href="annonceDetail.php"><img class="card-img-top" src="images/beetle-400.jpg" alt="Card image cap">
            <div class="card-body">
              <p class="card-date">24 avril 2019</p>
              <h5 class="card-title">Jean-couteu</h5>
              <p class="card-text">J'ai besoin de couches pour bébé chez.</p>
              <h5 class="card-title">Épicerie</h5>
              <ul>
                  <li>lait</li>
                  <li>pain</li>
                  <li>Yogout</li>
              </ul>
              <p class="card-text"><small class="text-muted">Mise à jour il y 3 minutes.</small></p>
            </div>
            </a>
          </div>
          
          <div class="card m-3">
            <img class="card-img-top" src="images/cookies-400.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>

          <div class="card text-center m-3">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>

          <div class="card text-center m-3">
            <img class="card-img" src="images/fuji-400.jpg" alt="Card image">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>

          <div class="card m-3">
            <img class="card-img" src="images/jump-400.jpg" alt="Card image">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>

          <div class="card m-3 text-right">
            <img class="card-img" src="images/lamp-400.jpg" alt="Card image">
             <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>

          <div class="card m-3">
            <img class="card-img" src="images/tulips-400.jpg" alt="Card image">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div> -->

      </div>
      <!-- debut card-columns -->
    </div>
    <!-- fin container -->

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>