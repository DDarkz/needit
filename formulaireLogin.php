<?php
include("bd/connexion.php");
session_start();

if(isset($_POST["login"]))
{
  try {
  
      if (empty($_POST["courriel"])  || empty($_POST["password"]))
      {
        $message = '<label>Veuillez remplir tous les champs.</lable>';
      }
      else
      {
        $sql = "SELECT * FROM connexion WHERE courriel = :courriel AND mdp = :password";

        $statement = $connexion->prepare($sql);
        $statement->execute(array('courriel' => $_POST["courriel"],
                 'password' => $_POST["password"]));


        $row=$statement->fetch(PDO::FETCH_OBJ);
        $count = $statement->rowCount();

        if($count > 0)
        {
          // Transporter les sessions courriel et id.
          $_SESSION["courriel"] = $_POST["courriel"];
          $_SESSION["idUser"] = ($row->id);
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script type="text/javascript" src="vues/vues.js"></script>
    <script type="text/javascript" src="requetes/requetes.js"></script>

    <title>Formulaire Login</title>
  </head>
  <body onload="requetes('actionListerM');">

    <?php include("includes/menu.php"); ?>
    
   

    <!-- debut container -->
    <div class="container pt-5">
      <?php
        if (isset($message)) {
          echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
           }
       ?>

       <h1>Formulaire login</h1>


       <!-- debut formulaire -->
        <form method="post">
          <div class="form-group">
            <label for="courriel">courriel</label> <input type="text" id="courriel" name="courriel" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label> <input type="password" id="password" name="password" class="form-control">
          </div>
          <input type="submit" name="login" class="btn btn-primary" value="connexion" />
        </form>
  </form>
        <!-- fin formulaire -->

    </div>
    <!-- fin container -->

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>