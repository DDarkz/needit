<?php
include("bd/connexion.php");
session_start();

if(isset($_POST["login"]))
{
  try {
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
        <!-- debut row -->
        <div class="row">
          <!-- debut col-lg-8 -->
          <div class="col-lg-8 mx-auto">
            <?php
              if (isset($message)) {
                echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
                }
            ?>

            <h1>Connectez-vous</h1>

            <!-- debut formulaire -->
              <form method="post" class="needs-validation" novalidate>
                <div class="form-group row">
                  <label for="courriel" class="col-sm-2 col-form-label">Courriel</label> 
                  <div class="col-sm-10">
                    <input type="text" id="courriel" name="courriel" class="form-control" required>
                    <div class="invalid-feedback">
                        Veuillez inscrire votre courriel.
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password</label> 
                  <div class="col-sm-10">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">
                        Veuillez inscrire votre mot de passe.
                    </div>
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-sm-10 offset-md-2">
                    <input type="submit" name="login" class="btn btn-primary" value="Connexion" />
                    <input type="reset" name="reset" class="btn btn-danger" value="Effacer" /> 
                    <p><a href="#"><br>Mot de passe oublié? </a></p>
                  </div>
                </div>
              </form>
              <!-- fin formulaire -->
          </div>
          <!-- fin col-lg-8 -->
        </div>
        <!-- fin row -->
      </div>
      <!-- fin container -->
    </section>
    <!-- fin section -->
    
    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
  </body>
</html>