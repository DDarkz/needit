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

    <title>Tchat</title>
  </head>
  <body>

    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
    <div class="container">
        <form>
            <input type="hidden" id="idDemandeur" name="idDemandeur" value="">
        </form>
        <div class="messages-box"></div>

            <div class="bottom">
                <div>
                    <textarea name="message" id="message" rows="2" placeholder="Votre message"></textarea>
                </div>
                <button type="submit" id="send" class="btn btn-dark">
                    <span class="i-send">Envoyer</span>
                </button>

            </div>
    </div>  
    <!-- fin container -->

    <script type="text/javascript">
				function listerIdDemandeur(elem,choixId) {
					var idDemandeur = document.getElementById("idDemandeur").value = choixId;
					(function(){
            requetes(elem,'actionListerDetail');
					})();
        }
    </script>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>