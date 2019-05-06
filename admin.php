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

    <title>Admin</title>
  </head>
  <!-- onload="requetes('actionListerMAdmin'), requetes('actionListerA');" -->
  <body onload="requetes('actionListerMAdmin'), requetes('actionListerA');">
    <?php include("includes/menu.php"); ?>
    
    <!-- debut container -->
    <div class="container pt-5">
      <?php
        if (isset($message)) {
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
           }
       ?>

       <h1>Page Admin</h1>
       <form>
       <div id="loading"></div>
        <div id="contenu">
           <!--?php listerMembres(); ?-->
        </div>

        <div id="annonces">
           <!--?php listerAnnonces(); ?-->
        </div>
        <input type="hidden" id="idUser" name="idUser" value="">
        <input type="hidden" id="idAnnonce" name="idAnnonce" value="">
        </form>

          
            

    </div>
    <!-- fin container -->

   
    <script type="text/javascript">
				function listerId(choixId) {
					var idUser = document.getElementById("idUser").value = choixId;
					(function(){
						requetes('actDeleteMembres');
					})();
        }
        
        function listerIdAnnonce(choixId) {
					var idAnnonce = document.getElementById("idAnnonce").value = choixId;
					(function(){
						requetes('actDeleteAnnonce');
					})();
        }
      
      </script>
      
      <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
<script>
    

</script>

  </body>
</html>