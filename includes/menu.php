<!-- Navigation -->
<header>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top" id="mainNav">
    <div class="container">
      <!--aaa-->
       <a class="navbar-brand text-white m-0" href="index.php"><img src="images\logoGoFor.png" width="80"></a>
      
      <button class="navbar-toggler navbar-toggler-right text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="annonces.php">Annonces</a>
          </li>
          <?php
            if(!isset($_SESSION["courriel"])){
          ?>
          <li class="nav-item">
            <a class="nav-link text-white"  href="formulaireInscription.php">S'inscrire</a>
          </li>
          
          <?php
          }
            if(isset($_SESSION["courriel"])){
          ?>  
          <li class="nav-item">
            <a class="nav-link text-white" href="formulaireDemandeur.php">Créer annonce</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="profilUtilisateur.php">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="profilUtilisateurAnnonces.php">Mes annonces</a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="annonceRecherche.php"><img src="images\loupe.png" width="20">Recherche</a>
          </li>
        
          <?php
            }
            
          if(isset($_SESSION["courriel"])){
            if($_SESSION["courriel"] == "admin@gmail.com" && $_SESSION["password"] == sha1("123456")){
              ?>
              <li class="nav-item">
                <a class="nav-link text-white" href="admin.php">Admin</a>
              </li>
            <?php  
            }
          }
          ?>
          
            <?php include("header.php"); ?>
        


          <!-- <li class="nav-item">
            <a class="nav-link text-white" href="formulaireLogin.php">Login</a>
          </li>
 -->
        </ul>
      </div>
    </div>
  </nav>
</header>