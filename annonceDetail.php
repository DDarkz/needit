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

    <title>Formulaire livreur</title>
  </head>
  <body onload="requetes(null,'actionListerDetail');">

    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
    <form>
    <div class="container pt-5">
    
      <div class="row" id="annoncesDetail">

        <!-- <div class="col-6">
          <img src="images/wheel-500.jpg">
        </div>

        <div class="col-6">
          <h1>Jean-coutu, épicerie</h1>
          <p>24 avril 2019</p>
          <p>Pharmacie Jean-Couteur</p>
          <p>J'ai besoin de couches pour bébé chez.</p>

          <p>Épicerie</p>
          <ul>
            <li>lait</li>
            <li>pain</li>
            <li>Yogout</li>
          </ul>
        </div> -->
        
      </div>
      

    </div>
    <input type="hidden" id="idAnnonce" name="idAnnonce" value="">
    </form>
    <!-- fin container -->
      
    <script type="text/javascript">
				function listerIdAnnonce(elem,choixId) {
					var idAnnonce = document.getElementById("idAnnonce").value = choixId;
					(function(){
						requetes(elem,'actionListerDetail');
					})();
        }
    </script>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>