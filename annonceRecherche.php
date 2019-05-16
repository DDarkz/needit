<?php
include("bd/connexion.php");
session_start();
global $connexion,$rep;


//echo"post";
//echo $codePostale;
$requete = "SELECT * FROM annonce WHERE codePostale=?";
if(isset($_POST["submit"]))
{
  $codePostale=htmlspecialchars(trim($_POST['codePostale']));
try{
   $stmt = $connexion->prepare($requete);
   $stmt->execute(array($codePostale));
    $rep='';
if ($stmt->rowCount() > 0){
   while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
   
        $rep.='<div class="card m-3">';
        $rep.='<a class="text-dark"><img class="card-img-top" src="images/'.($ligne->pochette).'" alt="Card image cap">';
        $rep.='<div class="card-body">';
        $rep.="<h5 class='card-title'>".($ligne->Titre)."</h5>";
        $rep.="<p class='card-text'>".($ligne->listeAchat)."</p>";
        $rep.='<p class="card-text"><small class="text-muted">Posté le  '.($ligne->date).'</small></p>';
		$rep.='</div>';
        $rep.='</a>';
        $rep.="</div>";
        
  }
} else {
    $rep.= "Vous n'avez aucune annonces dans cette zone.";
    
 }
  
 }
 catch (Exception $e){
  echo "Problème controleur pour lister annonce.";
 }
 finally {
  unset($connexion);
  unset($stmt);
  //echo ($rep);
 }
}
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Recherche</title>

    <?php include("includes/header-script.php"); ?>
  </head>
  <body id="page-top">

    <?php include("includes/menu.php"); ?>


    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
      <!-- debut container -->
      <div class="container pt-5">
        <h1>Recherche par code Postal</h1>
          <nav class="navbar navbar-light bg-light">  
              <form  class="form-inline"  method='post'  action='annonceRecherche.php' enctype='multipart/form-data'  >
                  <input type='text'id='codePostale'name='codePostale' class="form-control mr-sm-2"  placeholder="Code postal" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Rechercher</button>
              </form>
          </nav>
          <div class="card-columns" id="annoncesAccueil">
          <?php echo ($rep) ?>
          </div>
          </div>
      <!-- fin container -->
    </section>
    <!-- fin section -->
    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

    </body>
</html>