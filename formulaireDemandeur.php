<?php
include("bd/connexion.php");
session_start();
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

    <title>Formulaire demandeur</title>
  </head>
  <body>

    <?php include("includes/menu.php"); ?>
   

    <!-- debut container -->
    <div class="container pt-5">
       <h1>Formulaire demandeur</h1>

       <!-- debut formulaire -->
        <form>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>

          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                  <label class="form-check-label" for="gridRadios1">
                    First radio
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                  <label class="form-check-label" for="gridRadios2">
                    Second radio
                  </label>
                </div>
              </div>
            </div>
          </fieldset>

          <div class="form-group row">
            <div class="col-sm-2">Type de commerce</div>
            <div class="col-sm-10">
              
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="">
                  Option one is this and that&mdash;be sure to include why it's great
                </label>
              </div>
            
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Option one is this and that&mdash;be sure to include why it's great
                </label>
              </div>

              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Option two can be something else and selecting it will deselect option one
                </label>
              </div>


            
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">Type de commerce</div>
            <div class="col-sm-10">
              <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
              </label>

              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 1
              </label>
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 2
              </label>
              <label class="radio-inline">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> 3
              </label>
           </div>
          </div>
          
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
          </div>
        </form>
        <!-- fin formulaire -->
    </div>
    <!-- fin container -->

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
  </body>
</html>