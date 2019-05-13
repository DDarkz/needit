<?php
include("bd/connexion.php");
session_start();
global $connexion,$rep;
$codePostale=$_POST['codePostale'];
//echo"post";
//echo $codePostale;
$requete = "SELECT * FROM annonce WHERE codePostale=?";
if(isset($_POST["submit"]))
{

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
    $rep.= "Vous n'avez aucune annonnce dans cette zone.";
    // $message = "Vous n'avez aucune annonnces.";
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">.
    <script type="text/javascript" src="vues/vues.js"></script>
    <script type="text/javascript" src="requetes/requetes.js"></script>  

    <title>Recherche</title>
  </head>
  <body>

    <?php include("includes/menu.php"); ?>


    <!-- debut container -->
    <div class="container pt-5">
<h1>Recherche par code Postal</h1>
        <form id='formRecherche' method='post'  action='annonceRecherche.php' enctype='multipart/form-data'>
          <input type='text'id='codePostale'name='codePostale'>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" name="submit" class="btn btn-primary" value="Rechercher" />
              
            </div>
            </div>
          
        </form>
        <div class="card-columns" id="annoncesAccueil">
        <?php echo ($rep) ?>
        </div>
        </div>
  <!-- fin container -->
        <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

    </body>
</html>