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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="vues/vues.js"></script>
    <script type="text/javascript" src="requetes/requetes.js"></script>

    <title>Profil Utilisateur - Gérer mes annonces.</title>

    <script>
    function montrer(elem){
	    document.getElementById(elem).style.display='block';
    }

    function cacher(elem){
      document.getElementById(elem).style.display='none';
    }
</script>
  </head>
  <!-- onload="requetes('actionListerMAdmin'), requetes('actionListerA');" -->
  <body onload="requetes(null,'actionListerAnnoncesMembres')">
    <?php include("includes/menu.php"); ?>
    
  <!-- debut container -->
  <div class="container pt-5">
  <div id="alert">
    <div class="alert" role="alert"></div>
  </div>

  
  <!-- debut contenu -->
  <div id="contenu">
  <h1>Mes annonces</h1>

    <div id="loading"></div>

  
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
      
    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

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