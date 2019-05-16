<?php
include("bd/connexion.php");
session_start();

if(isset($_POST["login"]))
{
  try {
  
      if (empty($_POST["courriel"])  || empty($_POST["password"]))
      {
        $message = 'Veuillez remplir tous les champs.';
      }
      else
      {
        $sql = "SELECT * FROM connexion WHERE courriel = :courriel AND mdp = :password";

        $statement = $connexion->prepare($sql);
        $statement->execute(array('courriel' => $_POST["courriel"],
                 'password' => sha1($_POST["password"])));


        $row=$statement->fetch(PDO::FETCH_OBJ);
        $count = $statement->rowCount();

        if($count > 0)
        {
          // Transporter les sessions courriel et id.
          $_SESSION["password"] = sha1($_POST["password"]);
          $_SESSION["courriel"] = $_POST["courriel"];
          $_SESSION["idUser"] = ($row->idUser);
          include("includes/headerMembre.php");
          header("location: annonces.php");
          //$message = 'Vous êtes connecté.';
          //header("location:login_success.php");
        }
        else
        {
          $message = 'Courriel OU Password n\'est pas bon.';
        }
      }
        
      }
      catch(Exception $e) 
      {
          $message =$e->getMessage();
      }
}
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Se connecter</title>

    <?php include("includes/header-script.php"); ?>
  </head>
  <body>

    <?php include("includes/menu.php"); ?>
   
    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
      <?php
        if (isset($message)) {
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
           }
       ?>

       <h1>Connectez-vous</h1>

       <!-- debut formulaire -->
        <form method="post">
          <div class="form-group">
            <label for="courriel">Courriel</label> <input type="text" id="courriel" name="courriel" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label> <input type="password" id="password" name="password" class="form-control">
          </div>
          <input type="submit" name="login" class="btn btn-primary" value="Connexion" />
          <p><a href="#"><br>Mot de passe oublié? </a></p>
        </form>
        <!-- fin formulaire -->
    </div>
    <!-- fin container -->
    </section>
    <!-- fin section -->
    
    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>