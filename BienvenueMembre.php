<?php
include("bd/connexion.php");
session_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bienvenue chez GoFor</title>

  <?php include("includes/header-script.php"); ?>
  
</head>

<body id="page-top">

<?php include("includes/menu.php"); ?>

  <!-- Header -->
  <header class="bienvenue">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase couleur">Bienvenue chez GoFor ! </h1>
        <p class="text-white-50"></p>
         <!-- <h2 class="text-white-50 mx-auto mt-2 mb-5">Rendez Service et gagner des bénéfices<br>
          <p class="text-white-50">aidez les gens et gagner de l'argent</p></h2> -->
        <a href="formulaireLogin.php" class="btn btn-primary js-scroll-trigger">Se connecter</a> 
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Bonjour Membre  </h2>
          <p class="text-white-50">Bienvenue chez GoFor! votre inscription est terminé avec succés. 
            un e-mail de confirmation sera envoyé dans sous peu!
            
           <?php
      //     $destinataire = $courriel; //$destinataire ='emna.kh@gmail.com';
			// $envoyeur	='emna.kh@gmail.com';
     	// 		$sujet = 'Email de test';
     	// 		$message = "Bonjour !\r\votre inscriptiona bien été confirmé. Merci de votre confiance.\r\n";
	    //  		$headers = 'From: '.$envoyeur . "\r\n" .
     	// 			'Reply-To: '.$envoyeur. "\r\n" .
     	// 			'X-Mailer: PHP/' . phpversion();
	    //  		$envoye = mail($destinataire, $sujet, $message, $headers);
			// if ($envoye)
     	// 			echo "<br />un Email de confirmation est envoyé à votre adresse courriel.";
			// else
      //   echo "<br />Email refusé.";
        ?> 
           
           </p>
           
        </div>
      </div>
      
    </div>
  </section>

  

  <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

    
  </body>
</html>
