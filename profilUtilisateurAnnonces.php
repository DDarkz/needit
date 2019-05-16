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

    <title>Profil Utilisateur - Gérer mes annonces.</title>
   
    <?php include("includes/header-script.php"); ?>

  </head>
  <body id="page-top" onload="requetes(null,'actionListerAnnoncesMembres')">
    
    <?php include("includes/menu.php"); ?>
    
    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
      <!-- debut container -->
      <div class="container pt-5">
        <div id="alert">
          <div class="alert" role="alert"></div>
        </div>

        <!-- debut contenu -->
        <div id="contenu">
          <h1>Mes annonces</h1>

          <!-- ajax loader animation -->
          <div class="text-center">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
      
          <form>
            <div class="card-columns">
              <!-- ici load contenu des annonces -->
            </div>
          
          <!-- debut card-columns -->
            <input type="hidden" id="idDemandeur" name="idDemandeur" value="<?php echo $idSession ?>">
            <input type="hidden" id="idAnnonce" name="idAnnonce" value="">
          </form>
      </div>
      <!-- fin contenu -->
    </div>
    <!-- fin container -->
  </section>
   
  <?php include("includes/footer.php"); ?>
  <?php include("includes/footer-script.php"); ?>

    <script type="text/javascript">
        function listerIdAnnonce(elem,choixId) {
        var idAnnonce = document.getElementById("idAnnonce").value = choixId;
        (function(){
          requetes(elem,'actDeleteAnnonce');
        })();
      }

      function modifierIdAnnonce(elem,choixId) {
        var idAnnonce = document.getElementById("idAnnonce").value = choixId;
        (function(){
          requetes(elem,'ajaxMontrerAnnonce');
        })();
      }
  </script>

  <script>
    $(document).ready(function(){
      $('.spinner-border').hide();
        $(document).bind("ajaxSend", function(){
          $(".spinner-border").show();
          }).bind("ajaxComplete", function(){
          $(".spinner-border").hide();
        });
    })
  </script>

  </body>
</html>