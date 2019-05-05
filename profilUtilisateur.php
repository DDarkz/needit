<?php
include("bd/connexion.php");
session_start();

   // $idUser=$_SESSION['idUser'];
    $user = $_SESSION['idUser'];
   
    //echo "pseudo de session: ".$idUser;
     echo $user;
    global $connexion, $rep;
	$requete = "SELECT * FROM utilisateur WHERE idUser=?";
	$rep="";
	try{
		 $stmt = $connexion->prepare($requete);
		 $stmt->execute([$idUser]);
		 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			$rep[]=$ligne;
		 }
   }
   catch (Exception $e){
		echo "Problème controleur pour lister infos.";
   }
   finally {
		unset($connexion);
		unset($stmt);
		//echo ($rep);
	 }


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
    <title>Profil</title>
  </head>
  <body>
  <!-- debut container -->
  <div class="container pt-5">
       <h1>Bonjour Bienvenue chez Need IT NOW !!</h1>
       <h2>Votre profil</h2>
     
    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
</div>
<p>   <?php
       echo ($rep);
       ?>
       </p>
<!-- fin container -->

<?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>