<?php
include("bd/connexion.php");
session_start();
$_SESSION['idAnnonce'] = $_GET['idAnnonce']
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
    <script type="text/javascript" src="js/general.js"></script> 
    <script src="js/jquery.js"></script>  

    <title>Tchat</title>

    <?php include("includes/header-script.php"); ?>
  </head>
  <body id="page-top">

    <?php include("includes/menu.php"); ?>
   
    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
        
        <div class="col-6 mx-auto">
            <div class="messages-box"></div>
            
            <div class="form-group row">
                <div class="col-sm-12">
                    <textarea rows="4" cols="50" name="message" id="message" placeholder="Votre message" class="form-control"></textarea>
                </div>
                <div class="col-sm-12 mt-3">
                    <input type="submit" id="send" name="send" class="btn btn-dark" value ="Envoyer"/>
                </div>
            </div>
        </div>
    </div>  
    <!-- fin container -->
    </section>
    <!-- fin section -->

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
    <script>
        $(document).ready(function() {

            recupMessage();

            $('#send').click(function(){
            var message = $('#message').val();

                if(message != ''){
                    $.post('ajax/post.php',{message:message},function(){
                    recupMessage();
                    $('#message').val('');
                });
            }
        });

            function recupMessage(){
                $.post('ajax/recup.php',function(data){
                $('.messages-box').html(data);

            });
        }

        setInterval(recupMessage,1000);

        });
    </script>
  </body>
</html>