<?php
include("bd/connexion.php");
session_start();
global $connexion,$rep;
$codePostale=$_POST['codePostale'];
echo"post";
echo $codePostale;
$requete = "SELECT * FROM annonce WHERE codePostale=?";
if(isset($_POST["submit"]))
{

try{
   $stmt = $connexion->prepare($requete);
   $stmt->execute(array($codePostale));
   while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
    
   
   
    $rep='<div class="card m-3">';
		//$rep.='<a class="text-dark"><img class="card-img-top" src="images/'+(ligne.pochette)+'" alt="Card image cap">';
		$rep.='<div class="card-body">';
		$rep="<p class='card-date'>".($ligne->date)."</p>";
		$rep.="<h5 class='card-title'>".($ligne->Titre)."</h5>";
		$rep.="<p class='card-text'>".($ligne->listeAchat)."</p>";
		//$rep.='<p class="card-text"><small class="text-muted">Poste il y'+(ligne.date)+'</small></p>';
		$rep.='</div>';
		$rep.='</a>';
  }
  $rep.="</div>";
 }
 catch (Exception $e){
  echo "Problème controleur pour lister annonce.";
 }
 finally {
  unset($connexion);
  unset($stmt);
  echo ($rep);
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

    <title>Toutes les annonces</title>
  </head>
  <body onload="requetes(null,'actionLister');">

    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
    <div class="container pt-5">
    <h1>Toutes les annonces</h1>

      <h2>Recherche par code Postal</h2>
        <form id='formRecherche' method='post'  action='annonces.php' enctype='multipart/form-data'>
          <input type='text'id='codePostale'name='codepostale'>
          <div class="form-group row">
            <div class="col-sm-10">
              <input type="submit" name="submit" class="btn btn-primary" value="Rechercher" />
              
            </div>
          
        </form>
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