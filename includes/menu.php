<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php"><img src="images/logoGoFor.png" width="100"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="propos.php">Propos</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="annonces.php">Annonces</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="description.php">Comment ça marche</a>
          </li>
 
          <?php
            if(!isset($_SESSION["courriel"])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="formulaireInscription.php">S'inscrire</a>
          </li>

          <?php
            }
            
          if(isset($_SESSION["courriel"])){
            if($_SESSION["courriel"] == "admin@gmail.com" && $_SESSION["password"] == sha1("123456")){
              ?>
              <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
              </li>
            <?php  
            }
          }
          ?>
          <?php include("header.php"); ?>
        </ul>
      </div>
    </div>
  </nav>