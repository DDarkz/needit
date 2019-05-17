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

    <title>Les annonces</title>

    <?php include("includes/header-script.php"); ?>
  </head>
  <body id="page-top" onload="requetes(null,'actionLister');">

    <?php include("includes/menu.php"); ?>
   
    <!-- début section -->
    <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
      
        
      <h1 class="ml-3">Annonces</h1>

        <!-- debut card-columns -->
      <form>
      <!-- ajax loader animation -->
      <div class="text-center">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>

      <!-- ici test recherche -->
      
      <div class="form-group row ml-3">
        <form method='post'>
          <input type='text'id='codePostale'name='codePostale' class="col-sm-12 col-md-2 col-form-label" placeholder="Code postal" aria-label="Recherche">
          <div class="col-sm-10">
            <input type="button" class="btn btn-primary" value="Rechercher" onClick="requetes(null,'actRecherche');">
          </div>
        </form>
        </div>
      
        <div id="alert">
          <div class="alert" role="alert"></div>
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
    </section>
    <!-- fin section -->

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