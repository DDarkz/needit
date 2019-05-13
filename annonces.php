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
    <link rel="stylesheet" type="text/css" href="css/styles.css">.
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
    <form>
    <!-- ajax loader animation -->
    <div class="text-center">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

      <div class="card-columns" id="annoncesAccueil">
          <!-- ici load contenu des annonces -->
      </div>
      <div id="annoncesDetail">
        <!-- ici load contenu détail -->
      </div>
      <input type="hidden" id="idAnnonce" name="idAnnonce" value="">
      <!-- Récuperer l'email -->
      <input type="hidden" id="email" name="email" value='<?= isset($_SESSION["courriel"])?>'>
    </form>
      <!-- debut card-columns -->
    </div>
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

    <script>

       $("#voirAnnonce").click(function(){
          $("#annoncesAccueil").show();
          $("#annoncesDetail").hide();
        });

        $('.spinner-border').hide();
        $(document).bind("ajaxSend", function(){
          $(".spinner-border").show();
          }).bind("ajaxComplete", function(){
          $(".spinner-border").hide();
        });
    </script>
  </body>
</html>