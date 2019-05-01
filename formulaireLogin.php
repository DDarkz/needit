<?php
include("bd/connexion.php");
session_start();

if(isset($_POST["login"]))
{
  try {
  
<<<<<<< HEAD
      if (empty($_POST["username"])  || empty($_POST["password"]))
=======
      if (empty($_POST["courriel"])  || empty($_POST["password"]))
>>>>>>> a77dee4c0c94e9217663f74e38f04ddeb84132ee
      {
        $message = '<label>Veuillez remplir tous les champs.</lable>';
      }
      else
      {
<<<<<<< HEAD
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

        $statement = $connexion->prepare($sql);
        $statement->execute(array('username' => $_POST["username"],
=======
        $sql = "SELECT * FROM connexion WHERE courriel = :courriel AND mdp = :password";

        $statement = $connexion->prepare($sql);
        $statement->execute(array('courriel' => $_POST["courriel"],
>>>>>>> a77dee4c0c94e9217663f74e38f04ddeb84132ee
                 'password' => $_POST["password"]));


        $row=$statement->fetch(PDO::FETCH_OBJ);
        $count = $statement->rowCount();

        if($count > 0)
        {
<<<<<<< HEAD
          // Transporter les sessions username et id.
          $_SESSION["username"] = $_POST["username"];
          $_SESSION["id"] = ($row->id);
          include("includes/headerMembre.php");
=======
          // Transporter les sessions courriel et id.
          $_SESSION["courriel"] = $_POST["courriel"];
          $_SESSION["idUser"] = ($row->id);
          include("includes/headerMembre.php");
          header("location: annonces.php");
>>>>>>> a77dee4c0c94e9217663f74e38f04ddeb84132ee
          //$message = 'Vous êtes connecté.';
          //header("location:login_success.php");
        }
        else
        {
<<<<<<< HEAD
          $message = 'Username OU Password n\'est pas bon.';
=======
          $message = 'Courriel OU Password n\'est pas bon.';
>>>>>>> a77dee4c0c94e9217663f74e38f04ddeb84132ee
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


        <div id="contenu">
          <!--?php lister(); ?-->
        </div>


       <!-- debut formulaire -->
        <form method="post">
          <div class="form-group">
<<<<<<< HEAD
            <label for="username">Username</label> <input type="text" id="username" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label> <input type="text" id="password" name="password" class="form-control">
=======
            <label for="courriel">courriel</label> <input type="text" id="courriel" name="courriel" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label> <input type="password" id="password" name="password" class="form-control">
>>>>>>> a77dee4c0c94e9217663f74e38f04ddeb84132ee
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