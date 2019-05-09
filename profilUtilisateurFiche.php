<?php
include("bd/connexion.php");
session_start();
//echo "POST";
global $connexion,$idSession;
	
	// $requete="SELECT * FROM utilisateur WHERE idUser='$idSession'";
	// $stmt=$connexion->prepare($requete);
	// $stmt->execute(array($idSession));
	// $ligne=$stmt->fetch(PDO::FETCH_OBJ);
	
	// unset($connexion);
	// unset($stmt);
	// $nvnom=$ligne->nom;
	// $nvprenom=$ligne->prenom;
	// unset($connexion);
	// unset($stmt);
    // //envoyerFiche($num,$titre,$res);
    

    function envoyerFiche($idUser,$nom,$prenom){
        $rep.= "			<form id=\"enregModifier\" enctype=\"multipart/form-data\" action=\"profilUtilisateurModifier.php\" method=\"POST\">\n"; 
        $rep.= "				Nom :<input type=\"text\" id=\"nom\" name=\"nom\" value='".$nom."'><br><br>\n"; 
        $rep.= "				Prénom :<input type=\"text\" id=\"prenom\" name=\"prenom\" value='".$prenom."'><br><br>\n"; 
        $rep.= "				<input type=\"submit\" value=\"Envoyer\">\n"; 
        $rep.= "			</form>\n"; 
        $rep.= "		</div>\n";
        echo $rep;
    }
    }
function obtenirFiche(){
	global $connexion,$idSession;
	
	$requete="SELECT * FROM utilisateur WHERE idUser='$idSession'";
	$stmt=$connexion->prepare($requete);
	$stmt->execute(array($idSession));
	$ligne=$stmt->fetch(PDO::FETCH_OBJ);
	
		unset($connexion);
		unset($stmt);
		//exit;
	
	$nom=$ligne->nom;
	$prenom=$ligne->prenom;
	unset($connexion);
	unset($stmt);
	envoyerFiche($idUser,$nom,$prenom);
}
obtenirFiche();

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
    
      
  
    <?php include("includes/menu.php"); ?>
    <div class="container pt-5">
      <div class="row">
      <div class='col-12'>
      <h1>Modifier mon profil</h1>
      </div>
        
      <!-- debut formulaire -->
      <!-- <form method="post" enctype= "multipart/form-data"action='profilUtilisateurModifier.php'> 
          <div class="form-group row">
            <label for="nvnom" class="col-sm-2 col-form-label">Nom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nvnom" name="nvnom"  >
              
            </div>
            
          </div>

          <div class="form-group row">
            <label for="nvprenom" class="col-sm-2 col-form-label">Prénom</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nvprenom" name="nvprenom" >
              
            </div>
           
          </div>

          <div class="form-group row">
            <label for="nvdateNaissance" class="col-sm-2 col-form-label">Date de naissance</label>
            <div class="col-sm-10">
              
            <input type="date" class="form-control" id="nvdateNaissance" name="nvdateNaissance" >
            
            </div>
        
          </div>
          <div class="form-group row">
            <label for="nvville" class="col-sm-2 col-form-label">Ville</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ville" name="ville" >
              
            </div>
            
          </div>
          <div class="form-group row">
            <label for="nvcodePostale" class="col-sm-2 col-form-label">Code Postale</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nvcodePostale" id="nvcodePostale" >
              
            </div>
            
          </div>
          <div class="form-group row">
            <label for="nvtelephone" class="col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nvtelephone" id="nvtelephone"  >
              
            </div>
           
          </div>
          <div class="form-group row">
            <label for="nvcourriel" class="col-sm-2 col-form-label">Courriel</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="nvcourriel" name="nvcourriel"  >
              
            </div> 
            
          </div>
          <div class="form-group row">
            <label for="nvmdp" class="col-sm-2 col-form-label">Mot de passe</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="nvmdp" name="nvmdp">
              
            </div>
            
          </div>
          
        </form>
         fin formulaire 
    </div> 
    -->
 
</div>
</div> 
<!-- fin container -->

<?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>