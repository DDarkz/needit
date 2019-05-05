<?php
include("bd/connexion.php");
session_start();
$user = $_SESSION["courriel"];
$nom= strtok($user,"@")
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
    <title>Bienvenue !</title>
  </head>
  <body>
  <!-- debut container -->
  <div class="container pt-5">
       

    <?php include("includes/menu.php"); ?>
   
    <h1>    votre inscription est terminé avec succés</h1>
    <p> si vous Need IT NOW !! veuillez vous connectez !! </p>
    <!-- debut container --> <?php echo $nom?>
</div>
<!-- fin container -->

<?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>